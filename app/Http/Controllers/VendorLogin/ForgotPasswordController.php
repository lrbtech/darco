<?php

namespace App\Http\Controllers\VendorLogin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;
use Auth;
use App\Models\User;
use App\Models\admin;
use DB;
use Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:vendor');
    }

    protected function broker()
    {
      return Password::broker('vendors');
    }

    public function showLinkRequestForm()
    {
        return view('vendor-login.passwords.email');
    }

    
}
