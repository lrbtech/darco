<?php

namespace App\Http\Controllers\AdminLogin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;
use Auth;
use App\Models\User;
use App\Models\admin;
use DB;
use Mail;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    protected function guard()
    {
      return Auth::guard('admin');
    }

    protected function broker()
    {
      return Password::broker('admins');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('admin-login.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
