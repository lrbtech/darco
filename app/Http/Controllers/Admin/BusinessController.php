<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\vendor;
use App\Models\admin;
use App\Models\orders;
use App\Models\product;
use App\Models\shipping_address;
use App\Models\product_attributes;
use App\Models\category;
use App\Models\attributes;
use App\Models\attribute_fields;
use App\Models\product_group;
use App\Models\roles;
use App\Models\product_images;
use Hash;
use DB;
use Mail;
use Auth;
use Yajra\DataTables\Facades\DataTables;


class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }


    public function updatecommission(Request $request){
        $this->validate($request, [
            'vendor_commission'=>'required',
        ]);
        
        $vendor = vendor::find($request->vendor_id);
        $vendor->vendor_commission = $request->vendor_commission;
        $vendor->save();

        return response()->json('successfully update'); 
    }

    public function editcommission($id){
        $vendor = vendor::find($id);
        return response()->json($vendor); 
    }

    public function vendordetails($id){
        $vendor = vendor::find($id);
        $vendor_all = vendor::all();
        $orders = orders::where('vendor_id',$id)->orderBy('id','DESC')->get();
        $product = product::where('vendor_id',$id)->orderBy('id','DESC')->get();
        $category = category::where('status',0)->where('parent_id',0)->get();
        return view('admin.vendor_details',compact('vendor','orders','vendor_all','product','category'));
    }

    public function vendor(){
        return view('admin.vendor');
    }

    public function deletevendor($id,$status){
        $vendor = vendor::find($id);
        $vendor->status = $status;
        $vendor->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function getvendor(){
        $vendor = vendor::orderBy('id','DESC')->get();
        
        return Datatables::of($vendor)
            ->addColumn('name', function ($vendor) {
                return '<td>'.$vendor->first_name.' '.$vendor->last_name.'</td>';
            })

            ->addColumn('type', function ($vendor) {
                if($vendor->business_type == 0){
                    return 'Shop';
                }
                elseif($vendor->business_type == 1){
                    return 'Professionals';
                }
            })

            ->addColumn('mobile', function ($vendor) {
                return '<td>
                <p>Mobile : '.$vendor->mobile.'</p>
                </td>';
            })

            ->addColumn('email', function ($vendor) {
                return '<td>'.$vendor->email.'</td>';
            })

            ->addColumn('vendor_commission', function ($vendor) {
                return '<td>'.$vendor->vendor_commission.' %</td>';
            })

            ->addColumn('status', function ($vendor) {
                if($vendor->status == 0){
                    return 'Email Not Verify';
                }
                elseif($vendor->status == 1){
                    return 'Activate';
                }
                elseif($vendor->status == 2){
                    return 'DeActivate';
                }
            })

            ->addColumn('date', function ($vendor) {
                return '<td>
                <p>'.date('d-m-Y',strtotime($vendor->date)).'</p>
                </td>';
            })

            ->addColumn('action', function ($vendor) {
                $output='';
                if($vendor->status == 1){
                    $output.='<button onclick="Delete('.$vendor->id.',2)" class="dropdown-item" type="button">DeActive</button>';
                }
                elseif($vendor->status == 2){
                    $output.='<button onclick="Delete('.$vendor->id.',1)" class="dropdown-item" type="button">Active</button>';
                }
                return '<td>
                <div class="btn-group mr-1 mb-1">
                    <button type="button" class="btn btn-danger btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                    <div class="dropdown-menu open-left arrow" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                        '.$output.'
                        <a onclick="EditCommission('.$vendor->id.')" href="#" class="dropdown-item" type="button">Edit Commission</a>
                        <a href="/admin/vendor-details/'.$vendor->id.'" class="dropdown-item" type="button">View Details</a>
                        <!--<div class="dropdown-divider"></div>
                        <a target="_private" href="/vendor-login/'.$vendor->id.'" class="dropdown-item" type="button">Business Login</a>-->
                    </div>
                </div>
                </td>';
            })
           
            
        ->rawColumns(['name','mobile', 'email','vendor_commission', 'status','action','date','type'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }

}
