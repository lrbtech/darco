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
use App\Models\category;
use App\Models\vendor;
use App\Models\vendor_project;
use App\Models\professional_category;
use App\Models\project_images;
use App\Models\idea_book;
use App\Models\idea_book_images;
use Hash;
use DB;
use Mail;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function updateproject(Request $request){
        $this->validate($request, [
            'project_name'=>'required|unique:vendor_projects,project_name,'.$request->id.',id,vendor_id,'.$request->vendor_id,
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

                        $project_images->vendor_id = $request->vendor_id;
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
        $project = vendor_project::orderBy('id','DESC')->get();
        $language = language::all();
        $vendor = vendor::where('status',1)->get();
        return view('admin.project',compact('project','language','vendor'));
    }

    public function searchproject(Request $request){
        // $from_date = date('Y-m-d',strtotime($request->from_date));
        // $to_date = date('Y-m-d',strtotime($request->to_date));

        $q =DB::table('vendor_projects as p');
        if ( $request->vendor_id && !empty($request->vendor_id) )
        {
            $q->where('p.vendor_id', $request->vendor_id);
        }
        if ( $request->status && !empty($request->status) )
        {
            $q->where('p.status', $request->status);
        }
        $q->orderBy('p.id', 'DESC');
        $project = $q->get();

        $language = language::all();
        $vendor = vendor::where('status',1)->get();
        return view('admin.project',compact('project','language','vendor'));
    }

    public function editproject($id){
        $project = vendor_project::find($id);
        $category = professional_category::where('status',0)->where('parent_id',0)->orderBy('id','DESC')->get();
        $project_images = project_images::where('project_id',$id)->get();
        //return response()->json($project); 
        $language = language::all();
        return view('admin.edit_project',compact('category','project','project_images','language'));
    }
    
    public function deleteproject($id,$status){
        $project = vendor_project::find($id);
        $project->status = $status;
        $project->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }
    // public function deleteproject($id){
    //     $project = vendor_project::find($id);
    //     $old_image = "project_image/".$project->image;
    //     if (file_exists($old_image)) {
    //         @unlink($old_image);
    //     }
    //     $project->delete();

    //     $old_project_images = project_images::where('project_id',$project->project_id)->get();
    //     foreach($old_project_images as $row){
    //         $project_images = project_images::find($row->id);
    //         $old_image = "project_image/".$project_images->image;
    //         if (file_exists($old_image)) {
    //             @unlink($old_image);
    //         }
    //         $project_images->delete();
    //     }
    //     return response()->json(['message'=>'Successfully Delete'],200); 
    // }


}
