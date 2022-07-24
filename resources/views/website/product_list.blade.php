@extends('website.layouts')
@section('extra-css')
<style>
    .icon-control {
    margin-top: 5px;
    float: right;
    font-size: 80%;
}
a {
    color: #000;
      text-decoration: none !important;

}
.card-header {
    background: #41eafc;
}
.btn-primary {
    color: #fff;
    background-color: #41eafc;
    border-color: #41eafc;
}
.btn-light {
    background-color: #fff;
    border-color: #e4e4e4;
}

.list-menu {
    list-style: none;
    margin: 0;
    padding-left: 0;
}
.list-menu a {
    color: #343a40;
}
 .sale {
            flex-direction: row-reverse;
        }

        .card {
            width: fit-content;
        }

        .card-body {
            width: fit-content;
        }

        .btn-salse {
            border-radius: 0;
            width: fit-content;
            background-color: #69F0AE;
            box-shadow: 0px 10px 10px #E0E0E0;
            z-index: 1;
            color: white;
            width: 100px;
            font-size: 14px;
            font-weight: 900;
        }

        .img-thumbnail {
            border: none;
            height:200px;
        }

        .card {
            box-shadow: 0 20px 40px rgba(0, 0, 0, .2);
            border-radius: 5px;
            padding-bottom: 10px;
        }

        .card-title {
            font-size: 14px;
            font-weight: 600;
        }

        .card-text {
            font-size: 14px;
            font-family: sans-serif;
            font-weight: 500;
        }



</style>
@endsection
@section('content')
    
