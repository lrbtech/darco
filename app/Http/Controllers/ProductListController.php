<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\professional_category;
use App\Models\idea_category;
use App\Models\city;
use App\Models\product;
use App\Models\product_attributes;
use App\Models\product_images;
use App\Models\attributes;
use App\Models\brand;
use App\Models\attribute_fields;
use App\Models\product_group;
use App\Models\vendor;
use App\Models\vendor_project;
use App\Models\project_images;
use App\Models\idea_book;
use App\Models\idea_book_images;
use App\Models\User;
use App\Models\orders;
use App\Models\order_items;
use App\Models\vendor_enquiry;
use App\Models\shipping_address;
use App\Models\reviews;
use Hash;
use DB;
use Mail;
use Auth;
use PDF;

class ProductListController extends Controller
{
    public function getsubsubcategory($id) {
        $category_all = category::where('parent_id',$id)->where('status',0)->orderBy('id','ASC')->get();
        $main_category = category::find($id);
        $output='<div class="carausel-8-columns-cover position-relative">
        <div class="carausel-8-columns" id="carausel-8-columns">';
        if(!empty($category_all)){
            foreach($category_all as $row){
                $output.='
                <div class="card-1">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href="/product-list/'.$main_category->parent_id.'/'.$id.'/'.$row->id.'/0">
                            <img src="/upload_files/'.$row->icon.'" alt="" />
                        </a>
                    </figure>
                    <h6>
                        <a href="/product-list/'.$main_category->parent_id.'/'.$id.'/'.$row->id.'/0">'.$row->category.'</a>
                    </h6>
                </div>
                ';
            }
        }

        $output.='</div></div>';

        echo $output;
    }

    public function productlist($category,$subcategory,$subsubcategory,$search)
    {
        $category_all = category::where('status',0)->where('parent_id',0)->get();
        $subcategory_all = category::where('status',0)->where('parent_id',$category)->get();

        $i =DB::table('products as p');
        if ( $search != '0' )
        {
            $i->where('p.product_name', 'like', '%' . $search . '%');
        }
        if ( $category != '0' )
        {
            $i->where('p.category', $category);
        }
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
        $product = $i->paginate(12);

        $category_data = category::find($category);
        $subcategory_data = category::find($subcategory);
        $subsubcategory_data = category::find($subsubcategory);

        $category_id = $category;
        $subcategory_id = $subcategory;
        $subsubcategory_id = $subsubcategory;
        $search_id = $search;

        $city_all = city::where('status',0)->where('parent_id',0)->get();
        $brand_all = brand::where('status',0)->get();

        return view('website.process.product_list',compact('category_all','subcategory_all','category_data','subcategory_data','subsubcategory_data','product','category_id','subcategory_id','subsubcategory_id','search_id','brand_all','city_all'));
    }

    public function searchproductlist($category,$subcategory,$subsubcategory,$search, Request $request)
    {
        $category_all = category::where('status',0)->where('parent_id',0)->get();
        $subcategory_all = category::where('status',0)->where('parent_id',$category)->get();

        $i =DB::table('products as p');
        if ( $search != '0' )
        {
            $i->where('p.product_name', 'like', '%' . $search . '%');
        }
        if ( $category != '0' )
        {
            $i->where('p.category', $category);
        }
        if ( $subcategory != '0' )
        {
            $i->where('p.subcategory', $subcategory);
        }
        if ( $subsubcategory != '0' )
        {
            $i->where('p.subsubcategory', $subsubcategory);
        }
        if ($request->brand && !empty($request->brand) )
        {
            $i->whereIn('p.brand', $request->brand);
        }
        if ($request->city && !empty($request->city) )
        {
            $i->join('vendors as v', 'v.id', '=', 'p.vendor_id');
            $i->whereIn('v.city', $request->city);
        }
        $i->select('p.*');
        $i->where('p.status',0);
        $product = $i->paginate(12);

        $category_data = category::find($category);
        $subcategory_data = category::find($subcategory);
        $subsubcategory_data = category::find($subsubcategory);

        $category_id = $category;
        $subcategory_id = $subcategory;
        $subsubcategory_id = $subsubcategory;
        $search_id = $search;

        $city_all = city::where('status',0)->where('parent_id',0)->get();
        $brand_all = brand::where('status',0)->get();

        return view('website.process.product_list',compact('category_all','subcategory_all','category_data','subcategory_data','subsubcategory_data','product','category_id','subcategory_id','subsubcategory_id','search_id','brand_all','city_all'));
    }

