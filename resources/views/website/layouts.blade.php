<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/x-icon" href="/website_assets/images/ico.ico">
    <title>Darco</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/website_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="/website_assets/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    
    <link rel="stylesheet" href="/website_assets/css/style.css">
    <link rel="stylesheet" href="/website_assets/css/responsive.css">

    @yield('extra-css')

    <link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.css')}}">
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
    <link href="{{asset('autocomplete/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="/website_assets/js/jquery.min.js"></script>  

    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('autocomplete/jquery-ui.min.js') }}"></script>
    <!-- <script src="/website_assets/js/jquery.slim.min.js"></script> -->
    <script src="/website_assets/js/bootstrap.bundle.min.js"></script>

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
</style>
<body id="spinner_body">

<header class="bd-navbar">

<div class="container-fluid1">
<div class="row">
  <div class="col-md-12 col-lg-2 col-xl-2 text-center" style="padding-right:0">
    <a class="navbar-brand" href="/">
      <img src="/website_assets/images/logobig.png" width="100">
    </a>
  </div>
  <div class="col-md-12 col-lg-10 col-xl-10" style="padding-left: 0;">
    <nav class="navbar navbar-expand-xl navbar-dark  bg-light">
  <div class="container-fluid">
  <div class="toggle-button">
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#menu01" aria-controls="menu01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</div>
</div>
</nav>
<div class="topHeader">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
        <form action="#" method="POST" id="menuSearch">
            <input type="text" class="form-control" id="searchInp" placeholder="Search Photos, products, Pros & More...">
            <button type="submit" class="topSearch"><i class="fa fa-search"></i></button>
        </form>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6" style="padding-right:0">
        <ul class="topMenu">
          <li><a href="/about-us">About Us </a></li>
          <li><a href="/contact-us">Contact Us</a></li>
          <li><a href="#">Blog</a></li>
          
          <!-- <li class="nav-item dropdown position-static2">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-heart"></i></a>
              <div class="dropdown-menu" >
                <table width="100%" border="0" cellspacing="5" cellpadding="5">
                  <tr>
                    <td style="background: #2e2e38;"><i>No order yet added</i> &#128530; !</td>
                  </tr>
                </table>
              </div>
          </li> -->
          <!-- <li class="nav-item dropdown position-static2" id="menuWhislist">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-heart"></i></a>
              <div class="dropdown-menu" id="menuWhislist_dropdown">
                <table width="100%" border="0" cellspacing="5" cellpadding="5">
                  <tr>
                    <td width="80"><img src="/website_assets/images/dinning-table.png" class="img-responsive"></td>
                    <td>
                      <table width="100%">
                        <tr><td><span><a href="productDetails.php">Dining Table</a></span></td></tr>
                        <tr><td><a href="cart.php" class="cartMove">Move to cart</a></td></tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td><img src="/website_assets/images/light.png" class="img-responsive"></td>
                    <td>
                      <table width="100%">
                        <tr><td><span><a href="productDetails.php">22" Table Lamp - Whiteray Hurricane Outdoor Metal Lighting</a></span></td></tr>
                        <tr><td><a href="cart.php" class="cartMove">Move to cart</a></td></tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td width="80"><img src="/website_assets/images/dinning-table.png" class="img-responsive"></td>
                    <td>
                      <table width="100%">
                        <tr><td><span><a href="productDetails.php">Dining Table</a></span></td></tr>
                        <tr><td><a href="cart.php" class="cartMove">Move to cart</a></td></tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </div>
          </li> -->
          <!-- <li><a href="cart.php"><i class="far fa-shopping-cart"></i></a></li> -->
          <li class="nav-item"><a class="nav-link" href="/cart"><i class="far fa-shopping-cart"></i> <span class="badge badge-danger">
            <?php
            $cartCollection = Cart::getContent();
            $cartCollection->count();
            ?>
            {{$cartCollection->count()}}
          </span></a></li>

          @if(Auth::check())
           <li class="nav-item dropdown position-static2" id="menuProfile2">
            <a class="nav-link" href="#" class="menuItem" style="font-size:16px"><i class="fas fa-user-circle"></i> Hi {{Auth::user()->first_name}} {{Auth::user()->last_name}},</a>
            <div class="dropdown-menu" >
                <a class="dropdown-item" href="/customer/profile">Edit Profile</a>
                <a class="dropdown-item" href="/customer/orders">View Orders</a>
                <a class="dropdown-item" href="/customer/manage-address">Manage Address</a>
                <a class="dropdown-item" href="/customer/favourites">Favourites</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            </div>
          </li>
          @else
          <li><a href="/login"><i class="fa fa-user"></i> Sign In</a></li>
          @endif

        </ul>
      </div>
    </div>
  </div>
