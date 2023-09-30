<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\vendor;
use App\Models\idea_book;
use App\Models\idea_category;
use App\Models\idea_book_images;
use App\Models\language;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use Mail;
use Hash;
use Image;
use Carbon\Carbon;

class IdeaBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function saveideabook(Request $request){
        $this->validate($request, [
            'title'=>'required|unique:idea_books,title,NULL,id,vendor_id,'.Auth::guard('vendor')->user()->id,
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

        $idea_book = new idea_book;
        $idea_book->date = date('Y-m-d');
        $idea_book->vendor_id = Auth::guard('vendor')->user()->id;
        $idea_book->title = $request->title;
        $idea_book->category = $request->category;
        $idea_book->subcategory = $request->subcategory;
        $idea_book->description = $request->description;

        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('project_image/'), $upload_image);
            $idea_book->image = $upload_image;
            }
        }

        $idea_book->save();

        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($name_array[$x] != ""){
                    $idea_book_images = new idea_book_images;

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

                    $idea_book_images->vendor_id = Auth::guard('vendor')->user()->id;
                    $idea_book_images->idea_book_id = $idea_book->id;
                    $idea_book_images->image = $input['imagename'];
                    $idea_book_images->save();
                }
    	    }
        }

        return response()->json(['message'=>'Your Book is Save Successfully','status'=>0], 200); 
    }

    public function updateideabook(Request $request){
        $this->validate($request, [
            'title'=>'required|unique:idea_books,title,'.$request->id.',id,vendor_id,'.Auth::guard('vendor')->user()->id,
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);

        $idea_book = idea_book::find($request->id);

        if($idea_book->status == 0){
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
        }
        
        
        $idea_book->title = $request->title;
        $idea_book->category = $request->category;
        $idea_book->subcategory = $request->subcategory;
        $idea_book->description = $request->description;

        if($idea_book->status == 0){
        if($request->image!=""){
            $old_image = "project_image/".$idea_book->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('project_image/'), $upload_image);
            $idea_book->image = $upload_image;
            }
        }
        }

        $idea_book->save();

        if($idea_book->status == 0){
        if(isset($_FILES['images'])){
            $name_array = $_FILES['images']['name'];
            $tmp_name_array = $_FILES['images']['tmp_name'];
            $type_array = $_FILES['images']['type'];
            $size_array = $_FILES['images']['size'];
            $error_array = $_FILES['images']['error'];
            for ($x=0; $x<count($name_array); $x++) 
            {
                if($_POST['image_id'][$x]!=""){
                    $idea_book_images = idea_book_images::find($_POST['image_id'][$x]);
                    if($name_array[$x] != ""){
                        $old_image = "project_image/".$idea_book_images->image;
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
                        $idea_book_images->image = $input['imagename'];
                    }
                    $idea_book_images->save();
                }
                else{
                    if($name_array[$x] != ""){
                        $idea_book_images = new idea_book_images;
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

                        $idea_book_images->vendor_id = Auth::guard('vendor')->user()->id;
                        $idea_book_images->idea_book_id = $idea_book->id;
                        $idea_book_images->image = $input['imagename'];
                        $idea_book_images->save();
                    }
                }
            }
        }
        }

        return response()->json(['message'=>'Your Idea Book is Update Successfully','status'=>0], 200);  
    }

    public function deleteideabookimage($id){
        $idea_book_images = idea_book_images::find($id);
        $old_image = "project_image/".$idea_book_images->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
        $idea_book_images->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function ideabook(){
        $idea_book = idea_book::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','DESC')->get();
        $language = language::all();
        return view('vendor.idea_book',compact('idea_book','language'));
    }

    public function addideabook(){
        $category = idea_category::where('status',0)->where('parent_id',0)->orderBy('id','DESC')->get();
        $language = language::all();
        return view('vendor.add_idea_book',compact('category','language'));
    }

    public function editideabook($id){
        $idea_book = idea_book::find($id);
        $category = idea_category::where('status',0)->where('parent_id',0)->orderBy('id','DESC')->get();
        $idea_book_images = idea_book_images::where('idea_book_id',$id)->get();
        //return response()->json($idea_book); 
        $language = language::all();
        return view('vendor.edit_idea_book',compact('category','idea_book','idea_book_images','language'));
    }
    
    public function deleteideabook($id){
        $idea_book = idea_book::find($id);
        $old_image = "project_image/".$idea_book->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
        $idea_book->delete();

        $old_idea_book_images = idea_book_images::where('idea_book_id',$idea_book->idea_book_id)->get();
        foreach($old_idea_book_images as $row){
            $idea_book_images = idea_book_images::find($row->id);
            $old_image = "project_image/".$idea_book_images->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            $idea_book_images->delete();
        }
        return response()->json(['message'=>'Successfully Delete'],200); 
    }




}
