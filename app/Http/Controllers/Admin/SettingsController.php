<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reviews;
use App\Models\customer;
use App\Models\User;
use App\Models\admin;
use App\Models\settings;
use App\Models\city;
use App\Models\roles;
use App\Models\language;
use App\Models\app_slider;
use Hash;
use DB;
use Mail;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

   

    public function termsandconditions(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.terms',compact('settings','language'));
    }

    public function updatetermsandconditions(Request $request){
        $settings = settings::find($request->id);
        $settings->terms_and_conditions = $request->terms_and_conditions;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function termsofuse(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.terms_of_use',compact('settings','language'));
    }

    public function updatetermsofuse(Request $request){
        $settings = settings::find($request->id);
        $settings->terms_of_use = $request->terms_of_use;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function termsofpayment(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.terms_of_payment',compact('settings','language'));
    }

    public function updatetermsofpayment(Request $request){
        $settings = settings::find($request->id);
        $settings->terms_of_payment = $request->terms_of_payment;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }


    public function privacypolicy(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.privacy_policy',compact('settings','language'));
    }

    public function updateprivacypolicy(Request $request){
        $settings = settings::find($request->id);
        $settings->privacy_policy = $request->privacy_policy;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function aboutus(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.about_us',compact('settings','language'));
    }

    public function updateaboutus(Request $request){
        $settings = settings::find($request->id);
        $settings->about_us = $request->about_us;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function deliveryinformation(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.delivery_information',compact('settings','language'));
    }

    public function updatedeliveryinformation(Request $request){
        $settings = settings::find($request->id);
        $settings->delivery_information = $request->delivery_information;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function vendorguide(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.vendor_guide',compact('settings','language'));
    }

    public function updatevendorguide(Request $request){
        $settings = settings::find($request->id);
        $settings->vendor_guide = $request->vendor_guide;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function professionalguide(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.professional_guide',compact('settings','language'));
    }

    public function updateprofessionalguide(Request $request){
        $settings = settings::find($request->id);
        $settings->professional_guide = $request->professional_guide;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function purchaseguide(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.purchase_guide',compact('settings','language'));
    }

    public function updatepurchaseguide(Request $request){
        $settings = settings::find($request->id);
        $settings->purchase_guide = $request->purchase_guide;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function savecity(Request $request){
        $this->validate($request, [
            'city'=>'required',
        ]);

        $city = new city;
        $city->city = $request->city;
        $city->country_id = $request->country_id;
        $city->parent_id = 0;

        $city->save();

        return response()->json('successfully save'); 
    }

    public function updatecity(Request $request){
        $this->validate($request, [
            'city'=>'required',
        ]);
        
        $city = city::find($request->id);
        $city->city = $request->city;
        $city->country_id = $request->country_id;
        $city->parent_id = 0;
        $city->save();

        return response()->json('successfully update'); 
    }

    public function city($id){
        $city = city::where('country_id',$id)->where('parent_id',0)->get();
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        $language = language::all();
        $country_id = $id;
        return view('admin.city',compact('city','role_get','language','country_id'));
    }

    public function editcity($id){
        $city = city::find($id);
        return response()->json($city); 
    }
    
    public function deletecity($id,$status){
        $city = city::find($id);
        $city->status = $status;
        $city->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function savearea(Request $request){
        $this->validate($request, [
            'city'=>'required',
        ]);

        $city = new city;
        $city->city = $request->city;
        $city->parent_id = $request->parent_id;
        $city->save();
        return response()->json('successfully save'); 
    }

    public function updatearea(Request $request){
        $this->validate($request, [
            'city'=>'required',
        ]);
        
        $city = city::find($request->id);
        $city->city = $request->city;
        $city->parent_id = $request->parent_id;
        $city->save();
        return response()->json('successfully update'); 
    }

    public function area($id){
        $area = city::where('parent_id',$id)->get();
        $parent_id = $id;
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        $language = language::all();
        return view('admin.area',compact('area','parent_id','role_get','language'));
    }

    public function editarea($id){
        $city = city::find($id);
        return response()->json($city); 
    }
    
    public function deletearea($id,$status){
        $city = city::find($id);
        $city->status = $status;
        $city->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function changelanguage($language)
    {
        $user = admin::find(Auth::guard('admin')->user()->id);
        $user->lang = $language;
        $user->save();
        return response()->json(['message'=>'Successfully Update'],200); 
    }


    public function languageTable(){
        $language = language::all();
        return view('admin.languages',compact('language'));
    }
    
    public function fetchLanguage(Request $request){
       $language = array();
      // return response()->json();
        if($request['english'] !=null){
            $language = language::where('english', 'like', '%' . $request['english'].'%')->get();
        }else if($request['arabic'] !=null){
            $language = language::where('arabic', 'like', '%' . $request['arabic']. '%')->get();
        }else{
            $language = language::all();
        }
       
         $languages = array();
        if(count($language) >0){
            foreach ($language as $key => $value) {
               $lang=array(
                   'arabic'=>$value->arabic,
                   'english'=>$value->english,
                   'id'=>$value->id,
                   'index'=>$key,
               ); 
              // $language[] = $lang;
               $languages[]=$lang;
            }
            return response()->json($languages);
        }
        return response()->json($language);
    }

    public function insertLanguage(Request $request){
        $language = new language;
        $language->english = $request->english;
        $language->arabic = $request->arabic;
        $language->save();
    }
    public function updateLanguage(Request $request){
        $language =  language::find($request->id);
        $language->english = $request->english;
        $language->arabic = $request->arabic;
        $language->save();
    }


    public function settings(){
        $settings = settings::find(1);
        $language = language::all();
        return view('admin.settings',compact('settings','language'));
    }

    public function updatesettings(Request $request){
        $settings = settings::find($request->id);
        if($request->contract_file!=""){
            $old_image = "upload_files/".$settings->contract_file;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('contract_file')!=""){
                $image = $request->file('contract_file');
                $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('upload_files/'), $upload_image);
                $settings->contract_file = $upload_image;
            }
        }
        $settings->footer_description = $request->footer_description;
        $settings->address = $request->address;
        $settings->phone = $request->phone;
        $settings->email = $request->email;
        $settings->facebook_url = $request->facebook_url;
        $settings->twitter_url = $request->twitter_url;
        $settings->instagram_url = $request->instagram_url;
        $settings->youtube_url = $request->youtube_url;
        $settings->appstore_url = $request->appstore_url;
        $settings->playstore_url = $request->playstore_url;
        $settings->invoice_footer = $request->invoice_footer;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function savemobilead(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
        ]);

        $app_slider = new app_slider;
        $app_slider->category = $request->category;

        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $app_slider->image = $upload_image;
            }
        }

        $app_slider->save();

        return response()->json('successfully save'); 
    }
    public function updatemobilead(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);
        
        $app_slider = app_slider::find($request->id);
        $app_slider->category = $request->category;
        if($request->image!=""){
            $old_image = "upload_files/".$app_slider->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $app_slider->image = $upload_image;
            }
        }
        $app_slider->save();

        return response()->json('successfully update'); 
    }

    public function mobilead(){
        $app_slider = app_slider::all();
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        $language = language::all();
        return view('admin.mobile_ad',compact('app_slider','role_get','language'));
    }

    public function editmobilead($id){
        $app_slider = app_slider::find($id);
        return response()->json($app_slider); 
    }
    
    public function deletemobilead($id,$status){
        $app_slider = app_slider::find($id);
        $app_slider->status = $status;
        $app_slider->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


}