</div>    </div>
</div>
    <nav class="navbar navbar-expand-xl navbar-dark  bg-light">
  <div class="container-fluid">
  <!-- <div class="toggle-button">
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#menu01" aria-controls="menu01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</div> -->
<!-- To show dropdwon arrow bootstrap file line no : 3017  -->
    <div class="collapse navbar-collapse justify-content-center" id="menu01">
      <ul class="navbar-nav" id="topMenu">
        
      
       
      
      
      </ul>
    </div>
    </div>
</nav>
  

</div>
</header>

    

@yield('content')


<footer class="footer bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                    <h4 class="footer-title">Contact Info</h4>
                    <ul class="contact-info">
                        <li>
                            <span class="contact-info-label">Address:</span>123 Street Name, City, Country
                        </li>
                        <li>
                            <span class="contact-info-label">Phone:</span><a href="tel:">(123)456-7890</a>
                        </li>
                        <li>
                            <span class="contact-info-label">Email:</span> <a href="mailto:mail@example.com">mail@example.com</a>
                        </li>
                    </ul>
                    <div class="social-icons">
                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                        <a href="#" class="social-icon social-instagram icon-instagram" target="_blank" title="Instagram"></a>
                    </div>
            </div>
            <!-- End .col-lg-3 -->

            <div class="col-lg-4 col-sm-6">
                    <h4 class="footer-title">Customer Service</h4>
                    <ul class="links">
                        <li><a href="faq.php">Help &amp; FAQs</a></li>
                        <li><a href="myorders.php">Order Tracking</a></li>
                        <li><a href="editprofile.php">My Account</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="footer-newsletter">
                    <h4 class="widget-title">Subscribe newsletter</h4>
                    <p>Get all the latest information on events, sales and offers. Sign up for newsletter:
                    </p>
                    <form action="#" class="mb-0">
                        <div class="form-group">
                        <input type="email" class="form-control m-b-3" placeholder="Email address" required="">
                        </div>

                        <input type="submit" class="btn btn-primary shadow-none" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="footer-bottom">
            <div class="container">
                <div class="text-center">
                    <span class="footer-copyright">© DARCO 2022. All Rights Reserved</span>
                </div>
            </div>
        </div>
        <!-- End .footer-bottom -->
    </div>
    <!-- End .container -->
</footer>


<!-- Modal enteringViewpoint -->
<div class="modal fade" id="enteringViewpoint" tabindex="-1" role="dialog" aria-labelledby="enteringViewpointLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Choose who you are?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <a href="/individual-register" class="style3" id="view1">
              <div class="card">
                <div class="card-title"><h4>Individual</h4></div>
                <div class="card-desc text-center">
                  <span id="img-icon"></span><br> <br>
                  <p>I am a owner of the property, selling the lands, homes, appliances, like etc.,</p>
                <div class="text-left">  
                </div>
              </div>
              <button type="button" class="btn btn-dark btn-md">Join us</button>
            </div>
          </a>
          </div>
          <div class="col-sm-6">
            <a href="/professional-register" class="style3" id="view2">
            <div class="card">
              <div class="card-title"><h4>Professional</h4></div>
              <div class="card-desc text-center">
                <span id="img-icon2"></span><br> <br>
                <p>We offer home improvement service or sell home products, lands.</p>
                <div class="text-left">
              </div>
              </div>
              <button type="button" class="btn btn-dark btn-md">Join us</button>
            </div>
          </a>
          </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

            
<script type="text/javascript">
// Banner
$(function(){
let slideIndex = 0;
showSlides();
  function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    slides[slideIndex-1].style.display = "block";  
    setTimeout(showSlides, 9000); 
  };
});
</script>

<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>


<script>

// Edit Profile
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#imagePreview').css('background-image', 'url('+e.target.result +')');
        $('#imagePreview').hide();
        $('#imagePreview').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imageUpload").change(function() {
  readURL(this);
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
  if($('.bbb_viewed_slider').length)
  {
    var viewedSlider = $('.bbb_viewed_slider');

    viewedSlider.owlCarousel(
    {
        loop:true,
        margin:30,
        autoplay:true,
        autoplayTimeout:6000,
        nav:false,
        dots:false,
        responsive:
        {
            0:{items:2},
            575:{items:2},
            768:{items:3},
            991:{items:4},
            1199:{items:6}
        }
    });

    if($('.bbb_viewed_prev').length)
    {
        var prev = $('.bbb_viewed_prev');
        prev.on('click', function()
        {
            viewedSlider.trigger('prev.owl.carousel');
        });
    }

    if($('.bbb_viewed_next').length)
    {
        var next = $('.bbb_viewed_next');
        next.on('click', function()
        {
            viewedSlider.trigger('next.owl.carousel');
        });
    }
  }
});
</script>
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
getMenu();
function getMenu(){
    
  $.ajax({
    url : '/get-menu',
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      $("#topMenu").html(data);
    }
  });
}

</script>
@yield('extra-js')


  </body>
</html>