<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\product_attributes;
use App\Models\category;
use App\Models\attributes;
use App\Models\attribute_fields;
use App\Models\product_group;
use App\Models\product_images;
use App\Models\coupon;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use Mail;
use Hash;
use Carbon\Carbon;
use Image;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }


    public function savecoupon(Request $request){
        $this->validate($request, [
            'coupon_title'=>'required',
            //'coupon_code'=>'required|unique:coupons,coupon_code,NULL,id,vendor_id,'.Auth::guard('vendor')->user()->id,
            'coupon_code'=>'required|unique:coupons',
            'start_date'=>'required',
            'end_date'=>'required',
            'value_type'=>'required',
            'coupon_value'=>'required',
            'min_order_value'=>'required',
            'max_coupon_value'=>'required',
        ]);

        $coupon = new coupon;
        $coupon->vendor_id = Auth::guard('vendor')->user()->id;
        $coupon->coupon_title = $request->coupon_title;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->value_type = $request->value_type;
        $coupon->coupon_value = $request->coupon_value;
        $coupon->min_order_value = $request->min_order_value;
        $coupon->max_coupon_value = $request->max_coupon_value;
        $coupon->save();

        return response()->json('successfully save'); 
    }

    public function updatecoupon(Request $request){
        $this->validate($request, [
            'coupon_title'=>'required',
            //'coupon_code'=>'required|unique:coupons,coupon_code,'.$request->id.',id,vendor_id,'.Auth::guard('vendor')->user()->id,
            'coupon_code'=>'required|unique:coupons,coupon_code,'.$request->id,
            'start_date'=>'required',
            'end_date'=>'required',
            'value_type'=>'required',
            'coupon_value'=>'required',
            'min_order_value'=>'required',
            'max_coupon_value'=>'required',
        ]);
        
        $coupon = coupon::find($request->id);
        $coupon->coupon_title = $request->coupon_title;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->value_type = $request->value_type;
        $coupon->coupon_value = $request->coupon_value;
        $coupon->min_order_value = $request->min_order_value;
        $coupon->max_coupon_value = $request->max_coupon_value;
        $coupon->save();

        return response()->json('successfully update'); 
    }

    public function coupon(){
        $coupon = coupon::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','DESC')->get();
        return view('vendor.coupon',compact('coupon'));
    }

    public function editcoupon($id){
        $coupon = coupon::find($id);
        return response()->json($coupon); 
    }
    
    public function deletecoupon($id){
        $coupon = coupon::find($id);
        $coupon->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


}
