@extends('website.layouts1')
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
@endsection
@section('content')

<main class="main">
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

                                    <div class="detail-gallery">
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
                                        <li class="nav-item">
                                            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
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
                                                                        <img class="default-img" src="/project_image/{{$row->image}}" alt="" />
                                                                        <img class="hover-img" src="/project_image/{{$row->image}}" alt="" />
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
                                                                        <img class="default-img" src="/project_image/{{$row->image}}" alt="" />
                                                                        <img class="hover-img" src="/project_image/{{$row->image}}" alt="" />
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
                                        <div class="tab-pane fade" id="Reviews">
<!--Comments-->
<div class="comments-area">
    <div class="row">
        <div class="col-lg-8">
            <h4 class="mb-30">Customer questions & answers</h4>
            <div class="comment-list">
                <div class="single-comment justify-content-between d-flex mb-30">
                    <div class="user justify-content-between d-flex">
                        <div class="thumb text-center">
                            <img src="assets/imgs/blog/author-2.png" alt="" />
                            <a href="#" class="font-heading text-brand">Sienna</a>
                        </div>
                        <div class="desc">
                            <div class="d-flex justify-content-between mb-10">
                                <div class="d-flex align-items-center">
                                    <span class="font-xs text-muted">December 4, 2021 at 3:12 pm </span>
                                </div>
                                <div class="product-rate d-inline-block">
                                                                                                                        <div class="product-rating" style="width: 100%"></div>
                                </div>
                            </div>
                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                        </div>
                    </div>
                </div>
                <div class="single-comment justify-content-between d-flex mb-30 ml-30">
                    <div class="user justify-content-between d-flex">
                        <div class="thumb text-center">
                            <img src="assets/imgs/blog/author-3.png" alt="" />
                            <a href="#" class="font-heading text-brand">Brenna</a>
                        </div>
                        <div class="desc">
                            <div class="d-flex justify-content-between mb-10">
                                <div class="d-flex align-items-center">
                                    <span class="font-xs text-muted">December 4, 2021 at 3:12 pm </span>
                                </div>
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 80%"></div>
                                </div>
                            </div>
                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                        </div>
                    </div>
                </div>
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <div class="thumb text-center">
                            <img src="assets/imgs/blog/author-4.png" alt="" />
                            <a href="#" class="font-heading text-brand">Gemma</a>
                        </div>
                        <div class="desc">
                            <div class="d-flex justify-content-between mb-10">
                                <div class="d-flex align-items-center">
                                    <span class="font-xs text-muted">December 4, 2021 at 3:12 pm </span>
                                </div>
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 80%"></div>
                                </div>
                            </div>
                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h4 class="mb-30">Customer reviews</h4>
            <div class="d-flex mb-30">
                <div class="product-rate d-inline-block mr-15">
                    <div class="product-rating" style="width: 90%"></div>
                </div>
                <h6>4.8 out of 5</h6>
            </div>
            <div class="progress">
                <span>5 star</span>
                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
            </div>
            <div class="progress">
                <span>4 star</span>
                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
            <div class="progress">
                <span>3 star</span>
                <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
            </div>
            <div class="progress">
                <span>2 star</span>
                <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
            </div>
            <div class="progress mb-30">
                <span>1 star</span>
                <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
            </div>
            <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
        </div>
    </div>
</div>
<!--comment form-->
<div class="comment-form">
    <h4 class="mb-15">Add a review</h4>
    <div class="product-rate d-inline-block mb-30"></div>
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <form class="form-contact comment_form" action="#" id="commentForm">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" name="name" id="name" type="text" placeholder="Name" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" name="email" id="email" type="email" placeholder="Email" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" name="website" id="website" type="text" placeholder="Website" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="button button-contactForm">Submit Review</button>
                </div>
            </form>
        </div>
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
                            <div class="d-flex justify-content-between">
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
                            </div>
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