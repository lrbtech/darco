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
use App\Models\product_specifications;
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
use App\Models\return_item;
use App\Models\return_reason;
use App\Models\language;
use App\Models\vendor_customer_chat;
use App\Models\settings;
use Hash;
use Mail;
use Carbon\Carbon;
use DB;
use Image;
use App\Events\ChatEvent;
use App\Events\ChatAdmin;

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
            //$city = city::where('city',$request->city)->first();
            $user->city = $request->city;
            //$area = city::where('city',$request->area)->first();
            $user->area = $request->area;
            $user->zipcode = $request->zipcode;
            //$user->status = 1;
            $user->save();

            $all = User::find($user->id);
            Mail::send('mail.verify_mail',compact('all'),function($message) use($all){
                $message->to($all['email'])->subject('Verify your DARSTORE Account');
                $message->from('mail.lrbinfotech@gmail.com','DARSTORE');
            });

            return response()->json(
            ['message' => 'Update Successfully',
            'user_id'=>$user->id,
            ],200);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
        } 
    }


    public function updateprofile(Request $request){
        try{
            // $email_exist = User::where('email',$request->email)->get();
            // if(count($email_exist)>0){
            //     return response()->json(['message' => 'This Email Address Has been Already Registered','status'=>403], 403);
            // }
            $mobile_exist = User::where('mobile',$request->mobile)->get();
            if(count($mobile_exist)>0){
                return response()->json(['message' => 'This Mobile Number Has been Already Registered','status'=>403], 403);
            }

            $user = User::find($request->customer_id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->mobile = $request->mobile;
            $user->country = 1;
            //$user->country_code = $request->country_code;
            //$city = city::where('city',$request->city)->first();
            $user->city = $request->city;
            //$area = city::where('city',$request->area)->first();
            $user->area = $request->area;
            $user->zipcode = $request->zipcode;
            //$user->status = 1;
            $user->save();


            return response()->json(
            ['message' => 'Update Successfully',
            'customer_id'=>$user->id,
            ],200);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
        } 
    }

    public function getprofile($id){
        $user = User::find($id);
        $city = city::find($user->city);
        $area = city::find($user->area);
        $data =array();
        $data = array(
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'mobile' => $user->mobile,
            'country' => $user->country,
            'city' => $city->city,
            'area' => $area->city,
            'zipcode' => $user->zipcode,
        );
        return response()->json($data); 
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
                'product_id'=> (int)$value->product_id
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getterms(){
        $settings = settings::first();
        $data =array();
        $data = array(
            'terms_and_conditions' => $settings->terms_and_conditions,
            'privacy_policy' => $settings->privacy_policy,
        );
        return response()->json($data); 
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
                'category_arabic' => $value->category_arabic,
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
                'category_arabic' => $value->category_arabic,
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
                'category_arabic' => $value->category_arabic,
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
                'category_arabic' => $value->category_arabic,
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
                'category_arabic' => $value->category_arabic,
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
                'category_arabic' => '',
                'image' => '',
                'icon' => '',
                'parent_id' => (int)$value->parent_id
            );
            if($value->category_arabic != ''){
                $data['category_arabic']=$value->category_arabic;
            }
            else{
                $data['category_arabic']=$value->category;
            }
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
                'category_arabic' => '',
                'image' => '',
                'icon' => '',
            );
            if($value->category_arabic != ''){
                $data['category_arabic']=$value->category_arabic;
            }
            else{
                $data['category_arabic']=$value->category;
            }
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
                'category_arabic' => '',
                'image' => '',
                'icon' => '',
            );
            if($value->category_arabic != ''){
                $data['category_arabic']=$value->category_arabic;
            }
            else{
                $data['category_arabic']=$value->category;
            }
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
        // if ( $request->category != '0' )
        // {
        //     $i->where('p.category', $request->category);
        // }
        // if ( $request->subcategory != '0' )
        // {
        //     $i->where('p.subcategory', $request->subcategory);
        // }
        // if ( $request->subsubcategory != '0' )
        // {
        //     $i->where('p.subsubcategory', $request->subsubcategory);
        // }
        $i->select('p.*');
        $i->where('p.status',0);
        //$i->orderBy('p.id','DESC');
        $products = $i->limit(10)->get();

        $data =array();
        $datas =array();
        foreach ($products as $key => $value) {
            $cat = category::find($value->category);
            $vendor = vendor::find($value->vendor_id);
            $city = city::find($vendor->city);
            $data = array(
                'product_id' => $value->id,
                'image' => '',
                'product_name' => $value->product_name,
            );
            if(!empty($value->image)){
                $data['image'] = $value->image;
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
                'product_name_arabic' => '',
                'mrp_price' => $value->mrp_price,
                'sales_price' => $value->sales_price,
                'vendor' => $vendor->business_name,
                'category' => $cat->category,
                'city' => $city->city,
            );
            if(!empty($value->image)){
                $data['image'] = $value->image;
            }
            if($value->product_name_arabic != ''){
                $data['product_name_arabic']=$value->product_name_arabic;
            }
            else{
                $data['product_name_arabic']=$value->product_name;
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

    public function getproductswithfavourites($subcategory,$subsubcategory,$customer_id){
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
            $favourites=favourites::where('product_id',$value->id)->where('customer_id',$customer_id)->get();

            $cat = category::find($value->category);
            $vendor = vendor::find($value->vendor_id);
            $city = city::find($vendor->city);
            $data = array(
                'review_count' => '',
                'review_average' => '',
                'product_id' => $value->id,
                'image' => '',
                'favourites' => 0,
                'product_name' => $value->product_name,
                'product_name_arabic' => '',
                'mrp_price' => $value->mrp_price,
                'sales_price' => $value->sales_price,
                'vendor' => $vendor->business_name,
                'category' => $cat->category,
                'city' => $city->city,
            );
            if($value->product_name_arabic != ''){
                $data['product_name_arabic']=$value->product_name_arabic;
            }
            else{
                $data['product_name_arabic']=$value->product_name;
            }
            if(!empty($value->image)){
                $data['image'] = $value->image;
            }
            if(count($favourites) > 0){
                $data['favourites'] = 1;
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
            'product_group_id' => $product->product_group,
            'image' => '',
            'product_name' => $product->product_name,
            'product_name_arabic' => $product->product_name_arabic,
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
            'specifications' => $product->mobile_specifications,
            'description' => $product->mobile_description,
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
            'product_group_id' => $product->product_group,
            'image' => '',
            'product_name' => $product->product_name,
            'mrp_price' => $product->mrp_price,
            'sales_price' => $product->sales_price,
            'vendor' => $vendor->business_name,
            'category' => $cat->category,
            'city' => $city->city,
            'stock' => $product->stock,
            'specifications' => $product->mobile_specifications,
            'description' => $product->mobile_description,
            'height_weight_size' => $product->height_weight_size,
            'shipping_description' => $product->shipping_description,
        );

        return response()->json($data); 
    }

    public function getproductspecifications($id){
        $product_specifications = product_specifications::where('product_id',$id)->get();
        $product = product::find($id);
        $data =array();
        $datas =array();
        foreach ($product_specifications as $key => $value) {
            $data = array(
                'id' => $value->id,
                'label' => $value->label,
                'value' => $value->value,
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getproductimages($id){
        $product_images = product_images::where('product_id',$id)->get();
        $product = product::find($id);
        $data =array();
        $datas =array();
            $data = array(
                'id' => 0,
                'image' => $product->image,
            );
            $datas[] = $data;
        foreach ($product_images as $key => $value) {
            $data = array(
                'id' => $value->id,
                'image' => $value->image,
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getattributesproduct(Request $request){
        $product_id = 0; 
        $status = 0; 
        // $area = json_decode($request, true);
         //return response()->json($request);
        foreach ($request->attr as $value) {
            $attribute_id = $value['attribute_id'];
            $attribute_field_id = $value['attribute_field_id'];

            $data = product_attributes::where('product_group',$request->group_id)->where('attribute_id',$attribute_id)->where('attribute_field_id',$attribute_field_id)->first();

            if(!empty($data)){
                if(count($request->attr) > 1){
                    if($product_id == $data->product_id){
                        $status = 1;
                    }
                    else{
                        $status = 0;
                    }
                }
                $product_id = $data->product_id;
            }else{
                $status = 0;
            }
            
        }
        return response()->json(
            ['message' => 'Sent Successfully',
            'product_id'=>$product_id,
            'status'=>$status], 
        200);

    }

    public function getproductattributes($group_id,$product_id){
        $list = product_attributes::where('product_group',$group_id)->groupBy('product_group','attribute_id')->select('product_group','attribute_id')->get();

        $data =array();
        $datas =array();
        foreach ($list as $key => $value) {
        $attributes = attributes::find($value->attribute_id);

        $list = product_attributes::where('product_group',$group_id)->where('attribute_id',$value->attribute_id)->get();
            $values=array();
            foreach ($list as $key => $value) {
                if($value->product_id == $product_id){
                    $attr_value = array(
                        'id' => (int)$value->attribute_field_id,
                        'is_active' => 1,
                        'product_id' => $value->product_id,
                        'attribute_value' => $value->attribute_value,
                        //'attribute_field_id' => $value->attribute_field_id,
                    );
                }
                else{
                    $attr_value = array(
                        'id' => (int)$value->attribute_field_id,
                        'is_active' => 0,
                        'product_id' => $value->product_id,
                        'attribute_value' => $value->attribute_value,
                        //'attribute_field_id' => $value->attribute_field_id,
                    );
                }
                $values[]=$attr_value;
            }   

            $data = array(
                // 'id' => $value->id,
                'attribute_id' => $value->attribute_id,
                'attribute' => $attributes->attribute_name,
                'values'=>$values
            );

            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getproductattributesvalue($group_id,$attribute_id,$product_id){
        $list = product_attributes::where('product_group',$group_id)->where('attribute_id',$attribute_id)->get();

        $data =array();
        $datas =array();
        foreach ($list as $key => $value) {
            if($value->product_id == $product_id){
                $data = array(
                    'id' => $value->id,
                    'is_active' => 1,
                    'product_id' => $value->product_id,
                    'attribute_value' => $value->attribute_value,
                );
            }
            else{
                $data = array(
                    'id' => $value->id,
                    'is_active' => 0,
                    'product_id' => $value->product_id,
                    'attribute_value' => $value->attribute_value,
                );
            }
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
        //      $message->to($vendor->email)->subject('Enquiry from DARSTORE');
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

    public function getproductsfavourites($product_id,$customer_id){
        $data=1;
        //$datas =array();
        $favourites=favourites::where('product_id',$product_id)->where('customer_id',$customer_id)->get();

        // $data = array(
        //     'product_id' => $product_id,
        //     'favourites' => 1,
        // );
        if(count($favourites) > 0){
            $data = 0;
        }
        //$datas[] = $data;
        return response()->json(['status'=>$data], 200); 
    }

    public function savefavourites(Request $request){
        $data=favourites::where('product_id',$request->product_id)->where('customer_id',$request->customer_id)->get();
        if (count($data) == 0) {
            $favourites = new favourites;
            $favourites->date = date('Y-m-d');
            $favourites->product_id = $request->product_id;
            $favourites->customer_id = $request->customer_id;
            $favourites->save();
            return response()->json(['message' => 'Add to Your Favourites List!','status'=>0], 200);
        }
        else{
            $favourite = favourites::where('customer_id',$request->customer_id)->where('product_id',$request->product_id)->first();
            $favourite->delete();
            return response()->json(['message' => 'Remove From Your Favourites List!','status'=>1], 200);
        }
    }

    public function deletefavourites(Request $request){
        $favourite = favourites::find($request->id);
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

    public function savefavouritesidea(Request $request){
        $data=favourites_idea::where('idea_book_id',$request->idea_book_id)->where('customer_id',$request->customer_id)->get();
        if (count($data) == 0) {
            $favourites_idea = new favourites_idea;
            $favourites_idea->date = date('Y-m-d');
            $favourites_idea->idea_book_id = $request->idea_book_id;
            $favourites_idea->customer_id = $request->customer_id;
            $favourites_idea->save();
            return response()->json(['message' => 'Stored Successfully!'], 200);
        }
        else{
            $favourite = favourites_idea::where('customer_id',$request->customer_id)->where('idea_book_id',$request->idea_book_id)->first();
            $favourite->delete();
            return response()->json(['message' => 'Removed Successfully!'], 200);
        }
    }

    public function deletefavouritesidea(Request $request){
        $favourite = favourites_idea::find($request->id);
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
                'vendor_id' => (int)$value->vendor_id,
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
            $get_cart = app_cart::where('customer_id',$request->customer_id)->where('product_id',$request->product_id)->first();
            if(!empty($get_cart)){
                $app_cart = app_cart::where('customer_id',$request->customer_id)->where('product_id',$request->product_id)->first();
                $app_cart->customer_id = $request->customer_id;
                $app_cart->vendor_id = $request->vendor_id;
                $app_cart->product_id = $request->product_id;
                $app_cart->qty = $app_cart->qty + $request->qty;
                $app_cart->save();
            }else{
                $app_cart = new app_cart;
                $app_cart->customer_id = $request->customer_id;
                $app_cart->vendor_id = $request->vendor_id;
                $app_cart->product_id = $request->product_id;
                $app_cart->qty = $request->qty;
                $app_cart->save();
            }

            return response()->json(
            ['message' => 'Save Successfully',
            'card_id'=>$app_cart->id,
            ],200);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
        } 
    }

    public function cartlocaltoserver(Request $request){
        try{
            $get_cart = app_cart::where('customer_id',$request->firebase_key)->get();

            if(!empty($get_cart)){
                foreach($get_cart as $row){
                    $old_cart = app_cart::where('customer_id',$request->customer_id)->where('product_id',$row->product_id)->first();

                    if(!empty($old_cart)){
                        $app_cart = app_cart::where('customer_id',$request->customer_id)->where('product_id',$row->product_id)->first();
                        $app_cart->qty = $app_cart->qty + $row->qty;
                        $app_cart->save();
                    }else{
                        $app_cart = new app_cart;
                        $app_cart->customer_id = $request->customer_id;
                        $app_cart->vendor_id = $row->vendor_id;
                        $app_cart->product_id = $row->product_id;
                        $app_cart->qty = $row->qty;
                        $app_cart->save();
                    }
                }
            }

            $delete_cart = app_cart::where('customer_id',$request->firebase_key)->delete();
            return response()->json(
            ['message' => 'Save Successfully',
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


    public function deleteshippingaddress(Request $request){
        try{
            $shipping_address = shipping_address::find($request->id);
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
                //'landmark' => $value->landmark,
                'contact_person' => $value->contact_person,
                'contact_mobile' => $value->contact_mobile,
                'address_type' => $value->address_type,
                'street_name' => $value->street_name,
                'block' => $value->block,
                'street' => $value->street,
                'avenue' => $value->avenue,
                'building_no' => $value->building_no,
                'floor_no' => $value->floor_no,
                'apartment_no' => $value->apartment_no,
                'additional_description' => $value->additional_description,
                //'country' => $value->country,
                //'country_code' => $value->country_code,
                //'city' => $value->city,
                'area' => $value->area,
                //'zipcode' => $value->zipcode,
                'is_active' => $value->is_active,
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function getShipAddress($id){
        $list = shipping_address::find($id);
         $data = array(
                'id' => $list->id,
                //'landmark' => $list->landmark,
                'contact_person' => $list->contact_person,
                'contact_mobile' => $list->contact_mobile,
                'address_type' => $list->address_type,
                'street_name' => $list->street_name,
                'block' => $list->block,
                'street' => $list->street,
                'avenue' => $list->avenue,
                'building_no' => $list->building_no,
                'floor_no' => $list->floor_no,
                'apartment_no' => $list->apartment_no,
                'additional_description' => $list->additional_description,
                //'country' => $list->country,
                //'country_code' => $list->country_code,
                //'city' => $list->city,
                'area' => $list->area,
                //'zipcode' => $list->zipcode,
                'is_active' => $list->is_active,
            );
            return response()->json($data); 
    }

    public function saveshippingaddress(Request $request){
        try{
            $shipping_address = new shipping_address;
            $shipping_address->customer_id = $request->customer_id;
            //$shipping_address->address_type = $request->address_type;
            //$shipping_address->landmark = $request->landmark;
            $shipping_address->contact_person= $request->contact_person;
            $shipping_address->contact_mobile= $request->contact_mobile;
            // $shipping_address->address_line1= $request->address_line1;
            // $shipping_address->address_line2= $request->address_line2;
            $shipping_address->address_type = $request->address_type;
            $shipping_address->street_name = $request->street_name;
            $shipping_address->block = $request->block;
            $shipping_address->street = $request->street;
            $shipping_address->avenue = $request->avenue;
            $shipping_address->building_no = $request->building_no;
            $shipping_address->floor_no = $request->floor_no;
            $shipping_address->apartment_no = $request->apartment_no;
            $shipping_address->additional_description = $request->additional_description;

            //$shipping_address->country= $request->country;
            //$shipping_address->country_code= $request->country_code;
            $shipping_address->city= $request->city;
            $shipping_address->area= $request->area;
            //$shipping_address->zipcode= $request->zipcode;
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
            //$shipping_address->landmark = $request->landmark;
            $shipping_address->contact_person= $request->contact_person;
            $shipping_address->contact_mobile= $request->contact_mobile;
            // $shipping_address->address_line1= $request->address_line1;
            // $shipping_address->address_line2= $request->address_line2;
            $shipping_address->address_type = $request->address_type;
            $shipping_address->street_name = $request->street_name;
            $shipping_address->block = $request->block;
            $shipping_address->street = $request->street;
            $shipping_address->avenue = $request->avenue;
            $shipping_address->building_no = $request->building_no;
            $shipping_address->floor_no = $request->floor_no;
            $shipping_address->apartment_no = $request->apartment_no;
            $shipping_address->additional_description = $request->additional_description;
            //$shipping_address->country= $request->country;
            //$shipping_address->country_code= $request->country_code;
            //$shipping_address->city= $request->city;
            $shipping_address->area= $request->area;
            //$shipping_address->zipcode= $request->zipcode;
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
        $coupon = coupon::where('status',0)->where('coupon_code',$request->coupon_code)->where('start_date','<=',$today)->where('end_date','>=',$today)->first();
        if(!empty($coupon)){
            $cart_items = app_cart::where('customer_id',$request->customer_id)->get();
            $product_total=0;
            $all_product=0;
            $shipping_charge=0;
            
            foreach($cart_items as $product){
                $product_data = product::where('vendor_id',$coupon->vendor_id)->where('id',$product->product_id)->first();
                if(!empty($product_data)){
                    $product_total+=$product->qty * $product_data->sales_price;
                }
                else{
                    $product_data1 = product::where('id',$product->product_id)->first();

                    $all_product+= $product->qty * $product_data1->sales_price;
                    $shipping_charge += $product_data1->shipping_charge;
                }
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
                        "total"=> ($product_total + $all_product + $shipping_charge)-$discount_value,
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
        $cart = app_cart::where('customer_id',$request->customer_id)->get();
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
        foreach($cart as $cart1){
            if(!in_array($cart1->vendor_id,$vendor)){
                $vendor[]=$cart1->vendor_id;
            }
        }
        $onlinepayorderid =array();
        foreach($vendor as $current_vendor){
                $sub_total=0;
                $shipping_charge=0;
                foreach($cart as $cart_item){
                    if($current_vendor == $cart_item->vendor_id){
                        $product = product::find($cart_item->product_id);
                        $sub_total = $sub_total + ($cart_item->qty * $product->sales_price);
                        $shipping_charge = $shipping_charge + $product->shipping_charge;
                    }
                }

                // $coupon_code = ' ';
                // $discount_value = 0;
                // if($request->coupon == true){
                //     if($current_vendor == $request->coupon_vendor_id){
                //         $coupon_code = $request->coupon_code;
                //         $discount_value = $request->coupon_amount;
                //     }
                //     else{
                //         $coupon_code = ' ';
                //         $discount_value = 0;
                //     }
                // }
                // else{
                //     $coupon_code = ' ';
                //     $discount_value = 0;
                // }

                $coupon_code = ' ';
                $discount_value = 0;
                if($request->coupon == true){
                    $today=date('Y-m-d');
                    $coupon = coupon::where('status',0)->where('coupon_code',$request->coupon_code)->where('start_date','<=',$today)->where('end_date','>=',$today)->first();
                    if(!empty($coupon)){
                        $cart_items = app_cart::where('customer_id',$request->customer_id)->get();
                        $cart_product_total=0;
                        
                        foreach($cart_items as $product){
                            $product_data = product::where('vendor_id',$coupon->vendor_id)->where('id',$product->product_id)->first();
                            if(!empty($product_data)){
                                $cart_product_total+=$product->qty * $product_data->sales_price;
                            }
                        }
                        if($cart_product_total !=0){
                            if($coupon->min_order_value <= $cart_product_total){
                                $discount_value=0;
                                if($coupon->value_type==2){
                                    $discount_value = ($coupon->coupon_value / 100) * $cart_product_total;
                                }else{
                                    if($cart_product_total >= $coupon->max_coupon_value){
                                        $discount_value = $coupon->coupon_value;
                                    }else{
                                        $discount_value = $cart_product_total;
                                    }
                                }
                            }
                        }
                    }
                }

                // $after_discount = $sub_total;
        
                $total = round(($sub_total + $shipping_charge) - $discount_value);
                $tax_amount = round( ($total * 5) / (100 + 5) , 2);

                $orders = new orders;
                $orders->date = date('Y-m-d');
                $orders->customer_id = $request->customer_id;
                $orders->billing_address_id = $request->shipping_address_id;
                $orders->shipping_address_id = $request->shipping_address_id;
                $orders->vendor_id = $current_vendor;
                //$orders->order_message = $request->order_message;


                $orders->sub_total = $sub_total;
                $orders->coupon_code =  $request->coupon_code;
                $orders->discount_value = $discount_value;
                //$orders->after_discount = $after_discount;
                $orders->tax_percentage = '5';
                $orders->tax_amount = $tax_amount;
                $orders->shipping_charge = $shipping_charge;
                $orders->service_charge = 1;
                $orders->total = $total + 1;
                $orders->payment_type = 1;
                $orders->payment_status = 0;

                $vendor_commission = vendor::find($current_vendor);
                $commission_amount = ($vendor_commission->vendor_commission / 100) * $total;

                $orders->commission_percentage = $vendor_commission->vendor_commission;
                $orders->commission_amount = $commission_amount;
                $orders->save();


                foreach($cart as $cart_item1){
                    if($current_vendor == $cart_item1->vendor_id){
                        $getproduct = product::find($cart_item1->product_id);
                        $order_items = new order_items;
                        $order_items->date = date('Y-m-d');
                        $order_items->order_id = $orders->id;
                        $order_items->customer_id = $request->customer_id;
                        $order_items->vendor_id = $current_vendor;
                        $order_items->billing_address_id = $request->shipping_address_id;
                        $order_items->shipping_address_id = $request->shipping_address_id;

                        $order_items->product_id = $cart_item1->product_id;
                        $order_items->product_name = $getproduct->product_name;
                        $order_items->qty = $cart_item1->qty;
                        $order_items->price = $getproduct->sales_price;
                        $order_items->total = $cart_item1->qty * $getproduct->sales_price;

                        if($cart_item1->id!=""){
                            $qty = $cart_item1->qty;
                            $pro_id = $cart_item1->product_id;
                            
                            // $product = product::find($pro_id);
                            // $product->stock = $product->stock - $qty;
                            
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

        //$delete_cart = app_cart::where('customer_id',$request->customer_id)->delete();

        try {
            $invoice_id = time();
            $data = $this->onlinepay($orderids,$invoice_id,$request->customer_id);

            $response = ['IsSuccess'=>'true','message'=>'Your Order is Save Successfully','data'=>$data,'success_url'=>'http://darco.lrbinfotech.com/mobile-payment-success','error_url'=>'http://darco.lrbinfotech.com/mobile-payment-failed','status'=>0];
            
            foreach(explode('.', $orderids) as $ids){
                $invoice_update = orders::find($ids);
                $invoice_update->invoiceid = $invoice_id;
                $invoice_update->invoiceurl = $data['paymentURL'];
                $invoice_update->save();
            }

        } catch (\Exception $e) {
            $response = ['IsSuccess'=>'false','message'=> $e->getMessage(),'status'=>1];
        }
        return response()->json($response);

    }

    public function onlinepay($orderId,$invoice_id,$customer_id) {
        $total = 0;
        foreach(explode('.', $orderId) as $ids){
            $orders = orders::find($ids);
            $total = $total + $orders->total;
        }
        $user = User::find($customer_id);
        $name = $user->first_name.' '.$user->last_name;

        $request_data=array(
            //real account
            'merchant_id'=>'27772',
            'username' =>'abdulrahman',
            'password'=>stripslashes('GSSWj0DHhjms'),
            'api_key' =>password_hash('e766116092e3efc2f2f60a02d8353924ceaa3022',PASSWORD_BCRYPT),
            'test_mode'=>0,
            //sand box
            // 'merchant_id'=>'1201',
            // 'username' =>'test',
            // 'password'=>stripslashes('test'),
            // 'api_key'=>'jtest123', // in sandbox request
            // 'test_mode'=>1,
            'order_id'=>$invoice_id,
            'CurrencyCode'=>'KWD',//'KWD','SAR','USD','BHD','EUR','OMR','QAR','AED' and others,Please ask our support to activate
            'total_price'=>0.01,
            'CstFName'=>$name,			
            'CstEmail'=>$user->email,
            'CstMobile'=>$user->mobile,
            'customer_unq_token'=>$user->user_unique_id,
            'success_url'=>"http://darco.lrbinfotech.com/mobile-payment-success",
            'error_url'=>'http://darco.lrbinfotech.com/mobile-payment-failed',
            'notifyURL'=>'http://darco.lrbinfotech.com/mobile-payment-success',
        );
    
        $fields_string = http_build_query($request_data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL,"https://api.upayments.com/payment-request");// Production Request URL
        //curl_setopt($ch, CURLOPT_URL,"https://api.upayments.com/test-payment"); //Test Request URL
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);
    
        return $server_output = json_decode($server_output,true);

        // echo "<pre>";
        // print_r($server_output);
        // exit;
    }


    public function vieworders($customer_id){
        $orders = orders::where('customer_id',$customer_id)->where('payment_status',1)->get();
        $data=array();
        $datas=array();
        foreach ($orders as $key => $value) {
            $user = User::find($value->customer_id);
            $vendor = vendor::find($value->vendor_id);
            $shipping_address = shipping_address::find($value->shipping_address_id);
            $data = array(
                '_id' => $value->id,
                'date' => date('d-m-Y',strtotime($value->date)),
                'order_id' => $value->invoiceid,
                'payment_id' => $value->payment_id,
                'payment_type' => (int)$value->payment_type,
                'payment_status' => (int)$value->payment_status,
                'sub_total' => $value->sub_total,
                'shipping_charge' => $value->shipping_charge,
                'srvice_charge' => $value->srvice_charge,
                'total' => $value->total,
                'discount_value' => (string)$value->discount_value,
                'coupon_code' => (string)$value->coupon_code,
                'shipping_address_id'=> (int)$value->shipping_address_id,
                'shipping_status' => '',
                'order_status' => (int)$value->shipping_status,
                'status' => (int)$value->status,
                'vendor_name'=>(string)$vendor->business_name,
            );

            if($value->status == 0){
                if($value->shipping_status == 0){
                    $data['shipping_status'] = 'Order Placed';
                }
                elseif($value->shipping_status == 1){
                    $data['shipping_status'] = 'Order Processing';
                }
                elseif($value->shipping_status == 2){
                    $data['shipping_status'] = 'Order Dispatched';
                }
                elseif($value->shipping_status == 3){
                    $data['shipping_status'] = 'Delivered';
                }
            }else{
                $data['shipping_status'] = 'Order Cancel';
            }
            // if(empty($shop->busisness_name)){
            //     $data['shop_name'] = $shop->name;
            // }
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function vieworderitem($id){
        $order_items = order_items::where('order_id',$id)->get();
        $data =array();
        if(count($order_items) >0){
            foreach ($order_items as $key => $value) {
                $orders=orders::find($value->order_id);
                $return_policy=1;
                if($value->return_policy == 0){
                    if(strtotime(date('Y-m-d')) <= strtotime($value->return_date)){
                        if($orders->shipping_status == 3){
                            $return_policy=0;
                        }
                        else{
                            $return_policy=1;
                        }
                    }
                    else{
                        $return_policy=1;
                    }
                }
                $data = array(
                    'id' => $value->id,
                    'order_id' => $value->order_id,
                    'product_name' => $value->product_name,
                    'product_attributes' => $value->product_attributes,
                    'qty' => $value->qty,
                    'total' => $value->total,
                    'price' => $value->price,
                    'return_policy' => (int)$return_policy,
                    'is_return' => (int)$value->is_return,
                );
                $datas[] = $data;
            }
        }else{
            $datas=array();
        }
        return response()->json($datas); 
    }

    public function getcancelreason(){
        $return_reason = return_reason::where('status',0)->orderBy('id','ASC')->get();
        $data =array();
        $datas =array();
        foreach ($return_reason as $key => $value) {
            $data = array(
                'cancel_category' => $value->return_reason,
                'id' => (int)$value->id
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function ordercancel(Request $request){

        $orders = orders::find($request->id);
        $orders->status = 1;
        $orders->cancel_category = $request->cancel_category;
        $orders->cancel_description = $request->cancel_description;
        $orders->save();

        $order_items = order_items::where('order_id',$request->id)->get();
        
        foreach ($order_items as $key => $row) {
            $qty = $row->qty;
            $pro_id = $row->product_id;
            
            $product = product::find($pro_id);
            $product->stock = $product->stock + $qty;
            $product->save();

            $order_items1 = order_items::find($row->id);
            $order_items1->status = 1;
            $order_items1->save();
        }

        return response()->json(['message'=>'Successfully Cancel'],200); 
    }

    public function getvendorenquiry($customer_id){
        $vendor_enquiry = vendor_enquiry::where('customer_id',$customer_id)->get();
        $data =array();
        if(count($vendor_enquiry) > 0){
            foreach ($vendor_enquiry as $key => $value) {
                $vendor = vendor::find($value->vendor_id);
                if($value->type == 0){
                    $vendor_project = vendor_project::find($value->project_idea_book_id);
                }
                else{
                    $idea_book = idea_book::find($value->project_idea_book_id);
                }
                $data = array(
                    'id' => $value->id,
                    'vendor_id' => $value->vendor_id,
                    'vendor_name' => $vendor->business_name,
                    'vendor_image' => $vendor->profile_image,
                    'vendor_id' => $value->vendor_id,
                    'type' => $value->type,
                    'project_idea_book_id' => $value->project_idea_book_id,
                    'project_idea_book_name' => '',
                    // 'name' => $value->name,
                    // 'mobile' => $value->mobile,
                    // 'email' => $value->email,
                    'comments' => $value->comments,
                );
                if($value->type == 0){
                    $data['project_idea_book_name'] = $vendor_project->project_name;
                }
                else{
                    $data['project_idea_book_name'] = $idea_book->title;
                }
                $datas[] = $data;
            }
        }else{
            $datas=array();
        }
        return response()->json($datas); 
    }

    public function getreturnreason(){
        $return_reason = return_reason::where('status',0)->orderBy('id','ASC')->get();
        $data =array();
        $datas =array();
        foreach ($return_reason as $key => $value) {
            $data = array(
                'return_reason' => $value->return_reason,
                'id' => (int)$value->id
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function savereturnitem(Request $request){
        // return response()->json($request); 
        //foreach ($request->item as $value) {
            $item_id = $request->item_id;
           // $item_id = $value['item_id'];
            $return_reason = $request->return_reason;
            //$return_reason = $value['return_reason'];
            //$description = $value['description'];
            $return_pickup_description = $request->return_pickup_description;
            //$return_pickup_description = $value['return_pickup_description'];
            $return_image = $request->return_image;
            //$return_image = $value['return_image'];


            $order_items = order_items::find($item_id);

            $return_item = new return_item;
            $return_item->date = date('Y-m-d');
            $return_item->return_reason = $return_reason;
            //$return_item->description = $request->description;
            $return_item->order_item_id = $item_id;
            $return_item->order_id = $order_items->order_id;
            $return_item->customer_id = $order_items->customer_id;
            $return_item->vendor_id = $order_items->vendor_id;
            $return_item->billing_address_id = $order_items->billing_address_id;
            $return_item->shipping_address_id = $order_items->shipping_address_id;
            $return_item->product_id = $order_items->product_id;
            $return_item->product_name = $order_items->product_name;
            $return_item->qty = $order_items->quantity;
            $return_item->price = $order_items->price;
            $return_item->total = $order_items->total;
            $return_item->return_pickup_description = $return_pickup_description;

            if(isset($request->return_image)){
                $return_image = $request->return_image;
                $return_image_name = $request->return_image_name;
                $filename1='';
                foreach(explode('.', $return_image_name) as $info){
                    $filename1 = $info;
                }
                $fileName = rand() . '.' . $filename1;
                $realImage = base64_decode($return_image);
                file_put_contents(public_path().'/profile_image/'.$fileName, $realImage);    
                $return_item->image =  $fileName;
            }
            // if($request->return_image != ''){
            //     $img = $request->return_image;
    
            //     $image_parts = explode(";base64,", $img);
            //     $image_type_aux = explode("image/", $image_parts[0]);
            //     $image_type = $image_type_aux[1];
    
            //     $fileName = rand().time().'.'.$image_type;
    
            //     $realImage = base64_decode($image_parts[1]);
            //     //file_put_contents(public_path().'/profile_image/'.$fileName, $realImage);
            //     $img = Image::make($realImage);
            //     $img->save(public_path('return_image/'.$fileName));    
    
            //     $return_item->image =  $fileName;
            // }

            $return_item->save();

            $order_items_update = order_items::find($item_id);
            $order_items_update->is_return = 1;
            $order_items_update->save();

       // }

        return response()->json(['message'=>'Successfully Return'],200); 
    }

    public function getreturnitem($customer_id){
        $return_item = return_item::where('customer_id',$customer_id)->get();
        $data =array();
        if(count($return_item) >0){
            foreach ($return_item as $key => $value) {
                $data = array(
                    'id' => $value->id,
                    'order_id' => $value->order_id,
                    'product_name' => $value->product_name,
                    'product_attributes' => $value->product_attributes,
                    'qty' => $value->qty,
                    'total' => $value->total,
                    'price' => $value->price,
                    'return_reason' => $value->return_reason,
                    'return_pickup_description' => $value->return_pickup_description,
                    //image path return_image
                    'return_image' => $value->image,
                    'status' => $value->status,
                    'return_status' => '',
                );
                if($value->status == 0){
                    $data['return_status'] = 'Waiting for Pickup';
                }
                elseif($value->status == 1){
                    $data['return_status'] = 'Item Returned';
                }
                elseif($value->status == 2){
                    $data['return_status'] = 'Request Canceled';
                }
                $datas[] = $data;
            }
        }else{
            $datas=array();
        }
        return response()->json($datas); 
    }

    public function returnitemcancel($return_item_id){
        $return_item = return_item::find($return_item_id);

        $order_items_update = order_items::find($order_item_id);
        $order_items_update->is_return = 0;
        $order_items_update->save();

        $return_item->delete();

        return response()->json(['message'=>'Successfully Delete'],200); 
    }



    // public function chatReadCount($id){
    //     date_default_timezone_set("Asia/Kuwait");
    //     date_default_timezone_get();
    //     $chat = salon_customer::where('booking_id',$id)->orderBy('id','DESC')->get();
    //     $chat_count=0;

    //     foreach ($chat as $key => $value) {
    //         if($value->message_from == 0){
    //         break;
    //         }
    //         $chat_count++;
    //     }   
    //     return response()->json([
    //         'chat_count'=>$chat_count
    //     ], 200);
    // }


    public function getvendorchat($id){
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
        $chat = vendor_customer_chat::where('enquiry_id',$id)->orderBy('id','ASC')->get();
        $data =array();
        foreach ($chat as $key => $value) {
            $dateTime = new Carbon($value->updated_at, new \DateTimeZone('Asia/Kuwait'));
            $data = array(
                'enquiry_id' => $value->enquiry_id,
                'vendor_id' => $value->vendor_id,
                'customer_id' => $value->customer_id,
                'message' => $value->message,
                'message_from' => $value->message_from,
                'time' => $dateTime->diffForHumans(),
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }

    public function savevendorchat(Request $request){
        // $request->validate([
        //     'message'=>'required',
        // ]);
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
        $vendor_customer_chat = new vendor_customer_chat;
        $vendor_customer_chat->message = $request->message;
        $vendor_customer_chat->customer_id = $request->customer_id;
        $vendor_customer_chat->enquiry_id = $request->enquiry_id;
        $vendor_customer_chat->vendor_id = $request->vendor_id;
        $vendor_customer_chat->message_from = 0;
        $vendor_customer_chat->save();
   
        $dateTime = new Carbon($vendor_customer_chat->created_at, new \DateTimeZone('Asia/Kuwait'));
        $message =  array(
          'message'=> $request->message,
          'message_from'=> '0',
          'date'=> $dateTime->diffForHumans(),
          'channel_name'=> $request->enquiry_id,
        );
  
        event(new ChatEvent($message));
  
        return response()->json(['message' => 'Send Successfully'],200);
    }


    public function savereview(Request $request){
        try{
            $exist = reviews::where('customer_id',$request->customer_id)->where('product_id',$request->product_id)->get();
            if(count($exist)>0){
                return response()->json(['message' => 'Review Has been Already Stored','status'=>403], 403);
            }
        
            $product = product::find($request->product_id);
            $reviews = new reviews;
            $reviews->date = date('Y-m-d');
            $reviews->customer_id = $request->customer_id;
            $reviews->vendor_id = $product->vendor_id;
            $reviews->product_id = $request->product_id;
            $reviews->name = $request->name;
            $reviews->email = $request->email;
            $reviews->rating = $request->rating;
            $reviews->message = $request->message;
            $reviews->save();

        return response()->json(
            ['message' => 'Register Successfully',
            'review_id'=>$reviews->id],
             200);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
        } 
    }

    public function getreview($product_id){
        $reviews = reviews::where('product_id',$product_id)->get();
        $data =array();
        foreach ($reviews as $key => $value) {
            $customer = User::find($value->customer_id);
            $dateTime = new Carbon($value->updated_at, new \DateTimeZone('Asia/Kuwait'));
            $data = array(
                'customer' => $customer->first_name.' '.$customer->last_name,
                'message' => $value->message,
                'rating' => $value->rating,
                'time' => $dateTime->diffForHumans(),
            );
            $datas[] = $data;
        }   
        return response()->json($datas); 
    }




}
