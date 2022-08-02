@extends('website.layouts')
@section('extra-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<style>
    .star-rating{
        direction:rtl;margin-bottom:25px;text-align:center}.star-rating input{display:none}.star-rating input:checked ~ label::after{opacity:1}.star-rating label{display:inline-block;position:relative;cursor:pointer;margin:0px 8px}.star-rating label:hover::after{opacity:1}.star-rating label:hover:hover ~ label::after{opacity:1}.star-rating label::before{content:"\f005";font-family:'Font Awesome 5 Free';font-weight:900;font-size:35px;display:block;color:#bbbbbb}.star-rating label::after{content:"\f005";font-family:'Font Awesome 5 Free';font-weight:900;font-size:35px;position:absolute;display:block;top:0px;left:0px;color:#ffcc23;opacity:0}@media (max-width: 575px){.star-rating label{margin:0px 3px}
    }
</style>
@endsection
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> 
                <a href="#">{{\App\Http\Controllers\PageController::viewcategoryname($product->category)}}</a> 
                <span></span> {{\App\Http\Controllers\PageController::viewcategoryname($product->subcategory)}}
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-11 col-lg-12 m-auto">
                <div class="row">

<div class="col-xl-9">
    <div class="product-detail accordion-detail">
        <form id="form" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row mb-50 mt-30">
            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                <div class="detail-gallery">
                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                    <!-- MAIN SLIDES -->
                    <div class="product-image-slider">
                        <figure class="border-radius-10">
                            <img src="/product_image/{{$product->image}}" />
                        </figure>
                        @foreach($product_images as $row)
                        <figure class="border-radius-10">
                            <img src="/product_image/{{$row->image}}" />
                        </figure>
                        @endforeach
                    </div>
                    <!-- THUMBNAILS -->
                    <div class="slider-nav-thumbnails">
                        <div><img src="/product_image/{{$product->image}}" /></div>
                        @foreach($product_images as $row)
                        <div><img src="/product_image/{{$row->image}}" /></div>
                        @endforeach
                    </div>
                </div>
                <!-- End Gallery -->
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="detail-info pr-30 pl-30">
                    <!-- <span class="stock-status out-stock"> Sale Off </span> -->
                    <h2 class="title-detail">{{$product->product_name}}</h2>
                    <div class="product-detail-rating">
                        <div class="product-rate-cover text-end">
                            <div class="product-rate d-inline-block">
                                <div class="product-rating" style="width: 90%"></div>
                            </div>
                            <span class="font-small ml-5 text-muted"> (0 reviews)</span>
                        </div>
                    </div>
                    <div class="clearfix product-price-cover">
                        <div class="product-price primary-color float-left">
                            <span class="current-price text-brand">KWD {{$product->sales_price}}</span>
                            <span>
                                <!-- <span class="save-price font-md color3 ml-15">26% Off</span> -->
                                @if($product->mrp_price > $product->sales_price)
                                <span class="old-price font-md ml-15">KWD {{$product->mrp_price}}</span>
                                @endif
                            </span>
                        </div>
                    </div>
                    <!-- <div class="short-desc mb-30">
                        <p class="font-lg">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi, quasi, odio minus dolore impedit fuga eum eligendi.</p>
                    </div> -->
                    <!-- <div class="attr-detail attr-size mb-30">
                        <strong class="mr-10">Size / Weight: </strong>
                        <ul class="list-filter size-filter font-small">
                            <li><a href="#">50g</a></li>
                            <li class="active"><a href="#">60g</a></li>
                            <li><a href="#">80g</a></li>
                            <li><a href="#">100g</a></li>
                            <li><a href="#">150g</a></li>
                        </ul>
                    </div> -->
                    {{\App\Http\Controllers\PageController::viewproductattributes($product->product_group,$product->id)}}
                    <!-- <div class="attr-detail attr-size mb-30">
                        <strong class="mr-10">Size / Weight: </strong>
                        <div class="custom_select">
                            <select class="form-control">
                                <option value="">Select an option...</option>
                            </select>
                        </div>
                    </div> -->
                    <input value="{{$product->sales_price}}" type="hidden" name="price" id="price">
                    @if($product->shipping_enable == '0')
                    <input value="{{$product->shipping_charge}}" type="hidden" name="shipping_charge" id="shipping_charge">
                    @else 
                    <input value="0" type="hidden" name="shipping_charge" id="shipping_charge">
                    @endif
                    
                    <input value="{{$product->vendor_id}}" type="hidden" name="vendor_id" id="vendor_id">
                    <input value="{{$product->id}}" type="hidden" name="product_id" id="product_id">
                    <input value="{{$product->product_name}}" type="hidden" name="product_name" id="product_name">

                    <input value="{{$product->tax_type}}" type="hidden" name="tax_type" id="tax_type">
                    <input value="{{$product->tax_percentage}}" type="hidden" name="tax_percentage" id="tax_percentage">

                    <input value="{{$product->image}}" type="hidden" name="product_image" id="product_image">
                    <div class="detail-extralink mb-50">
                        <!-- <div class="detail-qty border radius">
                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                            <input readonly type="text" name="quantity" class="qty-val" value="1" min="1">
                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                        </div> -->
                        <div class="detail-qty border radius">
                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                            <span class="qty-val">1</span>
                            <input value="1" type="hidden" name="quantity" id="quantity">
                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                        </div>
                        <div class="product-extra-link2">
                            @if($product->stock_status == '0')
                                @if($product->stock > 0)
                                <button type="button" onclick="AddToCart()" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                @else 
                                <button type="button" class="button button-add-to-cart">Out of Stock</button>
                                @endif
                            @else 
                            <button type="button" class="button button-add-to-cart">Out of Stock</button>
                            @endif
                            
                            @if(Auth::check())
                            {{\App\Http\Controllers\Customer\FavouriteController::viewfavourites($product->id)}}
                            @else
                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="/login"><i class="fi-rs-heart"></i></a>
                            @endif

                            <!-- <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> -->
                        </div>
                    </div>
                    <div class="font-xs">
                        <ul class="mr-50 float-start">
                            <!-- <li class="mb-5">Type: <span class="text-brand">Organic</span></li>
                            <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2022</span></li> -->
                            @if($product->shipping_enable == '0')
                            <li>Shipping: <span class="text-brand">KWD {{$product->shipping_charge}}</span></li>
                            @else 
                            <li>Shipping: <span class="text-brand">Free</span></li>
                            @endif
                            <li>Height/Weight/Size: <span class="text-brand">{{$product->height_weight_size}}</span></li>
                        </ul>
                        <ul class="float-start">
                            <!-- <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                            <li class="mb-5">Tags: <a href="#" rel="tag">Snack</a>, <a href="#" rel="tag">Organic</a>, <a href="#" rel="tag">Brown</a></li> -->
                            <li>Stock:<span class="in-stock text-brand ml-5">{{$product->stock}} Items In Stock</span></li>
                        </ul>
                    </div>
                </div>
                <!-- Detail Info -->
            </div>
        </div>
        </form>
        <div class="product-info">
            <div class="tab-style3">
                <ul class="nav nav-tabs text-uppercase">
                    <li class="nav-item">
                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{$reviews_count}})</a>
                    </li>
                </ul>
                <div class="tab-content shop_info_tab entry-main-content">
                    <div class="tab-pane fade show active" id="Description">
                        <div class="">
                            <?php echo $product->description; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Additional-info">
                        <div class="">
                            <?php echo $product->specifications; ?>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="Vendor-info">
                        <div class="vendor-logo d-flex mb-30">
                            <img src="/frontend/assets/imgs/vendor/vendor-18.svg" alt="" />
                            <div class="vendor-name ml-15">
                                <h6>
                                    <a href="vendor-details-2.html">Noodles Co.</a>
                                </h6>
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                </div>
                            </div>
                        </div>
                        <ul class="contact-infor mb-50">
                            <li><img src="/frontend/assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                            <li><img src="/frontend/assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact Seller:</strong><span>(+91) - 540-025-553</span></li>
                        </ul>
                        <div class="d-flex mb-55">
                            <div class="mr-30">
                                <p class="text-brand font-xs">Rating</p>
                                <h4 class="mb-0">92%</h4>
                            </div>
                            <div class="mr-30">
                                <p class="text-brand font-xs">Ship on time</p>
                                <h4 class="mb-0">100%</h4>
                            </div>
                            <div>
                                <p class="text-brand font-xs">Chat response</p>
                                <h4 class="mb-0">89%</h4>
                            </div>
                        </div>
                        <p>
                            Noodles & Company is an American fast-casual restaurant that offers international and American noodle dishes and pasta in addition to soups and salads. Noodles & Company was founded in 1995 by Aaron Kennedy and is headquartered in Broomfield, Colorado. The company went public in 2013 and recorded a $457 million revenue in 2017.In late 2018, there were 460 Noodles & Company locations across 29 states and Washington, D.C.
                        </p>
                    </div> -->
                    <div class="tab-pane fade" id="Reviews">
                        <!--Comments-->
                        <div class="comments-area">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h4 class="mb-30">Customer Reviews</h4>
                                    <div class="comment-list">
                                        @foreach($all_reviews as $row)
                                        <div class="single-comment justify-content-between d-flex mb-30">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb text-center">
                                                    @if($row->profile_image == '')
                                                    <img src="/frontend/assets/imgs/blog/author-2.png" alt="" />
                                                    @else 
                                                    <a href="#"><img src="/profile_image/{{$row->profile_image}}"></a>
                                                    @endif
                                                    <a href="#" class="font-heading text-brand">{{$row->first_name}} {{$row->last_name}}</a>
                                                </div>
                                                <div class="desc">
                                                    <div class="d-flex justify-content-between mb-10">
                                                        <div class="d-flex align-items-center">
                                                            <span class="font-xs text-muted">{{$row->updated_at}} </span>
                                                        </div>
                                                        <div class="product-rate d-inline-block">
                                                        @if($row->rating == '1')
                                                        <div class="product-rating" style="width:20%"></div>
                                                        @elseif($row->rating == '2')
                                                        <div class="product-rating" style="width:40%"></div>
                                                        @elseif($row->rating == '3')
                                                        <div class="product-rating" style="width:60%"></div>
                                                        @elseif($row->rating == '4')
                                                        <div class="product-rating" style="width:80%"></div>
                                                        @elseif($row->rating == '5')
                                                        <div class="product-rating" style="width:100%"></div>
                                                        @endif
                                                        </div>
                                                    </div>
                                                    <p class="mb-10">{{$row->message}}
                                                        <!-- <a href="#" class="reply">Reply</a> -->
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        {!! $all_reviews->links('pagination.pagination') !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h4 class="mb-30">Customer reviews</h4>
                                    <div class="d-flex mb-30">
                                        <?php 
                                        if($reviews_count > 0){
                                            $average_percentage =(($reviews_1*1) + ($reviews_2*2) + ($reviews_3*3) + ($reviews_4*4) + ($reviews_5*5))/$reviews_count;
                                        }
                                        else{
                                            $average_percentage=0;
                                        }
                                        ?>
                                        <div class="product-rate d-inline-block mr-15">
                                            <div class="product-rating" style="width: {{$average_percentage * 20}}%"></div>
                                        </div>
                                        <h6><?php echo $average_percentage; ?> out of 5</h6>
                                    </div>
                                    @if($reviews_count > 0)
                                    <div class="progress">
                                        <span>5 star</span>
                                        <div class="progress-bar" role="progressbar" style="width:{{($reviews_5 / $reviews_count)*100}}%" aria-valuenow="{{($reviews_5 / $reviews_count)*100}}" aria-valuemin="0" aria-valuemax="100">{{($reviews_5 / $reviews_count)*100}}%</div>
                                    </div>
                                    <div class="progress">
                                        <span>4 star</span>
                                        <div class="progress-bar" role="progressbar" style="width:{{($reviews_4 / $reviews_count)*100}}%" aria-valuenow="{{($reviews_4 / $reviews_count)*100}}" aria-valuemin="0" aria-valuemax="100">{{($reviews_4 / $reviews_count)*100}}%</div>
                                    </div>
                                    <div class="progress">
                                        <span>3 star</span>
                                        <div class="progress-bar" role="progressbar" style="width:{{($reviews_3 / $reviews_count)*100}}%" aria-valuenow="{{($reviews_3 / $reviews_count)*100}}" aria-valuemin="0" aria-valuemax="100">{{($reviews_3 / $reviews_count)*100}}%</div>
                                    </div>
                                    <div class="progress">
                                        <span>2 star</span>
                                        <div class="progress-bar" role="progressbar" style="width:{{($reviews_2 / $reviews_count)*100}}%" aria-valuenow="{{($reviews_2 / $reviews_count)*100}}" aria-valuemin="0" aria-valuemax="100">{{($reviews_2 / $reviews_count)*100}}%</div>
                                    </div>
                                    <div class="progress mb-30">
                                        <span>1 star</span>
                                        <div class="progress-bar" role="progressbar" style="width:{{($reviews_1 / $reviews_count)*100}}%" aria-valuenow="{{($reviews_1 / $reviews_count)*100}}" aria-valuemin="0" aria-valuemax="100">{{($reviews_1 / $reviews_count)*100}}%</div>
                                    </div>
                                    @endif
                                    <!-- <a href="#" class="font-xs text-muted">How are ratings calculated?</a> -->
                                </div>
                            </div>
                        </div>
                        <!--comment form-->
                        @if(Auth::check())
                        @if(count($buy_product) > 0)
                        @if(!empty($reviews))
                        <div class="comment-form">
                            <h4 class="mb-15">Add a review</h4>
                            <!-- <div class="product-rate d-inline-block mb-30"></div> -->
                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <form class="form-contact comment_form" action="#" id="review_form" method="POST">
                                    {{ csrf_field() }}
                                    <input value="{{$reviews->id}}" type="hidden" name="review_id">
                                    <input value="{{$product->id}}" type="hidden" name="review_product_id">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="star-rating">
                                                    <input value="5" type="radio" name="rating" id="star-1"  {{ ($reviews->rating == '5' ? ' checked' : '') }}>
                                                    <label for="star-1"></label>
                                                    <input {{ ($reviews->rating == '4' ? ' checked' : '') }} value="4" type="radio" name="rating" id="star-2">
                                                    <label for="star-2"></label>
                                                    <input {{ ($reviews->rating == '3' ? ' checked' : '') }} value="3" type="radio" name="rating" id="star-3">
                                                    <label for="star-3"></label>
                                                    <input {{ ($reviews->rating == '2' ? ' checked' : '') }} value="2" type="radio" name="rating" id="star-4">
                                                    <label for="star-4"></label>
                                                    <input {{ ($reviews->rating == '1' ? ' checked' : '') }} value="1" type="radio" name="rating" id="star-5">
                                                    <label for="star-5"></label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control w-100" name="message" id="message" rows="4" placeholder="Write Message">{{$reviews->message}}</textarea>
                                                </div>
                                            </div>
                                    
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input readonly value="{{$reviews->name}}" class="form-control" name="name" id="name" type="text" placeholder="Name" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input readonly value="{{$reviews->email}}" class="form-control" name="email" id="email" type="email" placeholder="Email" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button id="savereview" type="button" onclick="UpdateReview()" class="button button-contactForm">Update Review</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else 
                        <div class="comment-form">
                            <h4 class="mb-15">Add a review</h4>
                            <!-- <div class="product-rate d-inline-block mb-30"></div> -->
                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <form class="form-contact comment_form" action="#" id="review_form" method="POST">
                                    {{ csrf_field() }}
                                    <input value="{{$product->id}}" type="hidden" name="review_product_id">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="star-rating">
                                                    <input value="5" type="radio" name="rating" id="star-1">
                                                    <label for="star-1"></label>
                                                    <input value="4" type="radio" name="rating" id="star-2">
                                                    <label for="star-2"></label>
                                                    <input value="3" type="radio" name="rating" id="star-3">
                                                    <label for="star-3"></label>
                                                    <input value="2" type="radio" name="rating" id="star-4">
                                                    <label for="star-4"></label>
                                                    <input value="1" type="radio" name="rating" id="star-5">
                                                    <label for="star-5"></label>
                                                </div>

                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control w-100" name="message" id="message" rows="4" placeholder="Write Message"></textarea>
                                                </div>
                                            </div>
                                    
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input readonly value="{{Auth::user()->first_name}} {{Auth::user()->last_name}}" class="form-control" name="name" id="name" type="text" placeholder="Name" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input value="{{Auth::user()->email}}" readonly class="form-control" name="email" id="email" type="email" placeholder="Email" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button id="savereview" type="button" onclick="SaveReview()" class="button button-contactForm">Submit Review</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-60">
            <div class="col-12">
                <h2 class="section-title style-1 mb-30">Related products</h2>
            </div>
            <div class="col-12">
                <div class="row related-products">
                    @foreach($related_products as $row)
                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="/product-details/{{$row->id}}" tabindex="0">
                                        <img class="default-img" src="/product_image/{{$row->image}}" alt="" />
                                        <img class="hover-img" src="/product_image/{{$row->image}}" alt="" />
                                    </a>
                                </div>
                                <!-- <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                </div> -->
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">{{\App\Http\Controllers\PageController::viewcategoryname($row->category)}}</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="/product-details/{{$row->id}}" tabindex="0">{{$row->product_name}}</a></h2>
                                <!-- <div class="rating-result" title="90%">
                                    <span> </span>
                                </div> -->
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width:{{\App\Http\Controllers\ProductListController::viewratingpercentage($row->id)}}%"></div>
                                </div>
                                <div class="product-price">
                                    <span>KWD {{$row->sales_price}}</span>
                                    @if($row->mrp_price > $row->sales_price)
                                    <span class="old-price">KWD {{$row->mrp_price}}</span>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 primary-sidebar sticky-sidebar mt-30">
    <div class="sidebar-widget widget-vendor mb-30 bg-grey-9 box-shadow-none">
        <h5 class="section-title style-3 mb-20">Vendor</h5>
        <div class="vendor-logo d-flex mb-30">
            @if($vendor->profile_image != '')
            <img src="/profile_image/{{$vendor->profile_image}}" alt="" />
            @endif
            <div class="vendor-name ml-15">
                <h6>
                    <a href="#">{{$vendor->business_name}}</a>
                </h6>
            </div>
        </div>
        <ul class="contact-infor">
            <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>{{$vendor->address}}</span></li>
            <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact Seller:</strong><span>{{$vendor->mobile}}</span></li>
            <li class="hr"><span></span></li>
        </ul>
        <h5 class="section-title style-3 mb-20">Return & Warranty</h5>
        <ul>
            @if($product->return_policy == '0')
            <li>
                <i class="fi fi-rs-shield-check mr-10 text-brand"></i>
                <span> Return Policy </span>
            </li>
            @endif
            @if($product->assured_seller == '0')
            <li>
                <i class="fi fi-rs-shield-check mr-10 text-brand"></i>
                <span> Assured Seller </span>
            </li>
            @endif
            @if($product->delivery_available == '0')
            <li>
                <i class="fi fi-rs-shield-check mr-10 text-brand"></i>
                <span> Delivery Available </span>
            </li>
            @endif
            @if($product->rest_assured_seller == '0')
            <li>
                <i class="fi fi-rs-shield-check mr-10 text-brand"></i>
                <span> Rest Assured Seller </span>
            </li>
            @endif
            @if($product->most_trusted == '0')
            <li>
                <i class="fi fi-rs-shield-check mr-10 text-brand"></i>
                <span> Most Trusted </span>
            </li>
            @endif
            <!-- <li>
                <i class="fi fi-rs-time-forward-ten mr-10 text-brand"></i>
                <span> 10 Days Return </span>
            </li>
            <li>
                <i class="fi fi-rs-diploma mr-10 text-brand"></i>
                <span> 12 Months Warranty </span>
            </li> -->
        </ul>

        <ul>
            <li class="hr"><span></span></li>
        </ul>
        <p>Become a Vendor? <a href="/professional-register?email="> Register now</a></p>
    </div>
    <div class="sidebar-widget widget-category-2 mb-30">
        <h5 class="section-title style-1 mb-30">Category</h5>
        <ul>
            @foreach($category_all as $row)
            <li>
                <a class="active" href="/product-list/{{$row->id}}/0/0/0"> 
                    <img src="/upload_files/{{$row->icon}}" alt="" />{{$row->category}}
                </a>
                <!-- <span class="count">30</span> -->
            </li>
            @endforeach
        </ul>
    </div>
    <!-- <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
        <img src="/frontend/assets/imgs/banner/banner-11.png" alt="" />
        <div class="banner-text">
            <span>Oganic</span>
            <h4>
                Save 17% <br />
                on <span class="text-brand">Oganic</span><br />
                Juice
            </h4>
        </div>
    </div> -->
</div>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('extra-js')
<script>
function ProductOpen(id){
    window.location.href="/product-details/"+id;
}
function AddToCart(){
  spinner_body.show();
  $(".text-danger").remove();
  $('.form-group').removeClass('has-error').removeClass('has-success');
  var formData = new FormData($('#form')[0]);
    $.ajax({
      url : "/add-cart",
      type: "POST",
    //   headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //   },
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",

      success: function(data)
      {   
        console.log(data);
        spinner_body.hide();
        $("#form")[0].reset();
        // location.href="/cart";             
        // toastr.success('Add Successfully');
        Swal.fire({
        title: 'Added to Cart',
        icon:'success',
        showDenyButton: true,
        // showCancelButton: true,
        denyButtonText: 'Keep Shopping',
        confirmButtonText: 'Continue to Cart',
        // customClass: {
        //     // actions: 'my-actions',
        //     // cancelButton: 'order-1 right-gap',
        //     confirmButton: 'btn-radius btn-ok',
        //     denyButton: 'btn-radius btn-cancel',
        // }
        }).then((result) => {
            if (result.isConfirmed) {
                location.href="/cart";
            } else if (result.isDenied) {
                location.reload();
            }
        })
      },error: function (data) {
        spinner_body.hide(); 
        var errorData = data.responseJSON.errors;
        $.each(errorData, function(i, obj) {
          $('#'+i).after('<p class="text-danger">'+obj[0]+'</p>');
          $('#'+i).closest('.form-group').addClass('has-error');
          toastr.error(obj[0]);
        });
      }
    });
}


function sendimg(a)
{
    document.getElementById('mainimg').src=a.src;
}
</script>
<script>
$('#spinner_body').addClass('single-product');

$('.detail-qty').each(function () {
    //var qtyval = parseInt($(this).find('.qty-val').text(), 10);
    var qtyval = parseInt($('#quantity').val());
    $('.qty-up').on('click', function (event) {
        event.preventDefault();
        var stock = '<?php echo $product->stock; ?>';
        qtyval = qtyval + 1;
        if (stock >= qtyval) {
            $('.qty-val').text(qtyval);
            $('#quantity').val(qtyval);
        }
        else{
            Swal.fire({
                title: 'Out of Stock!',
                icon: "warning",
                type: "warning",
            });
        }
        // $('.qty-val').text(qtyval);
        // $('#quantity').val(qtyval);
    });
    $('.qty-down').on('click', function (event) {
        event.preventDefault();
        qtyval = qtyval - 1;
        if (qtyval > 1) {
            $('.qty-val').text(qtyval);
            $('#quantity').val(qtyval);
        } else {
            qtyval = 1;
            $('.qty-val').text(qtyval);
            $('#quantity').val(qtyval);
        }
    });
});



function SaveReview(){
    spinner_body.show();
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $("#savereview").attr("disabled", true);
    var formData = new FormData($('#review_form')[0]);
    $.ajax({
        url : '/save-review',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {               
            spinner_body.hide(); 
            Swal.fire({
                text: 'Successfully Save',
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    console.log(data);
                    $("#review_form")[0].reset();
                    location.reload();
                    $("#savereview").attr("disabled", false);
                }
            })  
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            spinner_body.hide();
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
                $('input[name='+i+']').after('<p class="text-danger">'+obj[0]+'</p>');
                $('input[name='+i+']').closest('.form-group').addClass('has-error');
            });
            $("#savereview").attr("disabled", false);
        }
    });
}
function UpdateReview(){
    spinner_body.show();
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $("#savereview").attr("disabled", true);
    var formData = new FormData($('#review_form')[0]);
    $.ajax({
        url : '/update-review',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {     
            spinner_body.hide();           
            Swal.fire({
                text: 'Successfully Update',
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'Ok!'
                }).then((result) => {
                if (result.isConfirmed) {
                    console.log(data);
                    $("#review_form")[0].reset();
                    location.reload();
                    $("#savereview").attr("disabled", false);
                }
            })  
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            spinner_body.hide();
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
                $('input[name='+i+']').after('<p class="text-danger">'+obj[0]+'</p>');
                $('input[name='+i+']').closest('.form-group').addClass('has-error');
            });
            $("#savereview").attr("disabled", false);
        }
    });
}

</script>
@endsection