<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\vendor;
use App\Models\admin;
use App\Models\orders;
use App\Models\order_items;
use App\Models\product;
use App\Models\shipping_address;
use App\Models\roles;
use App\Models\language;
use App\Models\return_item;
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
        $language = language::all();
        return view('admin.orders',compact('language'));
    }

    public function changeorderstatus($id,$status){
        $orders = orders::find($id);
        $orders->shipping_status = $status;
        $orders->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function vieworder($id){
        $orders = orders::find($id);
        $order_items = order_items::where('order_id',$id)->get();
        $billing_address = shipping_address::find($orders->billing_address_id);
        $vendor = vendor::find($orders->vendor_id);
        $customer = User::find($orders->customer_id);
        $language = language::all();
        return view('admin.view_order',compact('orders','billing_address','vendor','customer','order_items','language'));
    }

    public function getorders(Request $request){
        $orders = orders::orderBy('id','DESC')->where('payment_status',1)->get();
        
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
                if($orders->status == 0){
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
                }
                else{
                    return 'Order Cancelled';
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
           
            
        ->rawColumns(['date','vendor','customer', 'tax', 'shipping','total','shipping_status','action'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }

    public function getreturnitem(Request $request){
        $return_item = return_item::orderBy('id','DESC')->get();
        
        return Datatables::of($return_item)
            ->addColumn('date', function ($return_item) {
                return '<td>
                <p>'.date('d-m-Y',strtotime($return_item->date)).'</p>
                </td>';
            })

            ->addColumn('customer', function ($return_item) {
                $customer = User::find($return_item->customer_id);
                return '<td>
                <p>'.$customer->first_name.' '.$customer->last_name.'</p>
                <p>Mobile : '.$customer->mobile.'</p>
                </td>';
            })

            ->addColumn('product', function ($return_item) {
                $product = product::find($return_item->product_id);
                return '<td>
                <p>'.$product->product_name.'</p>
                </td>';
            })

            ->addColumn('image', function ($return_item) {
                return '<td>
                <img style="width:200px;" src="/return_image/'.$return_item->image.'">
                </td>';
            })

            ->addColumn('return_pickup_description', function ($return_item) {
                return '<td>'.$return_item->return_pickup_description.'</td>';
            })

            ->addColumn('return_reason', function ($return_item) {
                return '<td>'.$return_item->return_reason.'</td>';
            })

            ->addColumn('description', function ($return_item) {
                return '<td>'.$return_item->description.'</td>';
            })

            ->addColumn('total', function ($return_item) {
                return '<td>'.$return_item->total.'</td>';
            })

            ->addColumn('status', function ($return_item) {
                if($return_item->status == 0){
                    return 'Waiting for Pickup';
                }
                elseif($return_item->status == 1){
                    return 'Item Returned';
                }
                elseif($return_item->status == 2){
                    return 'Request Canceled';
                }
            })

            ->addColumn('action', function ($return_item) {
                $output='';
                if($return_item->status == 0){
                    $output.='<button onclick="ChangeStatus('.$return_item->id.',1)"class="dropdown-item" type="button">Item Returned</button>';
                    $output.='<button onclick="ChangeStatus('.$return_item->id.',2)"class="dropdown-item" type="button">Request Canceled</button>';
                }
                return '<td>
                <div class="btn-group mr-1 mb-1">
                    <button type="button" class="btn btn-danger btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                    <div class="dropdown-menu open-left arrow" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                        
                        <!--<div class="dropdown-divider"></div>-->
                        '.$output.'
                        
                    </div>
                </div>
                </td>';
            })
           
            
        ->rawColumns(['date','customer', 'product', 'return_reason','total','status','description','action','return_pickup_description','image'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }

    public function returnitem(){
        $language = language::all();
        return view('admin.return_item',compact('language'));
    }
}
