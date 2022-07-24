@extends('website.layouts')
@section('extra-css')
<style>
#thumb_container
{
  text-align:right;
  padding:0px;
}
#thumb_container img
{
  height:70px;
  width:70px;
  border:solid 1px lightgray;
  padding:5px;
}
#main_image
{
  border:solid 1px lightgray;
  
}
#main_image img
{
  padding:20px;
  height:350px;
  width:100%;
}
</style>
@endsection
@section('content')

    
<div class="container mt-5 mb-5" id="prodDetViews">
	<div class="card text-left">
        <div class="row">
            <div class="preview col-md-4">
                <div class="thumbnail-container mt-5">
                    <img class="drift-demo-trigger img-responsive" data-zoom="/product_image/{{$product->image}}" src="/product_image/{{$product->image}}">
                </div>
            </div>
            <!-- <div class='col-md-4'>
                <div class='row col-md-12'>
                <div class='col-md-3' id='thumb_container'>
                    <img src='/product_image/{{$product->image}}'  alt='image1' onClick='sendimg(this);' >
                    <img src='/product_image/{{$product->image}}' alt='image2' onClick='sendimg(this);'>
                    <img  src='/product_image/{{$product->image}}'  alt='image3'   onClick='sendimg(this);'>
                    <img src='/product_image/{{$product->image}}'   alt='imag4' height='60' width='60' style='border:solid 1px lightgray;' onClick='sendimg(this);'>
                    <img src='/product_image/{{$product->image}}'   alt='image5' onClick='sendimg(this);'>
                </div>
                <div class='col-md-9' id='main_image'>
                    <img id='mainimg' src='http://zoyorent.com/svg/television.svg' alt='image'>
                </div>
                </div>
            </div> -->
            <div class="details col-md-8">
                <h3 class="product-title mt-3">{{$product->product_name}}</h3>
                <div class="rating">
                    <div class="stars">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="review-no" style="color:#2e2e38">41 reviews</span>
                    </div>
                </div>
                <br>

                <table width="auto" border="0" cellspacing="5" cellpadding="5" id="pricingTable">
                    <tbody>
                        <tr>
                            <td>M.R.P.</td ><td> : </td>
                            <td class="font-roboto"><del>KWD {{$product->mrp_price}}</del></td>
                        </tr>
                        <tr>
                            <td>Deal of the Day</td>
                            <td> : </td>
                            <td><span class="price font-mon">KWD {{$product->sales_price}}</span> <br> <small>Ends in 2 days</small></td>
                        </tr>
                        <tr>
                            <td>You Save</td><td> : </td>
                            <td class="font-roboto">KWD 
                            {{$product->mrp_price - $product->sales_price}} <br>
                            <small>Exclusive of all taxes</small>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>

                <div class="view-product__quantity-alert mbm text-bold mts">Only {{$product->stock}} left!</div>
            
                <div class="row mt-2 mb-2">
                    <div class="col-4">
                    <form id="form" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input value="{{$product->sales_price}}" type="hidden" name="price" id="price">
                        <input value="{{$product->shipping_charge}}" type="hidden" name="shipping_charge" id="shipping_charge">
                        <input value="{{$product->vendor_id}}" type="hidden" name="vendor_id" id="vendor_id">
                        <input value="{{$product->id}}" type="hidden" name="product_id" id="product_id">
                        <input value="{{$product->product_name}}" type="hidden" name="product_name" id="product_name">

                        <input value="{{$product->tax_type}}" type="hidden" name="tax_type" id="tax_type">
                        <input value="{{$product->tax_percentage}}" type="hidden" name="tax_percentage" id="tax_percentage">

                        <input value="{{$product->image}}" type="hidden" name="product_image" id="product_image">
                        <select name="quantity" id="quantity" class="form-control" style="height:50px">
                            <option value="">QTY</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </form>
                    </div>
                    <div class="col-4">
                        <a onclick="AddToCart()" href="#" class="btn btn-success btn-block"><i class="far fa-cart-arrow-down"></i> Add to Cart</a>
                    </div>

                    <div class="col-2">
                        @if(Auth::check())
                        {{\App\Http\Controllers\Customer\FavouriteController::viewfavourites($product->id)}}
                        @else
                        <a href="/login" class="btn btn-success btn-block"><i class="fas fa-heart"></i></a>
                        @endif
                    </div>

                </div>
                <br>
            

                <table width="100%" border="0" id="optiontoPay" class="fwt-600">
                    <tr>
                        <td><img src="/website_assets/images/cod.png" width="45px"><br><span>Cash on Delivery</span></td>
                        <td><img src="/website_assets/images/exchange.png" width="45px"><br><span>10 Days Replacement</span></td>
                        <td><img src="/website_assets/images/warranty.png" width="45px"><br><span>Assured Product</span></td>
                    </tr>
                </table>
                <br>
                <p><i class="fas fa-shipping-fast"></i>&nbsp; Ready to ship to the  in 1-3 days</p>
            </div>
        </div> 
        <br><br>

    </div>

        <hr>

        <div class="card2">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab1" data-toggle="tab" href="#prod_desc" role="tab">Product Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab2" data-toggle="tab" href="#prodspeci" role="tab">Product Specifications</a>
                </li>
            </ul>
            <div class="tab-content f14" id="myTabContent">
            <div class="tab-pane fade show active" id="prod_desc" role="tabpanel">
                <p>{{$product->description}}</p>
            </div>
            <div class="tab-pane fade" id="prodspeci" role="tabpanel">
                <table border="1" cellspacing="2" cellpadding="2">
                <tr><td>Product ID</td><td>{{$product->id}}</td></tr>
                <tr><td>Manufactured By</td><td>xxx Company</td></tr>
                <tr><td>Sold By</td><td>XXX User</td></tr>
                <tr><td>Size/Weight</td><td>{{$product->size_weight}}</td></tr>
                <tr><td>Materials</td><td>{{$product->materials}}</td></tr>
                <tr><td>Assembly Required</td><td>Yes</td></tr>
                <tr><td>Category</td><td>{{\App\Http\Controllers\PageController::viewcategoryname($product->category)}}</td></tr>
                <tr><td>Style</td><td>{{$product->style}}</td></tr>
                </table>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col">
               <div class="bbb_main_container">
                <div class="bbb_viewed_title_container">
                    <h3 class="">Related Products</h3>
                    <div class="bbb_viewed_nav_container text-right">
                        <a href="javascript:;" class="bbb_viewed_nav bbb_viewed_prev"><i class="fas fa-chevron-left"></i></a>
                        <a href="javascript:;" class="bbb_viewed_nav bbb_viewed_next"><i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="bbb_viewed_slider_container">
                    <div class="owl-carousel owl-theme bbb_viewed_slider">
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image"><img src="/website_assets/images/lights/8.jpg" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_name"><a href="#">US DZIRE - THE BRAND OF LIFESTYLE ® 406 Hanging Lamp Electric Antique Wooden Ceiling Lights with Gold Bulb Pendant Lamp Night Lamp Living Room </a></div>
                                </div> 
                            </div>
                        </div>
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image"><img src="/website_assets/images/lights/2.png" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_name"><a href="#">22" Table Lamp - Whiteray Hurricane Outdoor Metal Lighting</a></div>
                                </div> 
                            </div>
                        </div>
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image"><img src="/website_assets/images/lights/3.png" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_name"><a href="#">22" Table Lamp - Whiteray Hurricane Outdoor Metal Lighting</a></div>
                                </div> 
                            </div>
                        </div>
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image"><img src="/website_assets/images/lights/4.png" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_name"><a href="#">22" Table Lamp - Whiteray Hurricane Outdoor Metal Lighting</a></div>
                                </div> 
                            </div>
                        </div>
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image"><img src="/website_assets/images/lights/5.jpg" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_name"><a href="#">US DZIRE - THE BRAND OF LIFESTYLE 408 Hanging Lamp Electric Antique Wooden Ceiling Lights</a></div>
                                </div> 
                            </div>
                        </div>
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image"><img src="/website_assets/images/lights/6.jpg" class="img-responsive" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_name"><a href="#">OURVIC 40 watts Ceiling Light, Black, Cage, Round Cluster</a></div>
                                </div> 
                            </div>
                        </div>
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image"><img src="/website_assets/images/lights/7.jpg" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_name"><a href="#">Best India Cane Handicraft Hanging Lamps for Livingroom Home Decoration Cane Lamp Shades Hanging Bamboo Lamp Lights Balcony</a></div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
               </div> 
            </div>
        </div>
        <hr>
        <h5>Recently Viewed</h5>
        <div class="row">
            <div class="col-3 col-lg-2"><a href="productDetails.php"><img src="/website_assets/images/lights/1.png" class="img-responsive" alt=""></a></div>
            <div class="col-3 col-lg-2"><a href="productDetails.php"><img src="/website_assets/images/sofa.png" class="img-responsive" alt=""></a></div>
            <div class="col-3 col-lg-2"><a href="productDetails.php"><img src="/website_assets/images/light.png" class="img-responsive" alt=""></a></div>
            <div class="col-3 col-lg-2"><a href="productDetails.php"><img src="/website_assets/images/bed.jpg" class="img-responsive" alt=""></a></div>
            <div class="col-3 col-lg-2"><a href="productDetails.php"><img src="/website_assets/images/chair.jpg" class="img-responsive" alt=""></a></div>
        </div>
    </div>
</div>

<script src='/website_assets/js/Drift.min.js'></script>  
<script type="text/javascript">
new Drift(document.querySelector('.drift-demo-trigger'), {
    paneContainer: document.querySelector('.details'),
    inlinePane: 769,
    inlineOffsetY: -85,
    containInline: true,
    hoverBoundingBox: true
});
</script>

@endsection
@section('extra-js')
<script>
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
@endsection