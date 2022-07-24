@extends('website.layouts1')
@section('extra-css')
<link rel="stylesheet" href="/website_assets/css/style.css">
<link rel="stylesheet" href="/website_assets/css/responsive.css">
<style>
    .hero-slider-1 .slider-content p {
    font-size: 30px;
    line-height: 2.5rem;
}
p.mb-65 {
    color: #fff;
}
</style>
@endsection
@section('content')
<main class="main">
<section class="home-slider style-2 position-relative mb-50" style="background-image: url(/assets/images/banner-12.png)">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-12">
                <div class="home-slide-cover">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        <div class="single-hero-slider single-animation-wrap" style="background-image: url(/assets/images/banner.jpg)">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40">
                                    Make your dream <br />
                                    home a reality
                                </h1>
                                <p class="mb-65">Find inspiration, products and the pros to make it happen <br /> all in one place</p>
                                <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">SignUp</button>
                                </form>
                            </div>
                        </div>
                        <!-- <div class="single-hero-slider single-animation-wrap" style="background-image: url(/frontend/assets/imgs/slider/slider-4.png)">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40">
                                    Snacks box<br />
                                    daily save
                                </h1>
                                <p class="mb-65">Sign up for the daily newsletter</p>
                                <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div> -->
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
            <div class="col-lg-4 d-none d-xl-block">
                <div class="banner-img style-3 animated animated" style="background-image: url(/assets/images/banner2.gif)">
                    <div class="banner-text mt-50">
                        <h2 class="mb-50 mt-120">
                            Join of Home 
                           
                            <span class="text-brand">Professionals</span>
                        </h2>
                         <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">Join</button>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
   <section class="popular-categories section-padding">
                <div class="container wow animate__animated animate__fadeIn">
                    <div class="section-title">
                        <div class="title">
                            <h3>SHOP BY DEPARTMENT</h3>
                            <ul class="list-inline nav nav-tabs links">
                                <li class="list-inline-item nav-item"><a class="nav-link" href="shop-grid-right.html">Cake & Milk</a></li>
                                <li class="list-inline-item nav-item"><a class="nav-link" href="shop-grid-right.html">Coffes & Teas</a></li>
                                <li class="list-inline-item nav-item"><a class="nav-link active" href="shop-grid-right.html">Pet Foods</a></li>
                                <li class="list-inline-item nav-item"><a class="nav-link" href="shop-grid-right.html">Vegetables</a></li>
                            </ul>
                        </div>
                        <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
                    </div>
                    <div class="carausel-10-columns-cover position-relative">
                        <div class="carausel-10-columns" id="carausel-10-columns">
                            <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="shop-grid-right.html"><img src="assets/imgs/shop/cat-13.png" alt="" /></a>
                                </figure>
                                <h6><a href="shop-grid-right.html">Cake & Milk</a></h6>
                                <span>26 items</span>
                            </div>
                            <div class="card-2 bg-10 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="shop-grid-right.html"><img src="assets/imgs/shop/cat-12.png" alt="" /></a>
                                </figure>
                                <h6><a href="shop-grid-right.html">Oganic Kiwi</a></h6>
                                <span>28 items</span>
                            </div>
                            <div class="card-2 bg-11 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="shop-grid-right.html"><img src="assets/imgs/shop/cat-11.png" alt="" /></a>
                                </figure>
                                <h6><a href="shop-grid-right.html">Peach</a></h6>
                                <span>14 items</span>
                            </div>
                            <div class="card-2 bg-12 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="shop-grid-right.html"><img src="assets/imgs/shop/cat-9.png" alt="" /></a>
                                </figure>
                                <h6><a href="shop-grid-right.html">Red Apple</a></h6>
                                <span>54 items</span>
                            </div>
                            <div class="card-2 bg-13 wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="shop-grid-right.html"><img src="assets/imgs/shop/cat-3.png" alt="" /></a>
                                </figure>
                                <h6><a href="shop-grid-right.html">Snack</a></h6>
                                <span>56 items</span>
                            </div>
                            <div class="card-2 bg-14 wow animate__animated animate__fadeInUp" data-wow-delay=".6s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="shop-grid-right.html"><img src="assets/imgs/shop/cat-1.png" alt="" /></a>
                                </figure>
                                <h6><a href="shop-grid-right.html">Vegetables</a></h6>
                                <span>72 items</span>
                            </div>
                            <div class="card-2 bg-15 wow animate__animated animate__fadeInUp" data-wow-delay=".7s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="shop-grid-right.html"><img src="assets/imgs/shop/cat-2.png" alt="" /></a>
                                </figure>
                                <h6><a href="shop-grid-right.html">Strawberry</a></h6>
                                <span>36 items</span>
                            </div>
                            <div class="card-2 bg-12 wow animate__animated animate__fadeInUp" data-wow-delay=".8s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="shop-grid-right.html"><img src="assets/imgs/shop/cat-4.png" alt="" /></a>
                                </figure>
                                <h6><a href="shop-grid-right.html">Black plum</a></h6>
                                <span>123 items</span>
                            </div>
                            <div class="card-2 bg-10 wow animate__animated animate__fadeInUp" data-wow-delay=".9s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="shop-grid-right.html"><img src="assets/imgs/shop/cat-5.png" alt="" /></a>
                                </figure>
                                <h6><a href="shop-grid-right.html">Custard apple</a></h6>
                                <span>34 items</span>
                            </div>
                            <div class="card-2 bg-12 wow animate__animated animate__fadeInUp" data-wow-delay="1s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="shop-grid-right.html"><img src="assets/imgs/shop/cat-14.png" alt="" /></a>
                                </figure>
                                <h6><a href="shop-grid-right.html">Coffe & Tea</a></h6>
                                <span>89 items</span>
                            </div>
                            <div class="card-2 bg-11 wow animate__animated animate__fadeInUp" data-wow-delay="0s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="shop-grid-right.html"><img src="assets/imgs/shop/cat-15.png" alt="" /></a>
                                </figure>
                                <h6><a href="shop-grid-right.html">Headphone</a></h6>
                                <span>87 items</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End category slider-->
