<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\vendor;
use App\Models\admin;
use App\Models\orders;
use App\Models\product;
use App\Models\shipping_address;
use Hash;
use DB;
use Mail;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function orders(){
        return view('admin.orders');
    }

    public function changeorderstatus($id,$status){
        $orders = orders::find($id);
        $orders->shipping_status = $status;
        $orders->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function vieworder($id){
        $orders = orders::find($id);
        $billing_address = shipping_address::find($orders->billing_address_id);
        $vendor = vendor::find($orders->vendor_id);
        $customer = User::find($orders->customer_id);

        return view('admin.view_order',compact('orders','billing_address','vendor','customer'));
    }

    public function getorders(Request $request){
        $orders = orders::orderBy('id','DESC')->get();
        
        return Datatables::of($orders)
            ->addColumn('date', function ($orders) {
                return '<td>
                <p>'.date('d-m-Y',strtotime($orders->date)).'</p>
                </td>';
            })
            
            ->addColumn('vendor', function ($orders) {
                $vendor = vendor::find($orders->vendor_id);
                return '<td>
                <p>'.$vendor->first_name.' '.$vendor->last_name.'</p>
                <p>Mobile : '.$vendor->mobile.'</p>
                </td>';
            })

            ->addColumn('customer', function ($orders) {
                $customer = User::find($orders->customer_id);
                return '<td>
                <p>'.$customer->first_name.' '.$customer->last_name.'</p>
                <p>Mobile : '.$customer->mobile.'</p>
                </td>';
            })

            ->addColumn('product', function ($orders) {
                return '<td>
                <p>'.$orders->product_name.'</p>
                <p>Price : '.$orders->price.'</p>
                <p>Qty : '.$orders->qty.'</p>
                <p>Sub Total : '.$orders->sub_total.'</p>
                </td>';
            })

            ->addColumn('tax', function ($orders) {
                return '<td>
                <p>('.$orders->tax_percentage.' %)</p>
                <p>'.$orders->tax_amount.'</p>
                </td>';
            })

            ->addColumn('shipping', function ($orders) {
                return '<td>'.$orders->shipping_charge.'</td>';
            })

            ->addColumn('total', function ($orders) {
                return '<td>'.$orders->total.'</td>';
            })

            ->addColumn('shipping_status', function ($orders) {
                if($orders->shipping_status == 0){
                    return 'Order Placed';
                }
                elseif($orders->shipping_status == 1){
                    return 'Order Processing';
                }
                elseif($orders->shipping_status == 2){
                    return 'Order Dispatched';
                }
                elseif($orders->shipping_status == 3){
                    return 'Delivered';
                }
            })

            ->addColumn('action', function ($orders) {
             
                return '<td>
                <div class="btn-group mr-1 mb-1">
                    <button type="button" class="btn btn-danger btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                    <div class="dropdown-menu open-left arrow" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a href="/admin/view-order/'.$orders->id.'" class="dropdown-item" type="button">view orders</a>
                        <div class="dropdown-divider"></div>
                        <a target="_blank" href="/print-invoice/'.$orders->id.'" class="dropdown-item" type="button">Print</a>
                    </div>
                </div>
                </td>';
            })
           
            
        ->rawColumns(['date','vendor','customer','product', 'tax', 'shipping','total','shipping_status','action'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }
}
