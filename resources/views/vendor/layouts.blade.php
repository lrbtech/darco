<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>Darco Vendor</title>

  @if(session()->get('theme') == 'light')
  
  @elseif(session()->get('theme') == 'dark')
 
  @else 

  @endif

  <link rel="icon" type="image/x-icon" href="/website_assets/images/ico.ico">

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
  <link rel="stylesheet" type="text/css" href="/assets/css/style.css">

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
.navbar-dark.navbar-horizontal {
    background: #801580;
}
</style>
</head>
<body id="spinner_body" class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover"
data-menu="horizontal-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="/vendor/dashboard/">
              <img class="brand-logo" alt="modern admin logo" src="/website_assets/images/logo-light.png">
              <!-- <h3 class="brand-text">Darco</h3> -->
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
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hello,
                  <span class="user-name text-bold-700">LRB</span>
                </span>
                <span class="avatar avatar-online">
                  <img src="/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"><i class="ft-user"></i> Change Pasword</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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

  @yield('content')
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

  <script>
  var spinner_body = new jQuerySpinner({
    parentId: 'spinner_body'
  });

  function updatetheme(theme) {
    $.ajax({
      url : '/update-theme/'+theme,
      type: "GET",
      success: function(data)
      {
        location.reload();
      }
    });
  }

  </script>
  @yield('extra-js')
  
  <!-- END PAGE LEVEL JS-->
</body>
</html>