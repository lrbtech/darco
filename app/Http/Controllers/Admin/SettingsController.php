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
        $city->parent_id = 0;
        $city->save();

        return response()->json('successfully update'); 
    }

    public function city(){
        $city = city::where('parent_id',0)->get();
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        $language = language::all();
        return view('admin.city',compact('city','role_get','language'));
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
        $settings->invoice_footer = $request->invoice_footer;
        $settings->save();

        return back();
        //return response()->json('successfully update'); 
    }


}
