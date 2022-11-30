<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\favourites;
use App\Models\favourites_idea;
use App\Models\language;
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

        $idea_book = DB::table("favourites_ideas")
        ->where("favourites_ideas.customer_id",Auth::user()->id)
        ->join('idea_books', 'idea_books.id', '=', 'favourites_ideas.idea_book_id')
        ->orderBy('favourites_ideas.id','DESC')
        ->select('idea_books.*','favourites_ideas.id as favourite_id')
        ->get();

        $language = language::all();
        return view('customer.favourites',compact('idea_book','products','language'));
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

    public function savefavouritesidea($id){
        $data=favourites_idea::where('idea_book_id',$id)->where('customer_id',Auth::user()->id)->get();
        if (count($data) == 0) {
            $favourites_idea = new favourites_idea;
            $favourites_idea->date = date('Y-m-d');
            $favourites_idea->idea_book_id = $id;
            $favourites_idea->customer_id = Auth::user()->id;
            $favourites_idea->save();
            return response()->json(['message' => 'Stored Successfully!'], 200);
        }
    }

    public function deletefavouritesidea($id){
        $favourite = favourites_idea::where('customer_id',Auth::user()->id)->where('idea_book_id',$id)->first();
        $favourite->delete();
        return response()->json(['message' => 'Removed Successfully!'], 200);
    }

    public static function viewfavouritesidea($id) {
        $favourite=array();
        if(Auth::check()){
            $favourite = favourites_idea::where('customer_id',Auth::user()->id)->where('idea_book_id',$id)->first();
        }

        if(empty($favourite)){
            echo '
            <a class="add" onclick="SaveFavouriteIdea('.$id.')" href="javascript:void(0)"><i class="fi-rs-heart mr-5"></i>Save </a>
            ';
        }
        else{
            echo '
            <a style="color:red;" class="add" onclick="DeleteFavouriteIdea('.$id.')" href="javascript:void(0)"><i class="fi-rs-heart mr-5"></i>Saved </a>
            ';
        }
    }

}
