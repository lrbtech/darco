<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\favourites;
use Auth;
use DB;
use Mail;
use Hash;

class FavouriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function savefavourites($id){
        $data=favourites::where('product_id',$id)->where('customer_id',Auth::user()->id)->get();
        if (count($data) == 0) {
            $favourites = new favourites;
            $favourites->date = date('Y-m-d');
            $favourites->product_id = $id;
            $favourites->customer_id = Auth::user()->id;
            $favourites->save();
            return response()->json(['message' => 'Stored Successfully!'], 200);
        }
    }

    public function deletefavourites($id){
        $favourite = favourites::where('customer_id',Auth::user()->id)->where('product_id',$id)->first();
        $favourite->delete();
        return response()->json(['message' => 'Removed Successfully!'], 200);
    }

    public function favourites(){
        $products = DB::table("favourites")
        ->where("favourites.customer_id",Auth::user()->id)
        ->join('products', 'products.id', '=', 'favourites.product_id')
        ->orderBy('favourites.id','DESC')
        ->select('products.*','favourites.id as favourite_id')
        ->get();

        return view('customer.favourites',compact('products'));
    }

    public static function viewfavourites($id) {
        $favourite=array();
        if(Auth::check()){
            $favourite = favourites::where('customer_id',Auth::user()->id)->where('product_id',$id)->first();
        }

        if(empty($favourite)){
            echo '
            <a aria-label="Add To Wishlist" class="action-btn hover-up" onclick="SaveFavourite('.$id.')" href="javascript:void(0)"><i class="fi-rs-heart"></i></a>
            ';
        }
        else{
            echo '
            <a style="color:red;" aria-label="Add To Wishlist" class="action-btn hover-up" onclick="DeleteFavourite('.$id.')" href="javascript:void(0)"><i class="fi-rs-heart"></i></a>
            ';
        }
    }

}
