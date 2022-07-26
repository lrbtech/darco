<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\admin;
use App\Models\vendor;
use App\Models\orders;
use App\Models\product;
use App\Models\shipping_address;
use App\Models\roles;
use Hash;
use DB;
use Auth;
use Mail;
use Yajra\DataTables\Facades\DataTables;


class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function customerdetails($id){
        $customer = User::find($id);
        $customer_all = User::all();
        $orders = orders::where('customer_id',$id)->orderBy('id','DESC')->get();
        return view('admin.customer_details',compact('customer','orders','customer_all'));
    }

    public function customer(){
        return view('admin.customer');
    }

    public function deletecustomer($id,$status){
        $user = User::find($id);
        $user->status = $status;
        $user->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function getcustomer(){
        $customer = User::orderBy('id','DESC')->get();
        
        return Datatables::of($customer)
            ->addColumn('name', function ($customer) {
                return '<td>'.$customer->first_name.' '.$customer->last_name.'</td>';
            })

            ->addColumn('mobile', function ($customer) {
                return '<td>
                <p>Mobile : '.$customer->mobile.'</p>
                </td>';
            })

            ->addColumn('email', function ($customer) {
                return '<td>'.$customer->email.'</td>';
            })

            ->addColumn('status', function ($customer) {
                if($customer->status == 0){
                    return 'Email Not Verify';
                }
                elseif($customer->status == 1){
                    return 'Activate';
                }
                elseif($customer->status == 2){
                    return 'DeActivate';
                }
            })

            ->addColumn('created_at', function ($customer) {
                return '<td>
                <p>'.date('d-m-Y',strtotime($customer->created_at)).'</p>
                </td>';
            })

            ->addColumn('action', function ($customer) {
                $output='';
                if($customer->status == 1){
                    $output.='<button onclick="Delete('.$customer->id.',2)"class="dropdown-item" type="button">DeActive</button>';
                }
                elseif($customer->status == 2){
                    $output.='<button onclick="Delete('.$customer->id.',1)"class="dropdown-item" type="button">Active</button>';
                }
                return '<td>
                <div class="btn-group mr-1 mb-1">
                    <button type="button" class="btn btn-danger btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                    <div class="dropdown-menu open-left arrow" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                        '.$output.'
                        <a href="/admin/customer-details/'.$customer->id.'" class="dropdown-item" type="button">View Details</a>
                        <!--<div class="dropdown-divider"></div>
                        <a target="_private" href="/user-login/'.$customer->id.'" class="dropdown-item" type="button">Customer Login</a>-->
                    </div>
                </div>
                </td>';
            })
           
            
        ->rawColumns(['name','mobile', 'email', 'status','action','created_at'])
        ->addIndexColumn()
        ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }

}
