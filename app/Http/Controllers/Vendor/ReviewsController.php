<?php

namespace App\Http\Controllers\Vendor;

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
        $this->middleware('auth:vendor');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function productreviews(){
        $product_reviews = reviews::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','DESC')->get();
        $product = product::where('vendor_id',Auth::guard('vendor')->user()->id)->get();
        $language = language::all();
        return view('vendor.product_reviews',compact('product_reviews','product','language'));
    }
}
