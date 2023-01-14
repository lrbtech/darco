<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\professional_category;
use App\Models\idea_category;
use App\Models\city;
use App\Models\brand;
use App\Models\product;
use App\Models\product_attributes;
use App\Models\product_images;
use App\Models\attributes;
use App\Models\attribute_fields;
use App\Models\product_group;
use App\Models\vendor;
use App\Models\vendor_project;
use App\Models\project_images;
use App\Models\idea_book;
use App\Models\idea_book_images;
use App\Models\app_cart;
use App\Models\User;
use App\Models\vendor_enquiry;
use App\Models\shipping_address;
use App\Models\app_slider;
use App\Models\favourites;
use App\Models\favourites_idea;
use App\Models\orders;
use App\Models\order_items;
use App\Models\order_attributes;
use App\Models\coupon;
use Hash;
use Mail;
use PDF;
use DB;

class CustomerApiController extends Controller
{

    public function login(Request $request){
        $exist = User::where('email',$request->email)->get();
        if(count($exist)>0){
            if($exist[0]->status == 1){
                if(Hash::check($request->password,$exist[0]->password)){
                    // $user = User::find($exist[0]->id);
                    //$user->firebase_key = $request->firebase_key;
                    // $user->save();
                    return response()->json(['message' => 'Login Successfully',
                    'name'=>$exist[0]->first_name.' '.$exist[0]->last_name,
                    'user_id'=>$exist[0]->id,
                    'email'=>$exist[0]->email,
                    'status'=>200], 200);
                }else{
                    return response()->json(['message' => 'Records Does not Match','status'=>403], 403);
                }
            }else{
                return response()->json(['message' => 'Verify Your Account','status'=>401,'user_id'=>$exist[0]->id], 401);
            }
        }else{
            return response()->json(['message' => 'This Email Address Not Registered','status'=>404], 404);
        }
    }


    public function createcustomer(Request $request){
        try{
            $email_exist = User::where('email',$request->email)->get();
            if(count($email_exist)>0){
                return response()->json(['message' => 'This Email Address Has been Already Registered','status'=>403], 403);
            }
            $mobile_exist = User::where('mobile',$request->mobile)->get();
            if(count($mobile_exist)>0){
                return response()->json(['message' => 'This Mobile Number Has been Already Registered','status'=>403], 403);
            }

            $user = new User;
            $user->date = date('Y-m-d');
            $user->user_unique_id = rand().time();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            // $user->remember_token = $request->_token;
            $user->country = $request->country;
            // $user->country_code = $request->country_code;
            $user->city = $request->city;
            $user->area = $request->area;
            $user->zipcode = $request->zipcode;
            //$user->status = 1;
            $user->save();

            $all = User::find($user->id);
            Mail::send('mail.verify_mail',compact('all'),function($message) use($all){
                $message->to($all['email'])->subject('Verify your DARDESIGN Account');
                $message->from('mail.lrbinfotech@gmail.com','DARDESIGN');
            });

            return response()->json(
            ['message' => 'Update Successfully',
            'user_id'=>$user->id,
            ],200);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
        } 
    }

