@extends('website.layouts')
@section('extra-css')

@endsection
@section('content')

<main class="translate main">
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">Snack</h1>
                        <div class="breadcrumb">
                            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> Shop <span></span> Snack
                        </div>
                    </div>
                    <div class="col-xl-9 text-end d-none d-xl-block">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
        <section class="popular-categories section-padding">
        <div class="container">
            <div class="section-title">
                <div class="title">
                    <h3>Shop by Categories</h3>
                    <a class="show-all" href="shop-grid-right.html">
                        All Categories
                        <i class="fi-rs-angle-right"></i>
                    </a>
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow" id="carausel-8-columns-arrows"></div>
            </div>
            <div class="carausel-8-columns-cover position-relative">
                <div class="carausel-8-columns" id="carausel-8-columns">
                    <div class="card-1">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/theme/icons/category-1.svg" alt="" /></a>
                        </figure>
                        <h6>
                            <a href="shop-grid-right.html">Milks and <br />Dairies</a>
                        </h6>
                    </div>
                    <div class="card-1">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/theme/icons/category-2.svg" alt="" /></a>
                        </figure>
                        <h6>
                            <a href="shop-grid-right.html"
                                >Wines & <br />
                                Alcohol</a
                            >
                        </h6>
                    </div>
                    <div class="card-1">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/theme/icons/category-3.svg" alt="" /></a>
                        </figure>
                        <h6>
                            <a href="shop-grid-right.html">Clothing & <br />Beauty</a>
                        </h6>
                    </div>
                    <div class="card-1">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/theme/icons/category-4.svg" alt="" /></a>
                        </figure>
                        <h6>
                            <a href="shop-grid-right.html">Pet Foods <br />& Toy</a>
                        </h6>
                    </div>
                    <div class="card-1">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/theme/icons/category-5.svg" alt="" /></a>
                        </figure>
                        <h6>
                            <a href="shop-grid-right.html">Packaged <br />fast food</a>
                        </h6>
                    </div>
                    <div class="card-1">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/theme/icons/category-6.svg" alt="" /></a>
                        </figure>
                        <h6>
                            <a href="shop-grid-right.html">Baking <br />material</a>
                        </h6>
                    </div>
                    <div class="card-1">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/theme/icons/category-7.svg" alt="" /></a>
                        </figure>
                        <h6>
                            <a href="shop-grid-right.html">Vegetables <br />& tubers</a>
                        </h6>
                    </div>
                    <div class="card-1">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/theme/icons/category-8.svg" alt="" /></a>
                        </figure>
                        <h6>
                            <a href="shop-grid-right.html">Fresh <br />Seafood</a>
                        </h6>
                    </div>
                    <div class="card-1">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/theme/icons/category-9.svg" alt="" /></a>
                        </figure>
                        <h6>
                            <a href="shop-grid-right.html">Noodles <br />Rice</a>
                        </h6>
                    </div>
                    <div class="card-1">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/theme/icons/category-10.svg" alt="" /></a>
                        </figure>
                        <h6><a href="shop-grid-right.html">Fastfood</a></h6>
                    </div>
                    <div class="card-1">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img src="assets/imgs/theme/icons/category-11.svg" alt="" /></a>
                        </figure>
                        <h6><a href="shop-grid-right.html">Ice cream</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
            
</main>

@endsection
@section('extra-js')
@endsection