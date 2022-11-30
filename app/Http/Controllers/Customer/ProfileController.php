<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\vendor;
use App\Models\vendor_project;
use App\Models\User;
use App\Models\shipping_address;
use App\Models\orders;
use App\Models\language;
use Hash;
use DB;
use Mail;
use Auth;
use Cart;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function manageaddress()
    {
        $manage_address = shipping_address::where('customer_id',Auth::user()->id)->get();

        $language = language::all();
        return view('customer.manage_address', compact('manage_address','language'));
    }

    public function editaddress($id){
        $manage_address = manage_address::find($id);
        return response()->json($manage_address); 
    }

    public function saveaddress(Request $request){
        $this->validate($request, [
            //'country'=> 'required',
            'contact_person'=>'required',
            'contact_mobile'=>'required',
            'address_line1'=>'required',
            'city'=>'required',
            'zipcode'=>'required',
            'country'=>'required',
            'country_code'=>'required',
          ],[
            // 'profile_image.required' => 'Profile Image Field is Required',
        ]);

        $shipping_address = new shipping_address;
        $shipping_address->customer_id = Auth::user()->id;
        //$shipping_address->address_type = $request->address_type;
        $shipping_address->landmark = $request->landmark;
        $shipping_address->contact_person= $request->contact_person;
        $shipping_address->contact_mobile= $request->contact_mobile;
        $shipping_address->address_line1= $request->address_line1;
        $shipping_address->address_line2= $request->address_line2;
        $shipping_address->country= $request->country;
        $shipping_address->country_code= $request->country_code;
        $shipping_address->city= $request->city;
        $shipping_address->area= $request->area;
        $shipping_address->zipcode= $request->zipcode;
        //$shipping_address->is_active= 1;
        $shipping_address->save();

        return response()->json($shipping_address->id); 
    }

    public function updateaddress(Request $request){
        $this->validate($request, [
            //'country'=> 'required',
            'contact_person'=>'required',
            'contact_mobile'=>'required',
            'address_line1'=>'required',
            'city'=>'required',
            'pincode'=>'required',
          ],[
            // 'profile_image.required' => 'Profile Image Field is Required',
        ]);

        $shipping_address = shipping_address::find($request->id);
        $shipping_address->customer_id = Auth::user()->id;
        $shipping_address->address_type = $request->address_type;
        $shipping_address->landmark = $request->landmark;
        $shipping_address->contact_person= $request->contact_person;
        $shipping_address->contact_mobile= $request->contact_mobile;
        $shipping_address->address_line1= $request->address_line1;
        $shipping_address->address_line2= $request->address_line2;
        $shipping_address->city= $request->city;
        $shipping_address->area= $request->area;
        $shipping_address->pincode= $request->pincode;
        //$shipping_address->is_active= 1;
        $shipping_address->save();

        return response()->json($shipping_address->id); 
    }


}
