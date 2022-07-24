@extends('website.layouts1')
@section('extra-css')
@endsection
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Cart
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Your Cart</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">
                        <!-- There are <span class="text-brand">3</span> products in your cart -->
                    </h6>
                    <h6 class="text-body">
                        <a onclick="ClearCart()" href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i>Clear Cart</a>
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <!-- <th class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                    <label class="form-check-label" for="exampleCheckbox11"></label>
                                </th> -->
                                <th style="width:45%;" class="start pl-30" scope="col" colspan="2">Product</th>
                                <th style="width:15%;" scope="col">Unit Price</th>
                                <th style="width:15%;" scope="col">Quantity</th>
                                <th style="width:15%;" scope="col">Price</th>
                                <th style="width:10%;" scope="col" class="end">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                            $sub_total=0;
                            $shipping_charge=0;
                            @endphp
                            @foreach($cart_items as $key => $row)
                            <tr class="pt-30">
                                <!-- <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                    <label class="form-check-label" for="exampleCheckbox1"></label>
                                </td> -->
                                <td class="image product-thumbnail pt-40"><img src="/product_image/{{$row->attributes->product_image}}" alt="#"></td>
                                <td class="product-des product-name">
                                    <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="/product-details/{{$row->id}}">{{$row->name}}</a></h6>
                                    <!-- <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div> -->
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-body">KWD {{$row->price}}</h4>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    <div class="detail-extralink mr-15">
                                        <!-- <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">1</span>
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div> -->
                                        <div class="detail-qty border radius">
                                            <a onclick="UpdateCartMinus({{$key}})" href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">{{$row->quantity}}</span>
                                                <input readonly value="{{$row->quantity}}" type="hidden" name="quantity[]" id="quantity{{$key}}">
                                            <a onclick="UpdateCartPlus({{$key}})" href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </div>
                                    <input value="{{$row->price}}" type="hidden" name="price[]" id="price{{$key}}">
                                    <input value="{{$row->attributes->shipping_charge}}" type="hidden" name="shipping_charge[]" id="shipping_charge{{$key}}">
                                    <input value="{{$row->attributes->vendor_id}}" type="hidden" name="vendor_id[]" id="vendor_id{{$key}}">

                                    <input value="{{$row->attributes->tax_type}}" type="hidden" name="tax_type[]" id="tax_type{{$key}}">
                                    <input value="{{$row->attributes->tax_percentage}}" type="hidden" name="tax_percentage[]" id="tax_percentage{{$key}}">

                                    <input value="{{$row->id}}" type="hidden" name="product_id[]" id="product_id{{$key}}">
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-brand">KWD {{$row->quantity * $row->price}}</h4>
                                </td>
                                <td class="action text-center" data-title="Remove"><a href="#" onclick="RemoveCart({{$row->id}})" class="text-body"><i class="fi-rs-trash"></i></a></td>
                            </tr>
                            @php 
                            $sub_total = $sub_total + ($row->quantity * $row->price); 
                            $shipping_charge = $shipping_charge + ($row->attributes->shipping_charge); 
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between">
                    <a href="/" class="btn"><i class="fi-rs-arrow-left mr-10"></i>Continue Shopping</a>
                    <!-- <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-refresh mr-10"></i>Update Cart</a> -->
                </div>
                <div class="row mt-50">
                    <!-- <div class="col-lg-5">
                        <div class="p-40">
                            <h4 class="mb-10">Apply Coupon</h4>
                            <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</p>
                            <form action="#">
                                <div class="d-flex justify-content-between">
                                    <input class="font-medium mr-15 coupon" name="Coupon" placeholder="Enter Your Coupon">
                                    <button class="btn"><i class="fi-rs-label mr-10"></i>Apply</button>
                                </div>
                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
            @php 
            $tax_amount = round( ($sub_total * 5) / (100 + 5) , 2);
            $total = round($sub_total + ($shipping_charge));
            @endphp
            <input value="{{$sub_total}}" type="hidden" name="sub_total" id="sub_total">
            <input value="5" type="hidden" name="tax_percentage" id="tax_percentage">
            <input value="{{$tax_amount}}" type="hidden" name="tax_amount" id="tax_amount">
            <input value="{{$total}}" type="hidden" name="total" id="total">
            <div class="col-lg-4">
                <div class="border p-md-4 cart-totals ml-30">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Subtotal</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">KWD {{$sub_total}}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="col" colspan="2">
                                        <div class="divider-2 mt-10 mb-10"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Shipping</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        @if($shipping_charge > 0)
                                        <h5 class="text-heading text-end">KWD {{$shipping_charge}}</h4>
                                        @else
                                        <h5 class="text-heading text-end">Free</h4>
                                        @endif
                                    </td> 
                                    
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Tax (5%)</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h5 class="text-heading text-end">KWD {{$tax_amount}}</h4</td> </tr> <tr>
                                    <td scope="col" colspan="2">
                                        <div class="divider-2 mt-10 mb-10"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">KWD {{$total}}</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="/checkout" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('extra-js')
<script>

function ClearCart(){
    var r = confirm("Are you sure");
    if (r == true) {
      spinner_body.show();   
      $.ajax({
        url : '/clear-cart',
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          spinner_body.hide();   
          toastr.success('Cart Cleared Successfully');
          location.reload();
        }
      });
    } 
}

function UpdateCartPlus(row){
    spinner_body.show();
    var product_id = $("#product_id"+row).val();
    var price = $("#price"+row).val();
    var qty = $("#quantity"+row).val();
    var quantity = Number(qty) + 1;
    $.ajax({
        url : '/update-cart/'+product_id+'/'+quantity,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
            spinner_body.hide();             
            // location.href="/cart";
            location.reload();
            toastr.success('Update Successfully');
        },error: function (data) {
            spinner_body.hide(); 
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}

function UpdateCartMinus(row){
    spinner_body.show();
    var product_id = $("#product_id"+row).val();
    var price = $("#price"+row).val();
    var qty = $("#quantity"+row).val();
    var quantity = Number(qty) - 1;
    if(quantity > 0){
        $.ajax({
            url : '/update-cart/'+product_id+'/'+quantity,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {   
                spinner_body.hide();             
                // location.href="/cart";
                location.reload();
                toastr.success('Update Successfully');
            },error: function (data) {
                spinner_body.hide(); 
                var errorData = data.responseJSON.errors;
                $.each(errorData, function(i, obj) {
                    toastr.error(obj[0]);
                });
            }
        });
    }
    else{
        spinner_body.hide();  
    }
}


// $('.detail-qty').each(function () {
//     //var qtyval = parseInt($(this).find('.qty-val').text(), 10);
//     var qtyval = parseInt($('#quantity').val());
//     $('.qty-up').on('click', function (event) {
//         event.preventDefault();
//         qtyval = qtyval + 1;
//         $('.qty-val').text(qtyval);
//         $('#quantity').val(qtyval);
//     });
//     $('.qty-down').on('click', function (event) {
//         event.preventDefault();
//         qtyval = qtyval - 1;
//         if (qtyval > 1) {
//             $('.qty-val').text(qtyval);
//             $('#quantity').val(qtyval);
//         } else {
//             qtyval = 1;
//             $('.qty-val').text(qtyval);
//             $('#quantity').val(qtyval);
//         }
//     });
// });

</script>
@endsection