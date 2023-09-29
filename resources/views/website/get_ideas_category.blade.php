@extends('website.layouts')
@section('extra-css')
<style>

</style>
@endsection
@section('content')

    
<main class="translate main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Get Design Category
            </div>
        </div>
    </div>
    <div class="container mb-30 mt-30">
        <div class="row widget-category-2">
        
                {{\App\Http\Controllers\HomeController::viewideascategory()}}
                {{--<div class="col-xl-3 col-lg-6 col-md-6 mb-lg-0 mb-md-2 mb-sm-2">
                    <div class="card">
                        <h5 class="mb-30">By Categories</h5>
                        <div class="categories-dropdown-wrap font-heading">
                            <ul>
                                <li>
                                    <a href="#"> <img src="/assets/imgs/theme/icons/category-1.svg" alt="">Milks and Dairies</a>
                                </li>
                                <li>
                                    <a href="#"> <img src="/assets/imgs/theme/icons/category-2.svg" alt="">Clothing &amp; beauty</a>
                                </li>
                                <li>
                                    <a href="#"> <img src="/assets/imgs/theme/icons/category-3.svg" alt="">Pet Foods &amp; Toy</a>
                                </li>
                                <li class="mb-0">
                                    <a href="#"> <img src="/assets/imgs/theme/icons/category-4.svg" alt="">Baking material</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>--}}


        </div>
    </div>
</main>
@endsection
@section('extra-js')
@endsection