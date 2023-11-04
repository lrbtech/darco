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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FinanceReportExport;

class FinanceReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    

    public function financereport(){
        $language = language::all();
        $vendor = vendor::all();
        return view('admin.finance_report',compact('language','vendor'));
    }

    public function getfinancereport(Request $request){
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
        //$i->orderBy('o.id','desc');
        $i->groupBy('o.vendor_id');
        $i->select([DB::raw("SUM(o.sub_total) as sub_total") , DB::raw("SUM(o.discount_value) as discount_value") , DB::raw("SUM(o.shipping_charge) as shipping_charge") , DB::raw("SUM(o.service_charge) as service_charge") , DB::raw("SUM(o.total) as total") , DB::raw("o.vendor_id") , DB::raw("count(*) AS total_orders")]);
        $orders = $i->get();

        $datas=array();
        foreach($orders as $key => $value){
            $data = array(
                'vendor_id' => $value->vendor_id,
                'discount_value' => $value->discount_value,
                'sub_total' => $value->sub_total,
                'shipping_charge' => $value->shipping_charge,
                'service_charge' => $value->service_charge,
                'total' => $value->total,
                'total_orders' => $value->total_orders,
            );
            
            $datas[] = $data;
        }

        array_multisort(array_column($datas, 'total_orders'), SORT_DESC, $datas);


        
        return Datatables::of($datas)
            
            ->addColumn('vendor', function ($datas) {
                $vendor = vendor::find($datas['vendor_id']);
                return '<td>
                <p>'.$vendor->first_name.' '.$vendor->last_name.'</p>
                <p>Mobile : '.$vendor->mobile.'</p>
                </td>';
            })

            ->addColumn('discount_value', function ($datas) {
                return '<td>'.$datas['discount_value'].'</td>';
            })

            ->addColumn('sub_total', function ($datas) {
                return '<td>'.$datas['sub_total'].'</td>';
            })

            ->addColumn('shipping_charge', function ($datas) {
                return '<td>'.$datas['shipping_charge'].'</td>';
            })

            ->addColumn('service_charge', function ($datas) {
                return '<td>'.$datas['service_charge'].'</td>';
            })

            ->addColumn('total', function ($datas) {
                return '<td>'.$datas['total'].'</td>';
            })
            ->addColumn('total_orders', function ($datas) {
                return '<td>'.$datas['total_orders'].'</td>';
            })
           
            
        ->rawColumns(['vendor','discount_value','service_charge', 'shipping_charge','total','sub_total','total_orders'])
        ->addIndexColumn()
        ->make(true);
    }

    public function excelfinancereport(Request $request){
        $fdate = date('Y-m-d', strtotime($request->from_date));
        $tdate = date('Y-m-d', strtotime($request->to_date));
            
        $file_name ='financereport.xlsx';
        return Excel::download(new FinanceReportExport($request), $file_name);
    }
    public function printfinancereport(Request $request){
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
        $i->groupBy('o.vendor_id');
        $i->select([DB::raw("SUM(o.sub_total) as sub_total") , DB::raw("SUM(o.discount_value) as discount_value") , DB::raw("SUM(o.shipping_charge) as shipping_charge") , DB::raw("SUM(o.service_charge) as service_charge") , DB::raw("SUM(o.total) as total") , DB::raw("o.vendor_id") , DB::raw("count(*) AS total_orders")]);
        $orders = $i->get();

        $datas=array();
        foreach($orders as $key => $value){
            $data = array(
                'vendor_id' => $value->vendor_id,
                'discount_value' => $value->discount_value,
                'sub_total' => $value->sub_total,
                'shipping_charge' => $value->shipping_charge,
                'service_charge' => $value->service_charge,
                'total' => $value->total,
                'total_orders' => $value->total_orders,
            );
            
            $datas[] = $data;
        }

        array_multisort(array_column($datas, 'total_orders'), SORT_DESC, $datas);



        $view = view('print.finance_report',compact('datas','request'))->render();

        return response()->json(['html'=>$view]);
    }
}
