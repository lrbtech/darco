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
use Hash;
use DB;
use Mail;
use Auth;
use PDF;

class PageController extends Controller
{
    public function printinvoice($id){
        $orders = orders::find($id);
        $order_items = order_items::where('order_id',$id)->get();
        $billing_address = shipping_address::find($orders->billing_address_id);
        $vendor = vendor::find($orders->vendor_id);
        $customer = User::find($orders->customer_id);

        $pdf = PDF::loadView('print.print_invoice',compact('orders','billing_address','vendor','customer','order_items'));
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

    public function getarea($id) {
        $city = city::where('parent_id',$id)->where('status',0)->orderBy('id','ASC')->get();

        $output='<option value="">SELECT</option>';
        if(!empty($city)){
            foreach($city as $row){
                $output.='<option value="'.$row->id.'">'.$row->city.'</option>';
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
        return view('professional-login.login');
    }

    public function home()
    {
        $category = category::where('status',0)->where('parent_id',0)->get();
        $professional_category = professional_category::where('status',0)->where('parent_id',0)->orderBy('id','DESC')->get()->take('4');
        $idea_category = idea_category::where('status',0)->where('parent_id',0)->orderBy('id','DESC')->get()->take('6');
        $professional_category_footer = professional_category::where('status',0)->where('parent_id',0)->orderBy('id','DESC')->get()->take('6');
       
        return view('website.home',compact('category','professional_category','idea_category','professional_category_footer'));
    }

    public function getMenu(){
       $home = category::where('status',0)->where('parent_id',0)->get();
       $professional = professional_category::where('status',0)->where('parent_id',0)->get(); 
       $ideas = idea_category::where('status',0)->where('parent_id',0)->get(); 

       $html='<li style="width:375px"></li>';
        $html.=' <li class="position-static"><a href="#">GET IDEAS <i class="fi-rs-angle-down"></i></a><ul class="mega-menu">';
        foreach($ideas as $row){
            $html .='<li class="sub-mega-menu sub-mega-menu-width-22"><a class="menu-title" href="/get-ideas/'.$row->id.'/0/0">'.$row->category.'</a><ul>';
            $child = idea_category::where('status',0)->where('parent_id',$row->id)->get();
            foreach($child as $row1){
                $html.='<li><a href="/get-ideas/'.$row->id.'/'.$row1->id.'/0">'.$row1->category.'</a></li>';
            }
            $html .='</ul></li>';
        }
        $html .='</ul> </li>';
        $html.=' <li class="position-static"><a href="#">FIND PROFESSIONALS <i class="fi-rs-angle-down"></i></a><ul class="mega-menu">';
        foreach($professional as $row){
            $html .='<li class="sub-mega-menu sub-mega-menu-width-22"><a class="menu-title" href="/professional-list/'.$row->id.'/0/0">'.$row->category.'</a><ul>';
            $child = professional_category::where('status',0)->where('parent_id',$row->id)->get();
            foreach($child as $row1){
                 $html.='<li><a href="/professional-list/'.$row->id.'/'.$row1->id.'/0">'.$row1->category.'</a></li>';
            }
            $html .='</ul></li>';
        }
        $html .='</ul> </li>';
        $html.=' <li class="position-static"><a href="#">SHOP BY DEPARTMENT <i class="fi-rs-angle-down"></i></a><ul class="mega-menu">';
        foreach($home as $row){
            $html .='<li class="sub-mega-menu sub-mega-menu-width-22"><a class="menu-title" href="/product-list/'.$row->id.'/0/0/0">'.$row->category.'</a><ul>';
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
        return view('website.about_us');
    }

    public function contact()
    {
        return view('website.contact_us');
    }

    public function individualregister()
    {
        $city = city::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        return view('website.individual_register',compact('city'));
    }

    public function professionalregister()
    {
        $city = city::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        $package = package::where('status',0)->orderBy('id','ASC')->get();
        return view('website.professional_register',compact('city','package'));
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
        return view('professionals.lists',compact('vendor'));
    }

    public function overview($id)
    {
        $vendor = vendor::find($id);
        $vendor_project = vendor_project::where('vendor_id',$id)->get();
        return view('professionals.overview',compact('vendor','vendor_project'));
    }

    public function saveindividualregister(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required|numeric|digits:9|unique:users',
            'city' => 'required',
            'zipcode' => 'required',
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
        $user->country = $request->country;
        $user->city = $request->city;
        $user->area = $request->area;
        $user->zipcode = $request->zipcode;
        $user->status = 1;
        $user->save();

        
        return response()->json('save successfully'); 
    }

    public function saveprofessionalregister(Request $request)
    {
        $this->validate($request, [
            'business_name' => 'required',
            'business_type' => 'required',
            'package_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required|numeric|digits:9|unique:vendors',
            'city' => 'required',
            'zipcode' => 'required',
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
        $vendor->user_unique_id = rand().time();
        $vendor->business_name = $request->business_name;
        $vendor->business_type = $request->business_type;
        $vendor->package_id = $request->package_id;
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->mobile = $request->mobile;
        $vendor->email = $request->email;
        $vendor->password =  Hash::make ( $request->password );
        $vendor->remember_token = $request->_token;
        $vendor->country = $request->country;
        $vendor->city = $request->city;
        $vendor->area = $request->area;
        $vendor->trade_license_no = $request->trade_license_no;
        $vendor->vat_certificate_no = $request->vat_certificate_no;
        $vendor->civi_id_or_passport = $request->civi_id_or_passport;
        $vendor->commercial_license_no = $request->commercial_license_no;
        $user->zipcode = $request->zipcode;
        $vendor->status = 1;

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

        
        return response()->json('save successfully'); 
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
        //      $message->to($vendor->email)->subject('Enquiry from Darco');
        //      $message->from('info@lrbtech.com',$all['name']);
        // });
        return response()->json(['message'=>'Successfully Send'],200); 
    }
    
    public function orderTrack(){
        return view('website.order_track');
    }

    public function shopCategory($id){
        $name = category::find($id);
        $category = category::where("parent_id",$id)->get();
        return view('website.shop_category',compact('category','name'));
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
        return view('website.pages',compact('title','content'));
        
    }

      
}
