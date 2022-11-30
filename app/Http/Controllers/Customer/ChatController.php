<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\language;
use Auth;
class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }
    public function chat(){
        $language = language::all();
        return view("customer.chat",compact('language'));
    }
}
