@extends('website.layouts1')
@section('extra-css')

@endsection
@section('content')

<main class="main">
    <div class="page-header mt-30 mb-50">
        <div class="container">
            @if(!empty($category_data))
                @if(!empty($subcategory_data))
                    @if(!empty($subsubcategory_data))
                    <div class="archive-header" style="background: url(/upload_files/{{$subsubcategory_data->image}})">
                    @else 
                    <div class="archive-header" style="background: url(/upload_files/{{$subcategory_data->image}})">
                    @endif
                @else 
                <div class="archive-header" style="background: url(/upload_files/{{$category_data->image}})">
                @endif
            @else 
            <div class="archive-header">
            @endif
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <h1 class="mb-15">Shop List</h1>
                        <div class="breadcrumb">
                            <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>
                            @if(!empty($category_data))
                            {{$category_data->category}}
                            @endif
                            </a>
                            <span></span> 
                            @if(!empty($subcategory_data))
                            {{$subcategory_data->category}}
                            @endif
                            <span></span> 
                            @if(!empty($subsubcategory_data))
                            {{$subsubcategory_data->category}}
                            @endif
                        </div>
                    </div>
                    <!-- <div class="col-xl-9 text-end d-none d-xl-block">
                        <ul class="tags-list">
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Cabbage</a>
                            </li>
                            <li class="hover-up active">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Broccoli</a>
                            </li>
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Artichoke</a>
                            </li>
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Celery</a>
                            </li>
                            <li class="hover-up mr-0">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Spinach</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <section class="popular-categories section-padding">
        <div class="container">
            <div class="section-title">
                <div class="title">
                    <h3>@if(!empty($category_data))
                            {{$category_data->category}}
                            @endif</h3>
                    <!-- <a class="show-all" href="shop-grid-right.html">
                       All Categories 
                        <i class="fi-rs-angle-right"></i>
                    </a> -->
                    <ul class="list-inline nav nav-tabs links">
                        @foreach($subcategory_all as $row)
                        <li class="list-inline-item nav-item">
                            <a class="nav-link home-category{{$row->id}}" href="/product-list/{{$category_id}}/{{$row->id}}/0/0">{{$row->category}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow" id="carausel-8-columns-arrows"></div>
            </div>
            <div class="shopBycat"></div>
            <!-- <div class="carausel-8-columns-cover position-relative">
                <div class="carausel-8-columns" id="carausel-8-columns">
                    <div class="card-1">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/theme/icons/category-1.svg" alt="" /></a>
                        </figure>
                        <h6>
                            <a href="shop-grid-right.html">Milks and <br />Dairies</a>
                        </h6>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <div class="container mb-30">
        <div class="row flex-row-reverse">
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <!-- <p>We found <strong class="text-brand">29</strong> items for you!</p> -->
                        <p>Showing <strong class="text-brand">{{ $product->firstItem() }} - {{ $product->lastItem() }} of {{$product->total()}}</strong> Listings</p>
                    </div>
                    <div class="sort-by-product-area">
                        <!-- <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li>
                                </ul>
                            </div>
                        </div> -->
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Featured</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                    <li><a href="#">Release Date</a></li>
                                    <li><a href="#">Avg. Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-grid">
                    @foreach($product as $row)
                    <div class="col-lg-4 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="/product-details/{{$row->id}}">
                                        <img class="default-img" src="/product_image/{{$row->image}}" alt="" />
                                        <img class="hover-img" src="/product_image/{{$row->image}}" alt="" />
                                    </a>
                                </div>
                                <!-- <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div> -->
                                <!-- <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div> -->
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="/product-list/{{$row->category}}/0/0/0">{{\App\Http\Controllers\PageController::viewcategoryname($row->category)}}</a>
                                </div>
                                <h2><a href="/product-details/{{$row->id}}">{{$row->product_name}}</a></h2>
                                <!-- <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div> -->
                                <div>
                                    <span class="font-small text-muted">By <a href="#">{{\App\Http\Controllers\PageController::viewvendorname($row->vendor_id)}}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>KWD {{$row->sales_price}}</span>
                                        @if($row->mrp_price > $row->sales_price)
                                        <span class="old-price">KWD {{$row->mrp_price}}</span>
                                        @endif
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="/product-details/{{$row->id}}">
                                            <i class="fi-rs-eye mr-5"></i>View 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--end product card-->
                    
                </div>
                <!--product grid-->
                <div class="pagination-area mt-20 mb-20">
                    <nav aria-label="Page navigation example">
                        {!! $product->links('pagination.pagination') !!}
                        <!-- <ul class="pagination justify-content-start">
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                            </li>
                        </ul> -->
                    </nav>
                </div>
                
            </div>
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-30">Shop Category</h5>
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
                <!-- Fillter By Price -->
                <form action="/search-product-list/{{$category_id}}/{{$subcategory_id}}/{{$subsubcategory_id}}/{{$search_id}}" id="filter-form" method="POST">
                {{csrf_field()}}
                <div class="sidebar-widget price_range range mb-30">
                    <h5 class="section-title style-1 mb-30">Fillter</h5>
                    <!-- <div class="price-filter">
                        <div class="price-filter-inner">
                            <div id="slider-range" class="mb-20"></div>
                            <div class="d-flex justify-content-between">
                                <div class="caption">From: <strong id="slider-range-value1" class="text-brand"></strong></div>
                                <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong></div>
                            </div>
                        </div>
                    </div> -->
                    <div class="list-group">
                        <div class="list-group-item mb-10 mt-10">
                            <label class="fw-900">Brand</label>
                            <div class="custome-checkbox">
                                @foreach($brand_all as $key => $brand1)
                                <input class="form-check-input" type="checkbox" name="brand[]" id="brand{{$key+1}}" value="{{$brand1->id}}" />
                                <label class="form-check-label" for="brand{{$key+1}}">
                                    <span>{{$brand1->brand}}</span>
                                </label>
                                <br />
                                @endforeach
                            </div>
                            <label class="fw-900 mt-15">City</label>
                            <div class="custome-checkbox">
                                @foreach($city_all as $key => $city1)
                                <input class="form-check-input" type="checkbox" name="city[]" id="city{{$key+1}}" value="{{$city1->id}}" />
                                <label class="form-check-label" for="city{{$key+1}}">
                                    <span>{{$city1->city}}</span>
                                </label>
                                <br />
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</button>
                </div>
                </form>
                
            </div>
        </div>
    </div>
            
</main>

@endsection
@section('extra-js')
<script>
@if(!empty($subcategory_data))
getsubsubcategory({{$subcategory_data->id}});
@endif

function getsubsubcategory(id){
  $.ajax({
    url : '/get-sub-sub-category/'+id,
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
                appendArrows: appendArrowsClassName
            });
        });

    }
  });
}


// function Filter(){
//   spinner_body.show();
//   $(".text-danger").remove();
//   $('.form-group').removeClass('has-error').removeClass('has-success');
//   var formData = new FormData($('#filter-form')[0]);
//     $.ajax({
//       url : "/add-cart",
//       type: "POST",
//       data: formData,
//       contentType: false,
//       processData: false,
//       dataType: "json",
//       success: function(data)
//       {   
//         console.log(data);
//         spinner_body.hide();
//         $("#filter-form")[0].reset();
//         // location.href="/cart";             
//         // toastr.success('Add Successfully');
//       },error: function (data) {
//         spinner_body.hide(); 
//         var errorData = data.responseJSON.errors;
//         $.each(errorData, function(i, obj) {
//           $('#'+i).after('<p class="text-danger">'+obj[0]+'</p>');
//           $('#'+i).closest('.form-group').addClass('has-error');
//           toastr.error(obj[0]);
//         });
//       }
//     });
// }
</script>
@endsection