@extends('website.layouts')
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
                                    {{$language[185][session()->get('lang')]}}<br />
                                    {{$language[186][session()->get('lang')]}}
                                </h1>
                                <p class="mb-65">
                                {{$language[187][session()->get('lang')]}} <br /> 
                                {{$language[188][session()->get('lang')]}}
                                </p>
                                <form action="/individual-register" class="form-subcriber d-flex">
                                    <input autocomplete="off" required name="email" id="email" type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">{{$language[189][session()->get('lang')]}}</button>
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
                        {{$language[190][session()->get('lang')]}} 
                            <span class="text-brand">{{$language[191][session()->get('lang')]}}</span>
                        </h2>
                        <form action="/professional-register" class="form-subcriber d-flex">
                            <input autocomplete="off" required name="email" id="email" type="email" placeholder="Your emaill address" />
                            <button class="btn" type="submit">{{$language[192][session()->get('lang')]}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="popular-categories section-padding">
    <div class="container">
        <div class="section-title">
            <div class="title">
                <h3>{{$language[193][session()->get('lang')]}}</h3>
                <ul class="translate list-inline nav nav-tabs links">
                    @foreach($category as $row)
                    <li class="translate list-inline-item nav-item">
                        <a class="nav-link home-category{{$row->id}}" href="javascript:void(0)" onclick="gethomesubcategory({{$row->id}})">{{$row->category}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow" id="carausel-8-columns-arrows"></div>
        </div>
        <div class="translate shopBycat"></div>
        
    </div>
</section>
           
            <!--End category slider-->
<section class="featured-products-section" id="section2">
    <div class="section3Overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-sm-12 col-md-4"><br>
            <h1 class="">{{$language[194][session()->get('lang')]}}</h1><br>
            <h4><em>{{$language[195][session()->get('lang')]}}</em></h4><br>
            <p>{{$language[196][session()->get('lang')]}}</p>

            <br>
        <div class="text-center">
            <a href="/professional-list/0/0/0" class="btn btn-dark view-text">{{$language[197][session()->get('lang')]}}</a>
        </div>
        </div>
        <div class="translate col-sm-12 col-md-8">
            <div class="row">
            @foreach($professional_category as $key => $row)
            <div class="col-6 col-md-6">
                <a href="/professional-list/{{$row->id}}/0/0" class=""><div class="card">
                    <div class="card-title">{{$row->category}}</div>
                    <img src="/upload_files/{{$row->image}}" class="img-responsive" height="">
                </div></a>
            </div>
            @endforeach
            <!-- <div class="col-6 col-md-6">
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
            </div> -->
        </div>
        </div>
        </div>
    </div>
</section>

<section class="featured-products-section bg_lite" id="section3">
    <div class="container">
        <h2 class="section-title heading-border ls-20 border-0">{{$language[198][session()->get('lang')]}}</h2>
        <div class="row">
            @foreach($idea_category as $row)
            <div class="translate col-4 col-md-3 col-lg-4">
                <a href="/get-ideas/{{$row->id}}/0/0" class="style2"><div class="card">
                    <div class="card-title">{{$row->category}}</div>
                    <img src="/upload_files/{{$row->image}}" class="img-responsive" height="">
                </div></a>
            </div>
            @endforeach
            <!-- <div class="col-4 col-md-3 col-lg-4">
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
            </div> -->
        </div>
        <br>
        <div class="text-center">
            <a href="/get-ideas/0/0/0" class="btn btn-dark btn-lg view-text">{{$language[199][session()->get('lang')]}}</a>
        </div>
    </div>
</section>

<section class="featured-products-section" id="section4">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-12 col-md-12"><br>
                <h1 class="text_brown">{{$language[200][session()->get('lang')]}}</h1><br>
                <h3 class="sub-title">{{$language[201][session()->get('lang')]}}</h3>
            </div>
        </div>
    </div>
</section>

<section class="featured-products-section">
    <div class="container">
        <h2 class="section-title heading-border ls-20 border-0">{{$language[202][session()->get('lang')]}}</h2>
        <div class="row translate">
            @foreach($professional_category_footer as $key => $row)
            <div class="col-6 col-sm-4 col-md-4 col-lg-2">
                <a href="/professional-list/{{$row->id}}/0/0" class="style2"><div class="card">
                    <div class="card-title">{{$row->category}}</div>
                   
                    <img src="/upload_files/{{$row->image}}" class="img-responsive" height="120px">
                </div></a>
            </div>
             @endforeach
        </div><br>
        <div class="text-center">
            <a href="/professional-list/0/0/0" class="btn btn-dark">{{$language[203][session()->get('lang')]}}</a>
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

@if($category[0]->id != '')
gethomesubcategory({{$category[0]->id}});
@endif

function gethomesubcategory(id){
  $.ajax({
    url : '/get-home-sub-category/'+id,
    type: "GET",
    success: function(data)
    {
        $('.shopBycat').html(data);
        $('.nav-link').removeClass('active');
        $('.home-category'+id).addClass('active');
        $(".carausel-8-columns").each(function (key, item) {
            var id = $(this).attr("id");
            var sliderID = "#" + id;
            var appendArrowsClassName = "#" + id + "-arrows";

            $(sliderID).slick({
                dots: false,
                infinite: true,
                speed: 1000,
                arrows: true,
                autoplay: true,
                slidesToShow: 8,
                slidesToScroll: 1,
                loop: true,
                adaptiveHeight: true,
                responsive: [
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }
                ],
                prevArrow: '<span class="slider-btn slider-prev"><i class="fi-rs-arrow-small-left"></i></span>',
                nextArrow: '<span class="slider-btn slider-next"><i class="fi-rs-arrow-small-right"></i></span>',
                // appendArrows: appendArrowsClassName
            });
        });

    }
  });
}
</script>
@endsection
