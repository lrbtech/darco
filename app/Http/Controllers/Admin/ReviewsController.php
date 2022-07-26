<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reviews;
use App\Models\vendor;
use App\Models\User;
use App\Models\admin;
use App\Models\roles;
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

    public function reviews(){
        $reviews = reviews::all();
        $vendor = vendor::where('role_id','admin')->where('status',1)->get();
        $customer = User::all();
        return view('admin.reviews',compact('reviews','customer','vendor'));
    }

    public function reviewsstatus($id,$status){
        $reviews = reviews::find($id);
        $reviews->status = $status;
        $reviews->save();

        return response()->json('successfully updated'); 
    }

}
