<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reviews;
use App\Models\vendor;
use App\Models\User;
use App\Models\admin;
use App\Models\product;
use App\Models\roles;
use App\Models\language;
use Hash;
use DB;
use Mail;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function productreviews(){
        $product_reviews = reviews::orderBy('id','DESC')->get();
        $product = product::all();
        $language = language::all();
        return view('admin.product_reviews',compact('product_reviews','product','language'));
    }

    public function reviewsstatus($id,$status){
        $reviews = reviews::find($id);
        $reviews->status = $status;
        $reviews->save();

        return response()->json('successfully updated'); 
    }

}
