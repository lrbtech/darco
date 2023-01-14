@extends('website.layouts')
@section('extra-css')
<style>
.product-extra-link2 {
    position: absolute;
    top: 20px;
    right: 7px;
}
i.fi-rs-heart {
    color: purple;
}
i.fi-rs-heart:hover {
    color: #fff;
}
.product-cart-wrap .product-content-wrap .product-price span.old-price {
    font-size: 14px;
    color: #adadad;
    margin: 0 0 0 7px;
    text-decoration: auto;
}
h2.mb-10 {
    font-size: 20px;
}
input {
height:50px;}

element.style {
}
textarea {
min-height:150px;
}
</style>
<link rel="stylesheet" href="https://unpkg.com/photoswipe@beta/dist/photoswipe.css">
<link rel="stylesheet" type="text/css" href="/slider/slideshow.css">
<script src="/slider/gallery.js"></script>
@endsection
@section('content')

<main class="translate main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> <a href="#">{{\App\Http\Controllers\PageController::viewprofessionalcategoryname($project->category)}}</a> <span></span> {{\App\Http\Controllers\PageController::viewprofessionalcategoryname($project->subcategory)}}
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-11 col-lg-12 m-auto">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="product-detail accordion-detail">
                            <h2 class="title-detail mb-50 mt-30">{{$project->project_name}}</h2>
                            <div class="row mb-50 mt-30">
                                
                                <div class="col-md-2 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">       

                                    {{--<div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="/project_image/{{$project->image}}" />
                                            </figure>
                                            @foreach($project_images as $img)
                                            <figure class="border-radius-10">
                                                <img src="/project_image/{{$img->image}}" />
                                            </figure>
                                            @endforeach
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails">
                                            <div><img src="/project_image/{{$project->image}}" /></div>
                                            @foreach($project_images as $img)
                                            <div><img src="/project_image/{{$img->image}}" /></div>
                                            @endforeach
                                        </div>
                                    </div>--}}
                                    <div class="detail-gallery pswp-gallery" id="gallery">
                                        <div class="carousel carousel-main" data-flickity='{"pageDots": false }'>
                                            <div class="carousel-cell pswp-gallery__item">
                                            <a  href="/project_image/{{$project->image}}"
                                                data-pswp-width="1700"
                                                data-pswp-height="1285"
                                                data-pswp-tile-url="/project_image/{z}/{x}_{y}.jpeg"
                                                data-pswp-tile-size="254"
                                                data-pswp-tile-overlap="1"
                                                data-pswp-max-width="5832"
                                                data-pswp-max-height="4409"
                                                target="_blank">
                                                <img src="/project_image/{{$project->image}}" alt="" />
                                            </a>
                                            <!-- <img src="/project_image/{{$project->image}}"/> -->
                                            </div>
                                            @foreach($project_images as $key => $row)
                                            <div class="carousel-cell pswp-gallery__item">
                                                <!-- <img src="/project_image/{{$row->image}}"/> -->
                                            <a  href="/project_image/{{$row->image}}"
                                                data-pswp-width="1700"
                                                data-pswp-height="1285"
                                                data-pswp-tile-url="/project_image/{z}/{x}_{y}.jpeg"
                                                data-pswp-tile-size="254"
                                                data-pswp-tile-overlap="1"
                                                data-pswp-max-width="5832"
                                                data-pswp-max-height="4409"
                                                target="_blank">
                                                <img src="/project_image/{{$row->image}}" alt="" />
                                            </a>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="carousel carousel-nav"
                                        data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
                                            <div class="carousel-cell"><img src="/project_image/{{$project->image}}"/></div>
                                            @foreach($project_images as $key => $row)
                                            <div class="carousel-cell"><img src="/project_image/{{$row->image}}"/></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                
                            </div>
                            <div class="product-info">
                                <div class="tab-style3">
                                    <ul class="nav nav-tabs text-uppercase">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Projects</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Ideabook</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content shop_info_tab entry-main-content">
                                        <div class="tab-pane fade show active" id="Description">
                                            <div class="">
                                            <?php echo $project->description; ?>                                  
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="Additional-info">
                                            <div class="col-12">
                                                <h2 class="section-title style-1 mb-30">{{$related_projects_count}} Projects</h2>
                                            </div>
                                            <div class="col-12">
                                                <div class="row related-products">
                                                    @foreach($related_projects as $row)
                                                    <div class="col-lg-6 col-md-6 col-12 col-sm-6 pb-4">
                                                        <div class="product-cart-wrap hover-up">
                                                            <div class="product-img-action-wrap">
                                                                <div class="product-img product-img-zoom">
                                                                    <a href="/professional-details/{{$row->id}}" tabindex="0">
                                                                        <img style="height:250px;" class="default-img" src="/project_image/{{$row->image}}" alt="" />
                                                                        <img style="height:250px;" class="hover-img" src="/project_image/{{$row->image}}" alt="" />
                                                                    </a>
                                                                </div>
                                                                
                                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                                    <span class="hot">{{\App\Http\Controllers\PageController::viewprofessionalcategoryname($row->category)}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="product-content-wrap">
                                                                <!-- <div class="product-price">
                                                                    <span class="old-price">Abu Dhabi,UAE</span>
                                                                </div> -->
                                                                <h2><a href="/professional-details/{{$row->id}}" tabindex="0">{{$row->project_name}}</a></h2>
                                                                
                                                                <!-- <div class="product-price">
                                                                    <span>15 photos </span>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="Vendor-info">
                                                <div class="col-12">
                                                <h2 class="section-title style-1 mb-30">{{$idea_book_count}} Ideabook</h2>
                                            </div>
                                            <div class="col-12">
                                                <div class="row related-products">
                                                    @foreach($idea_book as $row)
                                                    <div class="col-lg-4 col-md-4 col-12 col-sm-6 pb-4">
                                                        <div class="product-cart-wrap hover-up">
                                                            <div class="product-img-action-wrap">
                                                                <div class="product-img product-img-zoom">
                                                                    <a href="/get-idea-details/{{$row->id}}" tabindex="0">
                                                                        <img style="height:250px;" class="default-img" src="/project_image/{{$row->image}}" alt="" />
                                                                        <img style="height:250px;" class="hover-img" src="/project_image/{{$row->image}}" alt="" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="product-content-wrap">
                                                                <h2><a href="/get-idea-details/{{$row->id}}" tabindex="0">{{$row->title}}</a></h2>
                                                                <div class="product-price">
                                                                    <span>0 photos </span>
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
                                    <!-- <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                        <div class="product-extra-link2">
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <ul class="contact-infor">
                                <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>{{$vendor->address}}</span></li>
                                <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact Seller:</strong><span>{{$vendor->mobile}}</span></li>
                                <li class="hr"><span></span></li>
                            </ul>
                            <!-- <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-brand font-xs">Rating</p>
                                    <h4 class="mb-0">92%</h4>
                                </div>
                                <div>
                                    <p class="text-brand font-xs">Ship on time</p>
                                    <h4 class="mb-0">100%</h4>
                                </div>
                                <div>
                                    <p class="text-brand font-xs">Chat response</p>
                                    <h4 class="mb-0">89%</h4>
                                </div>
                            </div> -->
                            <ul>
                                <li class="hr"><span></span></li>
                            </ul>
                            <p>Become a Vendor? <a href="/professional-register?email="> Register now</a></p>
                        </div>
                        <div class="sidebar-widget widget-delivery mb-30 bg-grey-9 box-shadow-none">
                                <div class="contact-from-area padding-20-row-col">
                                    
                                    <h2 class="mb-10">Contact My Bespoke Room</h2>
                                    
                                    <form class="contact-form-style mt-30" id="contact-form" action="#" method="post">
                                    {{csrf_field()}}
                                    <input value="{{$vendor->id}}" type="hidden" name="vendor_id" id="vendor_id">
                                    <input value="0" type="hidden" name="type" id="type">
                                    <input value="{{$project->id}}" type="hidden" name="project_idea_book_id" id="project_idea_book_id">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="input-style mb-10">
                                                    <input type="text" name="name" id="name" placeholder="First Name" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="input-style mb-10">
                                                    <input name="email" id="email" placeholder="Your Email" type="email" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="input-style mb-10">
                                                    <input name="mobile" id="mobile" placeholder="Your Phone" type="tel" />
                                                </div>
                                            </div>
                                            <!-- <div class="col-lg-12 col-md-12">
                                                <div class="input-style mb-10">
                                                    <input name="subject" placeholder="Subject" type="text" />
                                                </div>
                                            </div> -->
                                            <div class="col-lg-12 col-md-12 text-center">
                                                <div class="textarea-style mb-20">
                                                    <textarea name="comments" id="comments" placeholder="Message"></textarea>
                                                </div>
                                                @if(Auth::check())
                                                <button onclick="Send()" class="submit submit-auto-width" type="button">Send message</button>
                                                @else
                                                <a href="/login" class="submit submit-auto-width">Send message</a> 
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                    <p class="form-messege"></p>
                                </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
@section('extra-js')
<script>
/* debug stuff */
window.pswpDebug = {
display_layer_borders: false,
};
for(let key in window.pswpDebug) {
document.querySelector('#' + key).checked = window.pswpDebug[key];
}
[...document.querySelectorAll('.pswp-test input')].forEach((checkbox) => {
checkbox.addEventListener('change', (e) => {
    if (e.currentTarget.checked) {
    window.pswpDebug[e.currentTarget.name] = true;
    } else {
    window.pswpDebug[e.currentTarget.name] = false;
    }
});
});
</script>

<script type="module">
import PhotoSwipeLightbox from 'https://unpkg.com/photoswipe@beta/dist/photoswipe-lightbox.esm.js';

let deepZoomPlugin;
const lightbox = new PhotoSwipeLightbox({
gallery: '#gallery',
children: '.pswp-gallery__item > a',

pswpModule: () => import('https://unpkg.com/photoswipe@beta/dist/photoswipe.esm.js'),

// dynamically load deep zoom plugin
openPromise: () => {
    // make sure it's initialized only once per lightbox
    if (!deepZoomPlugin) {
    return import('/slider/zoomimg.js').then((deepZoomPluginModule) => {
        deepZoomPlugin = new deepZoomPluginModule.default(lightbox, {
        // deep zoom plugin options
        });
    })
    }
},

// Recommended PhotoSwipe options for this plugin
allowPanToNext: false, // prevent swiping to the next slide when image is zoomed
allowMouseDrag: true, // display dragging cursor at max zoom level
wheelToZoom: true, // enable wheel-based zoom
zoom: false // disable default zoom button
});
lightbox.init();
</script>
<script>
function Send(){
  spinner_body.show();
  $(".text-danger").remove();
  $('.form-group').removeClass('has-error').removeClass('has-success');
  var formData = new FormData($('#contact-form')[0]);
    $.ajax({
      url : '/send-vendor-enquiry',
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data)
      {   
        spinner_body.hide();             
        $("#contact-form")[0].reset();
        location.reload();
        toastr.success(data, 'Successfully Send');
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
</script>
@endsection