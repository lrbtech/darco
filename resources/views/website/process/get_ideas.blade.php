@extends('website.layouts1')
@section('extra-css')

@endsection
@section('content')

<main class="main pages">
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">GET IDEAS</h1>
                        <div class="breadcrumb">
                            <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>@if(!empty($category_data))
                            {{$category_data->category}}
                            @endif</a>
                            <span></span> @if(!empty($subcategory_data))
                            {{$subcategory_data->category}}
                            @endif
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!--End Best Sales-->
    <section class="popular-categories section-padding">
        <div class="container">
            <div class="section-title">
                <div class="title">
                    <!-- <a class="show-all" href="shop-grid-right.html">
                       All Categories 
                        <i class="fi-rs-angle-right"></i>
                    </a> -->
                    <ul class="list-inline nav nav-tabs links">
                        @foreach($category_all as $row)
                        <li class="list-inline-item nav-item">
                            <a class="nav-link home-category{{$row->id}}" href="/professional-list/{{$row->id}}/0">{{$row->category}}</a>
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
        <div class="row">
            <div class="col-12">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>Showing <strong class="text-brand">{{ $get_ideas->firstItem() }} - {{ $get_ideas->lastItem() }} of {{$get_ideas->total()}}</strong> Listings</p>
                    </div>
                </div>
                <section class="section-padding pb-5">
                    <div class="container">
                        <!-- <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
                            <h3 class="">Kitchen Ideas & Designs</h3>
                        </div> -->
                        <div class="row">
                            @foreach($get_ideas as $row)
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="shop-product-right.html">
                                                <img src="frontend/assets/imgs/banner/banner-5.png" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        
                                        <div class="deals-content">
                                            <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, & Red Rice</a></h2>
                                            
                                            <div>
                                                <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                
                                                <div class="add-cart">
                                                    <a class="add" href="shop-cart.html"><i class="fi-rs-heart mr-5"></i>Save </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!--product grid-->
                <div class="pagination-area mt-20 mb-20">
                    <nav aria-label="Page navigation example">
                        {!! $get_ideas->links('pagination.pagination') !!}
                    </nav>
                </div>
            
                <!--End Deals-->
            </div>
        </div>
    </div>
    
    <!--End Deals-->
</main>


@endsection
@section('extra-js')
<script>
@if(!empty($category_data))
getideasubcategory({{$category_data->id}});
@endif

function getideasubcategory(id){
  $.ajax({
    url : '/get-idea-sub-category/'+id,
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
</script>
@endsection