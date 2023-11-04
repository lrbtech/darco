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
use App\Exports\ProductReportExport;

class ProductReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    

    public function productreport(){
        $language = language::all();
        $vendor = vendor::all();
        return view('admin.product_report',compact('language','vendor'));
    }

    public function getproductreport(Request $request){
        $from_date = date('Y-m-d', strtotime($request->from_date));
        $to_date = date('Y-m-d', strtotime($request->to_date));

        $i =DB::table('order_items as o');
        if ( $request->has('from_date') && !empty($request->get('from_date')) && $request->has('to_date') && !empty($request->get('to_date')) )
        {
            $i->whereBetween('o.date', [$from_date, $to_date]);
        }
        if ($request->vendor_id != '')
        {
            $i->where('o.vendor_id',$request->vendor_id);
        }
        //$i->orderBy('o.id','desc');
        $i->groupBy('o.product_id','o.vendor_id','o.price');
        $i->select([DB::raw("SUM(o.qty) as qty"), DB::raw("(sum(o.price) / count(*)) AS price") ,DB::raw("SUM(o.total) as total") , DB::raw("o.product_id") , DB::raw("o.vendor_id") , DB::raw("count(*) AS total_orders")]);
        $orders = $i->get();

        $datas=array();
        foreach($orders as $key => $value){
            $data = array(
                'vendor_id' => $value->vendor_id,
                'product_id' => $value->product_id,
                'qty' => $value->qty,
                'price' => $value->price,
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

            ->addColumn('product', function ($datas) {
                $product = product::find($datas['product_id']);
                return '<td>
                <p>'.$product->product_name.'</p>
                </td>';
            })


            ->addColumn('qty', function ($datas) {
                return '<td>'.$datas['qty'].'</td>';
            })

            ->addColumn('price', function ($datas) {
                return '<td>'.$datas['price'].'</td>';
            })

            ->addColumn('total', function ($datas) {
                return '<td>'.$datas['total'].'</td>';
            })
            ->addColumn('total_orders', function ($datas) {
                return '<td>'.$datas['total_orders'].'</td>';
            })

           
            
        ->rawColumns(['product','vendor','qty', 'price','total','total_orders'])
        ->addIndexColumn()
        ->make(true);
    }

    public function excelproductreport(Request $request){
        $fdate = date('Y-m-d', strtotime($request->from_date));
        $tdate = date('Y-m-d', strtotime($request->to_date));
            
        $file_name ='productreport.xlsx';
        return Excel::download(new ProductReportExport($request), $file_name);
    }
    public function printproductreport(Request $request){
        $from_date = date('Y-m-d', strtotime($request->from_date));
        $to_date = date('Y-m-d', strtotime($request->to_date));

        $i =DB::table('order_items as o');
        if ( $request->has('from_date') && !empty($request->get('from_date')) && $request->has('to_date') && !empty($request->get('to_date')) )
        {
            $i->whereBetween('o.date', [$from_date, $to_date]);
        }
        if ($request->vendor_id != '')
        {
            $i->where('o.vendor_id',$request->vendor_id);
        }
        //$i->orderBy('o.id','desc');
        $i->groupBy('o.product_id','o.vendor_id','o.price');
        $i->select([DB::raw("SUM(o.qty) as qty"), DB::raw("(sum(o.price) / count(*)) AS price") ,DB::raw("SUM(o.total) as total") , DB::raw("o.product_id") , DB::raw("o.vendor_id") , DB::raw("count(*) AS total_orders")]);
        $orders = $i->get();

        $datas=array();
        foreach($orders as $key => $value){
            $data = array(
                'vendor_id' => $value->vendor_id,
                'product_id' => $value->product_id,
                'qty' => $value->qty,
                'price' => $value->price,
                'total' => $value->total,
                'total_orders' => $value->total_orders,
            );
            $datas[] = $data;
        }

        array_multisort(array_column($datas, 'total_orders'), SORT_DESC, $datas);



        $view = view('print.product_report',compact('datas','request'))->render();

        return response()->json(['html'=>$view]);
    }
}
