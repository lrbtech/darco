<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\admin;
use App\Models\roles;
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
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function dashboard(){
        $cfdate = date('Y-m-d',strtotime('first day of this month'));
        $cldate = date('Y-m-d',strtotime('last day of this month'));

        $pfdate = date('Y-m-d',strtotime('first day of previous month'));
        $pldate = date('Y-m-d',strtotime('last day of previous month'));


        $orders = orders::orderBy('id','DESC')->where('payment_status',1)->get()->take('5');

        $total_vendor = vendor::count();
        $total_customer = User::count();
        $total_order = orders::count();
        $total_order_value = orders::sum('total');

        $new_product = vendor::where('status',0)->count();
        $new_vendor = vendor::where('status',0)->where('business_type',0)->count();
        $new_professionals = vendor::where('status',0)->where('business_type',1)->count();

        $language = language::all();

        return view('admin.dashboard',compact('total_order_value','total_order','total_customer','total_vendor','orders','language','new_product','new_vendor','new_professionals'));
    }

    public function changepassword(){
        $profile = admin::find(Auth::guard('admin')->user()->id);
        $language = language::all();
        return view('admin.change_password',compact('profile','language'));
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
 
                $user = admin::find(Auth::guard('admin')->user()->id);
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