    public function getappslider(){
        $app_slider = app_slider::where('status',0)->get();
        $data =array();
        $datas =array();
        foreach ($app_slider as $key => $value) {
            $data = array(
                'id' => $value->id,
                'image' => $value->image,
                'category' => $value->category,
                'paroduct_id'=> (int)$value->paroduct_id
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getcity(){
        $city = city::all();
        $data =array();
        $datas =array();
        foreach ($city as $key => $value) {
            $data = array(
                'id' => $value->id,
                'city' => $value->city,
                'parent_id'=> (int)$value->parent_id
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getarea($id){
        $city = city::where('parent_id',$id)->get();
        $data =array();
        $datas =array();
        foreach ($city as $key => $value) {
            $data = array(
                'id' => $value->id,
                'city' => $value->city,
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getshopcategory(){
        $category = category::where('status',0)->orderBy('id','ASC')->get();
        $data =array();
        $datas =array();
        foreach ($category as $key => $value) {
            $data = array(
                'id' => $value->id,
                'category' => $value->category,
                'image' => '',
                'icon' => '',
                'parent_id' => (int)$value->parent_id
            );
            if($value->image != ''){
                $data['image']=$value->image;
            }
            if($value->icon != ''){
                $data['icon']=$value->icon;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getshopsubcategory($id){
        $category = category::where('parent_id',$id)->where('status',0)->orderBy('id','ASC')->get();
        $data =array();
        $datas =array();
        foreach ($category as $key => $value) {
            $data = array(
                'id' => $value->id,
                'category' => $value->category,
                'image' => '',
                'icon' => '',
            );
            if($value->image != ''){
                $data['image']=$value->image;
            }
            if($value->icon != ''){
                $data['icon']=$value->icon;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getprofessionalcategory(){
        $category = professional_category::where('status',0)->orderBy('id','ASC')->get();
        $data =array();
        $datas =array();
        foreach ($category as $key => $value) {
            $data = array(
                'id' => $value->id,
                'category' => $value->category,
                'image' => '',
                'icon' => '',
                'parent_id' => (int)$value->parent_id
            );
            if($value->image != ''){
                $data['image']=$value->image;
            }
            if($value->icon != ''){
                $data['icon']=$value->icon;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }
    
    public function getprofessionalsubcategory($id){
        $category = professional_category::where('parent_id',$id)->where('status',0)->orderBy('id','ASC')->get();
        $data =array();
        $datas =array();
        foreach ($category as $key => $value) {
            $data = array(
                'id' => $value->id,
                'category' => $value->category,
                'image' => '',
                'icon' => '',
            );
            if($value->image != ''){
                $data['image']=$value->image;
            }
            if($value->icon != ''){
                $data['icon']=$value->icon;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getprofessionalsamecategory($id){
        $current = professional_category::find($id);
        $category = professional_category::where('parent_id',$current->parent_id)->where('status',0)->orderBy('id','ASC')->get();
        $data =array();
        $datas =array();
        foreach ($category as $key => $value) {
            $data = array(
                'id' => $value->id,
                'category' => $value->category,
                'image' => '',
                'icon' => '',
            );
            if($value->image != ''){
                $data['image']=$value->image;
            }
            if($value->icon != ''){
                $data['icon']=$value->icon;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getideascategory(){
        $category = idea_category::where('status',0)->orderBy('id','ASC')->get();
        $data =array();
        $datas =array();
        foreach ($category as $key => $value) {
            $data = array(
                'id' => $value->id,
                'category' => $value->category,
                'image' => '',
                'icon' => '',
                'parent_id' => (int)$value->parent_id
            );
            if($value->image != ''){
                $data['image']=$value->image;
            }
            if($value->icon != ''){
                $data['icon']=$value->icon;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getideassubcategory($id){
        $category = idea_category::where('parent_id',$id)->where('status',0)->orderBy('id','ASC')->get();
        $data =array();
        $datas =array();
        foreach ($category as $key => $value) {
            $data = array(
                'id' => $value->id,
                'category' => $value->category,
                'image' => '',
                'icon' => '',
            );
            if($value->image != ''){
                $data['image']=$value->image;
            }
            if($value->icon != ''){
                $data['icon']=$value->icon;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getideassamecategory($id){
        $current = idea_category::find($id);
        $category = idea_category::where('parent_id',$current->parent_id)->where('status',0)->orderBy('id','ASC')->get();
        $data =array();
        $datas =array();
        foreach ($category as $key => $value) {
            $data = array(
                'id' => $value->id,
                'category' => $value->category,
                'image' => '',
                'icon' => '',
            );
            if($value->image != ''){
                $data['image']=$value->image;
            }
            if($value->icon != ''){
                $data['icon']=$value->icon;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function productfilter(Request $request){
        $i =DB::table('products as p');
        if ( $request->search != '0' )
        {
            $i->where('p.product_name', 'like', '%' . $request->search . '%');
        }
        if ( $request->category != '0' )
        {
            $i->where('p.category', $request->category);
        }
        if ( $request->subcategory != '0' )
        {
            $i->where('p.subcategory', $request->subcategory);
        }
        if ( $request->subsubcategory != '0' )
        {
            $i->where('p.subsubcategory', $request->subsubcategory);
        }
        $i->select('p.*');
        $i->where('p.status',0);
        //$i->orderBy('p.id','DESC');
        $products = $i->get();

        $data =array();
        $datas =array();
        foreach ($products as $key => $value) {
            $cat = category::find($value->category);
            $vendor = vendor::find($value->vendor_id);
            $city = city::find($vendor->city);
            $data = array(
                'review_count' => '',
                'review_average' => '',
                'product_id' => $value->id,
                'image' => '',
                'product_name' => $value->product_name,
                'mrp_price' => $value->mrp_price,
                'sales_price' => $value->sales_price,
                'vendor' => $vendor->business_name,
                'category' => $cat->category,
                'city' => $city->city,
            );
            if(!empty($value->image)){
                $data['image'] = $value->image;
            }
            $q =DB::table('reviews as r');
            $q->where('r.product_id', '=', $value->id);
            $q->where('r.status', '=', 1);
            $q->groupBy('r.product_id');
            $q->select([DB::raw("(count(*)) AS review_count"), DB::raw("(sum(r.rating) / count(*)) AS review_average")]);
            $review = $q->first();

            if(!empty($review)){
                $data['review_count'] = $review->review_count;
                $data['review_average'] = $review->review_average;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getproducts($subcategory,$subsubcategory){
        $i =DB::table('products as p');
        // if ( $category != '0' )
        // {
        //     $i->where('p.category', $category);
        // }
        if ( $subcategory != '0' )
        {
            $i->where('p.subcategory', $subcategory);
        }
        if ( $subsubcategory != '0' )
        {
            $i->where('p.subsubcategory', $subsubcategory);
        }
        $i->select('p.*');
        $i->where('p.status',0);
        //$i->orderBy('p.id','DESC');
        $products = $i->get();

        $data =array();
        $datas =array();
        foreach ($products as $key => $value) {
            $cat = category::find($value->category);
            $vendor = vendor::find($value->vendor_id);
            $city = city::find($vendor->city);
            $data = array(
                'review_count' => '',
                'review_average' => '',
                'product_id' => $value->id,
                'image' => '',
                'product_name' => $value->product_name,
                'mrp_price' => $value->mrp_price,
                'sales_price' => $value->sales_price,
                'vendor' => $vendor->business_name,
                'category' => $cat->category,
                'city' => $city->city,
            );
            if(!empty($value->image)){
                $data['image'] = $value->image;
            }
            $q =DB::table('reviews as r');
            $q->where('r.product_id', '=', $value->id);
            //$q->where('r.status', '=', 1);
            $q->groupBy('r.product_id');
            $q->select([DB::raw("(count(*)) AS review_count"), DB::raw("(sum(r.rating) / count(*)) AS review_average")]);
            $review = $q->first();

            if(!empty($review)){
                $data['review_count'] = $review->review_count;
                $data['review_average'] = $review->review_average;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getproductdetails($id){
        $product = product::find($id);

        $data =array();
        $cat = category::find($product->category);
        $vendor = vendor::find($product->vendor_id);
        $city = city::find($vendor->city);
        $data = array(
            'review_count' => '',
            'review_average' => '',
            'product_id' => $product->id,
            'image' => '',
            'product_name' => $product->product_name,
            'mrp_price' => $product->mrp_price,
            'sales_price' => $product->sales_price,
            'vendor' => $vendor->business_name,
            'vendor_id' => $vendor->id,
            'vendor_address' => '',
            'vendor_website' => '',
            'vendor_image' => '',
            'category' => $cat->category,
            'city' => $city->city,
            'stock' => $product->stock,
            'specifications' => $product->specifications,
            'description' => $product->description,
            'height_weight_size' => $product->height_weight_size,
            'shipping_description' => $product->shipping_description,
            'return_policy' => $product->return_policy,
            'assured_seller' => $product->assured_seller,
            'delivery_available' => $product->delivery_available,
            'rest_assured_seller' => $product->rest_assured_seller,
            'most_trusted' => $product->most_trusted,
            'return_days' => $product->return_days,
            'return_description' => '',
            'shipping_charge' => 0,
        );
        if($product->shipping_enable == '0'){
            $data['shipping_charge'] = $product->shipping_charge;
        }
        if(!empty($product->image)){
            $data['image'] = $product->image;
        }
        if(!empty($product->return_description)){
            $data['return_description'] = $product->return_description;
        }
        if(!empty($vendor->address)){
            $data['vendor_address'] = $vendor->address;
        }
        if(!empty($vendor->website)){
            $data['vendor_website'] = $vendor->website;
        }
        if(!empty($vendor->profile_image)){
            $data['vendor_image'] = $vendor->profile_image;
        }
        $q =DB::table('reviews as r');
        $q->where('r.product_id', '=', $product->id);
        //$q->where('r.status', '=', 1);
        $q->groupBy('r.product_id');
        $q->select([DB::raw("(count(*)) AS review_count"), DB::raw("(sum(r.rating) / count(*)) AS review_average")]);
        $review = $q->first();

        if(!empty($review)){
            $data['review_count'] = $review->review_count;
            $data['review_average'] = $review->review_average;
        }

        return response()->json($data); 
    }

    public function getproductadditionalinfo($id){
        $product = product::find($id);

        $data =array();
        $data = array(
            'review_count' => '',
            'review_average' => '',
            'product_id' => $product->id,
            'image' => '',
            'product_name' => $product->product_name,
            'mrp_price' => $product->mrp_price,
            'sales_price' => $product->sales_price,
            'vendor' => $vendor->business_name,
            'category' => $cat->category,
            'city' => $city->city,
            'stock' => $product->stock,
            'specifications' => $product->specifications,
            'description' => $product->description,
            'height_weight_size' => $product->height_weight_size,
            'shipping_description' => $product->shipping_description,
        );

        return response()->json($data); 
    }

    public function getproductimages($id){
        $product_images = product_images::where('product_id',$id)->get();
        $data =array();
        $datas =array();
        foreach ($product_images as $key => $value) {
            $data = array(
                'id' => $value->id,
                'image' => $value->image,
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getproductattributes($id){
        $list = product_attributes::where('product_id',$id)->get();
        $data =array();
        $datas =array();
        foreach ($list as $key => $value) {
        $attributes = attributes::find($value->attribute_id);
            $data = array(
                'id' => $value->id,
                'label' => $attributes->attribute_name,
                'label' => $value->attribute_value,
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getrelatedproducts($id){
        $current =product::find($id);

        $i =DB::table('products as p');
        $i->where('vendor_id',$current->vendor_id);
        $i->where('id','!=',$id);
        $i->where('p.category', $current->category);
        $i->where('p.subcategory', $current->subcategory);
        $i->where('p.subsubcategory', $current->subsubcategory);
        $i->select('p.*');
        $i->where('p.status',0);
        $products = $i->get();

        $data =array();
        $datas =array();
        foreach ($products as $key => $value) {
            $cat = category::find($value->category);
            $vendor = vendor::find($value->vendor_id);
            $city = city::find($vendor->city);
            $data = array(
                'review_count' => '',
                'review_average' => '',
                'product_id' => $value->id,
                'image' => '',
                'product_name' => $value->product_name,
                'mrp_price' => $value->mrp_price,
                'sales_price' => $value->sales_price,
                'vendor' => $vendor->business_name,
                'category' => $cat->category,
                'city' => $city->city,
            );
            if(!empty($value->image)){
                $data['image'] = $value->image;
            }
            $q =DB::table('reviews as r');
            $q->where('r.product_id', '=', $value->id);
            //$q->where('r.status', '=', 1);
            $q->groupBy('r.product_id');
            $q->select([DB::raw("(count(*)) AS review_count"), DB::raw("(sum(r.rating) / count(*)) AS review_average")]);
            $review = $q->first();

            if(!empty($review)){
                $data['review_count'] = $review->review_count;
                $data['review_average'] = $review->review_average;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }







    public function getprofessionallist($subcategory){
        $i =DB::table('vendor_projects as p');
        // if ( $category != '0' )
        // {
        //     $i->where('p.category', $category);
        // }
        if ( $subcategory != '0' )
        {
            $i->where('p.subcategory', $subcategory);
        }
        $i->select('p.*');
        $i->where('p.status',0);
        $project = $i->get();

        $data =array();
        $datas =array();
        foreach ($project as $key => $value) {
            $cat = professional_category::find($value->category);
            $vendor = vendor::find($value->vendor_id);
            $city = city::find($vendor->city);
            $data = array(
                'vendor_name' => $vendor->first_name.' '.$vendor->last_name,
                'project_id' => $value->id,
                'project_name' => $value->project_name,
                'description' => $value->description,
                'image' => '',
                'category' => $cat->category,
                'city' => $city->city,
            );
            if(!empty($value->image)){
                $data['image'] = $value->image;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getrelatedprojects($id){
        $current =vendor_project::find($id);

        $i =DB::table('vendor_projects as p');
        $i->where('vendor_id',$current->vendor_id);
        $i->where('id','!=',$id);
        $i->select('p.*');
        $i->where('p.status',0);
        $project = $i->get();

        $data =array();
        $datas =array();
        foreach ($project as $key => $value) {
            $cat = professional_category::find($value->category);
            $vendor = vendor::find($value->vendor_id);
            $city = city::find($vendor->city);
            $data = array(
                'vendor_name' => $vendor->first_name.' '.$vendor->last_name,
                'project_id' => $value->id,
                'project_name' => $value->project_name,
                'description' => $value->description,
                'image' => '',
                'category' => $cat->category,
                'city' => $city->city,
            );
            if(!empty($value->image)){
                $data['image'] = $value->image;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getprofessionaldetails($id){
        $project =vendor_project::find($id);

        $data =array();
        $cat = professional_category::find($project->category);
        $vendor = vendor::find($project->vendor_id);
        $city = city::find($vendor->city);
        $data = array(
            'vendor_name' => $vendor->first_name.' '.$vendor->last_name,
            'vendor_id' => $vendor->id,
            'project_id' => $project->id,
            'project_name' => $project->project_name,
            'description' => $project->description,
            'image' => '',
            'category' => $cat->category,
            'city' => $city->city,
            'vendor_address' => '',
            'vendor_website' => '',
            'vendor_image' => '',
        );
        if(!empty($project->image)){
            $data['image'] = $project->image;
        }
        if(!empty($vendor->address)){
            $data['vendor_address'] = $vendor->address;
        }
        if(!empty($vendor->website)){
            $data['vendor_website'] = $vendor->website;
        }
        if(!empty($vendor->profile_image)){
            $data['vendor_image'] = $vendor->profile_image;
        }
        return response()->json($data); 
    }

    public function getprofessionalimages($id){
        $project_images = project_images::where('project_id',$id)->get();
        $data =array();
        $datas =array();
        foreach ($project_images as $key => $value) {
            $data = array(
                'id' => $value->id,
                'image' => $value->image,
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getvendorideabooks($id){
        $current =vendor_project::find($id);

        $i =DB::table('idea_books as p');
        $i->where('vendor_id',$current->vendor_id);
        $i->select('p.*');
        $i->where('p.status',0);
        $get_ideas = $i->get();

        $data =array();
        $datas =array();
        foreach ($get_ideas as $key => $value) {
            $cat = idea_category::find($value->category);
            $vendor = vendor::find($value->vendor_id);
            $city = city::find($vendor->city);
            $data = array(
                'vendor_name' => $vendor->first_name.' '.$vendor->last_name,
                'idea_book_id' => $value->id,
                'title' => $value->title,
                'description' => $value->description,
                'image' => '',
                'category' => $cat->category,
                'city' => $city->city,
            );
            if(!empty($value->image)){
                $data['image'] = $value->image;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }


    public function getideabook($subcategory){
        $i =DB::table('idea_books as p');
        // if ( $category != '0' )
        // {
        //     $i->where('p.category', $category);
        // }
        if ( $subcategory != '0' )
        {
            $i->where('p.subcategory', $subcategory);
        }
        $i->select('p.*');
        $i->where('p.status',0);
        $get_ideas = $i->get();

        $data =array();
        $datas =array();
        foreach ($get_ideas as $key => $value) {
            $cat = idea_category::find($value->category);
            $vendor = vendor::find($value->vendor_id);
            $city = city::find($vendor->city);
            $data = array(
                'vendor_name' => $vendor->first_name.' '.$vendor->last_name,
                'idea_book_id' => $value->id,
                'title' => $value->title,
                'description' => $value->description,
                'image' => '',
                'category' => $cat->category,
                'city' => $city->city,
            );
            if(!empty($value->image)){
                $data['image'] = $value->image;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getrelatedideabooks($id){
        $current =idea_book::find($id);

        $i =DB::table('idea_books as p');
        $i->where('vendor_id',$current->vendor_id);
        $i->where('id','!=',$id);
        $i->select('p.*');
        $i->where('p.status',0);
        $get_ideas = $i->get();

        $data =array();
        $datas =array();
        foreach ($get_ideas as $key => $value) {
            $cat = idea_category::find($value->category);
            $vendor = vendor::find($value->vendor_id);
            $city = city::find($vendor->city);
            $data = array(
                'vendor_name' => $vendor->first_name.' '.$vendor->last_name,
                'idea_book_id' => $value->id,
                'title' => $value->title,
                'description' => $value->description,
                'image' => '',
                'category' => $cat->category,
                'city' => $city->city,
            );
            if(!empty($value->image)){
                $data['image'] = $value->image;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getideabookdetails($id){
        $get_ideas = idea_book::find($id);

        $data =array();
        $cat = idea_category::find($get_ideas->category);
        $vendor = vendor::find($get_ideas->vendor_id);
        $city = city::find($vendor->city);
        $data = array(
            'vendor_name' => $vendor->first_name.' '.$vendor->last_name,
            'vendor_id' => $vendor->id,
            'idea_book_id' => $get_ideas->id,
            'title' => $get_ideas->title,
            'description' => $get_ideas->description,
            'image' => '',
            'category' => $cat->category,
            'city' => $city->city,
            'vendor_address' => '',
            'vendor_website' => '',
            'vendor_image' => '',
        );
        if(!empty($get_ideas->image)){
            $data['image'] = $get_ideas->image;
        }
        if(!empty($vendor->address)){
            $data['vendor_address'] = $vendor->address;
        }
        if(!empty($vendor->website)){
            $data['vendor_website'] = $vendor->website;
        }
        if(!empty($vendor->profile_image)){
            $data['vendor_image'] = $vendor->profile_image;
        }
        return response()->json($data); 
    }

    public function getideabookimages($id){
        $idea_book_images = idea_book_images::where('idea_book_id',$id)->get();
        $data =array();
        $datas =array();
        foreach ($idea_book_images as $key => $value) {
            $data = array(
                'id' => $value->id,
                'image' => $value->image,
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }


    public function sendvendorenquiry(Request $request){

        $vendor_enquiry = new vendor_enquiry;
        $vendor_enquiry->date = date('Y-m-d');
        $vendor_enquiry->vendor_id = $request->vendor_id;
        $vendor_enquiry->type = $request->type;
        //0 professionals 1 idea book
        $vendor_enquiry->project_idea_book_id = $request->id;
        $vendor_enquiry->customer_id = $request->customer_id;
        $vendor_enquiry->name = $request->name;
        $vendor_enquiry->comments = $request->comments;
        $vendor_enquiry->mobile = $request->mobile;
        $vendor_enquiry->email = $request->email;
        $vendor_enquiry->save();

        // $all = $request->all();
        // $vendor = vendor::find($request->vendor_id);
        // Mail::send('mail.vendor_enquiry',compact('all'),function($message) use($all,$vendor){
        //      $message->to($vendor->email)->subject('Enquiry from DARDESIGN');
        //      $message->from('info@lrbtech.com',$all['name']);
        // });
        return response()->json(['message'=>'Successfully Send'],200); 
    }


    public function getfavourites($customer_id){
        $products = DB::table("favourites")
        ->where("favourites.customer_id",$customer_id)
        ->join('products', 'products.id', '=', 'favourites.product_id')
        ->orderBy('favourites.id','DESC')
        ->select('products.*','favourites.id as favourite_id')
        ->get();

        $data =array();
        $datas =array();
        foreach ($products as $key => $value) {
            $vendor = vendor::find($value->vendor_id);
            $data = array(
                'product_id' => $value->id,
                'favourite_id' => $value->favourite_id,
                'product_name' => $value->product_name,
                'description' => $value->description,
                'image' => '',
            );
            if(!empty($value->image)){
                $data['image'] = $value->image;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function savefavourites($id){
        $data=favourites::where('product_id',$id)->where('customer_id',Auth::user()->id)->get();
        if (count($data) == 0) {
            $favourites = new favourites;
            $favourites->date = date('Y-m-d');
            $favourites->product_id = $id;
            $favourites->customer_id = Auth::user()->id;
            $favourites->save();
            return response()->json(['message' => 'Stored Successfully!'], 200);
        }
    }

    public function deletefavourites($id){
        $favourite = favourites::where('customer_id',Auth::user()->id)->where('product_id',$id)->first();
        $favourite->delete();
        return response()->json(['message' => 'Removed Successfully!'], 200);
    }

    public function getfavouritesidea($customer_id){
        $idea_book = DB::table("favourites_ideas")
        ->where("favourites_ideas.customer_id",$customer_id)
        ->join('idea_books', 'idea_books.id', '=', 'favourites_ideas.idea_book_id')
        ->orderBy('favourites_ideas.id','DESC')
        ->select('idea_books.*','favourites_ideas.id as favourite_id')
        ->get();

        $data =array();
        $datas =array();
        foreach ($idea_book as $key => $value) {
            $vendor = vendor::find($value->vendor_id);
            $data = array(
                'idea_book_id' => $value->id,
                'favourite_id' => $value->favourite_id,
                'title' => $value->title,
                'description' => $value->description,
                'image' => '',
            );
            if(!empty($value->image)){
                $data['image'] = $value->image;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function savefavouritesidea($id){
        $data=favourites_idea::where('idea_book_id',$id)->where('customer_id',Auth::user()->id)->get();
        if (count($data) == 0) {
            $favourites_idea = new favourites_idea;
            $favourites_idea->date = date('Y-m-d');
            $favourites_idea->idea_book_id = $id;
            $favourites_idea->customer_id = Auth::user()->id;
            $favourites_idea->save();
            return response()->json(['message' => 'Stored Successfully!'], 200);
        }
    }

    public function deletefavouritesidea($id){
        $favourite = favourites_idea::where('customer_id',Auth::user()->id)->where('idea_book_id',$id)->first();
        $favourite->delete();
        return response()->json(['message' => 'Removed Successfully!'], 200);
    }

    public function getcart($id){
        $list = app_cart::where('customer_id',$id)->get();
        $data =array();
        $datas =array();
        foreach ($list as $key => $value) {
        $product = product::find($value->product_id);
            $total = $value->qty * $product->sales_price;

            $tax_amount = (5 / 100) * $total;

            $data = array(
                'id' => $value->id,
                'vendor_id' => $value->vendor_id,
                'product_id' => $value->product_id,
                'qty' => (int)$value->qty,
                'product_name' => $product->product_name,
                'price' => $product->sales_price,
                'total' => $total,
                'image' => $product->image,
                'shipping_charge' => 0,
                'tax_percentage' => 5,
                'tax_amount' => $tax_amount,
                'service_charge' => 1,
            );
            if($product->shipping_enable == '0'){
                $data['shipping_charge'] = $product->shipping_charge;
            }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function savecart(Request $request){
        try{
            $app_cart = new app_cart;
            $app_cart->customer_id = $request->customer_id;
            $app_cart->vendor_id = $request->vendor_id;
            $app_cart->product_id = $request->product_id;
            $app_cart->qty = $request->qty;
            $app_cart->save();

            return response()->json(
            ['message' => 'Save Successfully',
            'card_id'=>$app_cart->id,
            ],200);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
        } 
    }

    public function updatecart(Request $request){
        try{
            $app_cart = app_cart::find($request->card_id);
            $app_cart->qty = $request->qty;
            $app_cart->save();

            return response()->json(
            ['message' => 'Update Successfully',
            'card_id'=>$app_cart->id,
            ],200);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
        }
    }

    public function deletecart(Request $request){
        try{
            $app_cart = app_cart::find($request->card_id)->delete();
            // $app_cart;

            return response()->json(
            ['message' => 'Remove Successfully',
            ],200);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
        } 
    }


    public function deleteshippingaddress($id){
        try{
            $shipping_address = shipping_address::find($request->card_id);
            $shipping_address->delete();

            return response()->json(
            ['message' => 'Remove Successfully',
            ],200);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
        } 
    }

    public function getshippingaddress($id){
        $list = shipping_address::where('customer_id',$id)->get();
        $data =array();
        $datas =array();
        foreach ($list as $key => $value) {
            $data = array(
                'id' => $value->id,
                'landmark' => $value->landmark,
                'contact_person' => $value->contact_person,
                'contact_mobile' => $value->contact_mobile,
                'address_line1' => $value->address_line1,
                'address_line2' => $value->address_line2,
                'country' => $value->country,
                'country_code' => $value->country_code,
                'city' => $value->city,
                'area' => $value->area,
                'zipcode' => $value->zipcode,
                'is_active' => $value->is_active,
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function saveshippingaddress(Request $request){
        try{
            $shipping_address = new shipping_address;
            $shipping_address->customer_id = $request->customer_id;
            //$shipping_address->address_type = $request->address_type;
            $shipping_address->landmark = $request->landmark;
            $shipping_address->contact_person= $request->contact_person;
            $shipping_address->contact_mobile= $request->contact_mobile;
            $shipping_address->address_line1= $request->address_line1;
            $shipping_address->address_line2= $request->address_line2;
            $shipping_address->country= $request->country;
            $shipping_address->country_code= $request->country_code;
            $shipping_address->city= $request->city;
            $shipping_address->area= $request->area;
            $shipping_address->zipcode= $request->zipcode;
            $shipping_address->is_active= 1;
            $shipping_address->save();

            return response()->json(
                ['message' => 'Update Successfully',
                'id'=>$shipping_address->id,
                ],200);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
        } 
    }

    public function updateshippingaddress(Request $request){
        try{
            $shipping_address = shipping_address::find($request->id);
            $shipping_address->customer_id = $request->customer_id;
            //$shipping_address->address_type = $request->address_type;
            $shipping_address->landmark = $request->landmark;
            $shipping_address->contact_person= $request->contact_person;
            $shipping_address->contact_mobile= $request->contact_mobile;
            $shipping_address->address_line1= $request->address_line1;
            $shipping_address->address_line2= $request->address_line2;
            $shipping_address->country= $request->country;
            $shipping_address->country_code= $request->country_code;
            $shipping_address->city= $request->city;
            $shipping_address->area= $request->area;
            $shipping_address->zipcode= $request->zipcode;
            $shipping_address->is_active= 1;
            $shipping_address->save();

            return response()->json(
                ['message' => 'Update Successfully',
                'id'=>$shipping_address->id,
                ],200);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
        } 
    }

    public function applycoupon(Request $request){
        $data = array();
        $today=date('Y-m-d');
        $coupon = coupon::where("status",0)->where('start_date','<=',$today)->where('end_date','>=',$today)->where("coupon_code",$request->coupon_code)->first();
        if(!empty($coupon)){
            $cart_items = app_cart::where('user_id',$id)->get();
            $product_total=0;
            $all_product=0;
            $shipping_charge=0;
            
            foreach($cart_items as $product){
                $product_data = product::where("vendor_id",$coupon->vendor_id)->where('id',$product->id)->first();
                if(!empty($product_data)){
                    $product_total+=$product->quantity * $product->price;
                }
                $all_product+= $product->quantity * $product->price;
                $shipping_charge += $product->attributes->shipping_charge;
            }
            if($product_total !=0){
                if($coupon->min_order_value <= $product_total){
                    $discount_value=0;
                    if($coupon->value_type==2){
                        $discount_value = ($coupon->coupon_value / 100) * $product_total;
                    }else{
                        if($product_total >= $coupon->max_coupon_value){
                            $discount_value = $coupon->coupon_value;
                        }else{
                            $discount_value = $product_total;
                        }
                    }
                    $data = array(
                        "msg"=>"Coupon Applied Successfully",
                        "status"=>0,
                        "discount"=>$discount_value,
                        "total"=> ($all_product +$shipping_charge)-$discount_value,
                        "vendor_id"=>$coupon->vendor_id
                    ); 
                }else{
                    $data = array(
                        "msg"=>"Minimum Order Value is ".$coupon->min_order_value."KD!",
                        "status"=>1
                    ); 
                }
            }else{
                $data = array(
                    "msg"=>"Coupon Code Not Match!",
                    "status"=>1
                ); 
            }   
        }else{
            $data = array(
                "msg"=>"Invalid Coupon Code!",
                "status"=>1
            );
        }
        return response()->json(["data"=>$data],200);  
    }




    public function saveorder(Request $request){
        $cart = app_cart::where('user_id',$customer_id)->get();
        foreach($cart as $pro_item){
            $pro_id = $pro_item->product_id;
            $qty = $pro_item->qty;
            $product = product::find($pro_id);
            
            if($qty > $product->stock){
                $message = $product->product_name.' Out of Stock Please Remove and Continue';
                return response()->json(['message' => $message,'status'=>2], 200);
            }

        }


        $vendor =array();
        foreach($cart as $cart){
            if(!in_array($cart->attributes->vendor_id,$vendor)){
                $vendor[]=$cart->attributes->vendor_id;

            }
        }
        $onlinepayorderid =array();
        foreach($vendor as $current_vendor){
        
                $sub_total=0;
                $shipping_charge=0;
                foreach($cart as $cart_item){
                    if($current_vendor == $cart_item->attributes->vendor_id){
                        $sub_total = $sub_total + ($cart_item->quantity * $cart_item->price);
                        $shipping_charge = $shipping_charge + $cart_item->attributes->shipping_charge;
                    }
                }

                $coupon_code = ' ';
                $discount_value = 0;
                if($request->coupon == "true"){
                    if($current_vendor == $request->coupon_vendor_id){
                        $coupon_code = $request->coupon_code;
                        $discount_value = $request->coupon_amount;
                    }
                    else{
                        $coupon_code = ' ';
                        $discount_value = 0;
                    }
                }
                else{
                    $coupon_code = ' ';
                    $discount_value = 0;
                }

                // $after_discount = $sub_total;
        
                $total = round( ($sub_total + $shipping_charge) -$discount_value  );
                $tax_amount = round( ($total * 5) / (100 + 5) , 2);

                $orders = new orders;
                $orders->date = date('Y-m-d');
                $orders->customer_id = Auth::user()->id;
                $orders->billing_address_id = $request->billing_address_id;
                if($request->shipping_address == 'on'){
                    $orders->shipping_address_id = $shipping_address->id;
                }
                else{
                    $orders->shipping_address_id = $request->billing_address_id;
                }
                $orders->vendor_id = $current_vendor;
                $orders->order_message = $request->order_message;


                $orders->sub_total = $sub_total;
                $orders->coupon_code =  $request->coupon_code;
                $orders->discount_value = $discount_value;
                //$orders->after_discount = $after_discount;
                $orders->tax_percentage = '5';
                $orders->tax_amount = $tax_amount;
                $orders->shipping_charge = $shipping_charge;
                $orders->service_charge = $request->service_charge;
                $orders->total = $total + $request->service_charge;
                $orders->payment_type = $request->payment_type;
                $orders->payment_status = 0;

                $vendor_commission = vendor::find($current_vendor);
                $commission_amount = ($vendor_commission->vendor_commission / 100) * $total;

                $orders->commission_percentage = $vendor_commission->vendor_commission;
                $orders->commission_amount = $commission_amount;
                $orders->save();


                foreach(Cart::getContent() as $cart_item1){
                    if($current_vendor == $cart_item1->attributes->vendor_id){
                        $order_items = new order_items;
                        $order_items->date = date('Y-m-d');
                        $order_items->order_id = $orders->id;
                        $order_items->customer_id = Auth::user()->id;
                        $order_items->vendor_id = $current_vendor;
                        $order_items->billing_address_id = $request->billing_address_id;
                        if($request->shipping_address == 'on'){
                            $order_items->shipping_address_id = $shipping_address->id;
                        }
                        else{
                            $order_items->shipping_address_id = $request->billing_address_id;
                        }

                        $order_items->product_id = $cart_item1->id;
                        $order_items->product_name = $cart_item1->name;
                        $order_items->qty = $cart_item1->quantity;
                        $order_items->price = $cart_item1->price;
                        $order_items->total = $cart_item1->quantity * $cart_item1->price;

                        if($cart_item1->id!=""){
                            $qty = $cart_item1->quantity;
                            $pro_id = $cart_item1->id;
                            
                            $product = product::find($pro_id);
                            $product->stock = $product->stock - $qty;
                            
                            $today = date('Y-m-d');
                            $order_items->return_policy = $product->return_policy;
                            $order_items->return_date = date('Y-m-d', strtotime($today . '+'.$product->return_days.'days'));
                            $order_items->save();
                            $product->save();
                        }

                        $list = product_attributes::where('product_id',$order_items->product_id)->get();

                        $product_attributes='';
                        foreach($list as $list1){
                            $attributes = attributes::find($list1->attribute_id);

                            $order_attributes = new order_attributes;
                            $order_attributes->order_id = $orders->id;
                            $order_attributes->product_id = $order_items->product_id;
                            $order_attributes->attribute_name = $attributes->attribute_name;
                            $order_attributes->attribute_value = $list1->attribute_value;
                            $order_attributes->save();

                            $product_attributes.='<p>'.$attributes->attribute_name.' : '.$list1->attribute_value.'</p>';
                        }

                        $order_items_update = order_items::find($order_items->id);
                        $order_items_update->product_attributes = $product_attributes;
                        $order_items_update->save();

                    }
                }

            $onlinepayorderid[] = $orders->id;

        }

        $orderids = implode('.', $onlinepayorderid);

        // try {
        //     $invoice_id = time();
        //     $data = $this->onlinepay($orderids,$invoice_id);

        //     $response = ['IsSuccess'=>'true','message'=>'Your Order is Save Successfully','Data'=>$data,'status'=>0];
            
        //     foreach(explode('.', $orderids) as $ids){
        //         $invoice_update = orders::find($ids);
        //         $invoice_update->invoiceid = $invoice_id;
        //         $invoice_update->invoiceurl = $data['paymentURL'];
        //         $invoice_update->save();
        //     }

        // } catch (\Exception $e) {
        //     $response = ['IsSuccess'=>'false','message'=> $e->getMessage(),'status'=>0];
        // }
        return response()->json($response);

    }




}
