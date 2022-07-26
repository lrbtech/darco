<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\vendor;
use App\Models\vendor_project;
use App\Models\professional_category;
use App\Models\project_images;
use App\Models\idea_book;
use App\Models\idea_book_images;
use App\Models\city;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use Mail;
use Hash;
use Image;
use Carbon\Carbon;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function saveproject(Request $request){
        $this->validate($request, [
            'project_name'=>'required|unique:vendor_projects,project_name,NULL,id,vendor_id,'.Auth::guard('vendor')->user()->id,
            'category'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'The Product 1st image field is required',
        ]);

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($size_array[$x] > 10000000){
                    $message = 'Sorry! Maximum allowed size for an image is 10MB Change '.($x+2).' Image';
                    return response()->json(['message' => $message,'status'=>2], 200);
                }
            }
        }

        $project = new vendor_project;
        $project->vendor_id = Auth::guard('vendor')->user()->id;
        $project->project_name = $request->project_name;
        $project->category = $request->category;
        $project->subcategory = $request->subcategory;
        $project->description = $request->description;

        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('project_image/'), $upload_image);
            $project->image = $upload_image;
            }
        }

        $project->save();

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($name_array[$x] != ""){
                    $project_images = new project_images;

                    $image = $name_array[$x];
                    $image_info = explode(".", $name_array[$x]); 
                    $image_type = end($image_info);
                    $input['imagename'] = rand().time().'.'.$image_type;
                    $destinationPath = public_path('/project_image');
                    $img = Image::make($tmp_name_array[$x]);

                    // $img->resize(1200, 600, function ($constraint) {
                    //     $constraint->aspectRatio();
                    // })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)
                    // ->save($destinationPath.'/'.$input['imagename']);

                    $img->save($destinationPath.'/'.$input['imagename']);

                    $project_images->vendor_id = Auth::guard('vendor')->user()->id;
                    $project_images->project_id = $project->id;
                    $project_images->image = $input['imagename'];
                    $project_images->save();
                }
    	    }
        }

        return response()->json(['message'=>'Your Project is Save Successfully','status'=>0], 200); 
    }

    public function updateproject(Request $request){
        $this->validate($request, [
            'project_name'=>'required|unique:vendor_projects,project_name,'.$request->id.',id,vendor_id,'.Auth::guard('vendor')->user()->id,
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($size_array[$x] > 10000000){
                    $message = 'Sorry! Maximum allowed size for an image is 10MB Change '.($x+2).' Image';
                    return response()->json(['message' => $message,'status'=>2], 200);
                }
            }
        }
        
        $project = vendor_project::find($request->id);
        $project->project_name = $request->project_name;
        $project->category = $request->category;
        $project->subcategory = $request->subcategory;
        $project->description = $request->description;

        if($request->image!=""){
            $old_image = "project_image/".$project->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('project_image/'), $upload_image);
            $project->image = $upload_image;
            }
        }

        $project->save();

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($_POST['image_id'][$x]!=""){
                    $project_images = project_images::find($_POST['image_id'][$x]);
                    if($name_array[$x] != ""){
                        $old_image = "project_image/".$project_images->image;
                        if (file_exists($old_image)) {
                            @unlink($old_image);
                        }
                        $image = $name_array[$x];
                        $image_info = explode(".", $name_array[$x]); 
                        $image_type = end($image_info);
                        $input['imagename'] = rand().time().'.'.$image_type;
                        $destinationPath = public_path('/project_image');
                        $img = Image::make($tmp_name_array[$x]);

                        // $img->resize(1200, 600, function ($constraint) {
                        //     $constraint->aspectRatio();
                        // })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)
                        // ->save($destinationPath.'/'.$input['imagename']);

                        $img->save($destinationPath.'/'.$input['imagename']);
                        $project_images->image = $input['imagename'];
                    }
                    $project_images->save();
                }
                else{
                    if($name_array[$x] != ""){
                        $project_images = new project_images;
                        $image = $name_array[$x];
                        $image_info = explode(".", $name_array[$x]); 
                        $image_type = end($image_info);
                        $input['imagename'] = rand().time().'.'.$image_type;
                        $destinationPath = public_path('/project_image');
                        $img = Image::make($tmp_name_array[$x]);

                        // $img->resize(1200, 600, function ($constraint) {
                        //     $constraint->aspectRatio();
                        // })->insert('upload_files/logo_watermark.png','bottom-right', 50, 30)
                        // ->save($destinationPath.'/'.$input['imagename']);

                        $img->save($destinationPath.'/'.$input['imagename']);

                        $project_images->vendor_id = Auth::guard('vendor')->user()->id;
                        $project_images->project_id = $project->id;
                        $project_images->image = $input['imagename'];
                        $project_images->save();
                    }
                }
            }
        }

        return response()->json(['message'=>'Your Project is Update Successfully','status'=>0], 200);  
    }

    public function deleteprojectimage($id){
        $project_images = project_images::find($id);
        $old_image = "project_image/".$project_images->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
        $project_images->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function project(){
        $project = vendor_project::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','DESC')->get();
        return view('vendor.project',compact('project'));
    }

    public function addproject(){
        $category = professional_category::where('status',0)->where('parent_id',0)->orderBy('id','DESC')->get();
        return view('vendor.add_project',compact('category'));
    }

    public function editproject($id){
        $project = vendor_project::find($id);
        $category = professional_category::where('status',0)->where('parent_id',0)->orderBy('id','DESC')->get();
        $project_images = project_images::where('project_id',$id)->get();
        //return response()->json($project); 
        return view('vendor.edit_project',compact('category','project','project_images'));
    }
    
    public function deleteproject($id){
        $project = vendor_project::find($id);
        $old_image = "project_image/".$project->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
        $project->delete();

        $old_project_images = project_images::where('project_id',$project->project_id)->get();
        foreach($old_project_images as $row){
            $project_images = project_images::find($row->id);
            $old_image = "project_image/".$project_images->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            $project_images->delete();
        }
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function aboutus(){
        $profile = vendor::find(Auth::guard('vendor')->user()->id);
        return view('vendor.about_us',compact('profile'));
    }

    public function updateaboutus(Request $request){
        $profile = vendor::find($request->id);
        $profile->about_us = $request->about_us;
        $profile->save();

        return back();
        //return response()->json('successfully update'); 
    }

    public function profile(){
        $profile = vendor::find(Auth::guard('vendor')->user()->id);
        $city = city::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        return view('vendor.profile',compact('profile','city'));
    }

    public function updateprofile(Request $request){
        $this->validate($request, [
            'username'=>'required|unique:vendors,username,'.$request->id,
            'first_name'=>'required',
            'last_name'=>'required',
            'mobile'=>'required',
            'address'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);
        
        $profile = vendor::find($request->id);
        $profile->username = $request->username;
        $profile->business_name = $request->business_name;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->mobile = $request->mobile;
        $profile->landline = $request->landline;
        $profile->email = $request->email;
        $profile->website = $request->website;
        $profile->address = $request->address;
        $profile->city = $request->city;
        $profile->area = $request->area;

        if($request->profile_image!=""){
            $old_image = "profile_image/".$profile->profile_image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('profile_image')!=""){
                $image = $request->file('profile_image');
                $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('profile_image/'), $upload_image);
                $profile->profile_image = $upload_image;
            }
        }

        $profile->save();

        return response()->json('successfully update'); 
    }


    public function saveideabook(Request $request){
        $this->validate($request, [
            'title'=>'required',
        ]);

        $ideabook = new idea_book;
        $ideabook->vendor_id = Auth::guard('vendor')->user()->id;
        $ideabook->title = $request->title;
        $ideabook->description = $request->description;
        $ideabook->save();

        return response()->json('Successfully Save');
    }

    public function updateideabook(Request $request){
        $this->validate($request, [
            'title'=>'required',
        ]);

        
        $ideabook = idea_book::find($request->id);
        $ideabook->title = $request->title;
        $ideabook->description = $request->description;
        $ideabook->save();

        return response()->json('Successfully Update');  
    }

    public function ideabook(){
        $idea_book = idea_book::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','DESC')->get();
        return view('vendor.idea_book',compact('idea_book'));
    }

    public function editideabook($id){
        $ideabook = idea_book::find($id);
        return response()->json($ideabook); 
    }
    
    public function deleteideabook($id){
        $ideabook = idea_book::find($id);
        $ideabook->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function ideabookimages($id){
        $idea_book_images = idea_book_images::where('idea_book_id',$id)->orderBy('id','DESC')->get();
        $parent_id = $id;
        return view('vendor.idea_book_images',compact('idea_book_images','parent_id'));
    }

    public function saveideabookimages(Request $request){
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);
        
        $idea_book_images = new idea_book_images;
        $idea_book_images->idea_book_id = $request->parent_id;

        if($request->image!=""){
            if($request->file('image')!=""){
                $image = $request->file('image');
                $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('project_image/'), $upload_image);
                $idea_book_images->image = $upload_image;
            }
        }

        $idea_book_images->save();

        return response()->json('successfully update'); 
    }

    public function deleteideabookimages($id){
        $idea_book_images = idea_book_images::find($id);
        $old_image = "project_image/".$idea_book_images->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
        $idea_book_images->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

}
