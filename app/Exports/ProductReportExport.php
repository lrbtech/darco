<?php

namespace App\Exports;
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
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use PhpOffice\PhpSpreadsheet\Writer\Xls;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;


class ProductReportExport implements FromCollection, ShouldAutoSize , WithHeadings , WithMapping
{

    public function __construct($request)
    {
        // $this->fdate = $fdate;
        // $this->tdate = $tdate;
        $this->request = $request;
    }

    public function collection()
    {
        $request = $this->request;  

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
        return $datas = $i->get();

        // $datas=array();
        // foreach($orders as $key => $value){
        //     $data = array(
        //         'vendor_id' => $value->vendor_id,
        //         'product_id' => $value->product_id,
        //         'qty' => $value->qty,
        //         'price' => $value->price,
        //         'total' => $value->total,
        //         'total_orders' => $value->total_orders,
        //     );
        //     $datas[] = $data;
        // }

        // array_multisort(array_column($datas, 'total_orders'), SORT_DESC, $datas);

        // return $datas;

        //return booking::query()->whereYear('created_at', $this->fdate);
    }

    public function map($datas): array
    {
        $vendor = vendor::find($datas->vendor_id);
    
        $product = product::find($datas->product_id);
            
        return [           
            $vendor->first_name.$vendor->last_name,
            $vendor->mobile,
            $vendor->email,
            $product->product_name,
            $datas->total_orders,
            $datas->qty,
            $datas->price,
            $datas->total,
        ];
    }


    public function headings(): array
    {
        return [
            'Vendor Name',
            'Vendor Mobile',
            'Vendor Email',
            'Product Name',
            'Total Orders',
            'Qty',
            'Price',
            'Total',
        ];
    }




}
