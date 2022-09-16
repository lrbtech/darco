@extends('website.layouts')
@section('extra-css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
.plans {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;

  max-width: 970px;
  /* padding: 85px 50px; */
  padding: 25px 20px;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  background: #fff;
  border-radius: 20px;
  /* -webkit-box-shadow: 0px 8px 10px 0px #d8dfeb;
  box-shadow: 0px 8px 10px 0px #d8dfeb; */
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}

.plans .plan input[type="radio"] {
  position: absolute;
  opacity: 0;
}

.plans .plan {
  cursor: pointer;
  width: 100%;
}

.plans .plan .plan-content {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  padding: 10px;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  border: 2px solid #e1e2e7;
  border-radius: 10px;
  -webkit-transition: -webkit-box-shadow 0.4s;
  transition: -webkit-box-shadow 0.4s;
  -o-transition: box-shadow 0.4s;
  transition: box-shadow 0.4s;
  transition: box-shadow 0.4s, -webkit-box-shadow 0.4s;
  position: relative;
}

.plans .plan .plan-content img {
  margin-right: 30px;
  height: 72px;
}

.plans .plan .plan-details span {
  margin-bottom: 10px;
  display: block;
  font-size: 20px;
  line-height: 24px;
  color: #252f42;
}

.container .title {
  font-size: 16px;
  font-weight: 500;
  -ms-flex-preferred-size: 100%;
  flex-basis: 100%;
  color: #252f42;
  margin-bottom: 20px;
}

.plans .plan .plan-details p {
  color: #646a79;
  font-size: 14px;
  line-height: 18px;
}

.plans .plan .plan-content:hover {
  -webkit-box-shadow: 0px 3px 5px 0px #e8e8e8;
  box-shadow: 0px 3px 5px 0px #e8e8e8;
}

.plans .plan input[type="radio"]:checked + .plan-content:after {
  content: "";
  position: absolute;
  height: 8px;
  width: 8px;
  background: #216fe0;
  right: 20px;
  top: 20px;
  border-radius: 100%;
  border: 3px solid #fff;
  -webkit-box-shadow: 0px 0px 0px 2px #0066ff;
  box-shadow: 0px 0px 0px 2px #0066ff;
}

.plans .plan input[type="radio"]:checked + .plan-content {
  border: 2px solid #216ee0;
  background: #eaf1fe;
  -webkit-transition: ease-in 0.3s;
  -o-transition: ease-in 0.3s;
  transition: ease-in 0.3s;
}

@media screen and (max-width: 991px) {
  .plans {
    margin: 0 20px;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    padding: 40px;
  }

  .plans .plan {
    width: 100%;
  }

  .plan.complete-plan {
    margin-top: 20px;
  }

  .plans .plan .plan-content .plan-details {
    width: 70%;
    display: inline-block;
  }

  .plans .plan input[type="radio"]:checked + .plan-content:after {
    top: 45%;
    -webkit-transform: translate(-50%);
    -ms-transform: translate(-50%);
    transform: translate(-50%);
  }
}

@media screen and (max-width: 767px) {
  .plans .plan .plan-content .plan-details {
    width: 60%;
    display: inline-block;
  }
}

@media screen and (max-width: 540px) {
  .plans .plan .plan-content img {
    margin-bottom: 20px;
    height: 56px;
    -webkit-transition: height 0.4s;
    -o-transition: height 0.4s;
    transition: height 0.4s;
  }

  .plans .plan input[type="radio"]:checked + .plan-content:after {
    top: 20px;
    right: 10px;
  }

  .plans .plan .plan-content .plan-details {
    width: 100%;
  }

  .plans .plan .plan-content {
    padding: 20px;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: baseline;
    -ms-flex-align: baseline;
    align-items: baseline;
  }
}

</style>
@endsection
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <!-- <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart</h6>
                </div>
            </div>
        </div> -->
        <form id="form" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-lg-7">
                {{--<div class="row mb-50">
                    <!-- <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                        <div class="toggle_info">
                            <span><i class="fi-rs-user mr-10"></i><span class="text-muted font-lg">Already have an account?</span> <a href="#loginform" data-bs-toggle="collapse" class="collapsed font-lg" aria-expanded="false">Click here to login</a></span>
                        </div>
                        <div class="panel-collapse collapse login_form" id="loginform">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Username Or Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                                <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                            </div>
                                        </div>
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-md" name="login">Log in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-lg-6">
                        <!-- <form class="apply-coupon"> -->
                          <input type="text" placeholder="Enter Coupon Code...">
                          <button type="button" class="btn  btn-md" name="login">Apply Coupon</button>
                        <!-- </form> -->
                    </div>
                </div>--}}
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    
                        <div class="row plans">
                          <div id="view_address">
                            <!-- <label class="plan basic-plan" for="address_id1">
                              <input type="radio" name="plan" id="address_id1" />
                              <div class="plan-content">
                                  <img loading="lazy" src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="" />
                                  <div class="plan-details">
                                  <span>Basic</span>
                                  <p>For smaller business, with simple salaries and pay schedules.</p>
                                  </div>
                              </div>
                            </label> -->
                          </div>

                          <div class="text-center">
                              <center><a href="javascript:void(0)" id="addaddress" class="btn btn-mod btn-large btn-round btn-default">Add New Address</a></center>
                          </div> 
                        </div>
                        <br>

                        <div id="create_address">
                        <div class="row">
                            <div class="form-group col-lg-6">
                              <label>Address Type <span class="asterisk">*</span></label>
                              <div class="custome-radio">
                                  <input value="0" class="form-check-input" type="radio" name="address_type" id="address_type1"/>
                                  <label class="form-check-label" for="address_type1" >Home (7am-9pm, all days)</label>
                              </div>
                              <div class="custome-radio">
                                  <input value="1"  class="form-check-input" type="radio" name="address_type" id="address_type2" />
                                  <label class="form-check-label" for="address_type2">Office (9am-6pm, Weekdays)</label>
                              </div>
                          </div>
                          <div class="form-group col-lg-6">
                            <label>Contact Person <span class="asterisk">*</span></label>
                            <input type="text" id="contact_person" name="contact_person" placeholder="Contact Person *">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-6">
                            <label>Contact Mobile <span class="asterisk">*</span></label>
                            <input type="text" id="contact_mobile" name="contact_mobile" placeholder="Contact Mobile">
                          </div>
                          <div class="form-group col-lg-6">
                            <label>Landmark <span class="asterisk">*</span></label>
                            <input type="text" id="landmark" name="landmark" placeholder="Landmark">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-12">
                            <label>Street address <span class="asterisk">*</span></label>
                            <input type="text" id="address_line1" name="address_line1" placeholder="Door No., Street address">
                            <br>
                            <input type="text" id="address_line2" name="address_line2" placeholder="Apartment, suite (optional)">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-6">
                            <label>City <span class="asterisk">*</span></label>
                            <input type="text" id="city" name="city" placeholder="City">
                          </div>
                          <div class="form-group col-lg-6">
                            <label>Area <span class="asterisk">*</span></label>
                            <input type="text" id="area" name="area" placeholder="Area">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-12">
                            <label>Pincode <span class="asterisk">*</span></label>
                            <input type="text" id="pincode" name="pincode" placeholder="Pincode">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <button onclick="SaveAddress()" type="button" class="btn btn-dark">Save Address</button>
                            <button onclick="HideAddress()" type="button" class="btn">Cancel</button>
                          </div>
                        </div>
                        </div>
                        
                        <br>
                        <div class="ship_detail">
                            <div class="form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="shipping_address" id="shipping_address">
                                        <label class="form-check-label label_info" data-bs-toggle="collapse" data-target="#shippingaddress" href="#shippingaddress" aria-controls="shippingaddress" for="shipping_address"><span>Ship to a different address?</span></label>
                                    </div>
                                </div>
                            </div>
                            <div id="shippingaddress" class="different_address collapse in">

                              <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>Address Type <span class="asterisk">*</span></label>
                                    <div class="custome-radio">
                                        <input value="0" class="form-check-input" type="radio" name="new_address_type" id="new_address_type1"/>
                                        <label class="form-check-label" for="new_address_type1" >Home (7am-9pm, all days)</label>
                                    </div>
                                    <div class="custome-radio">
                                        <input value="1"  class="form-check-input" type="radio" name="new_address_type" id="new_address_type2" />
                                        <label class="form-check-label" for="new_address_type2">Office (9am-6pm, Weekdays)</label>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                  <label>Contact Person <span class="asterisk">*</span></label>
                                  <input type="text" id="new_contact_person" name="new_contact_person" placeholder="Contact Person *">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-lg-6">
                                  <label>Contact Mobile <span class="asterisk">*</span></label>
                                  <input type="text" id="new_contact_mobile" name="new_contact_mobile" placeholder="Contact Mobile">
                                </div>
                                <div class="form-group col-lg-6">
                                  <label>Landmark <span class="asterisk">*</span></label>
                                  <input type="text" id="new_landmark" name="new_landmark" placeholder="Landmark">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-lg-12">
                                  <label>Street address <span class="asterisk">*</span></label>
                                  <input type="text" id="new_address_line1" name="new_address_line1" placeholder="Door No., Street address">
                                  <br>
                                  <input type="text" id="new_address_line2" name="new_address_line2" placeholder="Apartment, suite (optional)">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-lg-6">
                                  <label>City <span class="asterisk">*</span></label>
                                  <input type="text" id="new_city" name="new_city" placeholder="City">
                                </div>
                                <div class="form-group col-lg-6">
                                  <label>Area <span class="asterisk">*</span></label>
                                  <input type="text" id="new_area" name="new_area" placeholder="Area">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-lg-12">
                                  <label>Pincode <span class="asterisk">*</span></label>
                                  <input type="text" id="new_pincode" name="new_pincode" placeholder="Pincode">
                                </div>
                              </div>


                            </div>
                        </div>

                        <div class="form-group mb-30">
                            <textarea name="order_message" id="order_message" rows="3" placeholder="Additional information"></textarea>
                        </div>
                    
                </div>
            </div>
            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-20">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h6 class="text-muted">Subtotal</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                      <table class="table no-border">
                        <tbody>
                          @php 
                          $sub_total=0;
                          $shipping_charge=0;
                          $x = 1;
                          @endphp
                          @foreach($cart_items as $key => $row)
                          <tr>
                              <td class="image product-thumbnail"><img src="/product_image/{{$row->attributes->product_image}}" alt="#"></td>
                              <td>
                                  <h6 class="w-160 mb-5"><a href="/product-details/{{$row->id}}" class="text-heading">{{$row->name}}</a></h6></span>
                                  <!-- <div class="product-rate-cover">
                                      <div class="product-rate d-inline-block">
                                          <div class="product-rating" style="width:90%">
                                          </div>
                                      </div>
                                      <span class="font-small ml-5 text-muted"> (4.0)</span>
                                  </div> -->
                              </td>
                              <td>
                                  <h6 class="text-muted pl-20 pr-20">x {{$row->quantity}}</h6>
                              </td>
                              <td>
                                  <h4 class="text-brand">KWD {{$row->quantity * $row->price}}</h4>
                              </td>
                          </tr>
                          <input value="{{$row->name}}" type="hidden" name="product_name[]" id="product_name{{$key}}">
                          <input value="{{$row->quantity}}" type="hidden" name="quantity[]" id="quantity{{$key}}">
                          <input value="{{$row->price}}" type="hidden" name="price[]" id="price{{$key}}">
                          <input value="{{$row->attributes->shipping_charge}}" type="hidden" name="shipping_charge[]" id="shipping_charge{{$key}}">
                          <input value="{{$row->attributes->vendor_id}}" type="hidden" name="vendor_id[]" id="vendor_id{{$key}}">
                          <input value="{{$row->id}}" type="hidden" name="product_id[]" id="product_id{{$key}}">

                          @php 
                          $sub_total = $sub_total + ($row->quantity * $row->price); 
                          $shipping_charge = $shipping_charge + ($row->attributes->shipping_charge); 
                          $x++;
                          @endphp
                          @endforeach
                          <input type="hidden" name="coupon_id" id="coupon_id">
                          <input type="hidden" name="coupon_code" id="coupon_code">
                          <input type="hidden" name="after_discount" id="after_discount">
                        </tbody>
                      </table>
                    </div>
                    @php 
                    $tax_amount = round( ($sub_total * 5) / (100 + 5) , 2);
                    $total = round($sub_total + ($shipping_charge));
                    @endphp
                    <input value="{{$sub_total}}" type="hidden" name="sub_total" id="sub_total">
                    <input value="5" type="hidden" name="tax_percentage" id="tax_percentage">
                    <input value="{{$tax_amount}}" type="hidden" name="tax_amount" id="tax_amount">
                    <input value="1" type="hidden" name="service_charge" id="service_charge">
                    <input value="{{$total+1}}" type="hidden" name="total" id="total">
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
                                <!-- <tr>
                                    <td scope="col" colspan="2">
                                        <div class="divider-2 mt-10 mb-10"></div>
                                    </td>
                                </tr> -->
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
                                <tr id="discount_place"></tr>
                                <!-- <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Tax (5%)</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h5 class="text-heading text-end">KWD {{$tax_amount}}</h4</td> </tr> <tr>
                                    <td scope="col" colspan="2">
                                        <div class="divider-2 mt-10 mb-10"></div>
                                    </td>
                                </tr> -->
                                <?php
                                $vendor =array();
                                $service_charge = 0;
                                foreach(Cart::getContent() as $cart){
                                    if(!in_array($cart->attributes->vendor_id,$vendor)){
                                        $vendor[]=$cart->attributes->vendor_id;
                                        $service_charge++;
                                    }
                                }
                                ?>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Service Charge</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h5 class="text-heading text-end">KWD {{$service_charge}}</h4>
                                    </td> 
                                    
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end" id="total_value">KWD {{$total}}</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                 <div class="col-lg-12">
                            <div class="p-20">
                                <h4 class="mb-10">Apply Coupon</h4>
                                <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</span></p>
                                <!-- <form id="coupon_form" method="POST" enctype="multipart/form-data"> -->
                                  
                                    <div class="d-flex justify-content-between">
                                        <input class="font-medium mr-15 coupon" name="coupon_code_value" id="coupon_code_value" placeholder="Enter Your Coupon">
                                        <input type="hidden" name="coupon_code_field" id="coupon_code_field">
                                        <button class="btn" type="button" onclick="couponSubmit()"><i class="fi-rs-label mr-10"></i>Apply</button>
                                    </div>
                                <!-- </form> -->
                            </div>
                  </div>
               
                <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <div class="payment_option">
                        <!-- <div class="custome-radio">
                            <input value="0" class="form-check-input" type="radio" name="payment_type" id="payment_type2" checked="">
                            <label class="form-check-label" for="payment_type2" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                        </div> -->
                        <div class="custome-radio">
                            <input value="1" class="form-check-input" type="radio" name="payment_type" id="payment_type3" checked="">
                            <label class="form-check-label" for="payment_type3" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Online Getway</label>
                        </div>
                    </div>
                    <!-- <div class="payment-logo d-flex">
                        <img class="mr-15" src="/frontend/assets/imgs/theme/icons/payment-paypal.svg" alt="">
                        <img class="mr-15" src="/frontend/assets/imgs/theme/icons/payment-visa.svg" alt="">
                        <img class="mr-15" src="/frontend/assets/imgs/theme/icons/payment-master.svg" alt="">
                        <img src="/frontend/assets/imgs/theme/icons/payment-zapper.svg" alt="">
                    </div> -->
                    <a onclick="SaveOrder()" href="#" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></a>
                </div>
            </div>
        </div>
        </form>
    </div>
</main>
@endsection
@section('extra-js')
<script type="text/javascript">
$('#create_address').hide();
var vendor_id;
var coupon=new Boolean(false);
var coupon_amount;
var coupon_code_text;
function HideAddress(){
  $('#create_address').hide();
}
$.ajax({
  url : '/view-shipping-address',
  type: "GET",
  success: function(data)
  {
    $('#view_address').html(data);
  }
});

$('#addaddress').click(function(){
    $('#create_address').show();
    //$("#form")[0].reset();
});

function SaveAddress(){
    spinner_body.show();
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/save-shipping-address',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
            spinner_body.hide();
            console.log(data);                
            $("#form")[0].reset();
            Swal.fire({
              // title: "Verify Your Email",
              text: "Successfully Save!",
              icon: "success",
              confirmButtonClass: 'btn btn-primary',
              buttonsStyling: false,
            }).then(function() {
              $('#create_address').hide();
              $.ajax({
                url : '/view-shipping-address',
                type: "GET",
                success: function(data)
                {
                    $('#view_address').html(data);
                }
              });
            });
        },error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            spinner_body.hide();
            $.each(errorData, function(i, obj) {
                if(i == 'billing_address_id'){
                  warningMsg('Enter Billing Address');
                }
                else{
                  toastr.error(obj[0]);
                  $('#'+i).after('<p class="text-danger">'+obj[0]+'</p>');
                  $('#'+i).closest('.form-group').addClass('has-error');
                }
            });
        }
    });
}