    public function productdetails($id)
    {
        $product = product::find($id);
        $product_images = product_images::where('product_id',$id)->get();
        $vendor = vendor::find($product->vendor_id);

        $related_products = product::where('vendor_id',$product->vendor_id)->where('id','!=',$id)->get();

        $category_all = category::where('status',0)->where('parent_id',0)->get();

        $reviews=array();
        $buy_product=array();
        if(Auth::check()){
            $reviews = reviews::where('customer_id',Auth::user()->id)->where('product_id',$id)->where('status',0)->first();
            $buy_product = order_items::where('customer_id',Auth::user()->id)->where('product_id',$id)->get();
        }

        $all_reviews =DB::table('reviews as r')
            ->join('users as u','u.id','=','r.customer_id')
            ->select('r.*','u.profile_image','u.first_name','u.last_name')
            ->where('r.product_id',$id)
            ->orderBy('id','DESC')
            ->paginate(5);


        $reviews_count = reviews::where('product_id',$id)->count();
        $reviews_1 = reviews::where('product_id',$id)->where('rating',1)->count();
        $reviews_2 = reviews::where('product_id',$id)->where('rating',2)->count();
        $reviews_3 = reviews::where('product_id',$id)->where('rating',3)->count();
        $reviews_4 = reviews::where('product_id',$id)->where('rating',4)->count();
        $reviews_5 = reviews::where('product_id',$id)->where('rating',5)->count();



        return view('website.process.product_details',compact('product','product_images','vendor','related_products','category_all','reviews','buy_product','reviews_count','all_reviews','reviews_1','reviews_2','reviews_3','reviews_4','reviews_5'));
    }

    public static function viewratingpercentage($id) {
        $reviews_count = reviews::where('product_id',$id)->count();
        $reviews_1 = reviews::where('product_id',$id)->where('rating',1)->count();
        $reviews_2 = reviews::where('product_id',$id)->where('rating',2)->count();
        $reviews_3 = reviews::where('product_id',$id)->where('rating',3)->count();
        $reviews_4 = reviews::where('product_id',$id)->where('rating',4)->count();
        $reviews_5 = reviews::where('product_id',$id)->where('rating',5)->count();

        if($reviews_count > 0){
            $average_percentage =(($reviews_1*1) + ($reviews_2*2) + ($reviews_3*3) + ($reviews_4*4) + ($reviews_5*5))/$reviews_count;
        }
        else{
            $average_percentage = 0;
        }

        return $average_percentage * 20;
    }


    public function savereview(Request $request){
        $this->validate($request, [
            'email'=>'required',
            'name'=>'required',
            'message' => 'required',
            'rating' => 'required',
          ],[
            //'image.required' => 'Item Image Field is Required',
        ]);
        $product = product::find($request->review_product_id);
        $reviews = new reviews;
        $reviews->date = date('Y-m-d');
        $reviews->customer_id = Auth::user()->id;
        $reviews->vendor_id = $product->vendor_id;
        $reviews->product_id = $request->review_product_id;
        $reviews->name = $request->name;
        $reviews->email = $request->email;
        $reviews->rating = $request->rating;
        $reviews->message = $request->message;
        $reviews->save();
  
        return response()->json('Successfully Save'); 
    }

    public function updatereview(Request $request){
        $this->validate($request, [
            'email'=>'required',
            'name'=>'required',
            'message' => 'required',
            'rating' => 'required',
          ],[
            //'image.required' => 'Item Image Field is Required',
        ]);
        $reviews = reviews::find($request->review_id);
        $reviews->name = $request->name;
        $reviews->email = $request->email;
        $reviews->rating = $request->rating;
        $reviews->message = $request->message;
        $reviews->save();
  
        return response()->json('Successfully Save'); 
    }

}
