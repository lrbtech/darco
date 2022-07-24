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
use App\Models\order_attributes;
use App\Models\product_attributes;
use App\Models\product_images;
use App\Models\attributes;
use App\Models\attribute_fields;
use App\Models\product_group;
use Hash;
use DB;
use Mail;
use Auth;
use Cart;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
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

        if($request->shipping_address == 'on'){
            $this->validate($request, [
                //'country'=> 'required',
                'new_contact_person'=>'required',
                'new_contact_mobile'=>'required',
                'new_address_line1'=>'required',
                'new_city'=>'required',
                'new_pincode'=>'required',
            ],[
                // 'profile_image.required' => 'Profile Image Field is Required',
            ]);
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

        for ($x=0; $x<count($_POST['product_id']); $x++) 
    	{
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
            $orders->vendor_id = $_POST['vendor_id'][$x];
            $orders->order_message = $request->order_message;
            $orders->product_id = $_POST['product_id'][$x];
            $orders->product_name = $_POST['product_name'][$x];
            $orders->qty = $_POST['quantity'][$x];
	        $orders->price = $_POST['price'][$x];


            $sub_total = ( $_POST['quantity'][$x] * $_POST['price'][$x] );

            $after_discount = $sub_total;

            $tax_amount = round( ($after_discount * 5) / (100 + 5) , 2);
            $total = round($after_discount + ($_POST['shipping_charge'][$x]));


	        $orders->sub_total = $sub_total;
            $orders->coupon_id =  $request->coupon_id;
            $orders->coupon_code =  $request->coupon_code;
	        // $orders->discount_percentage = $_POST['discount_percentage'][$x];
	        // $orders->discount_amount = $_POST['discount_amount'][$x];
	        $orders->after_discount = $after_discount;
	        $orders->tax_percentage = '5';
	        $orders->tax_amount = $tax_amount;
            $orders->shipping_charge = $_POST['shipping_charge'][$x];
	        $orders->total = $total;


	        if($_POST['product_id'][$x]!=""){
	        	$qty = $_POST['quantity'][$x];
				$pro_id = $_POST['product_id'][$x];
				
				$product = product::find($pro_id);
				$product->stock = $product->stock - $qty;
                
                $orders->save();
				$product->save();
	    	}

            $list = product_attributes::where('product_id',$orders->product_id)->get();

            $product_attributes='';
            foreach($list as $list1){
                $attributes = attributes::find($list1->attribute_id);

                $order_attributes = new order_attributes;
                $order_attributes->order_id = $orders->id;
                $order_attributes->product_id = $orders->product_id;
                $order_attributes->attribute_name = $attributes->attribute_name;
                $order_attributes->attribute_value = $list1->attribute_value;
                $order_attributes->save();

                $product_attributes.='<p>'.$attributes->attribute_name.' : '.$list1->attribute_value.'</p>';
            }

            $order_update = orders::find($orders->id);
            $order_update->product_attributes = $product_attributes;
            $order_update->save();

    	}

        Cart::clear();

        return response()->json('Successfully Save'); 

    }

    public function ordersuccess(){
        return view('website.order_success');
    }

    public function onlinepay(){
        if (! function_exists( 'curl_version' )) {
            exit ( "Enable cURL in PHP" );
        }
        $fields = array(
        'merchant_id'=>'1201',
        'username' => 'test',
        'password'=>stripslashes('test'), 'api_key'=>'jtest123', // in sandbox request
        //'api_key' =>password_hash('API_KEY',PASSWORD_BCRYPT), 
        'order_id'=>time(), 
        'total_price'=>'10',
        'CurrencyCode'=>'KWD',//only works in production mode
        'CstFName'=>'Test Name',
        'CstEmail'=>'test@test.com',
        'CstMobile'=>'12345678',
        'success_url'=>'https://example.com/success.html',
        'error_url'=>'https://example.com/error.html',
        'test_mode'=>1, // test mode enabled
        'whitelabled'=>true, // only accept in live credentials (it will not work in test)
        'payment_gateway'=>'knet',// only works in production mode
        'ProductName'=>json_encode(['computer','television']),
        'ProductQty'=>json_encode([2,1]),
        'ProductPrice'=>json_encode([150,1500]),
        'reference'=>'Ref00001', // Reference that you want to show in invoice in ref column
        // 'ExtraMerchantsData'=>json_encode($extraMerchantsData)
        );
        $fields_string = http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://api.upayments.com/test-payment");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        $server_output = json_decode($server_output,true);
        echo $server_output['paymentURL'];
        // header(‘Location:’.$server_output[‘paymentURL’]); 
    }

    
}
