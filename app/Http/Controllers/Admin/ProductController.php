<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\product_attributes;
use App\Models\category;
use App\Models\attributes;
use App\Models\attribute_fields;
use App\Models\product_group;
use App\Models\product_images;
use App\Models\brand;
use App\Models\roles;
use App\Models\return_reason;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use Mail;
use Hash;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function saveattributes(Request $request){
        $this->validate($request, [
            'attribute_name'=>'required|unique:attributes',
        ]);

        $attributes = new attributes;
        $attributes->attribute_name = $request->attribute_name;
        $attributes->save();

        return response()->json('successfully save'); 
    }

    public function updateattributes(Request $request){
        $this->validate($request, [
            'attribute_name'=>'required|unique:attributes,attribute_name,'.$request->id,
        ]);
        
        $attributes = attributes::find($request->id);
        $attributes->attribute_name = $request->attribute_name;
        $attributes->save();

        return response()->json('successfully update'); 
    }

    public function attributes(){
        $attributes = attributes::orderBy('id','DESC')->get();
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        return view('admin.attributes',compact('attributes','role_get'));
    }

    public function editattributes($id){
        $attributes = attributes::find($id);
        return response()->json($attributes); 
    }
    
    public function deleteattributes($id,$status){
        $attributes = attributes::find($id);
        $attributes->status = $status;
        $attributes->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function saveattributefields(Request $request){
        $this->validate($request, [
            'attributes_value'=>'required|unique:attribute_fields',
        ]);

        $attribute_fields = new attribute_fields;
        $attribute_fields->attribute_id = $request->attribute_id;
        $attribute_fields->attributes_value = $request->attributes_value;
        $attribute_fields->save();

        return response()->json('successfully save'); 
    }

    public function updateattributefields(Request $request){
        $this->validate($request, [
            'attributes_value'=>'required|unique:attribute_fields,attributes_value,'.$request->id,
        ]);
        
        $attribute_fields = attribute_fields::find($request->id);
        $attribute_fields->attribute_id = $request->attribute_id;
        $attribute_fields->attributes_value = $request->attributes_value;
        $attribute_fields->save();

        return response()->json('successfully update'); 
    }

    public function attributefields($id){
        $attribute_fields = attribute_fields::where('attribute_id',$id)->orderBy('id','DESC')->get();
        $attribute_id = $id;
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        return view('admin.attribute_fields',compact('attribute_fields','attribute_id','role_get'));
    }

    public function editattributefields($id){
        $attribute_fields = attribute_fields::find($id);
        return response()->json($attribute_fields); 
    }
    
    public function deleteattributefields($id){
        $attribute_fields = attribute_fields::find($id);
        $attribute_fields->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }




    public function savebrand(Request $request){
        $this->validate($request, [
            'brand'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'brand Image Field is Required',
        ]);

        $brand = new brand;
        $brand->brand = $request->brand;

        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $brand->image = $upload_image;
            }
        }

        $brand->save();

        return response()->json('successfully save'); 
    }
    public function updatebrand(Request $request){
        $this->validate($request, [
            'brand'=>'required',
            'image' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);
        
        $brand = brand::find($request->id);
        $brand->brand = $request->brand;
        if($request->image!=""){
            $old_image = "upload_files/".$brand->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $brand->image = $upload_image;
            }
        }
        $brand->save();

        return response()->json('successfully update'); 
    }

    public function brand(){
        $brand = brand::all();
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        return view('admin.brand',compact('brand','role_get'));
    }

    public function editbrand($id){
        $brand = brand::find($id);
        return response()->json($brand); 
    }
    
    public function deletebrand($id,$status){
        $brand = brand::find($id);
        $brand->status = $status;
        $brand->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function savereturnreason(Request $request){
        $this->validate($request, [
            'return_reason'=>'required',
        ]);

        $return_reason = new return_reason;
        $return_reason->return_reason = $request->return_reason;
        $return_reason->save();

        return response()->json('successfully save'); 
    }
    public function updatereturnreason(Request $request){
        $this->validate($request, [
            'return_reason'=>'required',
        ]);
        
        $return_reason = return_reason::find($request->id);
        $return_reason->return_reason = $request->return_reason;
        $return_reason->save();

        return response()->json('successfully update'); 
    }

    public function returnreason(){
        $return_reason = return_reason::all();
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        return view('admin.return_reason',compact('return_reason','role_get'));
    }

    public function editreturnreason($id){
        $return_reason = return_reason::find($id);
        return response()->json($return_reason); 
    }
    
    public function deletereturn_reason($id){
        $return_reason = return_reason::find($id);
        $return_reason->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


}
