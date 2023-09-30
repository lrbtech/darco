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
use App\Models\language;
use Hash;
use DB;
use Mail;
use Auth;
use PDF;

class ProductListController extends Controller
{
    public function getsubcategoryproduct($id) {
        $main_category = category::find($id);
        $subcategory_all = category::where('parent_id',$id)->where('status',0)->orderBy('id','ASC')->get();

        $output='<h3>'.$main_category->category.'</h3>';
        $output.='<ul class="list-inline nav nav-tabs links">';
        if(!empty($subcategory_all)){
            foreach($subcategory_all as $row){
                $output.='
                <li class="list-inline-item nav-item">
                    <a class="nav-link home-category'.$row->id.'" href="javascript:void(0)" onclick="getsubsubcategory('.$row->id.')">'.$row->category.'</a>
                </li>
                ';
            }
        }

        $output.='</ul>';

        echo $output;
    }

    public function getsubsubcategory($id) {
        $category_all = category::where('parent_id',$id)->where('status',0)->orderBy('id','ASC')->get();
        $main_category = category::find($id);
        if(!empty($category_all)){
        $output='<div class="carausel-8-columns-cover position-relative">
        <div class="carausel-8-columns" id="carausel-8-columns">';
        if(!empty($category_all)){
            foreach($category_all as $row){
                $output.='
                <div class="card-1 card-active'.$row->id.'">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href="javascript:void(0)" onclick="searchchildcategory('.$main_category->parent_id.','.$id.','.$row->id.',0)" >
                            <img src="/upload_files/'.$row->icon.'" alt="" />
                        </a>
                    </figure>
                    <h6>
                    <a href="javascript:void(0)" onclick="searchchildcategory('.$main_category->parent_id.','.$id.','.$row->id.')" >'.$row->category.'</a>
                    </h6>
                </div>
                ';
            }
        }

        $output.='</div></div>';
        }
        else{
            $output='';
        }

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
        $i->where('p.status',1);
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

        $language = language::all();

        

        return view('website.process.product_list',compact('category_all','subcategory_all','category_data','subcategory_data','subsubcategory_data','product','category_id','subcategory_id','subsubcategory_id','search_id','brand_all','city_all','language'));
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
        $i->where('p.status',1);
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

        $language = language::all();
        return view('website.process.product_list',compact('category_all','subcategory_all','category_data','subcategory_data','subsubcategory_data','product','category_id','subcategory_id','subsubcategory_id','search_id','brand_all','city_all','language'));
    }

