<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\professional_category;
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
use App\Models\vendor_enquiry;
use App\Models\shipping_address;
use Hash;
use DB;
use Mail;
use Auth;
use PDF;

class PageController extends Controller
{
      public function printinvoice($id){
        $orders = orders::find($id);
        $billing_address = shipping_address::find($orders->billing_address_id);
        $vendor = vendor::find($orders->vendor_id);
        $customer = User::find($orders->customer_id);

        $pdf = PDF::loadView('print.print_invoice',compact('orders','billing_address','vendor','customer'));
        $pdf->setPaper('A4');
        return $pdf->stream('invoice.pdf');
    }

    public static function viewcategoryname($id) {
        $category = category::find($id);
        return $category->category;
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

    public function home()
    {
        $home = category::where('status',0)->where('parent_id',0)->get();
        $professional = professional_category::where('status',0)->where('parent_id',0)->get();
       
        return view('website.home',compact('home','professional'));
    }

    public function getMenu(){
       $home = category::where('status',0)->where('parent_id',0)->get();
       $professional = professional_category::where('status',0)->where('parent_id',0)->get(); 
       $html='
       <li class="nav-item dropdown position-static2">
        <a class="nav-link dropdown-toggle smallDropdown main_link" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-lightbulb"></i> GET IDEAS</a>
        <div class="dropdown-menu" >
          <a class="dropdown-item" href="#">Kitchen & Dining</a>
          <a class="dropdown-item" href="#">Living room</a>
          <a class="dropdown-item" href="#">Bed & Bath</a>
          <a class="dropdown-item" href="#">Utility</a>
          <a class="dropdown-item" href="#">Outdoor</a>
          <a class="dropdown-item" href="#">Bar & Wine</a>
          <a class="dropdown-item" href="#">Popular Design Ideas</a>
        </div>
      </li>
      ';
        $html.=' <li class="nav-item dropdown position-static"><a href="#" class="nav-link dropdown-toggle main_link" data-toggle="dropdown" data-target="#"><i class="fas fa-user-tie"></i> Find Professionals</a>
          <div class="dropdown-menu w-75 top-auto">
            <div class="container">
              <div class="row w-100">';
         foreach($professional as $row){
          $html .='<div class="col-sm-6 col-lg-4">
              <h4>'.$row->category.'</h4>
                <ul>';
                 $subcategory = professional_category::where('status',0)->where('parent_id',$row->id)->get(); 
                  foreach($subcategory as $row2){
                    
                      $html .='<li><a href="/professionals/lists">'.$row2->category.'</a></li>';
                    
                    
                  }
               $html .=' </ul>
            </div>';
         }
            
          $html .='</div>
        </div></div>
        </li>';
        $html .=' <li class="nav-item dropdown position-static2">
        <a class="nav-link dropdown-toggle smallDropdown main_link" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-shopping-bag"></i> Shop by Department</a>
        <div class="dropdown-menu" >';
        foreach($home as $row){
            $html .='<a class="dropdown-item" href="/category/'.$row->id.'">'.$row->category.'</a>';
        }
          
         
        $html .='</div>
      </li>';
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
        return view('website.individual_register');
    }

    public function professionalregister()
    {
        return view('website.professional_register');
    }

    public function productlist()
    {
        $product = product::orderBy('id','DESC')->get();
        return view('website.product_list',compact('product'));
    }


    public function viewproductattributes($id,$product_id) {
        $list = product_attributes::where('product_group',$id)->groupBy('product_group','attribute_id')->select('product_group','attribute_id')->get();

        $output='';
        foreach($list as $list1){
            $attributes = attributes::find($list1->attribute_id);
            $output.='<div class="attr-detail attr-size mb-30">
                <strong class="mr-10">'.$attributes->attribute_name.': </strong>
                <ul class="list-filter size-filter font-small">';
                $product_attributes = product_attributes::where('attribute_id',$list1->attribute_id)->get();
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

    public function productdetails($id)
    {
        $product = product::find($id);
        $product_images = product_images::where('product_id',$id)->get();
        $vendor = vendor::find($product->vendor_id);
        return view('website.product_details',compact('product','product_images','vendor'));
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
            'email' => 'required|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6|required',
        ]);
 
        $user = new User;
        $user->date = date('Y-m-d');
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password =  Hash::make ( $request->password );
        $user->remember_token = $request->_token;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->area = $request->area;
        $user->save();

        
        return response()->json('save successfully'); 
    }

    public function saveprofessionalregister(Request $request)
    {
        $this->validate($request, [
            'business_name' => 'required',
            'business_type' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required|numeric|digits:9|unique:vendors',
            'city' => 'required',
            'email' => 'required|unique:vendors',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6|required',
        ]);
 
        $vendor = new vendor;
        $vendor->date = date('Y-m-d');
        $vendor->business_name = $request->business_name;
        $vendor->business_type = $request->business_type;
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->mobile = $request->mobile;
        $vendor->email = $request->email;
        $vendor->password =  Hash::make ( $request->password );
        $vendor->remember_token = $request->_token;
        $vendor->country = $request->country;
        $vendor->city = $request->city;
        $vendor->area = $request->area;
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
        $vendor_enquiry->customer_id = Auth::user()->id;
        $vendor_enquiry->name = $request->name;
        $vendor_enquiry->comments = $request->comments;
        $vendor_enquiry->mobile = $request->mobile;
        $vendor_enquiry->email = $request->email;
        $vendor_enquiry->save();

        $all = $request->all();
        $vendor = vendor::find($request->vendor_id);
        Mail::send('mail.vendor_enquiry',compact('all'),function($message) use($all,$vendor){
             $message->to($vendor->email)->subject('Enquiry from Darco');
             $message->from('info@lrbtech.com',$all['name']);
        });
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
      public function getIdeas(){
        return view('website.process.ideas_list');
      }
      public function professionalList(){
        return view('website.process.professional_list');
      }
      public function productlList(){
        return view('website.process.product_list');
      }
}
