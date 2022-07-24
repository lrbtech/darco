<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
   
    public function cartlist()
    {
        $cart_items = Cart::getContent();
        // dd($cartItems);
        return view('website.cart', compact('cart_items'));
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
        Cart::update(
            $product_id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $quantity,
                ],
            ]
        );
        

          
        // session()->flash('success', 'Item Cart is Updated Successfully !');

        return response()->json('update successfully'); 
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
