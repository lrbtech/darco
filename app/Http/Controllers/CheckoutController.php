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

        return view('website.checkout', compact('cart_items'));
    }


    public function saveshippingaddress(Request $request){
        $this->validate($request, [
            //'country'=> 'required',
            'contact_person'=>'required',
            'contact_mobile'=>'required',
            'address_line1'=>'required',
            'city'=>'required',
            'pincode'=>'required',
          ],[
            // 'profile_image.required' => 'Profile Image Field is Required',
        ]);

        $shipping_address = new shipping_address;
        $shipping_address->customer_id = Auth::user()->id;
        $shipping_address->address_type = $request->address_type;
        $shipping_address->landmark = $request->landmark;
        $shipping_address->contact_person= $request->contact_person;
        $shipping_address->contact_mobile= $request->contact_mobile;
        $shipping_address->address_line1= $request->address_line1;
        $shipping_address->address_line2= $request->address_line2;
        $shipping_address->city= $request->city;
        $shipping_address->area= $request->area;
        $shipping_address->pincode= $request->pincode;
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
                if($value->address_type == 0){
                    $output.='<img loading="lazy" src="/website_assets/images/home.png" alt="" />';
                }
                else{
                    $output.='<img loading="lazy" src="/website_assets/images/office-building.png" alt="" />';
                }
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
                if($value->address_type == 0){
                    $output.='<img loading="lazy" src="/website_assets/images/home.png" alt="" />';
                }
                else{
                    $output.='<img loading="lazy" src="/website_assets/images/office-building.png" alt="" />';
                }
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
                //'country'=> 'required',
                'new_contact_person'=>'required',
                'new_contact_mobile'=>'required',
                'new_address_line1'=>'required',
                'new_city'=>'required',
                'new_pincode'=>'required',
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
            $shipping_address->landmark = $request->new_landmark;
            $shipping_address->contact_person= $request->new_contact_person;
            $shipping_address->contact_mobile= $request->new_contact_mobile;
            $shipping_address->address_line1= $request->new_address_line1;
            $shipping_address->address_line2= $request->new_address_line2;
            $shipping_address->city= $request->new_city;
            $shipping_address->area= $request->new_area;
            $shipping_address->pincode= $request->new_pincode;
            $shipping_address->is_active= 0;
            $shipping_address->save();
        }

        $vendor =array();
        foreach(Cart::getContent() as $cart){
            if(!in_array($cart->attributes->vendor_id,$vendor)){
                $vendor[]=$cart->attributes->vendor_id;

            }
        }
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
                $orders->order_message = $request->order_message;


                $orders->sub_total = $sub_total;
                $orders->coupon_code =  $request->coupon_code;
                $orders->discount_value = $discount_value;
                //$orders->after_discount = $after_discount;
                $orders->tax_percentage = '5';
                $orders->tax_amount = $tax_amount;
                $orders->shipping_charge = $shipping_charge;
                $orders->total = $total;
                $orders->payment_type = $request->payment_type;
                $orders->payment_status = 0;
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
                            
                            $product = product::find($pro_id);
                            $product->stock = $product->stock - $qty;
                            
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

        }

        Cart::clear();

        try {
            $paymentMethodId = 0; // 0 for MyFatoorah invoice or 1 for Knet in test mode

            $curlData = $this->getPayLoadData($orders->id);
            $data     = $this->mfObj->getInvoiceURL($curlData, $paymentMethodId);

            $response = ['IsSuccess'=>'true','message'=>'Your Order is Save Successfully','Data'=>$data,'status'=>0];

            $invoice_update = orders::find($orders->id);
            $invoice_update->invoiceid = $data['invoiceId'];
            $invoice_update->invoiceurl = $data['invoiceURL'];
            $invoice_update->save();

        } catch (\Exception $e) {
            $response = ['IsSuccess'=>'false','message'=> $e->getMessage(),'status'=>0];
        }
        return response()->json($response);

    }

    public function onlinepayorder($orderId) {
        // try {
            $paymentMethodId = 0; // 0 for MyFatoorah invoice or 1 for Knet in test mode

            $curlData = $this->getPayLoadData($orderId);
            $data     = $this->mfObj->getInvoiceURL($curlData, $paymentMethodId);

            $response = ['IsSuccess'=>'true','message'=>'Your Order is Save Successfully','Data'=>$data,'status'=>0];

            $invoice_update = orders::find($orderId);
            $invoice_update->invoiceid = $data->invoiceId;
            $invoice_update->invoiceurl = $data->invoiceURL;
            $invoice_update->save();

        // } catch (\Exception $e) {
        //     $response = ['IsSuccess'=>'false','message'=> $e->getMessage(),'status'=>0];
        // }

        return response()->json($response);
        //return response()->json(['message'=>'Your Order is Save Successfully','status'=>0,'Data'=>$data], 200); 
    }

    private function getPayLoadData($orderId = null) {
        $callbackURL = route('myfatoorah.callback');

        $orders = orders::find($orderId);
        $name = Auth::user()->first_name.' '.Auth::user()->last_name;
        return [
            'CustomerName'       => $name,
            'InvoiceValue'       => '5',
            'DisplayCurrencyIso' => 'KWD',
            'CustomerEmail'      => Auth::user()->email,
            'CallBackUrl'        => $callbackURL,
            'ErrorUrl'           => $callbackURL,
            'MobileCountryCode'  => '+965',
            'CustomerMobile'     => Auth::user()->mobile,
            'Language'           => 'en',
            'CustomerReference'  => $orders->id,
            'SourceInfo'         => 'Laravel ' . app()::VERSION . ' - MyFatoorah Package ' . MYFATOORAH_LARAVEL_PACKAGE_VERSION
        ];
    }


    public function ordersuccess(){
        return view('website.order_success');
    }

    public function applyCoupon(Request $request){
        $data = array();
        $today=date('Y-m-d');
        $coupon = coupon::where("status",0)->where('start_date','<=',$today)->where('end_date','>=',$today)->where("coupon_code",$request->coupon_code_value)->first();
        if(!empty($coupon)){
            $cart_items = Cart::getContent();
            $product_total=0;
            $all_product=0;
            $shipping_charge=0;
            
            foreach($cart_items as $product){
                $product_data = product::where("vendor_id",$coupon->vendor_id)->where('id',$product->id)->first();
                if(!empty($product_data)){
                    $product_total+=$product->quantity * $product->price;
                }
                $all_product+= $product->quantity * $product->price;
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
