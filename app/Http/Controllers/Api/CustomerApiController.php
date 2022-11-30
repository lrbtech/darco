<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\professional_category;
use App\Models\idea_category;
use App\Models\city;
use App\Models\product;
use App\Models\product_attributes;
use App\Models\product_images;
use App\Models\attributes;
use App\Models\attribute_fields;
use App\Models\product_group;
use App\Models\vendor;
use App\Models\vendor_project;
use App\Models\User;
use App\Models\orders;
use App\Models\vendor_enquiry;
use App\Models\shipping_address;
use Hash;
use Mail;
use PDF;
use DB;

class CustomerApiController extends Controller
{

    public function login(Request $request){
        $exist = User::where('email',$request->email)->where('status',0)->get();
        if(count($exist)>0){
            if($exist[0]->status == 1){
                if(Hash::check($request->password,$exist[0]->password)){
                    $user = User::find($exist[0]->id);
                    //$user->firebase_key = $request->firebase_key;
                    $user->save();

                    return response()->json(['message' => 'Login Successfully',
                    'name'=>$exist[0]->name,
                    'user_id'=>$exist[0]->id,
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

    public function getproducts(){
        $products = DB::table("products")
        ->orderBy('id','DESC')
        ->get();

        $data =array();
        $datas =array();
        foreach ($products as $key => $value) {
            $cat = category::find($value->category);
            $vendor = vendor::find($value->vendor_id);
            $data = array(
                'review_count' => '',
                'review_average' => '',
                'product_id' => $value->id,
                'image' => '',
                'product_name' => $value->product_name,
                'mrp_price' => $value->mrp_price,
                'sales_price' => $value->sales_price,
                'vendor' => $vendor->first_name.' '.$vendor->last_name,
                'category' => $cat->category,
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

    public function getproductdetails($id){
        $product = DB::table("products")
        ->where('id',$id)
        ->get();

        $data =array();
        $cat = category::find($product->category);
        $vendor = vendor::find($product->vendor_id);
        $data = array(
            'review_count' => '',
            'review_average' => '',
            'product_id' => $product->id,
            'image' => '',
            'product_name' => $product->product_name,
            'mrp_price' => $product->mrp_price,
            'sales_price' => $product->sales_price,
            'vendor' => $vendor->first_name.' '.$vendor->last_name,
            'category' => $cat->category,
        );
        if(!empty($product->image)){
            $data['image'] = $product->image;
        }
        $q =DB::table('reviews as r');
        $q->where('r.product_id', '=', $product->id);
        $q->where('r.status', '=', 1);
        $q->groupBy('r.product_id');
        $q->select([DB::raw("(count(*)) AS review_count"), DB::raw("(sum(r.rating) / count(*)) AS review_average")]);
        $review = $q->first();

        if(!empty($review)){
            $data['review_count'] = $review->review_count;
            $data['review_average'] = $review->review_average;
        }

        return response()->json($datas); 
    }





}
