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
use App\Models\project_images;
use App\Models\idea_book;
use App\Models\idea_book_images;
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
                        <a href="/get-ideas/'.$id.'/'.$row->id.'/0">
                            <img src="/upload_files/'.$row->icon.'" alt="" />
                        </a>
                    </figure>
                    <h6>
                        <a href="/get-ideas/'.$id.'/'.$row->id.'/0">'.$row->category.'</a>
                    </h6>
                </div>
                ';
            }
        }

        $output.='</div></div>';

        echo $output;
    }

    public function getideas($category,$subcategory,$search)
    {
        $category_all = idea_category::where('status',0)->where('parent_id',0)->get();
        $subcategory_all = idea_category::where('status',0)->where('parent_id',$category)->get();

        $i =DB::table('idea_books as p');
        if ( $search != '0' )
        {
            $i->where('p.title', 'like', '%' . $search . '%');
        }
        if ( $category != '0' )
        {
            $i->where('p.category', $category);
        }
        if ( $subcategory != '0' )
        {
            $i->where('p.subcategory', $subcategory);
        }
        $i->select('p.*');
        $i->where('p.status',1);
        $get_ideas = $i->paginate(12);

        $category_data = idea_category::find($category);
        $subcategory_data = idea_category::find($subcategory);

        $category_id = $category;
        $subcategory_id = $subcategory;

        $language = language::all();
        return view('website.process.get_ideas',compact('category_all','subcategory_all','category_data','subcategory_data','get_ideas','category_id','subcategory_id','language'));
    }

    public function getideadetails($id){
        $idea_book = idea_book::find($id);
        $vendor = vendor::find($idea_book->vendor_id);
        $idea_book_images = idea_book_images::where('idea_book_id',$id)->where('status',1)->get();

        $related_idea_book = idea_book::where('vendor_id',$idea_book->vendor_id)->where('status',1)->where('id','!=',$id)->get();

        $language = language::all();
        return view('website.process.get_idea_details',compact('idea_book','idea_book_images','vendor','related_idea_book','language'));
        
    }
}