function SaveOrder(){
    spinner_body.show();
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#form')[0]);
    formData.append("coupon",coupon);
    formData.append("coupon_vendor_id",vendor_id);
    formData.append("coupon_amount",coupon_amount);
    formData.append("coupon_code",coupon_code_text);
    $.ajax({
        url : '/save-order',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);  
            if(data.status == 0){
              spinner_body.hide();              
              
              if(data.IsSuccess == 'true'){
                $("#form")[0].reset();
                location.href=data.Data.invoiceURL;
              }
              else if(data.IsSuccess == 'false'){
                warningMsg(data.message);
              }
              // Swal.fire({
              //   // title: "Verify Your Email",
              //   text: "Order Successfully!",
              //   icon: "success",
              //   confirmButtonClass: 'btn btn-primary',
              //   buttonsStyling: false,
              // }).then(function() {
              //   location.href="/customer/orders";
              // });
            }
            else if(data.status == 2){
              warningMsg(data.message);
              spinner_body.hide();
            }  
        },error: function (data, errorThrown) {
            spinner_body.hide();
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
              if(i == 'billing_address_id'){
                warningMsg('Enter Billing Address');
              }
              else{
                toastr.error(obj[0]);
                $('#'+i).after('<p class="text-danger">'+obj[0]+'</p>');
                $('#'+i).closest('.form-group').addClass('has-error');
              }
            });
        }
    });
}

