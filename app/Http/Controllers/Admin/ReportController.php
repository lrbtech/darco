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
use Hash;
use DB;
use Mail;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function paymentsoutreport(){
        $language = language::all();
        return view('admin.payments_out_report',compact('language'));
    }

    public function changestatuspaymentsout($id,$status){
        $orders = orders::find($id);
        $orders->paid_status = $status;
        $orders->save();
        return response()->json('successfully update'); 
    }

    public function getpaymentsoutreport(Request $request){
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


            ->addColumn('total', function ($orders) {
                return '<td>'.$orders->total.' KWD</td>';
            })

            ->addColumn('service_charge', function ($orders) {
                return '<td>'.$orders->service_charge.' KWD</td>';
            })

            ->addColumn('commission', function ($orders) {
                return '<td>
                <p>('.$orders->commission_percentage.' %)</p>
                <p>'.$orders->commission_amount.' KWD</p>
                </td>';
            })

            ->addColumn('payable_amount', function ($orders) {
                $payable_amount = ($orders->total - $orders->commission_amount) - $orders->service_charge;
                return '<td>
                <p>'.$payable_amount.' KWD</p>
                </td>';
            })

            ->addColumn('paid_status', function ($orders) {
                if ($orders->paid_status == '0') {
                    return '<td>Un Paid</td>';
                } else if ($orders->paid_status == '1') {
                    return '<td>Paid</td>';
                }
            })

            ->addColumn('action', function ($orders) {
                $output='';
                if($orders->status == '0'){
                    $output.='<a onclick="ChangeStatus('.$orders->id.',1)" href="#" class="dropdown-item" type="button">Paid</a>';
                }
                elseif($orders->status == '1'){
                    $output.='<a onclick="ChangeStatus('.$orders->id.',0)" href="#" class="dropdown-item" type="button">Un Paid</a>';
                }
                return '<td>
                <div class="btn-group mr-1 mb-1">
                    <button type="button" class="btn btn-danger btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                    <div class="dropdown-menu open-left arrow" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                        '.$output.'
                    </div>
                </div>
                </td>';
            })
           
            
        ->rawColumns(['date','vendor','commission','service_charge','total','payable_amount','paid_status','action'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }


}
