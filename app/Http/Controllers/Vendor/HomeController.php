<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\vendor;
use App\Models\vendor_enquiry;
use App\Models\vendor_project;
use App\Models\idea_book;
use App\Models\product;
use App\Models\product_attributes;
use App\Models\category;
use App\Models\attributes;
use App\Models\attribute_fields;
use App\Models\product_group;
use App\Models\product_images;
use App\Models\brand;
use App\Models\orders;
use App\Models\order_items;
use App\Models\language;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use Mail;
use Hash;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function enquiry(){
        $enquiry = vendor_enquiry::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','DESC')->get();
        $language = language::all();
        return view('vendor.enquiry',compact('enquiry','language'));
    }

    public function dashboard(){
        $cfdate = date('Y-m-d',strtotime('first day of this month'));
        $cldate = date('Y-m-d',strtotime('last day of this month'));

        $pfdate = date('Y-m-d',strtotime('first day of previous month'));
        $pldate = date('Y-m-d',strtotime('last day of previous month'));


        $enquiry = vendor_enquiry::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','DESC')->get()->take('5');
        $orders = orders::where('vendor_id',Auth::guard('vendor')->user()->id)->where('payment_status',1)->orderBy('id','DESC')->get()->take('5');

        $total_products = product::where('vendor_id',Auth::guard('vendor')->user()->id)->count();
        $total_orders = orders::where('vendor_id',Auth::guard('vendor')->user()->id)->count();
        $order_in_process = orders::where('vendor_id',Auth::guard('vendor')->user()->id)->where('shipping_status',1)->count();

        $total_projects = vendor_project::where('vendor_id',Auth::guard('vendor')->user()->id)->count();
        $total_idea_books = idea_book::where('vendor_id',Auth::guard('vendor')->user()->id)->count();
        $total_enquiries = vendor_enquiry::where('vendor_id',Auth::guard('vendor')->user()->id)->count();
        $language = language::all();
        return view('vendor.dashboard',compact('order_in_process','total_orders','total_products','orders','enquiry','total_projects','total_idea_books','total_enquiries','language'));
    }

    public function changepassword(){
        $profile = vendor::find(Auth::guard('vendor')->user()->id);
        $language = language::all();
        return view('vendor.change_password',compact('profile','language'));
    }

    public function updatepassword(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        
        $hashedPassword = Auth::user()->password;
 
        if (\Hash::check($request->oldpassword , $hashedPassword )) {
            if (!\Hash::check($request->password , $hashedPassword)) {
 
                $user = vendor::find(Auth::guard('vendor')->user()->id);
                $user->password = Hash::make($request->password);
                $user->save();
 
                return response()->json(['message' => 'Password Updated Successfully!' , 'status' => 1], 200);
            }
            else{
                return response()->json(['message' => 'new password can not be the old password!' , 'status' => 0]);
            }
        }
        else{
            return response()->json(['message' => 'old password doesnt matched!' , 'status' => 0]);
        }
    }

}