<section class="featured-products-section" id="section2">
    <div class="section3Overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-sm-12 col-md-4"><br>
            <h1 class="">Do you love decorating the space around you?</h1><br>
            <h4><em>Every room needs a touch of colours just as it needs one antique piece.</em></h4><br>
            <p>Be it a corporate house or residential space, the need for Interior Designers has grown manifolds today, and therefore it has become a promising career option. With creative thinking and imaginative skills, Interior Designers can transform ordinary offices spaces, houses, hotels, etc. into masterpieces.</p>

            <br>
        <div class="text-center">
            <a href="#" class="btn btn-dark view-text">View all</a>
        </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="row">
            <div class="col-6 col-md-6">
                <a href="/professionals/lists" class=""><div class="card">
                    <div class="card-title">Spacious Living room</div>
                    <img src="/website_assets/images/d1.jpg" class="img-responsive" height="">
                </div></a>
            </div>
            <div class="col-6 col-md-6">
                <a href="/professionals/lists" class=""><div class="card">
                    <div class="card-title">Pots</div>
                    <img src="/website_assets/images/d2.jpg" class="img-responsive" height="">
                </div></a>
            </div>
            <div class="col-6 col-md-6">
                <a href="/professionals/lists" class=""><div class="card">
                    <div class="card-title">Planter</div>
                    <img src="/website_assets/images/d3.jpg" class="img-responsive" height="">
                </div></a>
            </div>
            <div class="col-6 col-md-6">
                <a href="/professionals/lists" class=""><div class="card">
                    <div class="card-title">Small Space Furnishing</div>
                    <img src="/website_assets/images/d4.jpg" class="img-responsive" height="">
                </div></a>
            </div>
        </div>
        </div>
        </div>
    </div>
</section>

<section class="featured-products-section bg_lite" id="section3">
    <div class="container">
        <h2 class="section-title heading-border ls-20 border-0">Browse ideas by Room</h2>
        <div class="row">
            <div class="col-4 col-md-3 col-lg-4">
                <a href="#" class="style2"><div class="card">
                    <div class="card-title">Kitchen</div>
                    <img src="/website_assets/images/kitchen.jpg" class="img-responsive" height="">
                </div></a>
            </div>
            <div class="col-4 col-md-3 col-lg-4">
                <a href="#" class="style2"><div class="card">
                    <div class="card-title">Living</div>
                    <img src="/website_assets/images/living.jpg" class="img-responsive"  height="">
                </div></a>
            </div>
            <div class="col-4 col-md-3 col-lg-4">
                <a href="#" class="style2"><div class="card">
                    <div class="card-title">Bed Room</div>
                    <img src="/website_assets/images/bedroom.jpg" class="img-responsive"  height="">
                </div></a>
            </div>
            <div class="col-4 col-md-3 col-lg-4">
                <a href="#" class="style2"><div class="card">
                    <div class="card-title">Bathroom</div>
                    <img src="/website_assets/images/bathroom.jpg" class="img-responsive" height="">
                </div></a>
            </div>
            <div class="col-4 col-md-3 col-lg-4">
                <a href="#" class="style2"><div class="card">
                    <div class="card-title">Outdoor</div>
                    <img src="/website_assets/images/outdoor.jpg" class="img-responsive" height="">
                </div></a>
            </div>
            <div class="col-4 col-md-3 col-lg-4">
                <a href="#" class="style2"><div class="card">
                    <div class="card-title">Dinning</div>
                    <img src="/website_assets/images/dinning.jpg" class="img-responsive" height="">
                </div></a>
            </div>
        </div>
        <br>
        <div class="text-center">
            <a href="#" class="btn btn-dark btn-lg view-text">View your ideas</a>
        </div>
    </div>
</section>

<section class="featured-products-section" id="section4">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-12 col-md-12"><br>
                <h1 class="text_brown">Good ideas beget great designs</h1><br>
                <h3 class="sub-title">But design is nothing without details and finesse. We bring the experience and dedication to deliver your dream.</h3>
            </div>
        </div>
    </div>
</section>

<section class="featured-products-section">
    <div class="container">
        <h2 class="section-title heading-border ls-20 border-0">Contact the professional</h2>
        <div class="row">
            @foreach($professional as $key => $row)
            <div class="col-6 col-sm-4 col-md-4 col-lg-2">
                <a href="/professionals/lists" class="style2"><div class="card">
                    <div class="card-title">{{$row->category}}</div>
                   
                    <img src="/upload_files/{{$row->image}}" class="img-responsive" height="120px">
                </div></a>
            </div>
             @endforeach
        </div><br>
        <div class="text-center">
            <a href="/professionals/lists" class="btn btn-dark">View all</a>
        </div>
    </div>
</section>
</main>
@endsection
@section('extra-js')
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
@endsection