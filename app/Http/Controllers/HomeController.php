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
use App\Models\vendor_enquiry;
use App\Models\shipping_address;
use App\Models\language;
use App\Models\settings;

use App\Models\order_items;
use App\Models\order_attributes;
use App\Models\coupon;
use Hash;
use DB;
use Mail;
use Auth;
use PDF;
use Session;

class HomeController extends Controller
{
    public function vendorlogout(){
        Auth::guard('vendor')->logout();
        return redirect('/vendor/login');
    }
    public function adminlogout(Request $request){
        Auth::guard('admin')->logout();
        //Auth::logout();   
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
    public function customerlogout(Request $request){
        Auth::logout();   
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect('/home');
    }

    public function updatelanguage($lang){
        Session::put('lang', $lang);
        return response()->json(['message' => 'Successfully update'], 200);
    }
    public function updatetheme($theme){
        Session::put('theme', $theme);
        return response()->json(['message' => 'Successfully update'], 200);
    }

    public function updatecookies($cookies){
        Session::put('cookies', $cookies);
        return response()->json(['message' => 'Successfully update'], 200);
    }

    public function gethomesubcategory($id) {
        $category = category::where('parent_id',$id)->where('status',0)->orderBy('id','ASC')->get();
        $output='<div class="carausel-8-columns-cover position-relative">
        <div class="carausel-8-columns" id="carausel-8-columns">';
        if(!empty($category)){
            foreach($category as $row){
                $output.='
                <div class="card-1">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href="/product-list/'.$id.'/'.$row->id.'/0/0">
                            <img src="/upload_files/'.$row->icon.'" alt="" />
                        </a>
                    </figure>
                    <h6>
                        <a href="/product-list/'.$id.'/'.$row->id.'/0/0">'.$row->category.'</a>
                    </h6>
                </div>
                ';
            }
        }

        $output.='</div></div>';

        echo $output;
    }

    public function getideascategory()
    {       
        $language = language::all();
        return view('website.get_ideas_category',compact('language'));
    }

    public static function viewideascategory() {
        $category = idea_category::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        $output='';
        foreach($category as $row){
        $output.='
        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
            <div class="widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">'.$row->category.'</h5>
                <ul>';
                    $subcategory = idea_category::where('parent_id',$row->id)->where('status',0)->orderBy('id','ASC')->get();
                    foreach($subcategory as $cat){
                    $output.='<li>
                        <a href="/get-ideas/'.$row->id.'/'.$cat->id.'/0"> <img src="/upload_files/'.$cat->image.'" alt="">'.$cat->category.'</a>
                    </li>';
                    }
                $output.='</ul>
            </div>
        </div>
        ';
        }

        echo $output;
    }

    public static function viewmobileideacategory() {
        $category = idea_category::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        $output='';
        foreach($category as $row){
            $output.='<li>
                <a href="/get-ideas/'.$row->id.'/0/0">'.$row->category.'</a>
            </li>';
        }

        echo $output;
    }

    public function professionalcategory()
    {       
        $language = language::all();
        return view('website.professional_category',compact('language'));
    }

    public static function viewprofessionalcategory() {
        $category = professional_category::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        $output='';
        foreach($category as $row){
        $output.='
        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
            <div class="widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">'.$row->category.'</h5>
                <ul>';
                    $subcategory = professional_category::where('parent_id',$row->id)->where('status',0)->orderBy('id','ASC')->get();
                    foreach($subcategory as $cat){
                    $output.='<li>
                        <a href="/professional-list/'.$row->id.'/'.$cat->id.'/0"> <img src="/upload_files/'.$cat->image.'" alt="">'.$cat->category.'</a>
                    </li>';
                    }
                $output.='</ul>
            </div>
        </div>
        ';
        }

        echo $output;
    }

    public static function viewmobileprofessionalcategory() {
        $category = professional_category::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        $output='';
        foreach($category as $row){
            $output.='<li>
                <a href="/professional-list/'.$row->id.'/0/0">'.$row->category.'</a>
            </li>';
        }

        echo $output;
    }

    public function shopcategory()
    {       
        $language = language::all();
        return view('website.shop_category',compact('language'));
    }


    public static function viewshopcategory() {
        $category = category::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        $output='';
        foreach($category as $row){
        $output.='
        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
            <div class="widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">'.$row->category.'</h5>
                <ul>';
                    $subcategory = category::where('parent_id',$row->id)->where('status',0)->orderBy('id','ASC')->get();
                    foreach($subcategory as $cat){
                    $output.='<li>
                        <a href="/product-list/'.$row->id.'/'.$cat->id.'/0/0"> <img src="/upload_files/'.$cat->image.'" alt="">'.$cat->category.'</a>
                    </li>';
                    }
                $output.='</ul>
            </div>
        </div>
        ';
        }

        echo $output;
    }

    public static function viewmobileshopcategory() {
        $category = category::where('parent_id',0)->where('status',0)->orderBy('id','ASC')->get();
        $output='';
        foreach($category as $row){
            $output.='<li>
                <a href="/product-list/'.$row->id.'/0/0/0">'.$row->category.'</a>
            </li>';
        }

        echo $output;
    }


    public static function viewattributefilter() {
        $attributes = attributes::where('status',0)->get();
        $output='';
        foreach($attributes as $row){
        $field = attribute_fields::where('attribute_id',$row->id)->where('status',0)->get();
        $output.='
        <label class="fw-900 mt-15">'.$row->attribute_name.'</label>
        <div class="custome-checkbox">';
        foreach($field as $field1){
            $output.='<input class="form-check-input" type="checkbox" name="attributes[]" id="attributes'.$field1->id.'" value="'.$field1->attributes_value.'" />
            <label class="form-check-label" for="attributes'.$field1->id.'">
                <span>'.$field1->attributes_value.'</span>
            </label>
            <br />';
        }
        $output.='</div>
        ';
        }

        echo $output;
    }




    public function mobilepaymentsuccess() {
        try {
            $paymentId = $_GET['PaymentID'];
            $Result = $_GET['Result'];
            $TranID = $_GET['TranID'];
            $Ref = $_GET['Ref'];
            $TrackID = $_GET['TrackID'];
            $OrderID = $_GET['OrderID'];

            $total = 0;
            $sub_total = 0;
            $shipping_charge = 0;
            $service_charge = 0;
            $getorders = orders::where('invoiceid',$OrderID)->get();
            $order_count = 0;
            foreach($getorders as $row){
                $orders = orders::find($row->id);
                $total = $total + $orders->total;

                $orders->payment_id = $paymentId;
                $orders->invoicestatus = $Result;
                $orders->invoicereference = $Ref;
                $orders->payment_status = 1;
                $orders->save();

                $order_items = order_items::where('order_id',$row->id)->get();
                foreach($order_items as $items){
                    $qty = $items->qty;
                    $pro_id = $items->product_id;
                    
                    $product = product::find($pro_id);
                    $product->stock = $product->stock - $qty;
                    $product->save();
                }
                $order_items_count = order_items::where('order_id',$row->id)->count();
                $billing_address = shipping_address::find($orders->billing_address_id);
                $vendor = vendor::find($orders->vendor_id);
                $customer = User::find($orders->customer_id);
                $settings = settings::find(1);

                $sub_total = $sub_total + $orders->sub_total;
                $service_charge = $service_charge + $orders->service_charge;
                $shipping_charge = $shipping_charge + $orders->shipping_charge;
                $order_count = $order_count + $order_items_count;

                Mail::send('mail.order_confirm',compact('orders','billing_address','vendor','customer','order_items','settings','order_count','sub_total','total','shipping_charge','service_charge'),function($message) use($customer){
                    $message->to($customer->email)->subject('DARSTORE Confirm your Order');
                    $message->from('mail.lrbinfotech@gmail.com','DARSTORE');
                });

                Mail::send('mail.order_confirm_admin',compact('orders','billing_address','vendor','customer','order_items','settings','order_count','sub_total','total','shipping_charge','service_charge'),function($message) use($customer){
                    $message->to('sales@darstore.me')->subject('DARSTORE New Order');
                    $message->from('mail.lrbinfotech@gmail.com','DARSTORE');
                });
    
            }

            $pdf = PDF::loadView('print.print_invoice',compact('orders','billing_address','vendor','customer','order_items','settings'));
            $pdf->setPaper('A4');

            $this->htmloutput('Transcation Success',$paymentId,$total);
            //$this->htmloutput('Transcation Success','7667575','100');

            $msg = 'Invoice is paid.';

            //$response = ['IsSuccess' => 'true', 'Message' => $msg, 'Data' => $data];
        } catch (\Exception $e) {
            $response = ['IsSuccess' => 'false', 'Message' => $e->getMessage()];
        }
        // return response()->json($response);
    }

    public function mobilepaymentfailed() {
        try {
            $paymentId = $_GET['PaymentID'];
            $Result = $_GET['Result'];
            $TranID = $_GET['TranID'];
            $Ref = $_GET['Ref'];
            $TrackID = $_GET['TrackID'];
            $OrderID = $_GET['OrderID'];

            $total = 0;
            $getorders = orders::where('invoiceid',$OrderID)->get();
            foreach($getorders as $row){
                $orders = orders::find($row->id);
                $total = $total + $orders->total;

                $orders->payment_id = $paymentId;
                $orders->invoicestatus = $Result;
                $orders->invoicereference = $Ref;
                $orders->payment_status = 0;
                $orders->save();

                $order_items = order_items::where('order_id',$row->id)->where('status',0)->get();
                foreach($order_items as $row){
                    $qty = $row->qty;
                    $pro_id = $row->product_id;
                    
                    // $product = product::find($pro_id);
                    // $product->stock = $product->stock + $qty;
                    // $product->save();
                }
            }

            $this->htmloutput('Payment Failed',$paymentId,$total);
            //$this->htmloutput('Payment Failed','6554564564','100');

            $msg = 'Invoice is expired.';

            //$response = ['IsSuccess' => 'true', 'Message' => $msg, 'Data' => $data];
        } catch (\Exception $e) {
            $response = ['IsSuccess' => 'false', 'Message' => $e->getMessage()];
        }
        // return response()->json($response);
    }

    public function htmloutput($message,$paymentid,$total) {
        $html_output='
        <html>
        <head>
            <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
        </head>
            <style>
            body {
                text-align: center;
                padding: 40px 0;
                background: #EBF0F5;
            }
            h1 {
                color: #88B04B;
                font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                font-weight: 900;
                font-size: 40px;
                margin-bottom: 10px;
            }
            p {
                color: #404F5E;
                font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                font-size:20px;
                margin: 0;
                }
            i {
                color: #9ABC66;
                font-size: 100px;
                line-height: 200px;
                margin-left:-15px;
            }
            .card {
                background: white;
                padding: 60px;
                border-radius: 4px;
                box-shadow: 0 2px 3px #C8D0D8;
                display: inline-block;
                margin: 0 auto;
            }
            </style>
            <body>
            <div class="card">';
            if($message == 'Transcation Success'){
                $html_output.='<div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                    <i class="checkmark">✓</i>
                </div>';
            }
            else{
                $html_output.='<div style="border-radius:200px; height:200px; width:200px; background:red; margin:0 auto;">
                    <i class="checkmark">X</i>
                </div>';
            }

            $html_output.='<h1>'.$message.'</h1> 
                <p>Transaction ID : '.$paymentid.';<br/>Amount Paid : KWD '.$total.'</p>
                <!-- <p><a href="/customer/orders">Click to Return Dashboard</a></p> -->
            </div>
            </body>
        </html>';
        echo $html_output;
    }



    public function mobilepayment($id) {
        $html_output='
        <html>
        <head>
            <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
        </head>
            <style>
            body {
                text-align: center;
                padding: 40px 0;
                background: #EBF0F5;
            }
            h1 {
                color: #88B04B;
                font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                font-weight: 900;
                font-size: 40px;
                margin-bottom: 10px;
            }
            p {
                color: #404F5E;
                font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                font-size:20px;
                margin: 0;
                }
            i {
                color: #9ABC66;
                font-size: 100px;
                line-height: 200px;
                margin-left:-15px;
            }
            .card {
                background: white;
                padding: 60px;
                border-radius: 4px;
                box-shadow: 0 2px 3px #C8D0D8;
                display: inline-block;
                margin: 0 auto;
            }
            </style>
            <body>
            <div class="card">';
            if($id == '0'){
                $html_output.='<div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                    <i class="checkmark">✓</i>
                </div>';
            }
            else{
                $html_output.='<div style="border-radius:200px; height:200px; width:200px; background:red; margin:0 auto;">
                    <i class="checkmark">X</i>
                </div>';
            }

            if($id == '0'){
                $html_output.='<h1>Payment Success</h1>';
            }
            else{
                $html_output.='<h1>Payment Failed</h1>';
            }
                $html_output.='<!-- <p>Transaction ID : 2342343534;<br/>Amount Paid : KWD 100</p> -->
                <!-- <p><a href="/customer/orders">Click to Return Dashboard</a></p> -->
            </div>
            </body>
        </html>';
        echo $html_output;
    }


    
}
