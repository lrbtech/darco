<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <title>Darco</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
     <link rel="icon" type="image/x-icon" href="/website_assets/images/ico.ico">
    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="/frontend/assets/imgs/theme/favicon.svg" /> -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="/frontend/assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="/frontend/assets/css/plugins/slider-range.css" />
    <!-- <link rel="stylesheet" href="/frontend/assets/css/dark.css?v=5.2" /> -->
    <link rel="stylesheet" href="/frontend/assets/css/main.css?v=5.2" />
    @yield('extra-css')
  </head>
<script src="/spinner/jquery-spinner.min.js" type="text/javascript"></script>
<style>
  .jquery-spinner-wrap{position:absolute;top:0;z-index:100;width:100%;height:100%;display:none;}.jquery-spinner-wrap .jquery-spinner-circle{height:100%;display:flex;justify-content:center;align-items:center}.jquery-spinner-wrap .jquery-spinner-circle .jquery-spinner-bar{width:40px;height:40px;border:4px solid #ddd;border-top-color:#a40034;border-radius:50%;animation:sp-anime .8s linear infinite}@keyframes sp-anime{to{transform:rotate(1turn)}}
  .text-danger{
    color:red;
  }
  .has-error label {
    color: #cc0033;
  }
  .has-error{
    color:red !important;
  }
  .has-error input {
    border: 1px solid red !important;
  }
  .has-error select {
    border: 1px solid red !important;
  }
  .form-group .has-error{
    /* background-color: #fce4e4; */
    border: 1px solid red;
    outline: none;
  }
  .main-menu.main-menu-padding-1 > nav > ul > li {
    padding: 0 50px;
}
</style>
<body id="spinner_body">
    <!-- Quick view -->
    <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="/frontend/assets/imgs/shop/product-16-2.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="/frontend/assets/imgs/shop/product-16-1.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="/frontend/assets/imgs/shop/product-16-3.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="/frontend/assets/imgs/shop/product-16-4.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="/frontend/assets/imgs/shop/product-16-5.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="/frontend/assets/imgs/shop/product-16-6.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="/frontend/assets/imgs/shop/product-16-7.jpg" alt="product image" />
                                    </figure>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">
                                    <div><img src="/frontend/assets/imgs/shop/thumbnail-3.jpg" alt="product image" /></div>
                                    <div><img src="/frontend/assets/imgs/shop/thumbnail-4.jpg" alt="product image" /></div>
                                    <div><img src="/frontend/assets/imgs/shop/thumbnail-5.jpg" alt="product image" /></div>
                                    <div><img src="/frontend/assets/imgs/shop/thumbnail-6.jpg" alt="product image" /></div>
                                    <div><img src="/frontend/assets/imgs/shop/thumbnail-7.jpg" alt="product image" /></div>
                                    <div><img src="/frontend/assets/imgs/shop/thumbnail-8.jpg" alt="product image" /></div>
                                    <div><img src="/frontend/assets/imgs/shop/thumbnail-9.jpg" alt="product image" /></div>
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status out-stock"> Sale Off </span>
                                <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Seeds of Change Organic Quinoa, Brown</a></h3>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">$38</span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15">26% Off</span>
                                            <span class="old-price font-md ml-15">$52</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="detail-extralink mb-30">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                                <div class="font-xs">
                                    <ul>
                                        <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                        <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2022</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="header-area header-style-1 header-style-5 header-height-2">
        <div class="mobile-promotion">
            <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
        </div>
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li><a href="page-about.htlm">About Us</a></li>
                                <li><a href="page-account.html">My Account</a></li>
                                <li><a href="/contact-us">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <!-- <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>100% Secure delivery without contacting the courier</li>
                                    <li>Supper Value Deals - Save more with coupons</li>
                                    <li>Trendy 25silver jewelry, save up 35% off today</li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                              <li>
                                <a href="#"><img src="/assets/images/icon/moon.png" alt="" /></a>
                                        </li>
                                <li>Need help? Email Us: <strong class="text-brand"> Info@darco.com</strong></li>
                                <!-- <li>
                                    <a class="language-dropdown-active" href="#">English <i class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li>
                                            <a href="#"><img src="/frontend/assets/imgs/theme/flag-fr.png" alt="" />Français</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="/frontend/assets/imgs/theme/flag-dt.png" alt="" />Deutsch</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="/frontend/assets/imgs/theme/flag-ru.png" alt="" />Pусский</a>
                                        </li>
                                    </ul>
                                </li> -->
                                <!-- <li>
                                    <a class="language-dropdown-active" href="#">USD <i class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li>
                                            <a href="#"><img src="/frontend/assets/imgs/theme/flag-fr.png" alt="" />INR</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="/frontend/assets/imgs/theme/flag-dt.png" alt="" />MBP</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="/frontend/assets/imgs/theme/flag-ru.png" alt="" />EU</a>
                                        </li>
                                    </ul>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="/"><img src="/website_assets/images/logo-light.png" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="#">
                                <select class="select-active">
                                    <option>All Categories</option>
                                    <option>Get Ideas</option>
                                    <option>Find Professionals</option>
                                    <option>Shop</option>
                                    
                                </select>
                                <input type="text" placeholder="Search for items..." />
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="search-location">
                                    <form action="#">
                                        <select class="select-active">
                                            <option>Your Location</option>
                                            <option>Kuwait City</option>
                                            <option>Al Ahmadi</option>
                                            <option>Hawalli</option>
                                            <option>As Salimiyah</option>
                                            
                                        </select>
                                    </form>
                                </div>
                                <!-- <div class="header-action-icon-2">
                                    <a href="shop-compare.html">
                                        <img class="svgInject" src="/frontend/assets/imgs/theme/icons/icon-compare.svg" />
                                        <span class="pro-count blue">3</span>
                                    </a>
                                    <a href="shop-compare.html"><span class="lable ml-0">Compare</span></a>
                                </div> -->
                                <div class="header-action-icon-2">
                                    @if(Auth::check())
                                    <a href="/customer/favourites">
                                        <img class="svgInject" src="/frontend/assets/imgs/theme/icons/icon-heart.svg" />
                                        <span class="pro-count blue">{{$wishlist_count}}</span>
                                    </a>
                                    <a href="/customer/favourites"><span class="lable">Wishlist</span></a>
                                    @else 
                                    <a href="/login">
                                        <img class="svgInject" src="/frontend/assets/imgs/theme/icons/icon-heart.svg" />
                                        <span class="pro-count blue">{{$wishlist_count}}</span>
                                    </a>
                                    <a href="/login"><span class="lable">Wishlist</span></a>
                                    @endif
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="/cart">
                                        <img src="/frontend/assets/imgs/theme/icons/icon-cart.svg" />
                                        <span class="pro-count blue">
                                        <?php
                                        $cartCollection = Cart::getContent();
                                        $cartCollection->count();
                                        ?>
                                        {{$cartCollection->count()}}
                                        </span>
                                    </a>
                                    <a href="/cart"><span class="lable">Cart</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            @php 
                                            $cart_header_total=0;
                                            @endphp
                                            @foreach($cart_items as $key => $row)
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="/product_drtails/{{$row->id}}">
                                                        <img src="/product_image/{{$row->attributes->product_image}}" />
                                                    </a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="shop-product-right.html">{{$row->name}}</a></h4>
                                                    <h3><span>{{$row->quantity}} × </span>KWD {{$row->price}}</h3>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a onclick="RemoveCart({{$row->id}})" href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                            @php 
                                            $cart_header_total = $cart_header_total + ($row->quantity * $row->price); 
                                            @endphp
                                            @endforeach
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>KWD {{$cart_header_total}}</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="/cart" class="outline">View cart</a>
                                                <a href="/checkout">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-action-icon-2">
                                    @if(Auth::check())
                                    <a href="page-account.html">
                                        <img class="svgInject" src="/frontend/assets/imgs/theme/icons/icon-user.svg" />
                                    </a>
                                    <a href="#"><span class="lable ml-0">Account</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="/customer/profile"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                            </li>
                                            <li>
                                                <a href="/customer/orders"><i class="fi fi-rs-location-alt mr-10"></i>My Orders</a>
                                            </li>
                                            <li>
                                                <a href="/customer/favourites"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="/customer/manage-address"><i class="fi fi-rs-location-alt mr-10"></i>My Address</a>
                                            </li>
                                            <li>
                                                <a href="/customer/change-password"><i class="fi fi-rs-settings-sliders mr-10"></i>Change Password</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    @else
                                    <a href="/login">
                                        <img class="svgInject" src="/frontend/assets/imgs/theme/icons/icon-user.svg" />
                                    </a>
                                    <a href="/login"><span class="lable ml-0">Login</span></a>                                    
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="/"><img src="/website_assets/images/logo-light.png" alt="logo" /></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                      
                        <div style="text-align:center !important;" class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul class="mega-menu-dyno">
                                   
                                   
                                  
                                  
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                  
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.html">
                                    <img src="/frontend/assets/imgs/theme/icons/icon-heart.svg" />
                                    <span class="pro-count white">4</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="/cart">
                                    <img src="/frontend/assets/imgs/theme/icons/icon-cart.svg" />
                                    <span class="pro-count white">
                                    <?php
                                    $cartCollection = Cart::getContent();
                                    $cartCollection->count();
                                    ?>
                                    {{$cartCollection->count()}}
                                    </span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        @php 
                                        $cart_header_total=0;
                                        @endphp
                                        @foreach($cart_items as $key => $row)
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="/product_drtails/{{$row->id}}"><img src="/product_image/{{$row->attributes->product_image}}" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">{{$row->name}}</a></h4>
                                                <h3><span>{{$row->quantity}} × </span>KWD {{$row->price}}</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a onclick="RemoveCart({{$row->id}})" href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        @php 
                                        $cart_header_total = $cart_header_total + ($row->quantity * $row->price); 
                                        @endphp
                                        @endforeach
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>KWD {{$cart_header_total}}</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="/cart">View cart</a>
                                            <!-- <a href="/checkout">Checkout</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="/"><img src="/website_assets/images/logo-light.png" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…" />
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="menu-item-has-children">
                                <a href="#">GET IDEAS</a>
                                <ul class="dropdown">
                                    <li><a href="#">Vendors Grid</a></li>
                                    <li><a href="#">Vendors List</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">FIND PROFESSIONALS</a>
                                <ul class="dropdown">
                                    <li><a href="#">Vendors Grid</a></li>
                                    <li><a href="#">Vendors List</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">SHOP BY DEPARTMENT</a>
                                <ul class="dropdown">
                                    <li><a href="#">Vendors Grid</a></li>
                                    <li><a href="#">Vendors List</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="page-login.html"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                    <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                    <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                    <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                    <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                    <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                </div>
                <div class="site-copyright">Copyright 2022 © Nest. All rights reserved. Powered by AliThemes.</div>
            </div>
        </div>
    </div>
    <!--End header-->


    @yield('content')


    <footer class="main">
   
        <section class="featured section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <div class="banner-icon">
                                <img src="/frontend/assets/imgs/theme/icons/icon-1.svg" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Best prices & offers</h3>
                                <p>Orders $50 or more</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="banner-icon">
                                <img src="/frontend/assets/imgs/theme/icons/icon-2.svg" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Free delivery</h3>
                                <p>24/7 amazing services</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <div class="banner-icon">
                                <img src="/frontend/assets/imgs/theme/icons/icon-3.svg" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Great daily deal</h3>
                                <p>When you sign up</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            <div class="banner-icon">
                                <img src="/frontend/assets/imgs/theme/icons/icon-4.svg" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Wide assortment</h3>
                                <p>Mega Discounts</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <div class="banner-icon">
                                <img src="/frontend/assets/imgs/theme/icons/icon-5.svg" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Easy returns</h3>
                                <p>Within 30 days</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                            <div class="banner-icon">
                                <img src="/frontend/assets/imgs/theme/icons/icon-6.svg" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Safe delivery</h3>
                                <p>Within 30 days</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col">
                        <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <div class="logo mb-30">
                                <a href="index.html" class="mb-15"><img src="/website_assets/images/logo-light.png" alt="logo" /></a>
                                <p class="font-lg text-heading">Perfect Home Service Partner</p>
                            </div>
                            <ul class="contact-infor">
                                <li><img src="/frontend/assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>Darco kuwait</span></li>
                                <li><img src="/frontend/assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Call Us:</strong><span>(+965) - 540-025-124553</span></li>
                                <li><img src="/frontend/assets/imgs/theme/icons/icon-email-2.svg" alt="" /><strong>Email:</strong><span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="fb889a979ebbb59e888fd5989496">[email&#160;protected]</a></span></li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s>
                        <h4 class=" widget-title">Company</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Support Center</a></li>
                      
                        </ul>
                    </div>
                    <!-- <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <h4 class="widget-title">Account</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help Ticket</a></li>
                            <li><a href="#">Shipping Details</a></li>
                            <li><a href="#">Compare products</a></li>
                        </ul>
                    </div> -->
                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <h4 class="widget-title">Corporate</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">Become a Vendor</a></li>
                            <li><a href="#">Affiliate Program</a></li>
                            <li><a href="#">Farm Business</a></li>
                            <li><a href="#">Farm Careers</a></li>
                            <li><a href="#">Our Suppliers</a></li>
                            <li><a href="#">Accessibility</a></li>
                           
                        </ul>
                    </div>
                    <!-- <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <h4 class="widget-title">Popular</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">Milk & Flavoured Milk</a></li>
                            <li><a href="#">Butter and Margarine</a></li>
                            <li><a href="#">Eggs Substitutes</a></li>
                            <li><a href="#">Marmalades</a></li>
                            <li><a href="#">Sour Cream and Dips</a></li>
                            <li><a href="#">Tea & Kombucha</a></li>
                            <li><a href="#">Cheese</a></li>
                        </ul>
                    </div> -->
                    <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                        <h4 class="widget-title">Install App</h4>
                        <p class="">From App Store or Google Play</p>
                        <div class="download-app">
                            <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active" src="/frontend/assets/imgs/theme/app-store.jpg" alt="" /></a>
                            <a href="#" class="hover-up mb-sm-2"><img src="/frontend/assets/imgs/theme/google-play.jpg" alt="" /></a>
                        </div>
                        <p class="mb-20">Secured Payment Gateways</p>
                        <img class="" src="/frontend/assets/imgs/theme/payment-method.png" alt="" />
                    </div>
                </div>
        </section>
        <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
            <div class="row align-items-center">
                <div class="col-12 mb-30">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <p class="font-sm mb-0">&copy; 2022, <strong class="text-brand">DARCO</strong> -  All rights reserved<br /> Developed By LRBINFOTECH</p>
                </div>
                <!-- <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                    <div class="hotline d-lg-inline-flex mr-30">
                        <img src="/frontend/assets/imgs/theme/icons/phone-call.svg" alt="hotline" />
                        <p>1900 - 6666<span>Working 8:00 - 22:00</span></p>
                    </div>
                    <div class="hotline d-lg-inline-flex">
                        <img src="/frontend/assets/imgs/theme/icons/phone-call.svg" alt="hotline" />
                        <p>1900 - 8888<span>24/7 Support Center</span></p>
                    </div>
                </div> -->
                <div class="col-xl-6 col-lg-6 col-md-6 text-end d-none d-md-block">
                    <div class="mobile-social-icon">
                        <h6>Follow Us</h6>
                        <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                        <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                        <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                        <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                        <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                    </div>
                   
                </div>
            </div>
        </div>
    </footer>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="/frontend/assets/imgs/theme/loading.gif" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->

    <link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.css')}}">
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
    <link href="{{asset('autocomplete/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">

    <script src="/frontend/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/frontend/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>

    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('autocomplete/jquery-ui.min.js') }}"></script>
    
    <script src="/frontend/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/frontend/assets/js/plugins/slick.js"></script>
    <script src="/frontend/assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="/frontend/assets/js/plugins/waypoints.js"></script>
    <script src="/frontend/assets/js/plugins/wow.js"></script>
    <script src="/frontend/assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="/frontend/assets/js/plugins/magnific-popup.js"></script>
    <script src="/frontend/assets/js/plugins/select2.min.js"></script>
    <script src="/frontend/assets/js/plugins/slider-range.js"></script>
    <script src="/frontend/assets/js/plugins/counterup.js"></script>
    <script src="/frontend/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="/frontend/assets/js/plugins/images-loaded.js"></script>
    <script src="/frontend/assets/js/plugins/isotope.js"></script>
    <script src="/frontend/assets/js/plugins/scrollup.js"></script>
    <script src="/frontend/assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="/frontend/assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="/frontend/assets/js/plugins/jquery.elevatezoom.js"></script>
    <!-- Template  JS -->
    <script src="/frontend/assets/js/main.js?v=5.2"></script>
    <script src="/frontend/assets/js/shop.js?v=5.2"></script>
    @yield('extra-js')
<script>
  var spinner_body = new jQuerySpinner({
    parentId: 'spinner_body'
  });

function SaveFavourite(id){
    $.ajax({
        url : '/customer/save-favourites/'+id,
        type: "get",
        //dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Successfully Saved',
                icon: "success",
            }).then(function() {
                location.reload();
            });
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}
function DeleteFavourite(id){
    $.ajax({
        url : '/customer/delete-favourites/'+id,
        type: "get",
        //dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Successfully Removed',
                icon: "success",
            }).then(function() {
                location.reload();
            });
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}
// getMenu();
// function getMenu(){
    
//   $.ajax({
//     url : '/get-menu',
//     type: "GET",
//     dataType: "JSON",
//     success: function(data)
//     {
//       $("#topMenu").html(data);
//     }
//   });
// }


function RemoveCart(id){
    var r = confirm("Are you sure");
    if (r == true) {
      spinner_body.show();   
      $.ajax({
        url : '/remove-cart/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          spinner_body.hide();   
          toastr.success('Removed Successfully');
          location.reload();
        }
      });
    } 
}
getMenu();
function getMenu(){
    
  $.ajax({
    url : '/get-menu',
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      $(".mega-menu-dyno").html(data);
    }
  });
}
</script>
</body>

</html>