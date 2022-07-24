@extends('website.layouts1')
@section('extra-css')

@endsection
@section('content')

<main class="main">
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <h1 class="mb-15">Professional List</h1>
                        <div class="breadcrumb">
                            <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>@if(!empty($category_data))
                            {{$category_data->category}}
                            @endif</a>
                            <span></span> @if(!empty($subcategory_data))
                            {{$subcategory_data->category}}
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
            <div class="col-lg-5-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>Showing <strong class="text-brand">{{ $project->firstItem() }} - {{ $project->lastItem() }} of {{$project->total()}}</strong> Listings</p>
                    </div>
                    <!-- <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
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
                        </div>
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
                    </div> -->
                </div>
                <div class="product-list mb-50">
                    @foreach($project as $row)
                    <div class="product-cart-wrap">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <div class="product-img-inner">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="/project_image/{{$row->image}}" alt="" />
                                        <img class="hover-img" src="/project_image/{{$row->image}}" alt="" />
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="shop-grid-right.html">Hodo Foods</a>
                            </div>
                            <h2><a href="shop-product-right.html">{{$row->project_name}}</a></h2>
                            <!-- <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                <span class="ml-30">5 Reviews</span>
                            </div> -->
                            <p class="mt-15 mb-15">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam beatae consectetur, atque inventore aliquam adipisci perspiciatis nostrum qui consequatur praesentium?</p>
                            
                            <div class="mt-30 d-flex align-items-center">
                                <a aria-label="Buy now" class="btn" href="shop-cart.html"><i class="fi-rs-envelope mr-5"></i>Contact Us</a>
                                
                            </div>
                        </div>
                    </div>
                    <!--single product-->
                    @endforeach
                </div>
                <!--product grid-->
                <div class="pagination-area mt-20 mb-20">
                    <nav aria-label="Page navigation example">
                        {!! $project->links('pagination.pagination') !!}
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
           
        </div>
    </div>
</main>


@endsection
@section('extra-js')
<script>
@if(!empty($category_data))
getprofessionalsubcategory({{$category_data->id}});
@endif

function getprofessionalsubcategory(id){
  $.ajax({
    url : '/get-professional-sub-category/'+id,
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