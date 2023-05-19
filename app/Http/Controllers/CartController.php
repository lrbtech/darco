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
use Hash;
use DB;
use Mail;
use Auth;
use Cart;
use Session;

class CartController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Kuwait");
        date_default_timezone_get();
        Session::put('lang', 'english');
    }
   
    public function cartlist()
    {
        $cart_items = Cart::getContent();
        // dd($cartItems);
        $language = language::all();
        return view('website.cart', compact('cart_items','language'));
    }

    public function qrcodeaddtocard($sku_value){
        $product = product::where('sku_value',$sku_value)->first();
        Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'quantity' => 1,
            'price' => $product->sales_price,
            'attributes' => array(
                'product_image' => $product->image,
                'vendor_id' => $product->vendor_id,
                'shipping_charge' => $product->shipping_charge,
                'tax_type' => $product->tax_type,
                'tax_percentage' => 5,
            )
        ]);

        $cart_items = Cart::getContent();
        $language = language::all();
        return view('website.cart', compact('cart_items','language'));
    }

    public function addtocart(Request $request)
    {
        $this->validate($request, [
            'quantity' => 'required',
        ]);

        // Cart::add(array(
        //     'id' => $request->product_id,
        //     'name' => $request->name,
        //     'quantity' => $request->quantity,
        //     'price' => $request->price,
        //     'attributes' => array(
        //         'product_image' => $request->product_image,
        //         'vendor_id' => $request->vendor_id,
        //     )
        // ));

        Cart::add([
            'id' => $request->product_id,
            'name' => $request->product_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'attributes' => array(
                'product_image' => $request->product_image,
                'vendor_id' => $request->vendor_id,
                'shipping_charge' => $request->shipping_charge,
                'tax_type' => $request->tax_type,
                'tax_percentage' => $request->tax_percentage,
            )
        ]);

        // session()->flash('success', 'Product is Added to Cart Successfully !');

       // return response()->json($request); 
        return response()->json('save successfully'); 
    }

    public function updatecart($product_id,$quantity)
    {
        $product = product::find($product_id);
        
        if($quantity > $product->stock){
            $message = $product->product_name.' Out of Stock';
            return response()->json(['message' => $message,'status'=>2], 200);
        }
        Cart::update(
            $product_id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $quantity,
                ],
            ]
        );

        return response()->json(['message'=>'Your Order is Save Successfully','status'=>0], 200); 
        

          
        // session()->flash('success', 'Item Cart is Updated Successfully !');

        //return response()->json('update successfully'); 
    }

    public function removecart($id)
    {
        Cart::remove($id);
        // session()->flash('success', 'Item Cart Remove Successfully !');

        return response()->json('remove successfully'); 
    }

    public function clearallcart()
    {
        Cart::clear();

        // session()->flash('success', 'All Item Cart Clear Successfully !');

        return response()->json('clear successfully'); 
    }
}
