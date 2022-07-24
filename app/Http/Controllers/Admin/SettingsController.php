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
use Hash;
use DB;
use Mail;
use Yajra\DataTables\Facades\DataTables;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    // public function users(){
    //     $users = admin::all();
    //     return view('admin.users',compact('users'));
    // }

    public function users(){
        $users = admin::all();
        return view('admin.users',compact('users'));
    }

    public function saveuser(Request $request){
        $request->validate([
            'email' => 'required|unique:admins',
            'username' => 'required|unique:admins',
            'password' => 'required',
        ]);
        $user = new admin;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json('Successfully Save'); 
    }

    public function updateuser(Request $request){
        $request->validate([
            'email' => 'required|unique:admins,email,'.$request->id,
            'username' => 'required|unique:admins,username,'.$request->id,
        ]);
        $user = admin::find($request->id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        if($request->password != ''){
        $user->password = Hash::make($request->password);
        }
        $user->save();
        return response()->json('Successfully Update'); 
    }
    
    public function edituser($id){
        $user = admin::find($id);
        return response()->json($user); 
    }

    public function deleteuser($id,$status){
        $user = admin::find($id);
        $user->status = $status;
        $user->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function termsandconditions(){
        $settings = settings::find(1);
        return view('admin.terms',compact('settings'));
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
        return view('admin.privacy_policy',compact('settings'));
    }

    public function updateprivacypolicy(Request $request){
        $settings = settings::find($request->id);
        $settings->privacy_policy = $request->privacy_policy;
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
        return view('admin.city',compact('city'));
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
        return view('admin.area',compact('area','parent_id'));
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

}