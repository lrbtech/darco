<?php

namespace App\Http\Controllers\Vendor;

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
        $this->middleware('auth:vendor');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function paymentsinreport(){
        $language = language::all();
        return view('vendor.payments_in_report',compact('language'));
    }

    public function getpaymentsinreport(Request $request){
        $orders = orders::orderBy('id','DESC')->where('vendor_id',Auth::guard('vendor')->user()->id)->where('payment_status',1)->get();
        
        return Datatables::of($orders)
            ->addColumn('date', function ($orders) {
                return '<td>
                <p>'.date('d-m-Y',strtotime($orders->date)).'</p>
                </td>';
            })
            
            ->addColumn('customer', function ($orders) {
                $user = user::find($orders->customer_id);
                return '<td>
                <p>'.$user->first_name.' '.$user->last_name.'</p>
                <p>Mobile : '.$user->mobile.'</p>
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
           
            
        ->rawColumns(['date','customer','commission','service_charge','total','payable_amount','paid_status'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }

}
