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
use App\Models\attribute_fields;
use App\Models\product_group;
use App\Models\vendor;
use App\Models\vendor_project;
use App\Models\User;
use App\Models\orders;
use App\Models\vendor_enquiry;
use App\Models\shipping_address;
use App\Models\language;
use Hash;
use DB;
use Mail;
use Auth;
use PDF;
use Session;

class HomeController extends Controller
{

    public function updatelanguage($lang){
        Session::put('lang', $lang);
        return response()->json(['message' => 'Successfully update'], 200);
    }
    public function updatetheme($theme){
        Session::put('theme', $theme);
        return response()->json(['message' => 'Successfully update'], 200);
    }

    public function updatecookies($cookies){
        Session::put('cookies', $cookies);
        return response()->json(['message' => 'Successfully update'], 200);
    }

    public function gethomesubcategory($id) {
        $category = category::where('parent_id',$id)->where('status',0)->orderBy('id','ASC')->get();
        $output='<div class="carausel-8-columns-cover position-relative">
        <div class="carausel-8-columns" id="carausel-8-columns">';
        if(!empty($category)){
            foreach($category as $row){
                $output.='
                <div class="card-1">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href="/product-list/'.$id.'/'.$row->id.'/0/0">
                            <img src="/upload_files/'.$row->icon.'" alt="" />
                        </a>
                    </figure>
                    <h6>
                        <a href="/product-list/'.$id.'/'.$row->id.'/0/0">'.$row->category.'</a>
                    </h6>
                </div>
                ';
            }
        }

        $output.='</div></div>';

        echo $output;
    }

    public function getideascategory()
    {       
        $language = language::all();
        return view('website.get_ideas_category',compact('language'));
    }

    public static function viewideascategory() {
        $category = idea_category::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        $output='';
        foreach($category as $row){
        $output.='
        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
            <div class="widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">'.$row->category.'</h5>
                <ul>';
                    $subcategory = idea_category::where('parent_id',$row->id)->where('status',0)->orderBy('id','ASC')->get();
                    foreach($subcategory as $cat){
                    $output.='<li>
                        <a href="/get-ideas/'.$row->id.'/'.$cat->id.'/0"> <img src="/upload_files/'.$cat->image.'" alt="">'.$cat->category.'</a>
                    </li>';
                    }
                $output.='</ul>
            </div>
        </div>
        ';
        }

        echo $output;
    }

    public static function viewmobileideacategory() {
        $category = idea_category::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        $output='';
        foreach($category as $row){
            $output.='<li>
                <a href="/get-ideas/'.$row->id.'/0/0">'.$cat->category.'</a>
            </li>';
        }

        echo $output;
    }

    public function professionalcategory()
    {       
        $language = language::all();
        return view('website.professional_category',compact('language'));
    }

    public static function viewprofessionalcategory() {
        $category = professional_category::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        $output='';
        foreach($category as $row){
        $output.='
        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
            <div class="widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">'.$row->category.'</h5>
                <ul>';
                    $subcategory = professional_category::where('parent_id',$row->id)->where('status',0)->orderBy('id','ASC')->get();
                    foreach($subcategory as $cat){
                    $output.='<li>
                        <a href="/professional-list/'.$row->id.'/'.$cat->id.'/0"> <img src="/upload_files/'.$cat->image.'" alt="">'.$cat->category.'</a>
                    </li>';
                    }
                $output.='</ul>
            </div>
        </div>
        ';
        }

        echo $output;
    }

    public static function viewmobileprofessionalcategory() {
        $category = professional_category::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        $output='';
        foreach($category as $row){
            $output.='<li>
                <a href="/professional-list/'.$row->id.'/0/0">'.$cat->category.'</a>
            </li>';
        }

        echo $output;
    }

    public function shopcategory()
    {       
        $language = language::all();
        return view('website.shop_category',compact('language'));
    }


    public static function viewshopcategory() {
        $category = category::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        $output='';
        foreach($category as $row){
        $output.='
        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
            <div class="widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">'.$row->category.'</h5>
                <ul>';
                    $subcategory = category::where('parent_id',$row->id)->where('status',0)->orderBy('id','ASC')->get();
                    foreach($subcategory as $cat){
                    $output.='<li>
                        <a href="/product-list/'.$row->id.'/'.$cat->id.'/0/0"> <img src="/upload_files/'.$cat->image.'" alt="">'.$cat->category.'</a>
                    </li>';
                    }
                $output.='</ul>
            </div>
        </div>
        ';
        }

        echo $output;
    }

    public static function viewmobileshopcategory() {
        $category = category::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        $output='';
        foreach($category as $row){
            $output.='<li>
                <a href="/product-list/'.$row->id.'/0/0/0">'.$cat->category.'</a>
            </li>';
        }

        echo $output;
    }


    public static function viewattributefilter() {
        $attributes = attributes::where('status',0)->get();
        $output='';
        foreach($attributes as $row){
        $field = attribute_fields::where('attribute_id',$row->id)->where('status',0)->get();
        $output.='
        <label class="fw-900 mt-15">'.$row->attribute_name.'</label>
        <div class="custome-checkbox">';
        foreach($field as $field1){
            $output.='<input class="form-check-input" type="checkbox" name="attributes[]" id="attributes'.$field1->id.'" value="'.$field1->attributes_value.'" />
            <label class="form-check-label" for="attributes'.$field1->id.'">
                <span>'.$field1->attributes_value.'</span>
            </label>
            <br />';
        }
        $output.='</div>
        ';
        }

        echo $output;
    }


    
}
