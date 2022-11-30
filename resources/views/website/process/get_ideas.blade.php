@extends('website.layouts')
@section('extra-css')

@endsection
@section('content')

<main class="translate main pages">
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
                            <a class="nav-link home-category{{$row->id}}" href="/get-ideas/{{$row->id}}/0/0">{{$row->category}}</a>
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
                                            <a href="/get-idea-details/{{$row->id}}">
                                                <img style="height:250px;" src="/project_image/{{$row->image}}" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        
                                        <div class="deals-content">
                                            <h2 class="garage-title"><a href="/get-idea-details/{{$row->id}}">{{$row->title}}</a></h2>
                                            
                                            <div>
                                                <span class="font-small text-muted">By <a href="#">{{\App\Http\Controllers\PageController::viewvendorname($row->vendor_id)}}</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                
                                                <div class="add-cart">
                                                    @if(Auth::check())
                                                    {{\App\Http\Controllers\Customer\FavouriteController::viewfavouritesidea($row->id)}}
                                                    @else
                                                    <a class="add" href="/login"><i class="fi-rs-heart mr-5"></i>Save </a>
                                                    @endif
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
    url : '/get-idea-sub-category-view/'+id,
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