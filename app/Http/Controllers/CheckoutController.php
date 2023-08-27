<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\vendor;
use App\Models\vendor_project;
use App\Models\User;
use App\Models\shipping_address;
use App\Models\orders;
use App\Models\order_items;
use App\Models\order_attributes;
use App\Models\product_attributes;
use App\Models\product_images;
use App\Models\attributes;
use App\Models\attribute_fields;
use App\Models\product_group;
use App\Models\coupon;
use App\Models\language;
use App\Models\settings;
use App\Models\api_country;
use App\Models\api_city;
use App\Models\api_state;
use Hash;
use DB;
use Mail;
use Auth;
use Cart;
use MyFatoorah\Library\PaymentMyfatoorahApiV2;

class CheckoutController extends Controller
{
    public $mfObj;

    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();

        $this->mfObj = new PaymentMyfatoorahApiV2(config('myfatoorah.api_key'), config('myfatoorah.country_iso'), config('myfatoorah.test_mode'));
    }

    public function checkout()
    {
        $cart_items = Cart::getContent();
        $language = language::all();
        $countrydata = api_country::all();
        return view('website.checkout', compact('cart_items','language','countrydata'));
    }


    public function saveshippingaddress(Request $request){
        $this->validate($request, [
            'contact_person'=>'required',
            'contact_mobile'=>'required',
            'address_line1'=>'required',
            'city'=>'required',
            'street'=>'required',
            'street_name'=>'required',
            'country'=>'required',
            'city'=>'required',
          ],[
            // 'profile_image.required' => 'Profile Image Field is Required',
        ]);

        $shipping_address = new shipping_address;
        $shipping_address->customer_id = Auth::user()->id;
        $shipping_address->address_type = $request->address_type;
        //$shipping_address->landmark = $request->landmark;
        $shipping_address->contact_person= $request->contact_person;
        $shipping_address->contact_mobile= $request->contact_mobile;
        $shipping_address->street= $request->street;
        $shipping_address->street_name= $request->street_name;
        $shipping_address->block= $request->block;
        $shipping_address->avenue= $request->avenue;
        $shipping_address->building_no= $request->building_no;
        $shipping_address->floor_no= $request->floor_no;
        $shipping_address->apartment_no= $request->apartment_no;
        $shipping_address->additional_description= $request->additional_description;
        $api_country = api_country::find($request->country);
        $shipping_address->country= $api_country->name;
        $api_state = api_state::find($request->city);
        $shipping_address->city= $api_state->name;
        $shipping_address->area= $request->area;
        $shipping_address->is_active= 1;
        $shipping_address->save();

        return response()->json($shipping_address->id); 
    }

    public function viewshippingaddress()
    {
        $shipping_address = shipping_address::where('customer_id',Auth::user()->id)->get();
        $output = '';
        foreach ($shipping_address as $key => $value) {
            if($value->is_active == 1){
            $output.='
            <label class="plan basic-plan" for="billing_address_id'.$key.'">
            <input value="'.$value->id.'" checked type="radio" name="billing_address_id" id="billing_address_id'.$key.'" />
            <div class="plan-content">';
                //if($value->address_type == 0){
                    $output.='<img loading="lazy" src="/website_assets/images/home.png" alt="" />';
                // }
                // else{
                //     $output.='<img loading="lazy" src="/website_assets/images/office-building.png" alt="" />';
                // }
                $output.='<div class="plan-details">
                <span>'.$value->contact_person.' , '.$value->contact_mobile.'</span>
                <p>'.$value->address_line1.' , '.$value->address_line2.' </p>
                </div>
            </div>
            </label>
            ';
            }
            else{
            $output.='
            <label class="plan basic-plan" for="billing_address_id'.$key.'">
            <input value="'.$value->id.'" type="radio" name="billing_address_id" id="billing_address_id'.$key.'" />
            <div class="plan-content">';
                //if($value->address_type == 0){
                    $output.='<img loading="lazy" src="/website_assets/images/home.png" alt="" />';
                // }
                // else{
                //     $output.='<img loading="lazy" src="/website_assets/images/office-building.png" alt="" />';
                // }
                $output.='<div class="plan-details">
                <span>'.$value->contact_person.' , '.$value->contact_mobile.'</span>
                <p>'.$value->address_line1.' , '.$value->address_line2.' </p>
                </div>
            </div>
            </label>
            ';
            }
        }

        echo $output;
    }


    public function saveorder(Request $request){
        
        $this->validate($request, [
            'billing_address_id'=>'required',
        ]);
        if($request->shipping_address == 'on'){
            $this->validate($request, [
                'new_contact_person'=>'required',
                'new_contact_mobile'=>'required',
                'new_address_line1'=>'required',
                'new_city'=>'required',
                'new_street'=>'required',
                'new_street_name'=>'required',
                'new_country'=>'required',
                'new_city'=>'required',
            ]);
        }

        foreach(Cart::getContent() as $pro_item){
            $pro_id = $pro_item->id;
            $qty = $pro_item->quantity;
            $product = product::find($pro_id);
            
            if($qty > $product->stock){
                $message = $product->product_name.' Out of Stock Please Remove and Continue';
                return response()->json(['message' => $message,'status'=>2], 200);
            }

        }

        if($request->shipping_address == 'on'){
            $shipping_address = new shipping_address;
            $shipping_address->customer_id = Auth::user()->id;
            $shipping_address->address_type = $request->new_address_type;
            //$shipping_address->landmark = $request->new_landmark;
            $shipping_address->contact_person= $request->new_contact_person;
            $shipping_address->contact_mobile= $request->new_contact_mobile;
            $shipping_address->street= $request->new_street;
            $shipping_address->street_name= $request->new_street_name;
            $shipping_address->block= $request->new_block;
            $shipping_address->avenue= $request->new_avenue;
            $shipping_address->building_no= $request->new_building_no;
            $shipping_address->floor_no= $request->new_floor_no;
            $shipping_address->apartment_no= $request->new_apartment_no;
            $shipping_address->additional_description= $request->new_additional_description;
            $api_country = api_country::find($request->new_country);
            $shipping_address->country= $api_country->name;
            $api_state = api_state::find($request->new_city);
            $shipping_address->city= $api_state->name;
            $shipping_address->area= $request->new_area;
            $shipping_address->is_active= 0;
            $shipping_address->save();
        }

        $vendor =array();
        foreach(Cart::getContent() as $cart){
            if(!in_array($cart->attributes->vendor_id,$vendor)){
                $vendor[]=$cart->attributes->vendor_id;

            }
        }
        $onlinepayorderid =array();
        foreach($vendor as $current_vendor){
        
                $sub_total=0;
                $shipping_charge=0;
                foreach(Cart::getContent() as $cart_item){
                    if($current_vendor == $cart_item->attributes->vendor_id){
                        $sub_total = $sub_total + ($cart_item->quantity * $cart_item->price);
                        $shipping_charge = $shipping_charge + $cart_item->attributes->shipping_charge;
                    }
                }

                $coupon_code = ' ';
                $discount_value = 0;
                if($request->coupon == "true"){
                    if($current_vendor == $request->coupon_vendor_id){
                        $coupon_code = $request->coupon_code;
                        $discount_value = $request->coupon_amount;
                    }
                    else{
                        $coupon_code = ' ';
                        $discount_value = 0;
                    }
                }
                else{
                    $coupon_code = ' ';
                    $discount_value = 0;
                }

                // $after_discount = $sub_total;
        
                $total = round( ($sub_total + $shipping_charge) -$discount_value  );
                $tax_amount = round( ($total * 5) / (100 + 5) , 2);

                $orders = new orders;
                $orders->date = date('Y-m-d');
                $orders->customer_id = Auth::user()->id;
                $orders->billing_address_id = $request->billing_address_id;
                if($request->shipping_address == 'on'){
                    $orders->shipping_address_id = $shipping_address->id;
                }
                else{
                    $orders->shipping_address_id = $request->billing_address_id;
                }
                $orders->vendor_id = $current_vendor;
                // $orders->order_message = $request->order_message;


                $orders->sub_total = $sub_total;
                $orders->coupon_code =  $request->coupon_code;
                $orders->discount_value = $discount_value;
                //$orders->after_discount = $after_discount;
                $orders->tax_percentage = '5';
                $orders->tax_amount = $tax_amount;
                $orders->shipping_charge = $shipping_charge;
                $orders->service_charge = $request->service_charge;
                $orders->total = $total + $request->service_charge;
                $orders->payment_type = $request->payment_type;
                $orders->payment_status = 0;

                $vendor_commission = vendor::find($current_vendor);
                $commission_amount = ($vendor_commission->vendor_commission / 100) * $total;

                $orders->commission_percentage = $vendor_commission->vendor_commission;
                $orders->commission_amount = $commission_amount;
                $orders->save();


                foreach(Cart::getContent() as $cart_item1){
                    if($current_vendor == $cart_item1->attributes->vendor_id){
                        $order_items = new order_items;
                        $order_items->date = date('Y-m-d');
                        $order_items->order_id = $orders->id;
                        $order_items->customer_id = Auth::user()->id;
                        $order_items->vendor_id = $current_vendor;
                        $order_items->billing_address_id = $request->billing_address_id;
                        if($request->shipping_address == 'on'){
                            $order_items->shipping_address_id = $shipping_address->id;
                        }
                        else{
                            $order_items->shipping_address_id = $request->billing_address_id;
                        }

                        $order_items->product_id = $cart_item1->id;
                        $order_items->product_name = $cart_item1->name;
                        $order_items->qty = $cart_item1->quantity;
                        $order_items->price = $cart_item1->price;
                        $order_items->total = $cart_item1->quantity * $cart_item1->price;

                        if($cart_item1->id!=""){
                            $qty = $cart_item1->quantity;
                            $pro_id = $cart_item1->id;
                            
                            // $product = product::find($pro_id);
                            // $product->stock = $product->stock - $qty;
                            
                            $today = date('Y-m-d');
                            $order_items->return_policy = $product->return_policy;
                            $order_items->return_date = date('Y-m-d', strtotime($today . '+'.$product->return_days.'days'));
                            $order_items->save();
                            $product->save();
                        }

                        $list = product_attributes::where('product_id',$order_items->product_id)->get();

                        $product_attributes='';
                        foreach($list as $list1){
                            $attributes = attributes::find($list1->attribute_id);

                            $order_attributes = new order_attributes;
                            $order_attributes->order_id = $orders->id;
                            $order_attributes->product_id = $order_items->product_id;
                            $order_attributes->attribute_name = $attributes->attribute_name;
                            $order_attributes->attribute_value = $list1->attribute_value;
                            $order_attributes->save();

                            $product_attributes.='<p>'.$attributes->attribute_name.' : '.$list1->attribute_value.'</p>';
                        }

                        $order_items_update = order_items::find($order_items->id);
                        $order_items_update->product_attributes = $product_attributes;
                        $order_items_update->save();

                    }
                }

            $onlinepayorderid[] = $orders->id;

        }

        $orderids = implode('.', $onlinepayorderid);

        //Cart::clear();

        // try {
        //     $paymentMethodId = 0; // 0 for MyFatoorah invoice or 1 for Knet in test mode

        //     $curlData = $this->getPayLoadData($orderids);
        //     $data     = $this->mfObj->getInvoiceURL($curlData, $paymentMethodId);

        //     $response = ['IsSuccess'=>'true','message'=>'Your Order is Save Successfully','Data'=>$data,'status'=>0];

        //     foreach(explode('.', $orderids) as $ids){
        //         $invoice_update = orders::find($ids);
        //         $invoice_update->invoiceid = $data['invoiceId'];
        //         $invoice_update->invoiceurl = $data['invoiceURL'];
        //         $invoice_update->save();
        //     }

        // } catch (\Exception $e) {
        //     $response = ['IsSuccess'=>'false','message'=> $e->getMessage(),'status'=>0];
        // }
        try {
            $invoice_id = time();
            $data = $this->onlinepay($orderids,$invoice_id);

            $response = ['IsSuccess'=>'true','message'=>'Your Order is Save Successfully','Data'=>$data,'status'=>0];
            
            foreach(explode('.', $orderids) as $ids){
                $invoice_update = orders::find($ids);
                $invoice_update->invoiceid = $invoice_id;
                $invoice_update->invoiceurl = $data['paymentURL'];
                $invoice_update->save();
            }

        } catch (\Exception $e) {
            $response = ['IsSuccess'=>'false','message'=> $e->getMessage(),'status'=>0];
        }
        return response()->json($response);

    }


    public function onlinepay($orderId,$invoice_id) {
        $total = 0;
        foreach(explode('.', $orderId) as $ids){
            $orders = orders::find($ids);
            $total = $total + $orders->total;
        }
        $name = Auth::user()->first_name.' '.Auth::user()->last_name;

        $request_data=array(
            //real account
            'merchant_id'=>'27772',
            'username' =>'abdulrahman',
            'password'=>stripslashes('GSSWj0DHhjms'),
            'api_key' =>password_hash('e766116092e3efc2f2f60a02d8353924ceaa3022',PASSWORD_BCRYPT),
            'test_mode'=>0,

            //sand box
            // 'merchant_id'=>'1201',
            // 'username' =>'test',
            // 'password'=>stripslashes('test'),
            // 'api_key'=>'jtest123', // in sandbox request
            // 'test_mode'=>1,

            'order_id'=>$invoice_id,
            'CurrencyCode'=>'KWD',//'KWD','SAR','USD','BHD','EUR','OMR','QAR','AED' and others,Please ask our support to activate
            'total_price'=>0.01,
            'CstFName'=>$name,			
            'CstEmail'=>Auth::user()->email,
            'CstMobile'=>Auth::user()->mobile,
            'customer_unq_token'=>Auth::user()->user_unique_id,
            'success_url'=>"https://darstore.me/payment-success",
            'error_url'=>'https://darstore.me/payment-failed',
            'notifyURL'=>'https://darstore.me/payment-success',
        );
    
        $fields_string = http_build_query($request_data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL,"https://api.upayments.com/payment-request");// Production Request URL
        //curl_setopt($ch, CURLOPT_URL,"https://api.upayments.com/test-payment"); //Test Request URL
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);
    
        return $server_output = json_decode($server_output,true);

        // echo "<pre>";
        // print_r($server_output);
        // exit;
    }

    public function paymentsuccess() {
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

            $msg = 'Invoice is paid.';

            //$response = ['IsSuccess' => 'true', 'Message' => $msg, 'Data' => $data];
        } catch (\Exception $e) {
            $response = ['IsSuccess' => 'false', 'Message' => $e->getMessage()];
        }
        // return response()->json($response);
    }

    public function paymentfailed() {
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
                <p><a href="/customer/orders">Click to Return Dashboard</a></p>
            </div>
            </body>
        </html>';
        echo $html_output;
    }


    private function getPayLoadData($orderId = null) {
        $callbackURL = route('myfatoorah.callback');

        $total = 0;
        foreach(explode('.', $orderId) as $ids){
            $orders = orders::find($ids);
            $total = $total + $orders->total;
        }
        $name = Auth::user()->first_name.' '.Auth::user()->last_name;
        return [
            'CustomerName'       => $name,
            'InvoiceValue'       => $total,
            'DisplayCurrencyIso' => 'KWD',
            'CustomerEmail'      => Auth::user()->email,
            'CallBackUrl'        => $callbackURL,
            'ErrorUrl'           => $callbackURL,
            'MobileCountryCode'  => '+965',
            'CustomerMobile'     => Auth::user()->mobile,
            'Language'           => 'en',
            'CustomerIdentifier' => Auth::user()->user_unique_id,
            'CustomerReference'  => $orderId,
            'SourceInfo'         => 'Laravel ' . app()::VERSION . ' - MyFatoorah Package ' . MYFATOORAH_LARAVEL_PACKAGE_VERSION
        ];
    }


    public function ordersuccess(){
        $language = language::all();
        return view('website.order_success',compact('language'));
    }

    public function applyCoupon(Request $request){
        $data = array();
        $today=date('Y-m-d');
        $coupon = coupon::where('status',0)->where('start_date','<=',$today)->where('end_date','>=',$today)->where('coupon_code',$request->coupon_code_value)->first();
        if(!empty($coupon)){
            $cart_items = Cart::getContent();
            $product_total=0;
            $all_product=0;
            $shipping_charge=0;
            
            foreach($cart_items as $product){
                $product_data = product::where("vendor_id",$coupon->vendor_id)->where('id',$product->id)->first();
                if(!empty($product_data)){
                    $product_total += $product->quantity * $product->price;
                }
                $all_product += $product->quantity * $product->price;
                $shipping_charge += $product->attributes->shipping_charge;
            }
            if($product_total !=0){
                if($coupon->min_order_value <= $product_total){
                    $discount_value=0;
                    if($coupon->value_type==2){
                        $discount_value = ($coupon->coupon_value / 100) * $product_total;
                    }else{
                        if($product_total >= $coupon->max_coupon_value){
                            $discount_value = $coupon->coupon_value;
                        }else{
                            $discount_value = $product_total;
                        }
                    }
                    $data = array(
                        "msg"=>"Coupon Applied Successfully",
                        "status"=>0,
                        "discount"=>$discount_value,
                        "total"=> ($all_product +$shipping_charge)-$discount_value,
                        "vendor_id"=>$coupon->vendor_id
                    ); 
                }else{
                    $data = array(
                        "msg"=>"Minimum Order Value is ".$coupon->min_order_value."KD!",
                        "status"=>1
                    ); 
                }
            }else{
                $data = array(
                    "msg"=>"Coupon Code Not Match!",
                    "status"=>1
                ); 
            }   
        }else{
            $data = array(
                "msg"=>"Invalid Coupon Code!",
                "status"=>1
            );
        }
        return response()->json(["data"=>$data],200);  
    }
    
}
