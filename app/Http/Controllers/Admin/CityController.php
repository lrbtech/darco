<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\country;
use App\Models\city;
use App\Models\language;
use App\Models\roles;
use App\Http\Controllers\Admin\logController;
use Auth;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    


    public function saveCountry(Request $request){
        $this->validate($request, [
            'country_code'=>'required',
            'country_name_english'=>'required',
            //'country_name_arabic'=>'required',
            'phone_count'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'image.required' => 'Item Image Field is Required',
        ]);
        
        $country = new country;
        $country->country_code = $request->country_code;
        $country->country_name_english = $request->country_name_english;
        //$country->country_name_arabic = $request->country_name_arabic;
        $country->phone_count = $request->phone_count;
        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $country->image = $upload_image;
            }
        }

        $country->save();
        return response()->json('successfully save'); 
    }

    public function updateCountry(Request $request){
        $this->validate($request, [
            'country_code'=>'required',
            'country_name_english'=>'required',
            //'country_name_arabic'=>'required',
            'phone_count'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'image.required' => 'Item Image Field is Required',
        ]);
        
        $country = country::find($request->id);
        $country->country_code = $request->country_code;
        $country->country_name_english = $request->country_name_english;
        //$country->country_name_arabic = $request->country_name_arabic;
        $country->phone_count = $request->phone_count;
        if($request->image!=""){
            $old_image = "upload_files/".$country->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $country->image = $upload_image;
            }
        }
        $country->save();


        return response()->json('successfully update'); 
    }

    public function Country(){
        $country = country::all();
        $language = language::all();
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        return view('admin.country',compact('country','language','role_get'));
    }

    public function editCountry($id){
        $country = country::find($id);
        return response()->json($country); 
    }
    
    public function deleteCountry($id,$status){
        $country = country::find($id);
        $country->status = $status;
        $country->save();

        return response()->json(['message'=>'Successfully Delete'],200); 
    }
}