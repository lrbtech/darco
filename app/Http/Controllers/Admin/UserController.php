<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reviews;
use App\Models\customer;
use App\Models\User;
use App\Models\admin;
use App\Models\settings;
use App\Models\city;
use App\Models\roles;
use App\Models\language;
use Hash;
use DB;
use Mail;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
    }

    public function users(){
        $users = admin::all();
        $roles = roles::where('status',0)->get();
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        $language = language::all();
        return view('admin.users',compact('users','roles','role_get','language'));
    }

    public function saveuser(Request $request){
        $request->validate([
            'email' => 'required|unique:admins',
            'username' => 'required|unique:admins',
            'password' => 'required',
        ]);
        $user = new admin;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->mobile = $request->mobile;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json('Successfully Save'); 
    }

    public function updateuser(Request $request){
        $request->validate([
            'email' => 'required|unique:admins,email,'.$request->id,
            'username' => 'required|unique:admins,username,'.$request->id,
        ]);
        $user = admin::find($request->id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->role_id = $request->role_id;
        if($request->password != ''){
        $user->password = Hash::make($request->password);
        }
        $user->save();
        return response()->json('Successfully Update'); 
    }
    
    public function edituser($id){
        $user = admin::find($id);
        return response()->json($user); 
    }

    public function deleteuser($id){
        $user = admin::find($id);
        $user->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function roles(){
        $roles = roles::where('status',0)->get();
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        $language = language::all();
        return view('admin.roles',compact('roles','role_get','language'));
    }

    public function createroles(){
        $roles = roles::where('status',0)->get();
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        $language = language::all();
        return view('admin.create_roles',compact('roles','role_get','language'));
    }

    public function saveroles(Request $request){
        $request->validate([
            'role_name' => 'required|unique:roles',
        ]);
        $roles = new roles;
        $roles->role_name = $request->role_name;
        $roles->dashboard = $request->dashboard;
        $roles->customers = $request->customers;
        $roles->vendors = $request->vendors;
        $roles->reviews = $request->reviews;
        $roles->product_category = $request->product_category;
        $roles->product_category_create = $request->product_category_create;
        $roles->product_category_edit = $request->product_category_edit;
        $roles->product_category_delete = $request->product_category_delete;
        $roles->professional_category = $request->professional_category;
        $roles->professional_category_create = $request->professional_category_create;
        $roles->professional_category_edit = $request->professional_category_edit;
        $roles->professional_category_delete = $request->professional_category_delete;
        $roles->idea_category = $request->idea_category;
        $roles->idea_category_create = $request->idea_category_create;
        $roles->idea_category_edit = $request->idea_category_edit;
        $roles->idea_category_delete = $request->idea_category_delete;
        $roles->city = $request->city;
        $roles->city_create = $request->city_create;
        $roles->city_edit = $request->city_edit;
        $roles->city_delete = $request->city_delete;
        $roles->orders = $request->orders;
        $roles->settlement_report = $request->settlement_report;
        $roles->users = $request->users;
        $roles->users_create = $request->users_create;
        $roles->users_edit = $request->users_edit;
        $roles->users_delete = $request->users_delete;
        $roles->roles = $request->roles;
        $roles->roles_create = $request->roles_create;
        $roles->roles_edit = $request->roles_edit;
        $roles->roles_delete = $request->roles_delete;
        $roles->terms_and_conditions = $request->terms_and_conditions;
        $roles->privacy_policy = $request->privacy_policy;
        $roles->save();
        return response()->json('Successfully Save'); 
    }

    public function updateroles(Request $request){
        $request->validate([
            'role_name' => 'required|unique:roles,role_name,'.$request->id,
        ]);
        $roles = roles::find($request->id);
        $roles->role_name = $request->role_name;
        $roles->dashboard = $request->dashboard;
        $roles->customers = $request->customers;
        $roles->vendors = $request->vendors;
        $roles->reviews = $request->reviews;
        $roles->product_category = $request->product_category;
        $roles->product_category_create = $request->product_category_create;
        $roles->product_category_edit = $request->product_category_edit;
        $roles->product_category_delete = $request->product_category_delete;
        $roles->professional_category = $request->professional_category;
        $roles->professional_category_create = $request->professional_category_create;
        $roles->professional_category_edit = $request->professional_category_edit;
        $roles->professional_category_delete = $request->professional_category_delete;
        $roles->idea_category = $request->idea_category;
        $roles->idea_category_create = $request->idea_category_create;
        $roles->idea_category_edit = $request->idea_category_edit;
        $roles->idea_category_delete = $request->idea_category_delete;
        $roles->city = $request->city;
        $roles->city_create = $request->city_create;
        $roles->city_edit = $request->city_edit;
        $roles->city_delete = $request->city_delete;
        $roles->orders = $request->orders;
        $roles->settlement_report = $request->settlement_report;
        $roles->users = $request->users;
        $roles->users_create = $request->users_create;
        $roles->users_edit = $request->users_edit;
        $roles->users_delete = $request->users_delete;
        $roles->roles = $request->roles;
        $roles->roles_create = $request->roles_create;
        $roles->roles_edit = $request->roles_edit;
        $roles->roles_delete = $request->roles_delete;
        $roles->terms_and_conditions = $request->terms_and_conditions;
        $roles->privacy_policy = $request->privacy_policy;
        $roles->save();
        return response()->json('Successfully Update'); 
    }
    
    public function editroles($id){
        $roles = roles::find($id);
        $role_get = roles::find(Auth::guard('admin')->user()->role_id);
        $language = language::all();
        return view('admin.edit_roles',compact('roles','role_get','language'));
    }

    public function deleteroles($id,$status){
        $roles = roles::find($id);
        $roles->status == 1;
        $roles->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }
}
