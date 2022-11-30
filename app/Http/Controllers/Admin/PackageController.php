<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\professional_category;
use App\Models\idea_category;
use App\Models\roles;
use App\Models\package;
use App\Models\language;
use Auth;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function savepackage(Request $request){
        $this->validate($request, [
            'package_name'=>'required',
            'price'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'package Image Field is Required',
        ]);

        $package = new package;
        $package->package_name = $request->package_name;
        $package->price = $request->price;
        $package->description = $request->description;

        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $package->image = $upload_image;
            }
        }
        $package->save();

        return response()->json('successfully save'); 
    }
    public function updatepackage(Request $request){
        $this->validate($request, [
            'package_name'=>'required',
            'price'=>'required',
            'image' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);
        
        $package = package::find($request->id);
        $package->package_name = $request->package_name;
        $package->price = $request->price;
        $package->description = $request->description;
        if($request->image!=""){
            $old_image = "upload_files/".$package->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $package->image = $upload_image;
            }
        }
        $package->save();

        return response()->json('successfully update'); 
    }

    public function package(){
        $package = package::all();
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        $language = language::all();
        return view('admin.package',compact('package','role_get','language'));
    }

    public function editpackage($id){
        $package = package::find($id);
        return response()->json($package); 
    }
    
    public function deletepackage($id,$status){
        $package = package::find($id);
        $package->status = $status;
        $package->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }
}
