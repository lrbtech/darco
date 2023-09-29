<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>DARSTORE Vendor</title>

  <link rel="icon" type="image/x-icon" href="/website_assets/images/ico.ico">
  @if(session()->get('theme') == 'dark')
  <link id="themefile" rel="stylesheet" href="/theme/dark.css"/>
  @endif
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="/app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/weather-icons/climacons.min.css">
  <link rel="stylesheet" type="text/css" href="/app-assets/fonts/meteocons/style.css">
  <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/charts/chartist.css">
  <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="/app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/horizontal-menu.css">
  <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="/app-assets/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/timeline.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RVVY4PEBQD"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-RVVY4PEBQD');
</script>
  <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
  <script src="/theme/iconify.min.js" type="text/javascript"></script>
<style>
  

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
  top: 13px;
}

.toggle-checkbox:checked ~ .toggle-slot {
  background-color: #374151;
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

.sun-icon {
  position: absolute;
  height: 2em;
  width: 2em;
  color: #ffbb52;
}

.sun-icon-wrapper {
  position: absolute;
  height: 2em;
  width: 2em;
  opacity: 1;
  transform: translate(6px, 4px) rotate(15deg);
  transform-origin: 50% 50%;
  transition: opacity 150ms, transform 500ms cubic-bezier(.26,2,.46,.71);
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

.toggle-checkbox:checked ~ .toggle-slot .moon-icon-wrapper {
  opacity: 1;
  transform: translate(4em, 4px) rotate(-15deg);
}
</style>
  @yield('extra-css')

  <!-- END Custom CSS-->
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
.header-navbar .navbar-header .navbar-brand .brand-logo {
  width: 88px;
}
</style>
@if(session()->get('theme') == 'light')
<style>
.navbar-dark.navbar-horizontal {
  background: #250a78;
}
.btn-danger {
  background-color: #250a78 !important;
  color: #FFFFFF;
}
.btn-danger:hover {
  background-color: #250a78 !important;
}
.app-content .wizard.wizard-notification > .steps > ul > li.current .step {
  border: 2px solid #250a78;
  color: #250a78;
  line-height: 36px;
}
.app-content .wizard.wizard-notification > .steps > ul > li.current .step:after {
  border-top-color: #250a78;
}
.app-content .wizard > .steps > ul > li.done .step {
  background-color: #250a78;
  border-color: #250a78;
  color: #fff;
}
.app-content .wizard.wizard-notification > .steps > ul > li:before, .app-content .wizard.wizard-notification > .steps > ul > li:after {
  top: 39px;
  width: 50%;
  height: 2px;
  background-color: #250a78;
}
.app-content .wizard.wizard-notification > .steps > ul > li.done .step:after {
  border-top-color: #250a78;
}
</style>
@else
<style>
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
  margin-bottom: 0.5rem;
  font-family: "Quicksand", Georgia, "Times New Roman", Times, serif;
  font-weight: 400;
  line-height: 1.2;
  color: #b0bec5;
}
.navbar-dark .navbar-nav .nav-link {
  color: #333;
}
.navbar-dark.navbar-horizontal {
  background: #41eafc;
}
.btn-danger.btn-glow {
  box-shadow: 0px 1px 20px 1px rgb(255 255 255 / 50%);
}
.btn-danger {
  border-color: #6b6f82 !important;
  background-color: #41eafc !important;
  color: #FFFFFF;
}
.btn-danger:hover {
  border-color: #6b6f82 !important;
  background-color: #202125 !important;
  color: #FFFFFF;
}
form label {
  color: #40e7f8 !important;
}
.app-content .wizard > .steps > ul > li.current > a {
  color: #fff;
  cursor: default;
}
form .form-control {
  border: 1px solid #cacfe7;
  color: #40e7f8;
}
.card-header {
  background-color: #2c303b !important;
}
.navbar-light {
  background: #0e0e0f !important;
}
.form-control {
  background-color: #37474f;
}
.mce-panel {
  background-color: #0e0e0f !important;
}
.mce-menubar .mce-menubtn button span {
  color: #ddd !important;
}
.modal-content {
  background-color: #14151c;
}

.form-input {
  width: 150px;
  /* padding: 3px; */
  background: #21252a;
  /* border: 2px dashed dodgerblue; */
}

.goog-te-banner-frame.skiptranslate {
  display: none !important;
} 
</style>
 @endif
<style>
 .goog-te-banner-frame.skiptranslate {
  display: none !important;
} 
</style>
</head>
<body id="spinner_body" class="translate horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover"
data-menu="horizontal-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="/vendor/dashboard/">
              @if(session()->get('theme') == 'light')
              <img class="brand-logo" alt="modern admin logo" src="/website_assets/images/logo-light.png">
              @else
              <img class="brand-logo" alt="modern admin logo" src="/website_assets/images/logo-dark.png">

              @endif
              <!-- <h3 class="brand-text">DARSTORE</h3> -->
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
            
          </ul>
          
          <ul class="nav navbar-nav float-right">
            <div id="google_translate_element" style="display: none;"></div>
            <!-- <li class="dropdown dropdown-language nav-item">
              <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if(session()->get('lang') == 'english')
                <i class="flag-icon flag-icon-gb"></i>
                <span class="selected-language">English</span>
                @else 
                <i class="flag-icon flag-icon-ar"></i>
                <span class="selected-language">Arabic</span>
                @endif
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                <a onclick="translateLanguage('English');" class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a>
                <a onclick="translateLanguage('Arabic');" class="dropdown-item" href="#"><i class="flag-icon flag-icon-ar"></i> Arabic</a>
              </div>
            </li> -->
            <li class="dropdown dropdown-notification nav-item">
              <label>
                @if(session()->get('theme') == 'light')
                <input class='toggle-checkbox' type='checkbox' id='light_dark'></input>
                @else
                <input class='toggle-checkbox' type='checkbox' id='light_dark' checked></input>

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
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hello,
                  <span class="user-name text-bold-700">{{Auth::guard('vendor')->user()->first_name}} {{Auth::guard('vendor')->user()->last_name}}</span>
                </span>
                <span class="avatar avatar-online">
                  <img src="/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="/vendor/change-password"><i class="ft-user"></i> Change Pasword</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('vendor.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>
                <form id="logout-form" action="{{ route('vendor.logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
              </div>
            </li>
            
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @include('vendor.menu')

  
  @if(Auth::user()->status == '0')
    <center>
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>Waiting for Admin Approval</h1>
                    <h4>Please Contact Darstore Admin</h4>
                </div>
            </div>
        </div>
    </center>
    @elseif(Auth::user()->status == '1')
    @yield('content')
    @elseif(Auth::user()->status == '2')
    <center>
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>Your Account is Deactivated</h1>
                    <h4>Please Contact Darstore Admin</h4>
                </div>
            </div>
        </div>
    </center>
    @endif

  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2022 <a class="text-bold-800 grey darken-2" href="https://lrbinfotech.com/" target="_blank">LRBInfotech </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.css')}}">
  <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
  <link href="{{asset('autocomplete/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">

  <script src="/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>

  <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('toastr/toastr.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('autocomplete/jquery-ui.min.js') }}"></script>
  <!-- BEGIN VENDOR JS-->

  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="/app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script type="text/javascript" src="/app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
  <script src="/app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
  <script src="/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js"
  type="text/javascript"></script>
  <script src="/app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
  <script src="/app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
  <script src="/app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script type="text/javascript" src="/app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>

<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
<script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');
}
function translateLanguage(lang) {
  googleTranslateElementInit();
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
  //   //alert("Error: Could not find Google translate frame.");
  //   return false;
  // }
  $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
  return false;
} 



var spinner_body = new jQuerySpinner({
  parentId: 'spinner_body'
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
</script>

@yield('extra-js')
<!-- END PAGE LEVEL JS-->
</body>
</html>