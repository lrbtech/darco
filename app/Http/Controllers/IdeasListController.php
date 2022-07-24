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
use Hash;
use DB;
use Mail;
use Auth;
use PDF;

class IdeasListController extends Controller
{
    public function getideasubcategory($id) {
        $sub_category_all = idea_category::where('parent_id',$id)->where('status',0)->orderBy('id','ASC')->get();
        $output='<div class="carausel-8-columns-cover position-relative">
        <div class="carausel-8-columns" id="carausel-8-columns">';
        if(!empty($sub_category_all)){
            foreach($sub_category_all as $row){
                $output.='
                <div class="card-1">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href="/get-ideas/'.$id.'/'.$row->id.'">
                            <img src="/upload_files/'.$row->icon.'" alt="" />
                        </a>
                    </figure>
                    <h6>
                        <a href="/get-ideas/'.$id.'/'.$row->id.'">'.$row->category.'</a>
                    </h6>
                </div>
                ';
            }
        }

        $output.='</div></div>';

        echo $output;
    }

    public function getideas($category,$subcategory)
    {
        $category_all = idea_category::where('status',0)->where('parent_id',0)->get();
        $subcategory_all = idea_category::where('status',0)->where('parent_id',$category)->get();

        $i =DB::table('idea_books as p');
        if ( $category != '0' )
        {
            $i->where('p.category', $category);
        }
        if ( $subcategory != '0' )
        {
            $i->where('p.subcategory', $subcategory);
        }
        $i->select('p.*');
        $i->where('p.status',0);
        $get_ideas = $i->paginate(12);

        $category_data = idea_category::find($category);
        $subcategory_data = idea_category::find($subcategory);

        $category_id = $category;
        $subcategory_id = $subcategory;

        return view('website.process.get_ideas',compact('category_all','subcategory_all','category_data','subcategory_data','get_ideas','category_id','subcategory_id'));
    }
}
