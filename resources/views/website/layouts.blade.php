<!DOCTYPE html>
@if(session()->get('lang') == 'english')
<html class="no-js" lang="en" dir="ltr">
@elseif(session()->get('lang') == 'arabic')
<html class="no-js" lang="en" dir="rtl">
@else 
<html class="no-js" lang="en" dir="ltr">
@endif

<head>
    <meta charset="utf-8" />
    <title>DARSTORE</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    @if(session()->get('theme') == 'light')
    <link id="themefile" rel="stylesheet" href="/frontend/assets/css/main.css?v=5.2" />
    <link rel="icon" type="image/x-icon" href="/website_assets/images/light.ico">
    <style>
    .form-group select {
        background: #fff;
        border: 1px solid #ececec;
        height: 64px;
        -webkit-box-shadow: none;
        box-shadow: none;
        padding-left: 20px;
        font-size: 16px;
        width: 100%;
    }
    .form-group input {
        color:#000 !important;
    }
    .btn-heading, button.btn-heading[type="submit"] {
    background-color: #260c7a;
    border-color: #253D4E;
    font-weight: 700;
    border: 0;
}
   
    </style>
    @elseif(session()->get('theme') == 'dark')
    <link rel="stylesheet" href="/frontend/assets/css/dark.css?v=5.2" />
    <link id="themefile" rel="stylesheet" href="/theme/dark.css"/>
    <link rel="icon" type="image/x-icon" href="/website_assets/images/dark.ico">
    <style>
         .btn-heading, button.btn-heading[type="submit"] {
    background-color: #41eafc;
    border-color: #253D4E;
    font-weight: 700;
    border: 0;
}
    .single-content p {
        color:#fff;
    }
    .single-content ol li {
        color:#fff;
    }
    .single-content ul li {
        color:#fff;
    }
    .form-group select {
        background: #212529;
        border: 1px solid #ececec;
        height: 64px;
        -webkit-box-shadow: none;
        box-shadow: none;
        padding-left: 20px;
        font-size: 16px;
        width: 100%;
    }
    .form-group input {
        color:#fff !important;
    }
    </style>
    @else 
    <link rel="icon" type="image/x-icon" href="/website_assets/images/light.ico">
    <link id="themefile" rel="stylesheet" href="/frontend/assets/css/main.css?v=5.2" />
    <style>
           .btn-heading, button.btn-heading[type="submit"] {
    background-color: #260c7a;
    border-color: #253D4E;
    font-weight: 700;
    border: 0;
}
    .form-group select {
        background: #fff;
        border: 1px solid #ececec;
        height: 64px;
        -webkit-box-shadow: none;
        box-shadow: none;
        padding-left: 20px;
        font-size: 16px;
        width: 100%;
    }
    .form-group input {
        color:#000 !important;
    }
    </style>
    @endif
    
    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="/frontend/assets/imgs/theme/favicon.svg" /> -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="/frontend/assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="/frontend/assets/css/plugins/slider-range.css" />
    @yield('extra-css')
  </head>
<script src="/spinner/jquery-spinner.min.js" type="text/javascript"></script>
<script src="/theme/iconify.min.js" type="text/javascript"></script>
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
li.sub-mega-menu.sub-mega-menu-width-22 {
    margin-top: 20px;
}


