<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\language;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }
    public function getChat($id){
        $language = language::all();
        return view("vendor.chat",compact('language'));
    }
}
