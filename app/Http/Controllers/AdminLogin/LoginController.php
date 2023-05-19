<?php

namespace App\Http\Controllers\AdminLogin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\admin;
use Auth;
use DB;
use Mail;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
      return view('admin-login.login');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
  
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(Auth::guard('admin')->attempt(array($fieldType => $input['email'], 'password' => $input['password'])))
        {
            return redirect()->route('admin.dashboard');
            // RouteServiceProvider::HOME;
        }else{
            // return redirect()->route('login')->with('error','Email or Username And Password Are Wrong.');
            return back()->withErrors(['email' => ['Email or Username are Wrong.'] , 'password' => ['Password Wrong.']]);
            // throw ValidationException::withMessages([
            //     $this->username() => [trans('auth.failed')],
            //     'password' => [trans('auth.password')],
            // ])->redirectTo('/admin/login');        
        }
          
    }

    


}
