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


class OrdersExport implements FromCollection, ShouldAutoSize , WithHeadings , WithMapping
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
        return $data = $i->get();
        //return booking::query()->whereYear('created_at', $this->fdate);
    }

    public function map($data): array
    {

        $date = date('d-m-Y',strtotime($data->date));


        $vendor = vendor::find($data->vendor_id);
    
        $user = User::find($data->customer_id);
    

        
        $paid_status='';
        if($data->paid_status == 0){
            $paid_status = 'Un Paid';
        }
        else if($data->paid_status == 1){
            $paid_status = 'Paid';
        }

        $shipment_status='';
        if($data->status == 0){
            if($data->shipping_status == 0){
                $shipment_status= 'Order Placed';
            }
            elseif($data->shipping_status == 1){
                $shipment_status= 'Order Processing';
            }
            elseif($data->shipping_status == 2){
                $shipment_status= 'Order Dispatched';
            }
            elseif($data->shipping_status == 3){
                $shipment_status= 'Delivered';
            }
        }
        else{
            $shipment_status= 'Order Cancelled';
        }
        
        return [           
            $data->id,
            $date,
            $vendor->first_name.$vendor->last_name,
            $vendor->mobile,
            $vendor->email,
            $user->first_name.$user->last_name,
            $user->mobile,
            $user->email,
            $data->total,
            $data->service_charge,
            $data->commission_amount,
            $shipment_status,
        ];
    }


    public function headings(): array
    {
        return [
            '#',
            'Date',
            'Vendor Name',
            'Vendor Mobile',
            'Vendor Email',
            'Customer Name',
            'Customer Mobile',
            'Customer Email',
            'Total',
            'Service Charge',
            'Commission',
            'Shipment Status',
        ];
    }




}
