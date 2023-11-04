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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaymentsoutExport;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public static function viewvendor($id){
        $vendor = vendor::find($id);
        $output=$vendor->first_name . $vendor->last_name;
        $output.='<p>Ph : '.$vendor->mobile.'</p>';

        echo $output;
    }

    public static function viewcustomer($id){
        $user = User::find($id);
        $output=$user->first_name . $user->last_name;
        $output.='<p>Ph : '.$user->mobile.'</p>';

        echo $output;
    }

    public static function viewproduct($id){
        $product = product::find($id);
        $output=$product->product_name;

        echo $output;
    }

    public function paymentsoutreport(){
        $language = language::all();
        $vendor = vendor::all();
        return view('admin.payments_out_report',compact('language','vendor'));
    }

    public function changestatuspaymentsout($id,$status){
        $orders = orders::find($id);
        $orders->paid_status = $status;
        $orders->save();
        return response()->json('successfully update'); 
    }

    public function getpaymentsoutreport(Request $request){
        $from_date = date('Y-m-d', strtotime($request->from_date));
        $to_date = date('Y-m-d', strtotime($request->to_date));

        $i =DB::table('orders as o');
        if ( $request->has('from_date') && !empty($request->get('from_date')) && $request->has('to_date') && !empty($request->get('to_date')) )
        {
            $i->whereBetween('o.date', [$from_date, $to_date]);
        }
        if ($request->vendor_id != '')
        {
            $i->where('o.vendor_id',$request->vendor_id);
        }
        $i->orderBy('o.id','desc');
        //$i->select('sh.*');
        $orders = $i->get();
        
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

    public function excelpaymentsout(Request $request){
        $fdate = date('Y-m-d', strtotime($request->from_date));
        $tdate = date('Y-m-d', strtotime($request->to_date));
            
        $file_name ='paymentsoutreport.xlsx';
        return Excel::download(new PaymentsoutExport($request), $file_name);
    }
    public function printpaymentsout(Request $request){
        $from_date = date('Y-m-d', strtotime($request->from_date));
        $to_date = date('Y-m-d', strtotime($request->to_date));

        $i =DB::table('orders as o');
        if ( $request->has('from_date') && !empty($request->get('from_date')) && $request->has('to_date') && !empty($request->get('to_date')) )
        {
            $i->whereBetween('o.date', [$from_date, $to_date]);
        }
        if ($request->vendor_id != '')
        {
            $i->where('o.vendor_id',$request->vendor_id);
        }
        $i->orderBy('o.id','desc');
        //$i->select('sh.*');
        $orders = $i->get();


        $view = view('print.payments_out_report',compact('orders','request'))->render();

        return response()->json(['html'=>$view]);
    }


}