    public function productdetails($id)
    {
        $product = product::find($id);
        $product_images = product_images::where('product_id',$id)->get();
        $vendor = vendor::find($product->vendor_id);

        $related_products = product::where('vendor_id',$product->vendor_id)->where('status',1)->where('id','!=',$id)->get();

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


        $language = language::all();

        return view('website.process.product_details',compact('product','product_images','vendor','related_products','category_all','reviews','buy_product','reviews_count','all_reviews','reviews_1','reviews_2','reviews_3','reviews_4','reviews_5','language'));
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




    function loaddataproductlist(Request $request)
    {
        if($request->ajax())
        {
            $last_id = array();
            //if($request->id > 0)
            if($request->id != '')
            {
                $iddata = array();
                foreach(explode(',', $request->id) as $ids) {
                    $iddata[] = $ids;
                }
                $i =DB::table('products as p');
                if ( $request->search != '0' )
                {
                    $i->where('p.product_name', 'like', '%' . $request->search . '%');
                }
                if ( $request->category != '0' )
                {
                    $i->where('p.category', $request->category);
                }
                
                if ( $request->subcategory == 'N' )
                {
                    $today = date('Y-m-d');
                    $start = date("Y-m-d", strtotime("- 14 days"));
                    $i->whereBetween('p.date', [$start, $today]);
                }
                elseif ( $request->subcategory != '0' )
                {
                    $i->where('p.subcategory', $request->subcategory);
                }

                if ( $request->subsubcategory != '0' )
                {
                    $i->where('p.subsubcategory', $request->subsubcategory);
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
                // $attributes = attributes::where('status',0)->get();
                // foreach($attributes as $row){
                //     $att_field = $attributes.$row->id;
                //     if ($request->$att_field && !empty($request->$att_field) )
                //     {
                //         $i->join('product_attributes as pa', 'pa.product_id', '=', 'p.id');
                //         $i->whereIn('pa.attribute_value', $request->$att_field);
                //     }
                // }
                if ($request->get('attributes') && !empty($request->get('attributes')) )
                {
                    $i->join('product_attributes as pa', 'pa.product_id', '=', 'p.id');
                    $i->whereIn('pa.attribute_value',$request->get('attributes'));
                }
                $i->select('p.*');
                $i->where('p.status',1);
                $i->whereNotIn('p.id' , $iddata);
                $data = $i->limit(6)->get();
            }
            else
            {
                $i =DB::table('products as p');
                if ( $request->search != '0' )
                {
                    $i->where('p.product_name', 'like', '%' . $request->search . '%');
                }
                if ( $request->category != '0' )
                {
                    $i->where('p.category', $request->category);
                }
                // if ( $request->subcategory != '0' )
                // {
                //     $i->where('p.subcategory', $request->subcategory);
                // }
                if ( $request->subcategory == 'N' )
                {
                    $today = date('Y-m-d');
                    $start = date("Y-m-d", strtotime("- 14 days"));
                    $i->whereBetween('p.date', [$start, $today]);
                }
                elseif ( $request->subcategory != '0' )
                {
                    $i->where('p.subcategory', $request->subcategory);
                }
                if ( $request->subsubcategory != '0' )
                {
                    $i->where('p.subsubcategory', $request->subsubcategory);
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
                // $attributes = attributes::where('status',0)->get();
                // foreach($attributes as $row){
                //     $att_field = $attributes.$row->id;
                //     if ($request->$att_field && !empty($request->$att_field) )
                //     {
                //         $i->join('product_attributes as pa', 'pa.product_id', '=', 'p.id');
                //         $i->whereIn('pa.attribute_value', $request->$att_field);
                //     }
                // }
                if ($request->get('attributes') && !empty($request->get('attributes')) )
                {
                    $i->join('product_attributes as pa', 'pa.product_id', '=', 'p.id');
                    $i->whereIn('pa.attribute_value',$request->get('attributes'));
                }
                $i->select('p.*');
                $i->where('p.status',1);
                $data = $i->limit(6)->get();
            }
            $output = '';
            
if(!$data->isEmpty())
{
// $output.='
//     <div class="row product-grid">
// ';
        foreach($data as $row){
        $output.='
        <div class="col-lg-4 col-md-4 col-12 col-sm-6">
            <div class="product-cart-wrap mb-30">
                <div class="product-img-action-wrap">
                    <div class="product-img product-img-zoom">
                        <a href="/product-details/'.$row->id.'">
                            <img style="height:250px;" class="default-img" src="/product_image/'.$row->image.'" alt="" />
                            <img class="hover-img" src="/product_image/'.$row->image.'" alt="" />
                        </a>
                    </div>
                    <!-- <div class="product-action-1">
                        <a aria-label="Add To Wishlist" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                    </div> -->
                    <!-- <div class="product-badges product-badges-position product-badges-mrg">
                        <span class="hot">Hot</span>
                    </div> -->
                </div>
                <div class="product-content-wrap">
                    <div class="product-category">
                        <a href="/product-list/'.$row->category.'/0/0/0">'.\App\Http\Controllers\PageController::viewcategoryname($row->category).'</a>
                    </div>
                    <h2 class="garage-title"><a href="/product-details/'.$row->id.'">'.$row->product_name.'</a></h2>
                    <div class="product-rate-cover">
                        <div class="product-rate d-inline-block">
                            <div class="product-rating" style="width:'.\App\Http\Controllers\ProductListController::viewratingpercentage($row->id).'%"></div>
                        </div>
                        <!-- <span class="font-small ml-5 text-muted"> (4.0)</span> -->
                    </div>
                    <div>
                        <span class="font-small text-muted">By <a href="#">'.\App\Http\Controllers\PageController::viewvendorname($row->vendor_id).'</a></span>
                    </div>
                    <div class="product-card-bottom">
                        <div class="product-price">
                            <span>KWD '.$row->sales_price.'</span>';
                            if($row->mrp_price > $row->sales_price){
                            $output.='<span class="old-price">KWD '.$row->mrp_price.'</span>';
                            }
                        $output.='</div>
                        <div class="add-cart">
                            <a class="add" href="/product-details/'.$row->id.'">
                                <i class="fi-rs-eye mr-5"></i>View 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        $last_id[] = $row->id;
        }
    // $output.='
    // </div>
    // ';
    $output .= '
    <div class="text-center search_product_load_more_button" style="width:100%;margin-bottom:20px;">
        <div class="more-btn"><a href="javascript:void(0)" class="theme-btn-one" data-id="'.json_encode($last_id).'" id="search_product_load_more_button">Load More</a></div>
    </div>
    ';
}
else
{
    // if(count($data) > 9){
    $output .= '
    <div class="text-center" style="width:100%;margin-bottom:20px;">
        <div class="more-btn"><a href="javascript:void(0)" class="theme-btn-one">No Data Found</a></div>
    </div>
    ';
    // }
}
        print_r($output);
    
        }
    }


}