function couponSubmit(){
   var coupon_code_value = $("#coupon_code_value").val();
  if(coupon_code_value !=''){
    var formData = new FormData($('#form')[0]);
    // formData.append('product_id', description);
    spinner_body.show();
    $.ajax({
          url : '/apply-coupon',
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          dataType: "JSON",
          success: function(data)
          {
            spinner_body.hide();
            if(data["data"]["status"]==1){
              warningMsg(data["data"]["msg"]);
            }else{
              Swal.fire({
                title: data["data"]["status"],
                icon: "success",
               
                timer: 2000
              }).then(function() {
              $("#discount_place").html('<td class="cart_total_label"><h6 class="text-muted" >Discount</h6></td><td class="cart_total_amount">'+
                '<h4 class="text-brand text-end">KWD '+data["data"]["discount"]+'<br /><span style="color:green;font-size:12px">Coupon '+coupon_code_value+' Applied</span></h4></td>');
              
                  $("#total_value").html(data["data"]["total"]);
                  coupon =new Boolean(true);;
                  vendor_id=data["data"]["vendor_id"];
                  coupon_amount=data["data"]["discount"];
                  coupon_code_text = coupon_code_value;
                });
            }
              
          },error: function (data, errorThrown) {
              // var errorData = data.responseJSON.errors;
              // spinner_body.hide();
            
          }
      });

  }else{
      Swal.fire({
        title: "Coupon Code Required!",
        text: "Please Enter Your Coupon Code",
        icon: "warning",
        type: "warning",
        timer: 2000
      }).then(function() {
        spinner_body.hide();
        // location.href="/customer/orders";
      });
  }
}

function warningMsg(msg){
  Swal.fire({
    title: msg,
    icon: "warning",
    type: "warning",
    timer: 2000
  }).then(function() {
    
  });
}

</script>
@endsection