<div class="container mt-5 mb-5">
    <div class="card12">
	    <div class="row">
            <div class="col">
               <div class="bbb_main_container">
                <div class="bbb_viewed_title_container">
                    <h3 class="bbb_viewed_title">Lamp lights</h3>
                </div>
                 <div class="bbb_viewed_slider_container">
                    <div class="owl-carousel owl-theme bbb_viewed_slider">
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image"><img src="/website_assets/images/lights/8.jpg" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_name"><a href="productDetails.php">US DZIRE - THE BRAND OF LIFESTYLE ® 406 Hanging Lamp Electric Antique Wooden Ceiling Lights with Gold Bulb Pendant Lamp Night Lamp Living Room </a></div>
                                </div> 
                            </div>
                        </div>
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image"><img src="/website_assets/images/lights/2.png" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_name"><a href="productDetails.php">22" Table Lamp - Whiteray Hurricane Outdoor Metal Lighting</a></div>
                                </div> 
                            </div>
                        </div>
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image"><img src="/website_assets/images/lights/3.png" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_name"><a href="productDetails.php">22" Table Lamp - Whiteray Hurricane Outdoor Metal Lighting</a></div>
                                </div> 
                            </div>
                        </div>
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image"><img src="/website_assets/images/lights/4.png" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_name"><a href="productDetails.php">22" Table Lamp - Whiteray Hurricane Outdoor Metal Lighting</a></div>
                                </div> 
                            </div>
                        </div>
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image"><img src="/website_assets/images/lights/5.jpg" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_name"><a href="productDetails.php">US DZIRE - THE BRAND OF LIFESTYLE 408 Hanging Lamp Electric Antique Wooden Ceiling Lights</a></div>
                                </div> 
                            </div>
                        </div>
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image"><img src="/website_assets/images/lights/6.jpg" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_name"><a href="productDetails.php">OURVIC 40 watts Ceiling Light, Black, Cage, Round Cluster</a></div>
                                </div> 
                            </div>
                        </div>
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image"><img src="/website_assets/images/lights/7.jpg" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_name"><a href="productDetails.php">Best India Cane Handicraft Hanging Lamps for Livingroom Home Decoration Cane Lamp Shades Hanging Bamboo Lamp Lights Balcony</a></div>
                                </div> 
                            </div>
                        </div>
                    </div>
                        <div class="bbb_viewed_nav_container text-center mt-5 mb-5">
                            <a href="javascript:;" class="bbb_viewed_nav bbb_viewed_prev"><i class="fas fa-chevron-left"></i></a>
                            <a href="javascript:;" class="bbb_viewed_nav bbb_viewed_next"><i class="fas fa-chevron-right"></i></a>
                        </div>
                </div>
               </div> 
            </div>
        </div>

        <div class="newsletter mt-3 mb-3">
            <h2>Sign Up and Get 25% Discount</h2>
            <p class="description">Get it first. Sign up for up-to-the-minute offers, sales and news.</p>
        </div>

      
    </div>

   
    <div class="row">
        <div class="col-md-3">
            	
            <div class="card">
                <article class="filter-group">
                    <header class="card-header">
                        <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                            <i class="icon-control fa fa-chevron-down"></i>
                            <h6 class="title">Category</h6>
                        </a>
                    </header>
                    <div class="filter-content collapse show" id="collapse_1" style="">
                        <div class="card-body">
                            <form class="pb-3">
                            <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                            </div>
                            </div>
                            </form>
                            
                            <ul class="list-menu">
                            <li><a href="#">Living Room  </a></li>
                            <li><a href="#">Bedroom Furniture </a></li>
                            <li><a href="#">Kitchen & Dining  </a></li>
                            <li><a href="#">Office  </a></li>
                          
                            </ul>

                        </div> <!-- card-body.// -->
                    </div>
                </article> <!-- filter-group  .// -->
                <article class="filter-group">
                    <header class="card-header">
                        <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
                            <i class="icon-control fa fa-chevron-down"></i>
                            <h6 class="title">Colors </h6>
                        </a>
                    </header>
                    <div class="filter-content collapse show" id="collapse_2" style="">
                        <div class="card-body">
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" checked="" class="custom-control-input">
                            <div class="custom-control-label">Grey  
                                <b class="badge badge-pill badge-light float-right">2</b>  </div>
                            </label>
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" checked="" class="custom-control-input">
                            <div class="custom-control-label">White 
                                <b class="badge badge-pill badge-light float-right">1</b>  </div>
                            </label>
                           
                </div> <!-- card-body.// -->
                    </div>
                </article> <!-- filter-group .// -->
                <article class="filter-group">
                    <header class="card-header">
                        <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class="">
                            <i class="icon-control fa fa-chevron-down"></i>
                            <h6 class="title">Price range </h6>
                        </a>
                    </header>
                    <div class="filter-content collapse show" id="collapse_3" style="">
                        <div class="card-body">
                            <input type="range" class="custom-range" min="0" max="100" name="">
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label>Min</label>
                            <input class="form-control" placeholder="KWD 0" type="number">
                            </div>
                            <div class="form-group text-right col-md-6">
                            <label>Max</label>
                            <input class="form-control" placeholder="KWD 1,0000" type="number">
                            </div>
                            </div> <!-- form-row.// -->
                            <button class="btn btn-block btn-primary">Apply</button>
                        </div><!-- card-body.// -->
                    </div>
                </article> <!-- filter-group .// -->
                <article class="filter-group">
                    <header class="card-header">
                        <a href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="true" class="">
                            <i class="icon-control fa fa-chevron-down"></i>
                            <h6 class="title">Sizes </h6>
                        </a>
                    </header>
                    <div class="filter-content collapse show" id="collapse_4" style="">
                        <div class="card-body">
                        <label class="checkbox-btn">
                            <input type="checkbox">
                            <span class="btn btn-light"> XS </span>
                        </label>

                        <label class="checkbox-btn">
                            <input type="checkbox">
                            <span class="btn btn-light"> SM </span>
                        </label>

                        <label class="checkbox-btn">
                            <input type="checkbox">
                            <span class="btn btn-light"> LG </span>
                        </label>

                        <label class="checkbox-btn">
                            <input type="checkbox">
                            <span class="btn btn-light"> XXL </span>
                        </label>
                    </div><!-- card-body.// -->
                    </div>
                </article> <!-- filter-group .// -->
                <article class="filter-group">
                    <header class="card-header">
                        <a href="#" data-toggle="collapse" data-target="#collapse_5" aria-expanded="false" class="">
                            <i class="icon-control fa fa-chevron-down"></i>
                            <h6 class="title">More filter </h6>
                        </a>
                    </header>
                    <div class="filter-content collapse in" id="collapse_5" style="">
                        <div class="card-body">
                            <label class="custom-control custom-radio">
                            <input type="radio" name="myfilter_radio" checked="" class="custom-control-input">
                            <div class="custom-control-label">Any condition</div>
                            </label>

                            <label class="custom-control custom-radio">
                            <input type="radio" name="myfilter_radio" class="custom-control-input">
                            <div class="custom-control-label">Brand new </div>
                            </label>

                            <label class="custom-control custom-radio">
                            <input type="radio" name="myfilter_radio" class="custom-control-input">
                            <div class="custom-control-label">Used items</div>
                            </label>

                            <label class="custom-control custom-radio">
                            <input type="radio" name="myfilter_radio" class="custom-control-input">
                            <div class="custom-control-label">Very old</div>
                            </label>
                        </div><!-- card-body.// -->
                    </div>
                </article> 
            </div> <!-- card.// -->

        </div>
        <div class="col-md-9">
            <div class="row">
             @foreach($product as $row)
            <div class="card mx-auto col-md-5" style="height:400px">
                 <a href="/product-details/{{$row->id}}" target="_blank">
            <div class="d-flex sale ">
                <div class="btn btn-salse">Sales</div>
            </div>
            <img class='mx-auto img-thumbnail'
                src="/product_image/{{$row->image}}"
                width="auto" height="auto"/>
            <div class="card-body text-center mx-auto">
                <h5 class="card-title">{{$row->product_name}}</h5>
                <a href="/product-details/{{$row->id}}" class="btn btn-block btn-primary">KWD {{$row->sales_price}} </a>
          
            </div>
    </a>
        </div>
         @endforeach
         </div>
        </div>
    </div>
</div>


@endsection
@section('extra-js')
@endsection