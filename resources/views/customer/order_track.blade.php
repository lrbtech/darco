@extends('website.layouts')
@section('extra-css')
<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
/* .container {
margin-top: 50px;
margin-bottom: 50px
} */
.card {
position: relative;
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-ms-flex-direction: column;
flex-direction: column;
min-width: 0;
word-wrap: break-word;
background-color: #fff;
background-clip: border-box;
border: 1px solid rgba(0, 0, 0, 0.1);
border-radius: 0.10rem
}
.card-header:first-child {
border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}
.card-header {
padding: 0.75rem 1.25rem;
margin-bottom: 0;
background-color: #fff;
border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}
.track {
position: relative;
background-color: #ddd;
height: 7px;
display: -webkit-box;
display: -ms-flexbox;
display: flex;
margin-bottom: 60px;
margin-top: 50px
}
.track .step {
-webkit-box-flex: 1;
-ms-flex-positive: 1;
flex-grow: 1;
width: 25%;
margin-top: -18px;
text-align: center;
position: relative
}
.track .step.active:before {
background: #FF5722
}
.track .step::before {
height: 7px;
position: absolute;
content: "";
width: 100%;
left: 0;
top: 18px
}
.track .step.active .icon {
background: #ee5435;
color: #fff
}
.track .icon {
display: inline-block;
width: 40px;
height: 40px;
line-height: 40px;
position: relative;
border-radius: 100%;
background: #ddd
}
.track .step.active .text {
font-weight: 400;
color: #000
}
.track .text {
display: block;
margin-top: 7px
}
.itemside {
position: relative;
display: -webkit-box;
display: -ms-flexbox;
display: flex;
width: 100%
}
.itemside .aside {
position: relative;
-ms-flex-negative: 0;
flex-shrink: 0
}
.img-sm {
width: 80px;
height: 80px;
padding: 7px
}
ul.row,
ul.row-sm {
list-style: none;
padding: 0
}
.itemside .info {
padding-left: 15px;
padding-right: 7px
}
.itemside .title {
display: block;
margin-bottom: 5px;
color: #212529
}
p {
margin-top: 0;
margin-bottom: 1rem
}
.btn-warning {
color: #ffffff;
background-color: #ee5435;
border-color: #ee5435;
border-radius: 1px
}
.btn-warning:hover {
color: #ffffff;
background-color: #ff2b00;
border-color: #ff2b00;
border-radius: 1px
}
</style>
@endsection
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Customer <span></span> Track Order
            </div>
        </div>
    </div>
    <div class="page-content pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            @include('customer.sidebar')
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                  <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Your Orders</h3>
                                    </div>
                                    <div class="card-body">
                                    

<h6>Order ID: {{$orders->id}}</h6>
<article class="card">
<div class="card-body row">
<div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
<!-- <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div> -->
<div class="col"> 
     <strong>Status:</strong> 
     <br> 
     @if($orders->shipping_status == 0)
     Order Confirmed 
     @elseif($orders->shipping_status == 1)
     Order Processing
     @elseif($orders->shipping_status == 2)
     Order Dispatched
     @elseif($orders->shipping_status == 3)
     Delivered
     @endif
</div>
<div class="col"> <strong>Tracking #:</strong> <br> {{$orders->id}} </div>
</div>
</article>
<div class="track">
     <div class="step active"> 
          <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> 
     </div>
     @if($orders->shipping_status >= 1)
     <div class="step active"> 
          <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Processing</span> 
     </div>
     @else 
     <div class="step"> 
          <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Processing</span> 
     </div>
     @endif
     @if($orders->shipping_status >= 2)
     <div class="step active"> 
          <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Order Dispatched </span> 
     </div>
     @else 
     <div class="step"> 
          <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Order Dispatched </span> 
     </div>
     @endif
     @if($orders->shipping_status >= 3)
     <div class="step active"> 
          <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivered</span>
     </div>
     @else 
     <div class="step"> 
          <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivered</span>
     </div>
     @endif
</div>
<hr>
<!-- <ul class="row">
<li class="col-md-4">
<figure class="itemside mb-3">
<div class="aside"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1571751108/Ecommerce/laptop-dell-xps-15-computer-monitors-laptops.jpg" class="img-sm border"></div>
<figcaption class="info align-self-center">
<p class="title">Dell Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$950 </span>
</figcaption>
</figure>
</li>
<li class="col-md-4">
<figure class="itemside mb-3">
<div class="aside"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1571750967/Ecommerce/ef192a21ec96.jpg" class="img-sm border"></div>
<figcaption class="info align-self-center">
<p class="title">HP Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$850 </span>
</figcaption>
</figure>
</li>
<li class="col-md-4">
<figure class="itemside mb-3">
<div class="aside"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1571750722/Ecommerce/acer-v-17-nitro-realsense.jpg" class="img-sm border"></div>
<figcaption class="info align-self-center">
<p class="title">ACER Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$650 </span>
</figcaption>
</figure>
</li>
</ul> -->
<hr>
<a href="/customer/orders" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
</div>








                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('extra-js')
<script type="text/javascript">
$('.orders').addClass('active');

</script>
@endsection
