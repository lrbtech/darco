<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\professional_category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // $home = category::where('status',0)->where('parent_id',0)->get();
       // $professional = professional_category::where('status',0)->where('parent_id',0)->get();
        //  return response()->json("ok"); 
       return view('home');
    }
}
