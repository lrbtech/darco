<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\vendor;
use App\Models\customer;
use App\Models\orders;
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
        $this->middleware('auth');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function profile(){
        $profile = User::find(Auth::user()->id);
        return view('customer.profile',compact('profile'));
    }

    public function changepassword(){
        $profile = User::find(Auth::user()->id);
        return view('customer.change_password',compact('profile'));
    }

    public function orders(){
        $orders = orders::where('customer_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('customer.orders',compact('orders'));
    }

    public function updateprofile(Request $request){
        $this->validate($request, [
            'username'=>'required|unique:users,username,'.Auth::user()->id,
        ]);

        $user = User::find(Auth::user()->id);
        $user->username = $request->username;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->mobile = $request->mobile;
        $user->save();
        return response()->json(['message' => 'Stored Successfully!'], 200);
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
 
                $user = User::find(Auth::user()->id);
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
