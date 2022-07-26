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
                        <span></span> <a href="#">{{\App\Http\Controllers\PageController::viewideacategoryname($idea_book->category)}}</a> <span></span> {{\App\Http\Controllers\PageController::viewideacategoryname($idea_book->subcategory)}}
                    </div>
                </div>
            </div>
            <div class="container mb-30">
                <div class="row">
                    <div class="col-xl-11 col-lg-12 m-auto">
                        <div class="row">
                            <div class="col-xl-9">
                                <div class="product-detail accordion-detail">

                                    <div class="row mb-50 mt-30">
                                       
                                        <div class="col-md-2 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">

                                            <div class="detail-gallery">
                                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                                <!-- MAIN SLIDES -->
                                                <div class="product-image-slider">
                                                    <figure class="border-radius-10">
                                                        <img src="/project_image/{{$idea_book->image}}" />
                                                    </figure>
                                                    @foreach($idea_book_images as $img)
                                                    <figure class="border-radius-10">
                                                        <img src="/project_image/{{$img->image}}" />
                                                    </figure>
                                                    @endforeach
                                                </div>
                                                <!-- THUMBNAILS -->
                                                <div class="slider-nav-thumbnails">
                                                    <div><img src="/project_image/{{$idea_book->image}}" /></div>
                                                    @foreach($idea_book_images as $img)
                                                    <div><img src="/project_image/{{$img->image}}" /></div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- End Gallery -->
                                        </div>
                                       
                                    </div>
                                    <div class="product-info">
                                    <h2>{{$idea_book->title}}</h2>
                                    <?php echo $idea_book->description; ?> 
                                    </div>
                                    <div class="col-12">
                                        <div class="row related-products">
                                            @foreach($related_idea_book as $row)
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
                                </div>
                                <div class="sidebar-widget widget-delivery mb-30 bg-grey-9 box-shadow-none">
                                    <div class="contact-from-area padding-20-row-col">
                                        <h2 class="mb-10">Contact My Bespoke Room</h2>
                                        
                                        <form class="contact-form-style mt-30" id="contact-form" action="#" method="post">
                                        {{csrf_field()}}
                                        <input value="{{$vendor->id}}" type="hidden" name="vendor_id" id="vendor_id">
                                        <input value="1" type="hidden" name="type" id="type">
                                        <input value="{{$idea_book->id}}" type="hidden" name="project_idea_book_id" id="project_idea_book_id">
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