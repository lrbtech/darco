<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\professional_category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public static function viewbreadcrumb($id) {
        $category = category::find($id);

        $output='';

        if($category->parent_id != '0'){
            $maincategory = category::find($category->parent_id);
            $output.='<li class="breadcrumb-item"><a href="/admin/subcategory/'.$maincategory->id.'">'.$maincategory->category.'</a></li>';
            $output.='<li class="breadcrumb-item active"><a href="#">'.$category->category.'</a></li>';
        }
        else{
            $output.='<li class="breadcrumb-item active"><a href="#">'.$category->category.'</a></li>';
        }


        echo $output;
    }

    public static function viewcategorylink($id) {
        $category = category::find($id);
        $maincategory = category::find($category->parent_id);
        $output='';

        if($maincategory->parent_id == '0'){
            $output.='<a href="/admin/subcategory/'.$category->id.'">'.$category->category.'</a>';
        }
        else{
            $output.=$category->category;
        }

        echo $output;
    }

    // public static function subcategorypostcount($id) {
    //     $post_count = post_ad::where('subcategory',$id)->where('admin_status',0)->where('status',0)->count();
    //     return $post_count;
    // }

    public function savecategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
            //'banner_image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
            // 'banner_image.mimes' => 'Only jpeg, png and jpg banner_images are allowed',
            // 'banner_image.max' => 'Sorry! Maximum allowed size for an Banner Image is 1MB',
            // 'banner_image.required' => 'Banner Image Field is Required',
        ]);

        $category = new category;
        $category->category = $request->category;
        $category->parent_id = 0;

        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }

        // if($request->banner_image!=""){
        //     if($request->file('banner_image')!=""){
        //     $image = $request->file('banner_image');
        //     $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path('upload_files/'), $upload_image);
        //     $category->banner_image = $upload_image;
        //     }
        // }

        $category->save();

        return response()->json('successfully save'); 
    }
    public function updatecategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
            //'banner_image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'banner_image.mimes' => 'Only jpeg, png and jpg banner images are allowed',
            //'banner_image.max' => 'Sorry! Maximum allowed size for an banner image is 1MB',
        ]);
        
        $category = category::find($request->id);
        $category->category = $request->category;
        $category->parent_id = 0;
        if($request->image!=""){
            $old_image = "upload_files/".$category->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }
        // if($request->banner_image!=""){
        //     $old_image = "upload_files/".$category->banner_image;
        //     if (file_exists($old_image)) {
        //         @unlink($old_image);
        //     }
        //     if($request->file('banner_image')!=""){
        //     $image = $request->file('banner_image');
        //     $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path('upload_files/'), $upload_image);
        //     $category->banner_image = $upload_image;
        //     }
        // }
        $category->save();

        return response()->json('successfully update'); 
    }

    public function category(){
        $category = category::where('parent_id',0)->get();
        return view('admin.category',compact('category'));
    }

    public function editcategory($id){
        $category = category::find($id);
        return response()->json($category); 
    }
    
    public function deletecategory($id,$status){
        $category = category::find($id);
        $category->status = $status;
        $category->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function savesubcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
        ]);

        $category = new category;
        $category->category = $request->category;
        $category->parent_id = $request->parent_id;
        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }
        $category->save();
        return response()->json('successfully save'); 
    }

    public function updatesubcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'image.required' => 'Category Image Field is Required',
        ]);
        
        $category = category::find($request->id);
        $category->category = $request->category;
        $category->parent_id = $request->parent_id;
        if($request->image!=""){
            $old_image = "upload_files/".$category->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->image = $upload_image;
            }
        }
        $category->save();
        return response()->json('successfully update'); 
    }

    public function subcategory($id){
        $subcategory = category::where('parent_id',$id)->get();
        $parent_id = $id;
        return view('admin.subcategory',compact('subcategory','parent_id'));
    }

    public function editsubcategory($id){
        $category = category::find($id);
        return response()->json($category); 
    }
    
    public function deletesubcategory($id,$status){
        $category = category::find($id);
        $category->status = $status;
        $category->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }




    public function saveprofessionalcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
            //'banner_image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
            // 'banner_image.mimes' => 'Only jpeg, png and jpg banner_images are allowed',
            // 'banner_image.max' => 'Sorry! Maximum allowed size for an Banner Image is 1MB',
            // 'banner_image.required' => 'Banner Image Field is Required',
        ]);

        $professional_category = new professional_category;
        $professional_category->category = $request->category;
        $professional_category->parent_id = 0;

        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $professional_category->image = $upload_image;
            }
        }
        $professional_category->save();

        return response()->json('successfully save'); 
    }

    public function updateprofessionalcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
            //'banner_image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'banner_image.mimes' => 'Only jpeg, png and jpg banner images are allowed',
            //'banner_image.max' => 'Sorry! Maximum allowed size for an banner image is 1MB',
        ]);
        
        $professional_category = professional_category::find($request->id);
        $professional_category->category = $request->category;
        $professional_category->parent_id = 0;
        if($request->image!=""){
            $old_image = "upload_files/".$professional_category->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $professional_category->image = $upload_image;
            }
        }
        $professional_category->save();

        return response()->json('successfully update'); 
    }

    public function professionalcategory(){
        $professional_category = professional_category::where('parent_id',0)->get();
        return view('admin.professional_category',compact('professional_category'));
    }

    public function editprofessionalcategory($id){
        $professional_category = professional_category::find($id);
        return response()->json($professional_category); 
    }
    
    public function deleteprofessionalcategory($id,$status){
        $professional_category = professional_category::find($id);
        $professional_category->status = $status;
        $professional_category->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function saveprofessionalsubcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
        ]);

        $professional_category = new professional_category;
        $professional_category->category = $request->category;
        $professional_category->parent_id = $request->parent_id;
        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $professional_category->image = $upload_image;
            }
        }
        $professional_category->save();
        return response()->json('successfully save'); 
    }

    public function updateprofessionalsubcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            //'image.required' => 'Category Image Field is Required',
        ]);
        
        $professional_category = professional_category::find($request->id);
        $professional_category->category = $request->category;
        $professional_category->parent_id = $request->parent_id;
        if($request->image!=""){
            $old_image = "upload_files/".$professional_category->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $professional_category->image = $upload_image;
            }
        }
        $professional_category->save();
        return response()->json('successfully update'); 
    }

    public function professionalsubcategory($id){
        $professional_subcategory = professional_category::where('parent_id',$id)->get();
        $parent_id = $id;
        return view('admin.professional_subcategory',compact('professional_subcategory','parent_id'));
    }

    public function editprofessionalsubcategory($id){
        $professional_category = professional_category::find($id);
        return response()->json($professional_category); 
    }
    
    public function deleteprofessionalsubcategory($id,$status){
        $professional_category = professional_category::find($id);
        $professional_category->status = $status;
        $professional_category->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

}
