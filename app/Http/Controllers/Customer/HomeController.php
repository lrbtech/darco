<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\vendor;
use App\Models\customer;
use App\Models\orders;
use App\Models\vendor_enquiry;
use App\Models\category;
use App\Models\professional_category;
use App\Models\idea_category;
use App\Models\city;
use App\Models\product;
use App\Models\product_attributes;
use App\Models\product_images;
use App\Models\attributes;
use App\Models\attribute_fields;
use App\Models\product_group;
use App\Models\vendor_project;
use App\Models\order_items;
use App\Models\shipping_address;
use App\Models\settings;
use App\Models\return_item;
use App\Models\return_reason;
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

    public function enquiry(){
        $enquiry = vendor_enquiry::where('customer_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('customer.enquiry',compact('enquiry'));
    }

    public function returnitem(){
        $return_item = return_item::where('customer_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('customer.return_item',compact('return_item'));
    }

    public function orders(){
        $orders = orders::where('customer_id',Auth::user()->id)->where('payment_status',1)->orderBy('id','DESC')->get();
        return view('customer.orders',compact('orders'));
    }

    public function ordercancel($id){
        $orders = orders::find($id);
        $orders->status = 1;
        $orders->save();

        $order_items = order_items::where('order_id',$id)->get();
        
        foreach ($order_items as $key => $row) {
            $qty = $row->qty;
            $pro_id = $row->product_id;
            
            $product = product::find($pro_id);
            $product->stock = $product->stock + $qty;
            $product->save();

            $order_items1 = order_items::find($row->id);
            $order_items1->status = 1;
            $order_items1->save();
        }
        

        return response()->json(['message'=>'Successfully Canceled'],200); 
    }

    public function savereturnitem(Request $request){
        $this->validate($request, [
            'return_reason'=>'required',
        ],[
            // 'profile_image.required' => 'Profile Image Field is Required',
        ]);

        $order_items = order_items::find($request->item_id);

        $return_item = new return_item;
        $return_item->date = date('Y-m-d');
        $return_item->return_reason = $request->return_reason;
        $return_item->description = $request->description;
        $return_item->order_item_id = $request->item_id;
        $return_item->order_id = $order_items->order_id;
        $return_item->customer_id = $order_items->customer_id;
        $return_item->vendor_id = $order_items->vendor_id;
        $return_item->billing_address_id = $order_items->billing_address_id;
        $return_item->shipping_address_id = $order_items->shipping_address_id;
        $return_item->product_id = $order_items->product_id;
        $return_item->product_name = $order_items->product_name;
        $return_item->qty = $order_items->quantity;
        $return_item->price = $order_items->price;
        $return_item->total = $order_items->total;
        $return_item->return_pickup_description = $request->return_pickup_description;

        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('return_image/'), $upload_image);
            $return_item->image = $upload_image;
            }
        }

        $return_item->save();

        $order_items_update = order_items::find($request->item_id);
        $order_items_update->is_return = 1;
        $order_items_update->save();

        return response()->json(['message'=>'Successfully Return'],200); 
    }

    public function vieworders($id){
        $orders = orders::find($id);
        $order_items = order_items::where('order_id',$id)->get();
        $return_reason = return_reason::orderBy('id','ASC')->get();
        $billing_address = shipping_address::find($orders->billing_address_id);
        $vendor = vendor::find($orders->vendor_id);
        $customer = User::find($orders->customer_id);

        return view('customer.view_orders',compact('orders','billing_address','vendor','customer','order_items','return_reason'));
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
