<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\professional_category;
use App\Models\idea_category;
use App\Models\city;
use App\Models\product;
use App\Models\product_attributes;
use App\Models\product_images;
use App\Models\attributes;
use App\Models\attribute_fields;
use App\Models\product_group;
use App\Models\vendor;
use App\Models\vendor_project;
use App\Models\User;
use App\Models\orders;
use App\Models\order_items;
use App\Models\vendor_enquiry;
use App\Models\shipping_address;
use App\Models\settings;
use App\Models\package;
use App\Models\language;
use App\Models\user_mobile_verify;
use App\Models\vendor_mobile_verify;
use App\Models\api_country;
use App\Models\api_city;
use App\Models\api_state;
use Hash;
use DB;
use Mail;
use Auth;
use PDF;
use Session;

class PageController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
        Session::put('lang', 'english');
    }

    public function customerlogin($id){
        Auth::loginUsingId($id);
        return redirect('/customer/profile');
    }

    public function vendorlogin($id){
        Auth::guard('vendor')->loginUsingId($id);
        return redirect('/vendor/dashboard');
    }


    public function printinvoice($id){
        $orders = orders::find($id);
        $order_items = order_items::where('order_id',$id)->get();
        $billing_address = shipping_address::find($orders->billing_address_id);
        $vendor = vendor::find($orders->vendor_id);
        $customer = User::find($orders->customer_id);
        $settings = settings::find(1);

        $pdf = PDF::loadView('print.print_invoice',compact('orders','billing_address','vendor','customer','order_items','settings'));
        $pdf->setPaper('A4');
        return $pdf->stream('invoice.pdf');
    }

    public static function viewproductname($id) {
        $product = product::find($id);
        if(!empty($product)){
            return $product->product_name;
        }
        else{
            return '';
        }
    }

    public static function viewcategoryname($id) {
        $category = category::find($id);
        if(!empty($category)){
            return $category->category;
        }
        else{
            return '';
        }
    }

    public static function viewprofessionalcategoryname($id) {
        $category = professional_category::find($id);
        if(!empty($category)){
            return $category->category;
        }
        else{
            return '';
        }
    }

    public static function viewideacategoryname($id) {
        $category = idea_category::find($id);
        if(!empty($category)){
            return $category->category;
        }
        else{
            return '';
        }
    }

    public static function viewvendorname($id) {
        $vendor = vendor::find($id);
        if(!empty($vendor)){
            return $vendor->business_name;
        }
        else{
            return '';
        }
    }

    public static function viewcityname($id) {
        $city = city::find($id);
        if(!empty($city)){
            return $city->city;
        }
        else{
            return '';
        }
    }

    public static function viewcustomername($id) {
        $user = User::find($id);
        if(!empty($user)){
            echo '<p>'.$user->first_name.' '.$user->last_name.'</p><p>'.$user->mobile.'</p>';
        }
        else{
            return '';
        }
    }

    public function getapicountrycode($id) {
        $country = api_country::find($id);

        echo $country->phonecode;
    }

    public function getapicity($id) {
        $state = api_state::where('country_id',$id)->get();

        $output='<option value="">SELECT</option>';
        if(!empty($state)){
            foreach($state as $row){
                $output.='<option value="'.$row->id.'">'.$row->name.'</option>';
            }
        }

        echo $output;
    }

    public function getapiarea($id) {
        $city = api_city::where('state_id',$id)->get();

        $output='<option value="">SELECT</option>';
        if(!empty($city)){
            foreach($city as $row){
                $output.='<option value="'.$row->name.'">'.$row->name.'</option>';
            }
        }

        echo $output;
    }

    public function getarea($id) {
        $getcity = city::where('city',$id)->first();
        $city = city::where('parent_id',$getcity->id)->where('status',0)->orderBy('id','ASC')->get();

        $output='<option value="">SELECT</option>';
        if(!empty($city)){
            foreach($city as $row){
                $output.='<option value="'.$row->city.'">'.$row->city.'</option>';
            }
        }

        echo $output;
    }

    public function getsubcategory($id) {
        $category = category::where('parent_id',$id)->where('status',0)->orderBy('id','ASC')->get();

        $output='<option value="">SELECT</option>';
        if(!empty($category)){
            foreach($category as $row){
                $output.='<option value="'.$row->id.'">'.$row->category.'</option>';
            }
        }

        echo $output;
    }

    public function getprofessionalsubcategory($id) {
        $category = professional_category::where('parent_id',$id)->where('status',0)->orderBy('id','ASC')->get();

        $output='<option value="">SELECT</option>';
        if(!empty($category)){
            foreach($category as $row){
                $output.='<option value="'.$row->id.'">'.$row->category.'</option>';
            }
        }

        echo $output;
    }

    public function getideabooksubcategory($id) {
        $category = idea_category::where('parent_id',$id)->where('status',0)->orderBy('id','ASC')->get();

        $output='<option value="">SELECT</option>';
        if(!empty($category)){
            foreach($category as $row){
                $output.='<option value="'.$row->id.'">'.$row->category.'</option>';
            }
        }

        echo $output;
    }

    public function professionallogin()
    {       
        $language = language::all();
        return view('professional-login.login',compact('language'));
    }

    public function home()
    {
        $category = category::where('status',0)->where('parent_id',0)->get();
        $professional_category = professional_category::where('status',0)->where('parent_id',0)->orderBy('id','DESC')->get()->take('4');
        $idea_category = idea_category::where('status',0)->where('parent_id',0)->orderBy('id','DESC')->get()->take('6');
        $professional_category_footer = professional_category::where('status',0)->where('parent_id',0)->orderBy('id','DESC')->get()->take('6');
       
        $language = language::all();
        return view('website.home',compact('category','professional_category','idea_category','professional_category_footer','language'));
    }

    public function getMenu(){
       $home = category::where('status',0)->where('parent_id',0)->get();
       $professional = professional_category::where('status',0)->where('parent_id',0)->get(); 
       $ideas = idea_category::where('status',0)->where('parent_id',0)->get(); 
       $language = language::all();
       $html='<li style="width:375px"></li>';
        $html.=' <li class="position-static"><a href="/get-ideas-category">'.$language[132][session()->get('lang')].' <i class="fi-rs-angle-down"></i></a><ul class="mega-menu">';
        foreach($ideas as $row){
            $html .='<li class="translate sub-mega-menu sub-mega-menu-width-22"><a class="menu-title" href="/get-ideas/'.$row->id.'/0/0">'.$row->category.'</a><ul>';
            $child = idea_category::where('status',0)->where('parent_id',$row->id)->get();
            foreach($child as $row1){
                $html.='<li><a href="/get-ideas/'.$row->id.'/'.$row1->id.'/0">'.$row1->category.'</a></li>';
            }
            $html .='</ul></li>';
        }
        $html .='</ul> </li>';
        $html.=' <li class="position-static"><a href="/professional-category">'.$language[133][session()->get('lang')].' <i class="fi-rs-angle-down"></i></a><ul class="mega-menu">';
        foreach($professional as $row){
            $html .='<li class="translate sub-mega-menu sub-mega-menu-width-22"><a class="menu-title" href="/professional-list/'.$row->id.'/0/0">'.$row->category.'</a><ul>';
            $child = professional_category::where('status',0)->where('parent_id',$row->id)->get();
            foreach($child as $row1){
                 $html.='<li><a href="/professional-list/'.$row->id.'/'.$row1->id.'/0">'.$row1->category.'</a></li>';
            }
            $html .='</ul></li>';
        }
        $html .='</ul> </li>';
        $html.=' <li class="position-static"><a href="/shop-category">'.$language[134][session()->get('lang')].' <i class="fi-rs-angle-down"></i></a><ul class="mega-menu">';
        foreach($home as $row){
            $html .='<li class="translate sub-mega-menu sub-mega-menu-width-22"><a class="menu-title" href="/product-list/'.$row->id.'/0/0/0">'.$row->category.'</a><ul>';
                $html.='<li><a href="/product-list/'.$row->id.'/N/0/0">New Arrivals</a></li>';
            $child = category::where('status',0)->where('parent_id',$row->id)->get();
            foreach($child as $row1){
                 $html.='<li><a href="/product-list/'.$row->id.'/'.$row1->id.'/0/0">'.$row1->category.'</a></li>';
            }
            $html .='</ul></li>';
        }
        $html .='</ul> </li>';
    
       return response()->json($html); 
    }

    public function about()
    {
        $language = language::all();
        $setting = settings::select('about_us')->first();
        return view('website.about_us',compact('language','setting'));
    }

    public function contact()
    {
        $language = language::all();
        return view('website.contact_us',compact('language'));
    }

    public function sendfirebaseotp()
    {
        $language = language::all();
        return view('website.firebase_otp',compact('language'));
    }

    public function individualregister()
    {
        $settings = settings::find(1);
        $language = language::all();


		$countrydata = api_country::all();

        return view('website.individual_register',compact('countrydata','settings','language'));
    }

    public function professionalregister()
    {
        $package = package::where('status',0)->orderBy('id','ASC')->get();
        $settings = settings::find(1);
        $language = language::all();

        $countrydata = api_country::all();

        return view('website.professional_register',compact('countrydata','package','settings','language'));
    }


    public static function viewproductattributes($id,$product_id) {
        $list = product_attributes::where('product_group',$id)->groupBy('product_group','attribute_id')->select('product_group','attribute_id')->get();

        $output='';
        foreach($list as $list1){
            $attributes = attributes::find($list1->attribute_id);
            $output.='<div class="attr-detail attr-size mb-30">
                <strong class="mr-10">'.$attributes->attribute_name.': </strong>
                <ul class="list-filter size-filter font-small">';
                $product_attributes = product_attributes::where('attribute_id',$list1->attribute_id)->where('product_group',$id)->get();
                foreach($product_attributes as $attr){
                $field = attribute_fields::find($attr->attribute_field_id);
                    if($attr->product_id == $product_id){
                        $output.='<li class="active"><a onclick="ProductOpen('.$attr->product_id.')" href="#">'.$field->attributes_value.'</a></li>';
                    }
                    else{
                        $output.='<li><a onclick="ProductOpen('.$attr->product_id.')" href="#">'.$field->attributes_value.'</a></li>';
                    }
                }
                $output.='</ul>
            </div>';
        }

        echo $output;
    }

    public function professionalslist()
    {
        $vendor = vendor::where('role_id','admin')->where('business_type',1)->get();
        $language = language::all();
        return view('professionals.lists',compact('vendor','language'));
    }

    public function overview($id)
    {
        $vendor = vendor::find($id);
        $vendor_project = vendor_project::where('vendor_id',$id)->get();
        $language = language::all();
        return view('professionals.overview',compact('vendor','vendor_project','language'));
    }

    public function senduserotp(Request $request){
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required|numeric|unique:users',
            'country' => 'required',
            'city' => 'required',
            //'zipcode' => 'required',
            'email' => 'required|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6|required',
        ]);

        $randomid = mt_rand(1000,9999); 
        $exist = user_mobile_verify::where('email',$request->email)->first();
        if(!empty($exist)){
            $user_mobile_verify = user_mobile_verify::where('email',$request->email)->first();
            $user_mobile_verify->otp = $randomid;
            $user_mobile_verify->save();
        }
        else{
            $user_mobile_verify = new user_mobile_verify;
            $user_mobile_verify->email = $request->email;
            $user_mobile_verify->otp = $randomid;
            $user_mobile_verify->save();
        }
    
        $msg= "Dear Customer,
        
        Please use this OTP ".$user_mobile_verify->otp." to complete your registration process.
        
        -DARSTORE";

        $all = user_mobile_verify::find($user_mobile_verify->id);
        Mail::send('mail.otp_mail',compact('msg'),function($message) use($all){
            $message->to($all['email'])->subject('Verify your DARSTORE Account');
            $message->from('mail.lrbinfotech@gmail.com','DARSTORE');
        });

        // $event = new event();
        // $event->otp_sms($user_mobile_verify->mobile,$msg);

        return response()->json(['message' => 'Successfully Send','status'=>1], 200);
    }


    public function verifyuserotp($mobile,$otp)
    {
        if($mobile !=null){
            $user_mobile_verify = user_mobile_verify::where('email',$mobile)->first();
            if($user_mobile_verify->otp == $otp){
                
                return response()->json(['message' => 'Verified Your Account',
                // 'name'=>$user_mobile_verify->id,
                'status'=>200], 200);
            }else{
                return response()->json('Verification Code Not Valid', 500);
            }
        }else{
            return response()->json('Mobile number Not valid', 400);
        }
    }

    public function saveindividualregister(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required|numeric|unique:users',
            'country' => 'required',
            'city' => 'required',
            //'zipcode' => 'required',
            'email' => 'required|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6|required',
        ]);
 
        $user = new User;
        $user->date = date('Y-m-d');
        $user->user_unique_id = rand().time();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password =  Hash::make ( $request->password );
        $user->remember_token = $request->_token;
        $user->country_code = $request->country_code;

        $api_country = api_country::find($request->country);
        $user->country= $api_country->name;
        $api_state = api_state::find($request->city);
        $user->city= $api_state->name;

        $user->area = $request->area;
        $user->address = $request->address;
        $user->status = 0;
        $user->save();

        // $all = User::find($user->id);
        // Mail::send('mail.verify_mail',compact('all'),function($message) use($all){
        //     $message->to($all['email'])->subject('Verify your DARSTORE Account');
        //     $message->from('mail.lrbinfotech@gmail.com','DARSTORE');
        // });
        
        return response()->json('save successfully'); 
    }

    public function sendvendorotp(Request $request){
        $this->validate($request, [
            'business_name' => 'required',
            'business_type' => 'required',
            'package_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required|numeric|unique:vendors',
            'city' => 'required',
            'country' => 'required',
            'email' => 'required|unique:vendors',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6|required',
            'id_proof' => 'nullable|mimes:jpeg,jpg,png,pdf|max:3000',
            'civi_id_or_passport_copy' => 'nullable|mimes:jpeg,jpg,png,pdf|max:3000',
            'commercial_license_copy' => 'nullable|mimes:jpeg,jpg,png,pdf|max:3000',
            'article_of_association' => 'nullable|mimes:jpeg,jpg,png,pdf|max:3000',
            ],[
            'id_proof.mimes' => 'Only jpeg,png,pdf and jpg formats are allowed',
            'id_proof.max' => 'Sorry! Maximum allowed size for an ID Proof is 3MB',
            'civi_id_or_passport_copy.mimes' => 'Only jpeg,png,pdf and jpg formats are allowed',
            'civi_id_or_passport_copy.max' => 'Sorry! Maximum allowed size for an passport copy is 3MB',
            'commercial_license_copy.mimes' => 'Only jpeg,png,pdf and jpg formats are allowed',
            'commercial_license_copy.max' => 'Sorry! Maximum allowed size for an Emirates id copy is 3MB',
            'article_of_association.mimes' => 'Only jpeg,png,pdf and jpg formats are allowed',
            'article_of_association.max' => 'Sorry! Maximum allowed size for an Emirates id copy is 3MB',
            'package_id.required' => 'Choose Package is Required',
        ]);

        $randomid = mt_rand(1000,9999); 
        $exist = vendor_mobile_verify::where('email',$request->email)->first();
        if(!empty($exist)){
            $vendor_mobile_verify = vendor_mobile_verify::where('email',$request->email)->first();
            $vendor_mobile_verify->otp = $randomid;
            $vendor_mobile_verify->save();
        }
        else{
            $vendor_mobile_verify = new vendor_mobile_verify;
            $vendor_mobile_verify->email = $request->email;
            //$vendor_mobile_verify->mobile = $request->mobile;
            $vendor_mobile_verify->otp = $randomid;
            $vendor_mobile_verify->save();
        }
    
        $msg= "Dear Customer,
        
        Please use this OTP ".$vendor_mobile_verify->otp." to complete your registration process.
        
        -DARSTORE";

        $all = vendor_mobile_verify::find($vendor_mobile_verify->id);
        Mail::send('mail.otp_mail',compact('msg'),function($message) use($all){
            $message->to($all['email'])->subject('Verify your DARSTORE Account');
            $message->from('mail.lrbinfotech@gmail.com','DARSTORE');
        });

        // $event = new event();
        // $event->otp_sms($vendor_mobile_verify->mobile,$msg);

        return response()->json(['message' => 'Successfully Send','status'=>1], 200);
    }


    public function verifyvendorotp($mobile,$otp)
    {
        if($mobile !=null){
            $vendor_mobile_verify = vendor_mobile_verify::where('email',$mobile)->first();
            if($vendor_mobile_verify->otp == $otp){
                
                return response()->json(['message' => 'Verified Your Account',
                // 'name'=>$vendor_mobile_verify->id,
                'status'=>200], 200);
            }else{
                return response()->json('Verification Code Not Valid', 500);
            }
        }else{
            return response()->json('Mobile number Not valid', 400);
        }
    }

    public function saveprofessionalregister(Request $request)
    {
        $this->validate($request, [
            'business_name' => 'required',
            'business_type' => 'required',
            'package_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required|numeric|unique:vendors',
            'city' => 'required',
            'country' => 'required',
            'email' => 'required|unique:vendors',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6|required',
            'id_proof' => 'nullable|mimes:jpeg,jpg,png,pdf|max:3000',
            'civi_id_or_passport_copy' => 'nullable|mimes:jpeg,jpg,png,pdf|max:3000',
            'commercial_license_copy' => 'nullable|mimes:jpeg,jpg,png,pdf|max:3000',
            'article_of_association' => 'nullable|mimes:jpeg,jpg,png,pdf|max:3000',
            ],[
            'id_proof.mimes' => 'Only jpeg,png,pdf and jpg formats are allowed',
            'id_proof.max' => 'Sorry! Maximum allowed size for an ID Proof is 3MB',
            'civi_id_or_passport_copy.mimes' => 'Only jpeg,png,pdf and jpg formats are allowed',
            'civi_id_or_passport_copy.max' => 'Sorry! Maximum allowed size for an passport copy is 3MB',
            'commercial_license_copy.mimes' => 'Only jpeg,png,pdf and jpg formats are allowed',
            'commercial_license_copy.max' => 'Sorry! Maximum allowed size for an Emirates id copy is 3MB',
            'article_of_association.mimes' => 'Only jpeg,png,pdf and jpg formats are allowed',
            'article_of_association.max' => 'Sorry! Maximum allowed size for an Emirates id copy is 3MB',
            'package_id.required' => 'Choose Package is Required',
        ]);
 
        $vendor = new vendor;
        $vendor->date = date('Y-m-d');
        $vendor->vendor_commission = 3;
        $vendor->vendor_unique_id = rand().time();
        $vendor->business_name = $request->business_name;
        $vendor->business_type = $request->business_type;
        $vendor->package_id = $request->package_id;
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->mobile = $request->mobile;
        $vendor->email = $request->email;
        $vendor->password =  Hash::make ( $request->password );
        $vendor->remember_token = $request->_token;
        $vendor->country_code = $request->country_code;

        $api_country = api_country::find($request->country);
        $vendor->country= $api_country->name;
        $api_state = api_state::find($request->city);
        $vendor->city= $api_state->name;

        $vendor->area = $request->area;
        $vendor->trade_license_no = $request->trade_license_no;
        $vendor->vat_certificate_no = $request->vat_certificate_no;
        $vendor->civi_id_or_passport = $request->civi_id_or_passport;
        $vendor->commercial_license_no = $request->commercial_license_no;
        $vendor->address = $request->address;
        $vendor->status = 0;

        if($request->id_proof!=""){
            if($request->file('id_proof')!=""){
            $image = $request->file('id_proof');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('vendor_files/'), $upload_image);
            $vendor->id_proof = $upload_image;
            }
        }

        if($request->civi_id_or_passport_copy!=""){
            if($request->file('civi_id_or_passport_copy')!=""){
            $image = $request->file('civi_id_or_passport_copy');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('vendor_files/'), $upload_image);
            $vendor->civi_id_or_passport_copy = $upload_image;
            }
        }

        if($request->commercial_license_copy!=""){
            if($request->file('commercial_license_copy')!=""){
            $image = $request->file('commercial_license_copy');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('vendor_files/'), $upload_image);
            $vendor->commercial_license_copy = $upload_image;
            }
        }

        if($request->article_of_association!=""){
            if($request->file('article_of_association')!=""){
            $image = $request->file('article_of_association');
            $upload_image = rand().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('vendor_files/'), $upload_image);
            $vendor->article_of_association = $upload_image;
            }
        }

        $vendor->save();
        
        // $all = vendor::find($vendor->id);
        // Mail::send('mail.verify_vendor_mail',compact('all'),function($message) use($all){
        //     $message->to($all['email'])->subject('Verify your DARSTORE Account');
        //     $message->from('mail.lrbinfotech@gmail.com','DARSTORE');
        // });

        return response()->json('save successfully'); 
    }

    public function verifyaccount($id){
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        $language = language::all();
        return view('auth.login',compact('user','language'));
    }

    public function verifyvendoraccount($id){
        $vendor = vendor::find($id);
        $vendor->is_email_verify = 1;
        $vendor->save();
        return view('vendor-login.login',compact('vendor','language'));
    }

    public function sendvendorenquiry(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'comments'=>'required',
        ]);

        $vendor_enquiry = new vendor_enquiry;
        $vendor_enquiry->date = date('Y-m-d');
        $vendor_enquiry->vendor_id = $request->vendor_id;
        $vendor_enquiry->type = $request->type;
        $vendor_enquiry->project_idea_book_id = $request->project_idea_book_id;
        $vendor_enquiry->customer_id = Auth::user()->id;
        $vendor_enquiry->name = $request->name;
        $vendor_enquiry->comments = $request->comments;
        $vendor_enquiry->mobile = $request->mobile;
        $vendor_enquiry->email = $request->email;
        $vendor_enquiry->save();

        // $all = $request->all();
        // $vendor = vendor::find($request->vendor_id);
        // Mail::send('mail.vendor_enquiry',compact('all'),function($message) use($all,$vendor){
        //      $message->to($vendor->email)->subject('Enquiry from DARSTORE');
        //      $message->from('info@lrbtech.com',$all['name']);
        // });
        return response()->json(['message'=>'Successfully Send'],200); 
    }
    
    public function orderTrack(){
        $language = language::all();
        return view('website.order_track',compact('language'));
    }

    public function shopCategory($id){
        $name = category::find($id);
        $category = category::where("parent_id",$id)->get();
        $language = language::all();
        return view('website.shop_category',compact('category','name','language'));
    }

    public function infoPages($id){
        $page = settings::find(1);
        //return view('website.shop_category',compact('category','name'));
        $title='';
        $content;    
        if($id=="privacy-policy"){
            $title='Privacy Policy';
            $content=$page->privacy_policy;
        }
        elseif($id=="terms-condition"){
            $title='Terms and Condition';
            $content=$page->terms_and_conditions;
        }
        elseif($id=="vendor-guide"){
            $title='Vendor Guide';
            $content=$page->vendor_guide;
        }
        elseif($id=="professional-guide"){
            $title='Professional Guide';
            $content=$page->professional_guide;
        }
        elseif($id=="purchase-guide"){
            $title='Purchase Guide';
            $content=$page->purchase_guide;
        }
        else{
            $title='Delivery Information';
            $content=$page->delivery_information;
        }

        $language = language::all();
        return view('website.pages',compact('title','content','language'));
        
    }

      
}
