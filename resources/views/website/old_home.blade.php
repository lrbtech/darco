@extends('website.layouts')
@section('extra-css')

@endsection
@section('content')
<section class="banner">
    <div class="container-fluid" style="padding-left:0px;">
        <div class="row">
        <div class="col-md-8" style="padding:0">
            <div class="slideshow-container">
            <div class="mySlides fade">
                <!-- <div class="numbertext">1 / 3</div> -->
                <img src="/website_assets/images/home/banner3.jpg" class="w3-animate-fading"  style="width:100%">
                <!-- <div class="text">Caption Text</div> -->
            </div>
            <div class="mySlides fade"><img src="/website_assets/images/home/banner4.jpg" class="w3-animate-fading" style="width:100%"></div>
            <div class="mySlides fade"><img src="/website_assets/images/home/banner5.jpg" class="w3-animate-fading" style="width:100%"></div>
            <div class="mySlides fade"><img src="/website_assets/images/home/banner.jpg" class="w3-animate-fading" style="width:100%"></div>

            <!-- <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a> -->
            </div>
        </div>
        <div class="col-md-4" style="padding:0">
            <div id="bannerOverlay"></div>
            <div id="bannerContent">
            <div id="bannerText">
                <h1>Get your Dream home constructed by our experts</h1><br>
                <p>We provide end to end solution to get your new home constructed. 
                <span>Get thoughtful home interior design elements that add real value to your interiors!</span></p> 
                <!-- <p>We bring you creative home design products that work together beautifully to form inspired living spaces.</p> -->

                <div class="row">
                <div class="col-12 col-md-12 col-lg-8 col-xl-6">
                    <form action="#">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email address" required>
                    </div>
                    <button class="btn btn-success" type="submit">Sign Up with Email</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>


<section class="featured-products-section">
    <div class="container">
        <h2 class="section-title heading-border ls-20 border-0">Shop by Department</h2>
        <div class="row">
            @foreach($home as $row)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a href="/product-list"><div class="card">
                    <div class="card-title">{{$row->category}}</div>
                    <img src="/upload_files/{{$row->image}}" class="img-responsive" height="120px">
                </div></a>
            </div>
            @endforeach
        </div><br>
    </div>
</section>

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

@endsection
@section('extra-js')
@endsection