.toggle-checkbox {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

.toggle-slot {
  position: relative;
  height: 3.5em;
  width: 7em;
  border: 5px solid #e4e7ec;
  border-radius: 10em;
  background-color: white;
  box-shadow: 0px 3px 15px #e4e7ec;
  transition: background-color 250ms;
}

.toggle-checkbox:checked ~ .toggle-slot {
  background-color: #374151;
}





.sun-icon {
  position: absolute;
  height: 2em;
  width: 2em;
  color: #ffbb52;
}



.toggle-checkbox:checked ~ .toggle-slot .sun-icon-wrapper {
  opacity: 0;
  transform: translate(3em, 2em) rotate(0deg);
}

.moon-icon {
  position: absolute;
  height: 2em;
  width: 2em;
  color: white;
}

.moon-icon-wrapper {
  position: absolute;
  height: 2em;
  width: 2em;
  opacity: 0;
  transform: translate(11em, 2em) rotate(0deg);
  transform-origin: 50% 50%;
  transition: opacity 150ms, transform 500ms cubic-bezier(.26,2.5,.46,.71);
}



.garage-title {
    /* clear: both;
    display: inline-block; */
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.child-category-active {
    background: #fff;
    border: 1px solid #26007a;
    /* -webkit-box-shadow: 5px 5px 15px rgb(0 0 0 / 5%);
    box-shadow: 5px 5px 15px rgb(0 0 0 / 5%);
    -webkit-transition: 0.2s;
    transition: 0.2s; */
}

body {
	/* color: #26262b;
	font-family: Avenir Next, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell,
		Fira Sans, Droid Sans, sans-serif;
	font-size: 18px;
	line-height: 1.78; */
}

.btns {
	background-color: transparent;
	border: 1px solid transparent;
	border-radius: 6px;
	display: inline-block;
	font-family: Avenir Next, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell,
		Fira Sans, Droid Sans, sans-serif;
	font-size: 16px;
	letter-spacing: 1px;
	line-height: 1.5;
	padding: 12px 30px;
	text-align: center;
	text-decoration: none;
	transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
		border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	vertical-align: middle;
	white-space: nowrap;
}

.btns:not(:disabled):not(.btn_disabled) {
	cursor: pointer;
}

.btn_primary {
	background-color: #26262b;
	color: #fff;
}

.btn_primary:focus:not(:disabled):not(.btn_disabled),
.btn_primary:hover:not(:disabled):not(.btn_disabled) {
	background-color: #36383e;
}

.btn_primary:active:not(:disabled):not(.btn_disabled) {
	background-color: #2b2d32;
}

.btn_primary.btn_disabled,
.btn_primary:disabled {
	opacity: 0.5;
}

.btn_secondary {
	background-color: #fff;
	border-color: #fff;
	color: #26262b;
}

.btn_secondary:focus:not(:disabled):not(.btn_disabled),
.btn_secondary:hover:not(:disabled):not(.btn_disabled) {
	background-color: #f1f1f2;
	border-color: #fff;
}

.btn_secondary:active:not(:disabled):not(.btn_disabled) {
	background-color: #ebebec;
	border-color: #ebebec;
}

.btn_secondary.btn_disabled,
.btn_secondary:disabled {
	opacity: 0.5;
}

.btn_outline-primary {
	border-color: #26262b;
	color: #26262b;
}

.btn_outline-primary:focus:not(:disabled):not(.btn_disabled),
.btn_outline-primary:hover:not(:disabled):not(.btn_disabled) {
	background-color: #26262b;
	color: #fff;
}

.btn_outline-primary:active:not(:disabled):not(.btn_disabled) {
	background-color: #2b2d32;
}

.btn_outline-primary.btn_disabled,
.btn_outline-primary:disabled {
	opacity: 0.5;
}

.btn_outline-secondary {
	border-color: #fff;
	color: #fff;
}

.btn_outline-secondary:focus:not(:disabled):not(.btn_disabled),
.btn_outline-secondary:hover:not(:disabled):not(.btn_disabled) {
	background-color: #f1f1f2;
	color: #26262b;
}

.btn_outline-secondary:active:not(:disabled):not(.btn_disabled) {
	background-color: #fff;
}

.btn_outline-secondary.btn_disabled,
.btn_outline-secondary:disabled {
	opacity: 0.5;
}

.btn_teams-primary {
	background-color: #b88662;
	border-color: #b88662;
	color: #fff;
}

.btn_teams-primary:focus:not(:disabled):not(.btn_disabled),
.btn_teams-primary:hover:not(:disabled):not(.btn_disabled) {
	background-color: #9f6c48;
	border-color: #9f6c48;
}

.btn_teams-primary:active:not(:disabled):not(.btn_disabled) {
	background-color: #7c5438;
	border-color: #7c5438;
}

.btn_teams-primary.btn_disabled,
.btn_teams-primary:disabled {
	opacity: 0.5;
}

.btn_google {
	background-color: #dd4b39;
	color: #fff;
}

.btn_google:focus,
.btn_google:hover {
	background-color: #ee5846;
}

.btn_google:active {
	background-color: #c44232;
}

.btn_facebook {
	background-color: #3b5998;
	color: #fff;
}

.btn_facebook:focus,
.btn_facebook:hover {
	background-color: #4d69a3;
}

.btn_facebook:active {
	background-color: #2d4578;
}

.btn_link {
	background: transparent;
	border: none;
	color: #e6842e;
	cursor: pointer;
	display: inline;
	font-family: Avenir Next, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell,
		Fira Sans, Droid Sans, sans-serif;
	font-size: 16px;
	font-weight: 500;
	padding: 0;
}

.btn_sm {
	font-size: 0.875rem;
	line-height: 1.4289;
	padding: 5px 22px;
}

.btn_block {
	display: block;
	width: 100%;
}

.btn_no-spacing {
	padding-left: 0;
	padding-right: 0;
}

@media (max-width: 575.98px) {
	.btn_block-mobile {
		display: block;
		width: 100%;
	}
}

.btn_play {
	background: #fff
		url(https://cdn.setapp.com/master/cfc7de255d8fc3560dcc68d6cfa9ac72778ebeea/build/main/9ed7d2fe9afc67ab3c9f.svg)
		no-repeat 52% 50%;
	background-size: 18%;
	border-radius: 50%;
	box-shadow: 0 3px 14px 0 rgba(0, 0, 0, 0.5);
	height: 48px;
	padding: 0;
	transition: transform 0.15s ease-in-out;
	width: 48px;
}

.btn_play:focus,
.btn_play:hover {
	transform: scale(1.1);
}

.btn_play:active {
	transform: scale(1);
}

@media (min-width: 576px) {
	.btn_play:not(.btn_play_sm) {
		height: 74px;
		width: 74px;
	}
}

.btn_with-rhombus {
	background-color: rgba(255, 255, 255, 0.2);
	color: #3a3844;
	padding-left: 45px;
	padding-right: 25px;
	position: relative;
}

.btn_with-rhombus:before {
	background-image: url(https://cdn.setapp.com/master/cfc7de255d8fc3560dcc68d6cfa9ac72778ebeea/build/main/aebbaf8d7ddb524ccd25.svg);
	background-size: contain;
	content: "";
	height: 16px;
	left: 16px;
	position: absolute;
	top: 50%;
	transform: translateY(-50%);
	width: 16px;
}

.btn_with-rhombus:focus:not(:disabled):not(.btn_disabled),
.btn_with-rhombus:hover:not(:disabled):not(.btn_disabled) {
	background-color: #fff;
}

.btn_with-rhombus:active:not(:disabled):not(.btn_disabled) {
	background-color: #ebebec;
}

.btn_with-rhombus.btn_disabled,
.btn_with-rhombus:disabled {
	opacity: 0.6;
}

.btn__input-close {
	background: url(https://cdn.setapp.com/master/cfc7de255d8fc3560dcc68d6cfa9ac72778ebeea/build/main/351e912995feef9e5a79.svg)
		no-repeat 50%;
	background-size: 32px;
	height: 32px;
	opacity: 0.95;
	padding: 0;
	position: absolute;
	right: 16px;
	top: 8px;
	transition: all 0.3s ease-in-out;
	visibility: visible;
	width: 32px;
	z-index: 100;
}

.btn__input-close:focus,
.btn__input-close:hover {
	opacity: 1;
}

.btn__input-close:active {
	opacity: 0.95;
}

@media (min-width: 768px) {
	.btn__input-close {
		top: 14px;
	}
}

.btn__input-close_hidden {
	opacity: 0;
	visibility: hidden;
}

.btn__input-close_hidden:focus,
.btn__input-close_hidden:hover {
	opacity: 0;
}

.btn-link {
	font-size: 20px;
	letter-spacing: 1.6px;
}

.btn-link_dark {
	color: #3a3844;
	font-weight: 600;
}

.btn-link_dark.btn-link_with-arrow {
	background-image: url(https://cdn.setapp.com/master/cfc7de255d8fc3560dcc68d6cfa9ac72778ebeea/build/main/c484c59e58ae10901608.svg);
}

.btn-link_light {
	color: #fff;
	font-weight: 500;
}

.btn-link_light.btn-link_with-arrow {
	background-image: url(https://cdn.setapp.com/master/cfc7de255d8fc3560dcc68d6cfa9ac72778ebeea/build/main/a77801e1cdb15ca14faa.svg);
}

.btn-link_with-arrow {
	background-position: left 30px center;
	background-repeat: no-repeat;
	padding-left: 68px;
	transition: background-position 0.1s ease-in-out;
}

.btn-link_with-arrow:hover {
	background-position: left 33px center;
}

.btn-link_with-arrow.btn_no-spacing {
	background-position: 0;
	padding-left: 38px;
}

.btn-link_with-arrow.btn_no-spacing:hover {
	background-position: left 3px center;
}

.btn-group {
	display: flex;
	flex-flow: row wrap;
	margin-left: -10px;
	margin-right: -10px;
}

.btn-group__item {
	flex: 0 0 auto;
	margin-left: 10px;
	margin-right: 10px;
}

.cookie-banner {
	align-items: flex-start;
	background: #26262b;
	border-radius: 10px;
	bottom: 12px;
	color: #fff;
	display: flex;
	flex-direction: row;
	justify-content: space-between;
	left: 50%;
	max-width: 500px;
	padding: 12px 16px;
	position: fixed;
	transform: translateX(-50%);
	width: calc(100% - 24px);
	z-index: 10;
}

@media (min-width: 576px) {
	.cookie-banner {
		align-items: center;
	}
}

.cookie-banner__text {
	font-size: 12px;
	line-height: 1.67;
	margin-right: 12px;
}

.policy-header_cookie {
	background-color: #d9ae89;
}

.link {
	color: #e6842e;
	text-decoration: none;
}

.link:hover {
	text-decoration: underline;
}

.goog-te-banner-frame.skiptranslate {
    display: none !important;
} 

</style>
@if(session()->get('lang') == 'arabic')
<style>
.sun-icon-wrapper {
    position: absolute;
    height: 2em;
    width: 2em;
    opacity: 1;
    transform: translate(-50px, 4px) rotate(15deg);
    transform-origin: 50% 50%;
    transition: opacity 150ms, transform 500ms cubic-bezier(.26,2,.46,.71);
}
.toggle-button {
    transform: translate(-0.25em, 4px);
    position: absolute;
    height: 2em;
    width: 2em;
    border-radius: 50%;
    background-color: #ffeccf;
    box-shadow: inset 0px 0px 0px 5px #ffbb52;
    transition: background-color 250ms, border-color 250ms, transform 500ms cubic-bezier(.26,2,.46,.71);
}
.toggle-checkbox:checked ~ .toggle-slot .toggle-button {
    background-color: #485367;
    box-shadow: inset 0px 0px 0px 5px white;
    transform: translate(-50px, 4px);
}
.toggle-checkbox:checked ~ .toggle-slot .moon-icon-wrapper {
    opacity: 1;
    transform: translate(0em, 4px) rotate(-15deg);
}
.logo.logo-width-1 {
    padding-left: 50px;
}
.search-style-2 form input {
    background-position: left !important;
}
.cart-dropdown-wrap.cart-dropdown-hm2 {
    right: -200px;;
}

.hero-slider-1 .slider-content form input {
    border: 0;
    border-radius: 50px 0 0 50px;
    padding-left: 58px;
    /* background: url(/frontend/assets/imgs/theme/icons/icon-plane.png) no-repeat 25px center; */
}

</style>
@else
<style>
.sun-icon-wrapper {
    position: absolute;
    height: 2em;
    width: 2em;
    opacity: 1;
    transform: translate(6px, 4px) rotate(15deg);
    transform-origin: 50% 50%;
    transition: opacity 150ms, transform 500ms cubic-bezier(.26,2,.46,.71);
}
.toggle-button {
  transform: translate(3.75em, 4px);
  position: absolute;
  height: 2em;
  width: 2em;
  border-radius: 50%;
  background-color: #ffeccf;
  box-shadow: inset 0px 0px 0px 5px #ffbb52;
  transition: background-color 250ms, border-color 250ms, transform 500ms cubic-bezier(.26,2,.46,.71);
}
.toggle-checkbox:checked ~ .toggle-slot .toggle-button {
  background-color: #485367;
  box-shadow: inset 0px 0px 0px 5px white;
  transform: translate(6px, 4px);
}
.toggle-checkbox:checked ~ .toggle-slot .moon-icon-wrapper {
  opacity: 1;
  transform: translate(4em, 4px) rotate(-15deg);
}
</style>
@endif
<body class="notranslate" id="spinner_body">
    <!-- Quick view -->
    {{--<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
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
    </div>--}}
    <header class="header-area header-style-1 header-style-5 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li><a href="/about-us">{{$language[118][session()->get('lang')]}}</a></li>
                                <li><a href="/customer/profile">{{$language[119][session()->get('lang')]}}</a></li>
                                <li><a href="/contact-us">{{$language[120][session()->get('lang')]}}</a></li>
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
                            <div id="google_translate_element" style="display: none;"></div>
                                <li>
                                    <a class="language-dropdown-active" href="#">{{$language[121][session()->get('lang')]}} <i class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li>
                                            <a onclick="translateLanguage('English');" href="#">English</a>
                                        </li>
                                        <li>
                                            <a onclick="translateLanguage('Arabic');" href="#">Arabic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <label>
                                    @if(session()->get('theme') == 'dark')
                                    <input class='toggle-checkbox' type='checkbox' id='light_dark' checked></input>
                                    @else
                                    <input class='toggle-checkbox' type='checkbox' id='light_dark'></input>

                                    @endif
                                    <div class='toggle-slot'>
                                        <div class='sun-icon-wrapper'>
                                        <div class="iconify sun-icon" data-icon="feather-sun" data-inline="false"></div>
                                        </div>
                                        <div class='toggle-button'></div>
                                        <div class='moon-icon-wrapper'>
                                        <div class="iconify moon-icon" data-icon="feather-moon" data-inline="false"></div>
                                        </div>
                                    </div>
                                    </label>
                                </li>
                                <!-- <li>Need help? Email Us: <strong class="text-brand"> Info@DARSTORE.com</strong></li> -->
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
                        @if(session()->get('theme') == 'dark')
                        <a href="/"><img src="/website_assets/images/logo-dark.png" alt="logo" /></a>
                        @else
                        <a href="/"><img src="/website_assets/images/logo-light.png" alt="logo" /></a>
                        @endif
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="#">
                                <select name="category_type" id="category_type" class="select-active">
                                    <option value="">{{$language[122][session()->get('lang')]}}</option>
                                    <option value="1">{{$language[123][session()->get('lang')]}}</option>
                                    <option value="2">{{$language[124][session()->get('lang')]}}</option>
                                    <option value="3">{{$language[125][session()->get('lang')]}}</option>
                                </select>
                                <input autocomplete="off" id="search_text" name="search_text" type="text" placeholder="{{$language[135][session()->get('lang')]}}" />
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <!-- <div class="search-location">
                                    <form action="#">
                                        <select class="select-active">
                                            <option>Your Location</option>
                                            <option>Kuwait City</option>
                                            <option>Al Ahmadi</option>
                                            <option>Hawalli</option>
                                            <option>As Salimiyah</option>
                                            
                                        </select>
                                    </form>
                                </div> -->
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
                                    <a href="/customer/favourites"><span class="lable">{{$language[126][session()->get('lang')]}}</span></a>
                                    @else 
                                    <a href="/login">
                                        <img class="svgInject" src="/frontend/assets/imgs/theme/icons/icon-heart.svg" />
                                        <span class="pro-count blue">{{$wishlist_count}}</span>
                                    </a>
                                    <a href="/login"><span class="lable">{{$language[126][session()->get('lang')]}}</span></a>
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
                                    <a href="/cart"><span class="lable">{{$language[127][session()->get('lang')]}}</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            @php 
                                            $cart_header_total=0;
                                            @endphp
                                            @foreach($cart_items as $key => $row)
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="/product-details/{{$row->id}}">
                                                        <img src="/product_image/{{$row->attributes->product_image}}" />
                                                    </a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="/product-details/{{$row->id}}">{{$row->name}}</a></h4>
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
                                                <h4>{{$language[129][session()->get('lang')]}} <span>KWD {{$cart_header_total}}</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="/cart" class="outline">{{$language[130][session()->get('lang')]}}</a>
                                                <a href="/checkout">{{$language[131][session()->get('lang')]}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-action-icon-2">
                                    @if(Auth::check())
                                    <a href="page-account.html">
                                        <img class="svgInject" src="/frontend/assets/imgs/theme/icons/icon-user.svg" />
                                    </a>
                                    <a href="#"><span class="lable ml-0">{{$language[136][session()->get('lang')]}}</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="/customer/profile"><i class="fi fi-rs-user mr-10"></i>{{$language[137][session()->get('lang')]}}</a>
                                            </li>
                                            <li>
                                                <a href="/customer/orders"><i class="fi fi-rs-location-alt mr-10"></i>{{$language[138][session()->get('lang')]}}</a>
                                            </li>
                                            <li>
                                                <a href="/customer/enquiry"><i class="fi fi-rs-heart mr-10"></i>{{$language[139][session()->get('lang')]}}</a>
                                            </li>
                                            <li>
                                                <a href="/customer/manage-address"><i class="fi fi-rs-location-alt mr-10"></i>{{$language[140][session()->get('lang')]}}</a>
                                            </li>
                                            <li>
                                                <a href="/customer/change-password"><i class="fi fi-rs-settings-sliders mr-10"></i>{{$language[141][session()->get('lang')]}}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fi fi-rs-sign-out mr-10"></i>{{$language[142][session()->get('lang')]}}</a>
                                                <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                                @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    @else
                                    <a href="/login">
                                        <img class="svgInject" src="/frontend/assets/imgs/theme/icons/icon-user.svg" />
                                    </a>
                                    <a href="/login"><span class="lable ml-0">{{$language[128][session()->get('lang')]}}</span></a>                                    
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
                        @if(session()->get('theme') == 'dark')
                        <a href="/"><img style="margin-top:10px;padding:10px !important;" src="/website_assets/images/logo-dark.png" alt="logo" /></a>
                        @else
                        <a href="/"><img style="margin-top:10px;padding:10px !important;" src="/website_assets/images/logo-light.png" alt="logo" /></a>
                        @endif
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
                                    <span class="pro-count white">{{$wishlist_count}}</span>
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
                                                <a href="/product-details/{{$row->id}}"><img src="/product_image/{{$row->attributes->product_image}}" /></a>
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
                                            <h4>{{$language[129][session()->get('lang')]}} <span>KWD {{$cart_header_total}}</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="/cart">{{$language[130][session()->get('lang')]}}</a>
                                            <a href="/checkout">{{$language[131][session()->get('lang')]}}</a>
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
                        <input autocomplete="off" type="text" placeholder="{{$language[135][session()->get('lang')]}}" />
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="menu-item-has-children">
                                <a href="#">{{$language[132][session()->get('lang')]}}</a>
                                <ul class="translate dropdown">
                                    {{\App\Http\Controllers\HomeController::viewmobileideacategory()}}
                                    <!-- <li><a href="#">Vendors List</a></li> -->
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">{{$language[133][session()->get('lang')]}}</a>
                                <ul class="translate dropdown">
                                    {{\App\Http\Controllers\HomeController::viewmobileprofessionalcategory()}}
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">{{$language[134][session()->get('lang')]}}</a>
                                <ul class="translate dropdown">
                                    {{\App\Http\Controllers\HomeController::viewmobileshopcategory()}}
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a onclick="translateLanguage('English');" href="#">English</a></li>
                                    <li><a onclick="translateLanguage('Arabic');" href="#">Arabic</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-marker"></i> {{$language[143][session()->get('lang')]}} </a>
                    </div>

                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-user"></i>{{$language[144][session()->get('lang')]}} </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-headphones"></i>{{$language[145][session()->get('lang')]}} </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">{{$language[146][session()->get('lang')]}}</h6>
                    <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                    <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                    <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                    <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                    <a href="#"><img src="/frontend/assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                </div>
                <div class="site-copyright">{{$language[147][session()->get('lang')]}}</div>
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
                                <h3 class="icon-box-title">{{$language[148][session()->get('lang')]}}</h3>
                                <p>{{$language[149][session()->get('lang')]}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="banner-icon">
                                <img src="/frontend/assets/imgs/theme/icons/icon-2.svg" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">{{$language[150][session()->get('lang')]}}</h3>
                                <p>{{$language[151][session()->get('lang')]}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <div class="banner-icon">
                                <img src="/frontend/assets/imgs/theme/icons/icon-3.svg" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">{{$language[152][session()->get('lang')]}}</h3>
                                <p>{{$language[153][session()->get('lang')]}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            <div class="banner-icon">
                                <img src="/frontend/assets/imgs/theme/icons/icon-4.svg" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">{{$language[154][session()->get('lang')]}}</h3>
                                <p>{{$language[155][session()->get('lang')]}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <div class="banner-icon">
                                <img src="/frontend/assets/imgs/theme/icons/icon-5.svg" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">{{$language[156][session()->get('lang')]}}</h3>
                                <p>{{$language[157][session()->get('lang')]}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                            <div class="banner-icon">
                                <img src="/frontend/assets/imgs/theme/icons/icon-6.svg" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">{{$language[158][session()->get('lang')]}}</h3>
                                <p>{{$language[159][session()->get('lang')]}}</p>
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
                                 @if(session()->get('theme') == 'dark')
                                 <a href="index.html" class="mb-15"><img src="/website_assets/images/logo-dark.png" alt="logo" /></a>
                                 @else
                                 <a href="index.html" class="mb-15"><img src="/website_assets/images/logo-light.png" alt="logo" /></a>
                                @endif
                                <p class="font-lg text-heading">{{$language[160][session()->get('lang')]}}</p>
                            </div>
                            <ul class="contact-infor">
                                <li><img src="/frontend/assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>{{$language[161][session()->get('lang')]}}: </strong> <span>{{$language[162][session()->get('lang')]}}</span></li>
                                <li><img src="/frontend/assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>{{$language[163][session()->get('lang')]}}:</strong><span>{{$language[164][session()->get('lang')]}}</span></li>
                                <li><img src="/frontend/assets/imgs/theme/icons/icon-email-2.svg" alt="" /><strong>{{$language[165][session()->get('lang')]}}:</strong><span><a href="mailto:{{$language[166][session()->get('lang')]}}" class="__cf_email__">{{$language[166][session()->get('lang')]}}</a></span></li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <h4 class="widget-title">{{$language[167][session()->get('lang')]}}</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="/about-us">{{$language[168][session()->get('lang')]}}</a></li>
                            <li><a href="/pages/delivery-information">{{$language[169][session()->get('lang')]}}</a></li>
                            <li><a href="/pages/privacy-policy">{{$language[170][session()->get('lang')]}}</a></li>
                            <li><a href="/pages/terms-condition">{{$language[171][session()->get('lang')]}}</a></li>
                            <li><a href="/contact-us">{{$language[172][session()->get('lang')]}}</a></li>
                            <li><a href="/pages/purchase-guide">{{$language[173][session()->get('lang')]}}</a></li>
                      
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
                        <h4 class="widget-title">{{$language[174][session()->get('lang')]}}</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="/professional-register?email=">{{$language[175][session()->get('lang')]}}</a></li>
                            <li><a href="/vendor/login">{{$language[176][session()->get('lang')]}}</a></li>
                            <li><a href="/pages/vendor-guide">{{$language[177][session()->get('lang')]}}</a></li>
                            <li><a href="/professional/login">{{$language[178][session()->get('lang')]}}</a></li>
                            <li><a href="/pages/professional-guide">{{$language[179][session()->get('lang')]}}</a></li>                         
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
                        <h4 class="widget-title">{{$language[180][session()->get('lang')]}}</h4>
                        <p class="">{{$language[181][session()->get('lang')]}}</p>
                        <div class="download-app">
                            <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active" src="/frontend/assets/imgs/theme/app-store.jpg" alt="" /></a>
                            <a href="#" class="hover-up mb-sm-2"><img src="/frontend/assets/imgs/theme/google-play.jpg" alt="" /></a>
                        </div>
                        <p class="mb-20">{{$language[182][session()->get('lang')]}}</p>
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
                    <p class="font-sm mb-0"><?php echo $language[183][session()->get('lang')]; ?></p>
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
                        <h6>{{$language[184][session()->get('lang')]}}</h6>
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
     @if(session()->get('cookies') != '1')
    <div class="cookie-banner small js-cookie-banner" role="alert" id="cookies_banner">
        <div class="cookie-banner__text">
            MyApp uses cookies to personalize your experience on our website. By continuing to use this site, you agree to our <a href="#" class="link">cookie policy</a>.
        </div>
        <button class="btns btn_secondary btn_sm cookie-banner__button js-accept-cookies" onclick="cookies()">Okay</button>
    </div>
    @endif
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    @if(session()->get('theme') == 'dark')
                    <!-- <img src="/frontend/assets/imgs/theme/dark.gif" alt="" /> -->
                   
                    <img src="/images/light-loader.gif" alt="" width="200px"/>
                    @else
                    <img src="/images/dark-loader.gif" alt="" width="200px"/>
                    @endif
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

function SaveFavouriteIdea(id){
    $.ajax({
        url : '/customer/save-favourites-idea/'+id,
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
function DeleteFavouriteIdea(id){
    $.ajax({
        url : '/customer/delete-favourites-idea/'+id,
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

$('#search_text').keypress(function (e) {
  if (e.which == 13) {
    var category_type = $('#category_type').val();
    var search_text = $('#search_text').val();
    var search_text1;
    if(search_text!=""){
        search_text1 = search_text;
    }else{
        search_text1 = '0';
    }

    if(category_type == '1'){
        window.location.href = "/get-ideas/0/0/"+search_text1;
    }
    else if(category_type == '2'){
        window.location.href = "/professional-list/0/0/"+search_text1;
    }
    else if(category_type == '3'){
        window.location.href = "/product-list/0/0/0/"+search_text1;
    }
    else if(category_type == ''){
        window.location.href = "/product-list/0/0/0/"+search_text1;
    }
    return false;  
  }
});

$("#light_dark").change(function(){
    var themedata;
if($(this).prop('checked')){
    themedata = "dark"
}else{
   themedata = "light"
}
$.ajax({
      url : '/update-theme/'+themedata,
      type: "GET",
      success: function(data)
      {
        location.reload();
      }
    });
});
function cookies(){
    
    $.ajax({
      url : '/update-cookies/1',
      type: "GET",
      success: function(data)
      {
     $('#cookies_banner').remove();
      }
    });
}
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
<script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');
}
function translateLanguage(lang) {
    googleTranslateElementInit();
    // if(lang == 'Arabic'){
    //     $("html").children().css("direction","rtl");
    // }
    // else{
    //     $("html").children().css("direction","ltr");
    //     location.reload();
    // }
    var lang1;
    if(lang == 'English'){
        lang1='english';
    }
    else{
        lang1='arabic';
    }
    $.ajax({
        url : '/update-language/'+lang1,
        type: "GET",
        success: function(data)
        {
            googleTranslateElementInit();
            location.reload();
        }
    });
    var $frame = $('.goog-te-menu-frame:first');
    // if (!$frame.size()) {
    //     //alert("Error: Could not find Google translate frame.");
    //     return false;
    // }
    $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
    return false;
}
</script>

</body>

</html>