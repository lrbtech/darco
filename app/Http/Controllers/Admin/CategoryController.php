<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\professional_category;
use App\Models\idea_category;
use App\Models\roles;
use Auth;

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
            'image' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
            'icon' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
            'icon.mimes' => 'Only jpeg, png and jpg images are allowed',
            'icon.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'icon.required' => 'Category Icon Field is Required',
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

        if($request->icon!=""){
            if($request->file('icon')!=""){
            $image = $request->file('icon');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->icon = $upload_image;
            }
        }

        $category->save();

        return response()->json('successfully save'); 
    }
    public function updatecategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
            'icon' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'icon.mimes' => 'Only jpeg, png and jpg banner images are allowed',
            'icon.max' => 'Sorry! Maximum allowed size for an banner image is 1MB',
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
        if($request->icon!=""){
            $old_image = "upload_files/".$category->icon;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('icon')!=""){
            $image = $request->file('icon');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->icon = $upload_image;
            }
        }
        $category->save();

        return response()->json('successfully update'); 
    }

    public function category(){
        $category = category::where('parent_id',0)->get();
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        return view('admin.category',compact('category','role_get'));
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
            'image' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
            'icon' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
            'icon.mimes' => 'Only jpeg, png and jpg images are allowed',
            'icon.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'icon.required' => 'Category Icon Field is Required',
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
        if($request->icon!=""){
            if($request->file('icon')!=""){
            $image = $request->file('icon');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->icon = $upload_image;
            }
        }
        $category->save();
        return response()->json('successfully save'); 
    }

    public function updatesubcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
            'icon' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'icon.mimes' => 'Only jpeg, png and jpg images are allowed',
            'icon.max' => 'Sorry! Maximum allowed size for an image is 1MB',
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
        if($request->icon!=""){
            $old_image = "upload_files/".$category->icon;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('icon')!=""){
            $image = $request->file('icon');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $category->icon = $upload_image;
            }
        }
        $category->save();
        return response()->json('successfully update'); 
    }

    public function subcategory($id){
        $subcategory = category::where('parent_id',$id)->get();
        $parent_id = $id;
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        return view('admin.subcategory',compact('subcategory','parent_id','role_get'));
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
            'image' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
            'icon' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
            'icon.mimes' => 'Only jpeg, png and jpg images are allowed',
            'icon.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'icon.required' => 'Category Icon Field is Required',
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
        if($request->icon!=""){
            if($request->file('icon')!=""){
            $image = $request->file('icon');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $professional_category->icon = $upload_image;
            }
        }
        $professional_category->save();

        return response()->json('successfully save'); 
    }

    public function updateprofessionalcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
            'icon' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'icon.mimes' => 'Only jpeg, png and jpg images are allowed',
            'icon.max' => 'Sorry! Maximum allowed size for an image is 1MB',
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
        if($request->icon!=""){
            $old_image = "upload_files/".$professional_category->icon;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('icon')!=""){
            $image = $request->file('icon');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $professional_category->icon = $upload_image;
            }
        }
        $professional_category->save();

        return response()->json('successfully update'); 
    }

    public function professionalcategory(){
        $professional_category = professional_category::where('parent_id',0)->get();
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        return view('admin.professional_category',compact('professional_category','role_get'));
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
            'image' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
            'icon' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
            'icon.mimes' => 'Only jpeg, png and jpg images are allowed',
            'icon.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'icon.required' => 'Category Icon Field is Required',
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
        if($request->icon!=""){
            if($request->file('icon')!=""){
            $image = $request->file('icon');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $professional_category->icon = $upload_image;
            }
        }
        $professional_category->save();
        return response()->json('successfully save'); 
    }

    public function updateprofessionalsubcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
            'icon' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'icon.mimes' => 'Only jpeg, png and jpg images are allowed',
            'icon.max' => 'Sorry! Maximum allowed size for an image is 1MB',
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
        if($request->icon!=""){
            $old_image = "upload_files/".$professional_category->icon;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('icon')!=""){
            $image = $request->file('icon');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $professional_category->icon = $upload_image;
            }
        }
        $professional_category->save();
        return response()->json('successfully update'); 
    }

    public function professionalsubcategory($id){
        $professional_subcategory = professional_category::where('parent_id',$id)->get();
        $parent_id = $id;
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        return view('admin.professional_subcategory',compact('professional_subcategory','parent_id','role_get'));
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


    public function saveideacategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
            'icon' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
            'icon.mimes' => 'Only jpeg, png and jpg images are allowed',
            'icon.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'icon.required' => 'Category Icon Field is Required',
        ]);

        $idea_category = new idea_category;
        $idea_category->category = $request->category;
        $idea_category->parent_id = 0;

        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $idea_category->image = $upload_image;
            }
        }
        if($request->icon!=""){
            if($request->file('icon')!=""){
            $image = $request->file('icon');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $idea_category->icon = $upload_image;
            }
        }
        $idea_category->save();

        return response()->json('successfully save'); 
    }

    public function updateideacategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
            'icon' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'icon.mimes' => 'Only jpeg, png and jpg images are allowed',
            'icon.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);
        
        $idea_category = idea_category::find($request->id);
        $idea_category->category = $request->category;
        $idea_category->parent_id = 0;
        if($request->image!=""){
            $old_image = "upload_files/".$idea_category->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $idea_category->image = $upload_image;
            }
        }
        if($request->icon!=""){
            $old_image = "upload_files/".$idea_category->icon;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('icon')!=""){
            $image = $request->file('icon');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $idea_category->icon = $upload_image;
            }
        }
        $idea_category->save();

        return response()->json('successfully update'); 
    }

    public function ideacategory(){
        $idea_category = idea_category::where('parent_id',0)->get();
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        return view('admin.idea_category',compact('idea_category','role_get'));
    }

    public function editideacategory($id){
        $idea_category = idea_category::find($id);
        return response()->json($idea_category); 
    }
    
    public function deleteideacategory($id,$status){
        $idea_category = idea_category::find($id);
        $idea_category->status = $status;
        $idea_category->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function saveideasubcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
            'icon' => 'required|mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Category Image Field is Required',
            'icon.mimes' => 'Only jpeg, png and jpg images are allowed',
            'icon.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'icon.required' => 'Category Icon Field is Required',
        ]);

        $idea_category = new idea_category;
        $idea_category->category = $request->category;
        $idea_category->parent_id = $request->parent_id;
        if($request->image!=""){
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $idea_category->image = $upload_image;
            }
        }
        if($request->icon!=""){
            if($request->file('icon')!=""){
            $image = $request->file('icon');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $idea_category->icon = $upload_image;
            }
        }
        $idea_category->save();
        return response()->json('successfully save'); 
    }

    public function updateideasubcategory(Request $request){
        $this->validate($request, [
            'category'=>'required',
            'image' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
            'icon' => 'mimes:jpeg,jpg,png|max:3000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'icon.mimes' => 'Only jpeg, png and jpg images are allowed',
            'icon.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);
        
        $idea_category = idea_category::find($request->id);
        $idea_category->category = $request->category;
        $idea_category->parent_id = $request->parent_id;
        if($request->image!=""){
            $old_image = "upload_files/".$idea_category->image;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('image')!=""){
            $image = $request->file('image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $idea_category->image = $upload_image;
            }
        }
        if($request->icon!=""){
            $old_image = "upload_files/".$idea_category->icon;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            if($request->file('icon')!=""){
            $image = $request->file('icon');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_files/'), $upload_image);
            $idea_category->icon = $upload_image;
            }
        }
        $idea_category->save();
        return response()->json('successfully update'); 
    }

    public function ideasubcategory($id){
        $idea_subcategory = idea_category::where('parent_id',$id)->get();
        $parent_id = $id;
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        return view('admin.idea_subcategory',compact('idea_subcategory','parent_id','role_get'));
    }

    public function editideasubcategory($id){
        $idea_category = idea_category::find($id);
        return response()->json($idea_category); 
    }
    
    public function deleteideasubcategory($id,$status){
        $idea_category = idea_category::find($id);
        $idea_category->status = $status;
        $idea_category->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

}
