<?php

namespace App\Http\Controllers\Admin;

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
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function updateideabook(Request $request){
        $this->validate($request, [
            'title'=>'required|unique:idea_books,title,'.$request->id.',id,vendor_id,'.$request->vendor_id,
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
        
        $idea_book = idea_book::find($request->id);
        $idea_book->title = $request->title;
        $idea_book->category = $request->category;
        $idea_book->subcategory = $request->subcategory;
        $idea_book->description = $request->description;

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

        $idea_book->save();

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

                        $idea_book_images->vendor_id = $request->vendor_id;
                        $idea_book_images->idea_book_id = $idea_book->id;
                        $idea_book_images->image = $input['imagename'];
                        $idea_book_images->save();
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
        $idea_book = idea_book::orderBy('id','DESC')->get();
        $language = language::all();
        $vendor = vendor::where('status',1)->get();
        return view('admin.idea_book',compact('idea_book','language','vendor'));
    }

    public function searchideabook(Request $request){
        // $from_date = date('Y-m-d',strtotime($request->from_date));
        // $to_date = date('Y-m-d',strtotime($request->to_date));

        $q =DB::table('idea_books as p');
        if ( $request->vendor_id && !empty($request->vendor_id) )
        {
            $q->where('p.vendor_id', $request->vendor_id);
        }
        if ( $request->status && !empty($request->status) )
        {
            $q->where('p.status', $request->status);
        }
        $q->orderBy('p.id', 'DESC');
        $idea_book = $q->get();

        $language = language::all();
        $vendor = vendor::where('status',1)->get();
        return view('admin.idea_book',compact('idea_book','language','vendor'));
    }

    public function editideabook($id){
        $idea_book = idea_book::find($id);
        $category = idea_category::where('status',0)->where('parent_id',0)->orderBy('id','DESC')->get();
        $idea_book_images = idea_book_images::where('idea_book_id',$id)->get();
        //return response()->json($idea_book); 
        $language = language::all();
        return view('admin.edit_idea_book',compact('category','idea_book','idea_book_images','language'));
    }

    public function deleteideabook($id,$status){
        $idea_book = idea_book::find($id);
        $idea_book->status = $status;
        $idea_book->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }
    
    // public function deleteideabook($id){
    //     $idea_book = idea_book::find($id);
    //     $old_image = "project_image/".$idea_book->image;
    //     if (file_exists($old_image)) {
    //         @unlink($old_image);
    //     }
    //     $idea_book->delete();

    //     $old_idea_book_images = idea_book_images::where('idea_book_id',$idea_book->idea_book_id)->get();
    //     foreach($old_idea_book_images as $row){
    //         $idea_book_images = idea_book_images::find($row->id);
    //         $old_image = "project_image/".$idea_book_images->image;
    //         if (file_exists($old_image)) {
    //             @unlink($old_image);
    //         }
    //         $idea_book_images->delete();
    //     }
    //     return response()->json(['message'=>'Successfully Delete'],200); 
    // }




}
