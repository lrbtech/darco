@extends('vendor.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/tinymce/tinymce.min.css">

<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/wizard.css">

<style>
.app-content .wizard.wizard-notification > .steps > ul > li.current .step {
    border: 2px solid #40e7f8;
    color: #40e7f8;
    line-height: 36px;
}
.app-content .wizard.wizard-notification > .steps > ul > li.current .step:after {
    border-top-color: #40e7f8;
}
.app-content .wizard > .steps > ul > li.done .step {
    background-color: #40e7f8;
    border-color: #40e7f8;
    color: #fff;
}
.app-content .wizard.wizard-notification > .steps > ul > li:before, .app-content .wizard.wizard-notification > .steps > ul > li:after {
    top: 39px;
    width: 50%;
    height: 2px;
    background-color: #40e7f8;
}
.app-content .wizard.wizard-notification > .steps > ul > li.done .step:after {
    border-top-color: #40e7f8;
}
   .center {
    display:inline;
    margin: 3px;
    padding:5px;
   }
  .form-input {
    width:150px;
    /* padding:3px; */
    background:#fff;
    /* border:2px dashed dodgerblue; */
  }
  .form-input input {
    display:none;
  }
  .form-input label {
    display:block;
    width:150px;
    height: auto;
    max-height: 150px;
    background:#666;
    border-radius:10px;
    cursor:pointer;
  }
  
  .form-input img {
    width:150px;
    height: 150px;
    margin: 2px;
    opacity: .4;
  }
  .imgRemove{
    position: relative;
    bottom: 166px;
    left: 80%;
    background-color: transparent;
    border: none;
    font-size: 30px;
    outline: none;
  }
  .imgRemove::after{
    /* content: ' \21BA'; */
    content: ' \00d7';
    color: #fff;
    font-weight: 900;
    border-radius: 8px;
    cursor: pointer;
  }
  i.la.la-plus-circle {
    font-size: 63px;
    /* text-align: center; */
    padding: 36px;
    color: #fff;
}
.primary-img{
  color: #801580;
    font-size: 16px;
    text-align: center;
    font-weight: 600;
    font-family: sans-serif;
}
</style>
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Master</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/vendor/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item active">Add Product</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
          <section id="validation">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Create New Product</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <form id="form" method="POST" action="#" class="steps-validation wizard-notification">
                    {{csrf_field()}}
                      <!-- Step 0 -->
                      <h6>Select Language</h6>
                      <fieldset>
                        <div class="row">
                          
                          <div class="col-md-3"></div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <br><br><br>
                              <label for="assured_seller">Do you want Arabic Language?</label>
                              <br>
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input checked value="1" type="radio" id="language1" name="language" class="custom-control-input">  
                                <label class="custom-control-label" for="language1"> No </label>  
                              </div>  
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input value="0" type="radio" id="language2" name="language" class="custom-control-input">  
                                <label class="custom-control-label" for="language2"> Yes </label>  
                              </div>  
                            </div>
                          </div>

                          <div class="col-md-3"></div>
                          
                        </div>
                      </fieldset>
                      <!-- Step 1 -->
                      <h6>Basic Details</h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="product_name">
                                Product Name : <span class="danger">*</span>
                              </label>
                              <input type="text" class="form-control required" id="product_name" name="product_name">
                            </div>
                          </div>
                          <div class="col-md-6 arabic_content">
                            <div class="form-group">
                              <label for="product_name_arabic">
                                Product Name Arabic: <span class="danger">*</span>
                              </label>
                              <input type="text" class="form-control" id="product_name_arabic" name="product_name_arabic">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="category">Category</label>
                                  <select required onchange="changecategory()" id="category" name="category" class="form-control">
                                    <option value="">SELECT</option>
                                    @foreach($category as $row)
                                    <option value="{{$row->id}}">{{$row->category}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="subcategory">Sub Category</label>
                                  <select onchange="changesubcategory()" id="subcategory" name="subcategory" class="form-control">
                                    <option value="">SELECT</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="subsubcategory">Child Category</label>
                                  <select id="subsubcategory" name="subsubcategory" class="form-control">
                                    <option value="">SELECT</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="brand">Brand</label>
                              <select required id="brand" name="brand" class="form-control">
                                <option value="">SELECT</option>
                                @foreach($brand as $brand1)
                                <option value="{{$brand1->id}}" >{{$brand1->brand}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="height_weight_size">Height / Weight / Size</label>
                              <input type="text" class="form-control" id="height_weight_size" name="height_weight_size">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="mrp_price">
                                MRP Price <span class="danger">*</span>
                              </label>
                              <input required onfocus="if(this.value=='0') this.value='';" onfocusout="if(this.value=='') this.value='0';" value="0" type="number" class="form-control required" id="mrp_price" name="mrp_price">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="sales_price">
                                Sales Price<span class="danger">*</span>
                              </label>
                              <input required onfocus="if(this.value=='0') this.value='';" onfocusout="if(this.value=='') this.value='0';" value="0" type="number" class="form-control required" id="sales_price" name="sales_price">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="stock_status">Stock Status:</label>
                              <br>
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input checked value="0" type="radio" id="stock_status1" name="stock_status" class="custom-control-input">  
                                <label class="custom-control-label" for="stock_status1"> Available </label>  
                              </div>  
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input value="1" type="radio" id="stock_status2" name="stock_status" class="custom-control-input">  
                                <label class="custom-control-label" for="stock_status2"> Out of Stock </label>  
                              </div>  
                            </div>
                          </div>

                          <div class="col-md-3 view_stock">
                            <div class="form-group">
                              <label for="stock">Stock :</label>
                              <input onfocus="if(this.value=='0') this.value='';" onfocusout="if(this.value=='') this.value='0';" value="0" type="number" class="form-control" id="stock" name="stock">
                            </div>
                          </div>

                        </div>                       
                      </fieldset>
                      <!-- Step 1 -->
                      <h6>Description</h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="description">Product Description</label>
                                <textarea name="description" id="description" rows="8" class="tinymce"></textarea>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="specifications">Product Specifications</label>
                                <textarea name="specifications" id="specifications" rows="8" class="tinymce"></textarea>
                            </div>
                          </div>
                        </div>

                        <!-- <div class="row arabic_content">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="description_arabic">Product Description Arabic</label>
                                <textarea name="description_arabic" id="description_arabic" rows="8" class="tinymce"></textarea>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="specifications_arabic">Product Specifications Arabic</label>
                                <textarea name="specifications_arabic" id="specifications_arabic" rows="8" class="tinymce"></textarea>
                            </div>
                          </div>
                        </div> -->

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="mobile_description">Mobile App View Product Description</label>
                                <textarea name="mobile_description" id="mobile_description" rows="10" class="form-control"></textarea>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <!-- <div class="form-group">
                              <label for="mobile_specifications">Mobile App View Product Specifications</label>
                                <textarea name="mobile_specifications" id="mobile_specifications" rows="4" class="form-control"></textarea>
                            </div> -->
                            <table id="featuresTable" class="table">
                              <thead class="thead-primary">
                                  <tr style="text-align: center;">
                                    <th colspan="3" style="width:100%;">Mobile App View Product Specifications</th>
                                  </tr>
                                  <tr style="text-align: center;">
                                    <th style="width: 40%;">Label</th>
                                    <th style="width: 40%;">Value</th>
                                    <th style="width: 20%;padding: .0rem !important;">
                                      <button type="button" class="btn" onclick="addRow()" id="addRowBtn"> <i class="la la-plus"></i></button>
                                    </th>
                                  </tr>
                              </thead>
                              <tbody id="featuresTabletbody">

                              </tbody>
                              <tfoot>
                                <tr>
                                  <td>
                                    <button type="button" onclick="addRow()" class="btn"><span class="icon-label"><i class="la la-plus"></i> </span><span class="btn-text">Add</span></button>
                                  </td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                       
                      </fieldset>
                      <!-- Step 2 -->
                      <h6>Attributes & Groups</h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                <label class="attributes">Select Attributes</label>
                                <select onchange="changeattributes()" id="attributes" name="attributes" class="form-control">
                                  <option value="">SELECT</option>
                                  @foreach($attributes as $row)
                                  <option value="{{$row->id}}">{{$row->attribute_name}}</option>
                                  @endforeach
                                </select>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                <label class="product_group">Select Product Name</label>
                                <select required id="product_group" name="product_group" class="form-control">
                                  <option value="">SELECT Product Name</option>
                                  @foreach($product_group as $row)
                                  <option value="{{$row->id}}">{{$row->group_name}}</option>
                                  @endforeach
                                </select>
                              </div>
                          </div>
                        </div>
                        <div id="product_attr" class="row">

                        </div>
                      </fieldset>
                      <!-- Step 3 -->
                      <h6>Product Images</h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-12">

                            <div id="image_view" class="row">
                              <div value="1" class="center form-input panel_image">
                                <label for="file-ip-1">
                                <img id="file-ip-1-preview" src="/upload_files/preview.png">
                                <!-- <button type="button" class="imgRemove" onclick="myImgRemove(1)"></button> -->
                                </label>
                                <input type="file" name="image" id="file-ip-1" accept=".png,.jpg,.jpeg" onchange="showPreview(event, 1);">
                                <p class="primary-img">Primary Image</p>
                              </div>
                              <div class="work center form-input">
                                <div class="img" style="height:150px !important;background-color:#091a3a !important;">
                                    <a onclick="AddImages()" class="create-story" href="javascript:void(0)">
                                      <i class="la la-plus-circle"></i>
                                      <!-- <h4 class="story-line">Add More Images</h4> -->
                                    </a>
                                </div>
                              </div>
                            </div>
                      
                          </div>
                        </div>
                      </fieldset>
                      <!-- Step 4 -->
                      <h6>Delivery</h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="shipping_enable">Shipping Enable:</label>
                              <br>
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input checked value="0" type="radio" id="shipping_enable1" name="shipping_enable" class="custom-control-input">  
                                <label class="custom-control-label" for="shipping_enable1"> Yes </label>  
                              </div>  
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input value="1" type="radio" id="shipping_enable2" name="shipping_enable" class="custom-control-input">  
                                <label class="custom-control-label" for="shipping_enable2"> No </label>  
                              </div>  
                            </div>
                          </div>
                          <div class="col-md-4 view_shipping_charge">
                            <div class="form-group">
                              <label for="shipping_charge">
                                Shipping Charge : <span class="danger">*</span>
                              </label>
                              <input onfocus="if(this.value=='0') this.value='';" onfocusout="if(this.value=='') this.value='0';" value="0" type="number" class="form-control required" id="shipping_charge" name="shipping_charge">
                            </div>
                          </div>
                          <div class="col-md-5 view_shipping_charge">
                            <div class="form-group">
                              <label for="shipping_description">Shipping Description</label>
                              <textarea name="shipping_description" id="shipping_description" rows="4" class="form-control"></textarea>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="return_policy">Return Policy:</label>
                              <br>
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input checked value="0" type="radio" id="return_policy1" name="return_policy" class="custom-control-input">  
                                <label class="custom-control-label" for="return_policy1"> Yes </label>  
                              </div>  
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input value="1" type="radio" id="return_policy2" name="return_policy" class="custom-control-input">  
                                <label class="custom-control-label" for="return_policy2"> No </label>  
                              </div>  
                            </div>
                          </div>

                          <div class="col-md-4 view_return_policy">
                            <div class="form-group">
                              <label for="return_policy">Return Days:</label>
                              <br>
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input value="7" type="radio" id="return_days1" name="return_days" class="custom-control-input">  
                                <label class="custom-control-label" for="return_days1"> 7 Days </label>  
                              </div>  
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input checked value="15" type="radio" id="return_days2" name="return_days" class="custom-control-input">  
                                <label class="custom-control-label" for="return_days2"> 15 Days </label>  
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input value="30" type="radio" id="return_days3" name="return_days" class="custom-control-input">  
                                <label class="custom-control-label" for="return_days3"> 30 Days </label>  
                              </div>  
                            </div>
                          </div>
                          <div class="col-md-5 view_return_policy">
                            <div class="form-group">
                              <label for="return_description">Return Description</label>
                              <textarea name="return_description" id="return_description" rows="4" class="form-control"></textarea>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="assured_seller">Assured Seller:</label>
                              <br>
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input value="0" type="radio" id="assured_seller1" name="assured_seller" class="custom-control-input">  
                                <label class="custom-control-label" for="assured_seller1"> Yes </label>  
                              </div>  
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input checked value="1" type="radio" id="assured_seller2" name="assured_seller" class="custom-control-input">  
                                <label class="custom-control-label" for="assured_seller2"> No </label>  
                              </div>  
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="delivery_available">Delivery Available:</label>
                              <br>
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input value="0" type="radio" id="delivery_available1" name="delivery_available" class="custom-control-input">  
                                <label class="custom-control-label" for="delivery_available1"> Yes </label>  
                              </div>  
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input checked value="1" type="radio" id="delivery_available2" name="delivery_available" class="custom-control-input">  
                                <label class="custom-control-label" for="delivery_available2"> No </label>  
                              </div>  
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="rest_assured_seller">Rest Assured Seller:</label>
                              <br>
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input value="0" type="radio" id="rest_assured_seller1" name="rest_assured_seller" class="custom-control-input">  
                                <label class="custom-control-label" for="rest_assured_seller1"> Yes </label>  
                              </div>  
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input checked value="1" type="radio" id="rest_assured_seller2" name="rest_assured_seller" class="custom-control-input">  
                                <label class="custom-control-label" for="rest_assured_seller2"> No </label>  
                              </div>  
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="most_trusted">Most Trusted:</label>
                              <br>
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input value="0" type="radio" id="most_trusted1" name="most_trusted" class="custom-control-input">  
                                <label class="custom-control-label" for="most_trusted1"> Yes </label>  
                              </div>  
                              <div class="custom-control custom-radio custom-control-inline">  
                                <input checked value="1" type="radio" id="most_trusted2" name="most_trusted" class="custom-control-input">  
                                <label class="custom-control-label" for="most_trusted2"> No </label>  
                              </div>  
                            </div>
                          </div>

                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


      </div>
    </div>
</div>
@endsection
@section('extra-js')
<script src="/app-assets/vendors/js/editors/tinymce/tinymce.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/editors/editor-tinymce.js" type="text/javascript"></script>

<script src="/app-assets/vendors/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
<script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js" type="text/javascript"></script>
<!-- <script src="/app-assets/js/scripts/forms/wizard-steps.js" type="text/javascript"></script> -->

<script>
// $('.product').addClass('active');

$('.arabic_content').hide();

$(document).ready(function () {
  $('input:radio[name="stock_status"]').click(function(){
    if ($(this).val() == '0') {
      $('.view_stock').show();
    }
    else{
      $('.view_stock').hide();
    }
  });
  $('input:radio[name="shipping_enable"]').click(function(){
    if ($(this).val() == '0') {
      $('.view_shipping_charge').show();
    }
    else{
      $('.view_shipping_charge').hide();
    }
  });
  $('input:radio[name="return_policy"]').click(function(){
    if ($(this).val() == '0') {
      $('.view_return_policy').show();
    }
    else{
      $('.view_return_policy').hide();
    }
  });
  $('input:radio[name="language"]').click(function(){
    if ($(this).val() == '0') {
      $('.arabic_content').show();
    }
    else{
      $('.arabic_content').hide();
    }
  });
});

// $('#category').change(function(){
function changecategory(){
  var id = $('#category').val();
  // alert(id);
  $.ajax({
    url : '/get-sub-category/'+id,
    type: "GET",
    success: function(data)
    {
      $('#subcategory').html(data);
    }
  });
}

function changesubcategory(){
  var id = $('#subcategory').val();
  $.ajax({
    url : '/get-sub-category/'+id,
    type: "GET",
    success: function(data)
    {
      $('#subsubcategory').html(data);
    }
  });
}

function removeAttr(id){
  const index = attrdata.indexOf(id.toString());
  if (index > -1) { // only splice array when item is found
    attrdata.splice(index, 1); // 2nd parameter means remove one item only
  }
  $('#view_attributes'+id).remove();
}

var attrdata =[];
function changeattributes(){
// $('#attributes').change(function(){
  var id = $('#attributes').val();
    var filterdat = attrdata.filter(function (entry) {
    return entry === id;
  });
  //console.log(filterdat);
  if(filterdat.length ==0){
    attrdata.push(id);
    $.ajax({
      url : '/vendor/product-attr/'+id,
      type: "GET",
      success: function(data)
      {
        $('#product_attr').append(data);
        $('#attributes').val('');
      }
    });
  }
}


// Show form
var form = $(".steps-validation").show();

$(".steps-validation").steps({
  headerTag: "h6",
  bodyTag: "fieldset",
  transitionEffect: "fade",
  titleTemplate: '<span class="step">#index#</span> #title#',
  labels: {
    finish: 'Submit'
  },
  onStepChanging: function (event, currentIndex, newIndex)
  {
    // Allways allow previous action even if the current form is not valid!
    if (currentIndex > newIndex)
    {
      return true;
    }
    // Forbid next action on "Warning" step if the user is to young
    // if (newIndex === 3 && Number($("#age-2").val()) < 18)
    // {
    //   return false;
    // }
    // Needed in some cases if the user went back (clean up)
    if (currentIndex < newIndex)
    {
      // To remove error styles
      form.find(".body:eq(" + newIndex + ") label.error").remove();
      form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
    }
    form.validate().settings.ignore = ":disabled,:hidden";
    return form.valid();
  },
  onFinishing: function (event, currentIndex)
  {
    form.validate().settings.ignore = ":disabled";
    return form.valid();
  },
  onFinished: function (event, currentIndex)
  {
    Save();
  }
});

// Initialize validation
$(".steps-validation").validate({
  ignore: 'input[type=hidden]', // ignore hidden fields
  errorClass: 'danger',
  successClass: 'success',
  highlight: function(element, errorClass) {
    $(element).removeClass(errorClass);
  },
  unhighlight: function(element, errorClass) {
    $(element).removeClass(errorClass);
  },
  errorPlacement: function(error, element) {
    error.insertAfter(element);
  },
  rules: {
    email: {
      email: true
    }
  }
});

function Save(){
  spinner_body.show();
  $(".text-danger").remove();
  $('.form-group').removeClass('has-error').removeClass('has-success');
  var formData = new FormData($('#form')[0]);
  var description = tinyMCE.get('description').getContent();
  var specifications = tinyMCE.get('specifications').getContent();
  formData.append('attrdata', attrdata);
  formData.append('description', description);
  formData.append('specifications', specifications);
  $.ajax({
    url : '/vendor/save-product',
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    dataType: "JSON",
    success: function(data)
    {                
      if(data.status == 0){
        Swal.fire({
          title: data.message,
          icon: "success",
        }).then(function() {
          window.location = "/vendor/product";
          spinner_body.hide();
        });
      }
      else if(data.status == 2){
        toastr.error(data.message);
        spinner_body.hide();
      }  
    },error: function (data) {
      spinner_body.hide();
      var errorData = data.responseJSON.errors;
      $.each(errorData, function(i, obj) {
        toastr.error(obj[0]);
        $("#"+i).after('<p class="text-danger">'+obj[0]+'</p>');
        $('#'+i).closest('.form-group').addClass('has-error');
      });
    }
  });
}



function showPreview(event, number){
  if(event.target.files.length > 0){
    let src = URL.createObjectURL(event.target.files[0]);
    let preview = document.getElementById("file-ip-"+number+"-preview");
    preview.src = src;
    preview.style.display = "block";
  } 
}
// function myImgRemove(number) {
//    document.getElementById("file-ip-"+number+"-preview").src = "/upload_files/preview.png";
//    document.getElementById("file-ip-"+number).value = null;
// }
function AddImages() {
  var tableLength = $("#image_view .panel_image").length;
  var count;
  if(tableLength > 0) {		
    count = $("#image_view .panel_image:last").attr('value');
    count = Number(count) + 1;
  } else {
    count = 1;
  }
  var tr =
  '<div value="'+count+'" id="imagerows'+count+'" class="center form-input panel_image">'+
    '<label for="file-ip-'+count+'">'+
    '<img id="file-ip-'+count+'-preview" src="/upload_files/preview.png">'+
    '<button type="button" class="imgRemove" onclick="removeImageRows('+count+')"></button>'+
    '</label>'+
    '<input type="file" name="images[]" id="file-ip-'+count+'" accept=".png,.jpg,.jpeg" onchange="showPreview(event, '+count+');">'+
  '</div>';
  if(tableLength > 0) {	
    $("#image_view .panel_image:last").after(tr);
  } else {	
    $("#image_view .panel_image").append(tr);
  }	 
} // /add row
function removeImageRows(row)
{
  if(confirm('Are you sure delete this row?'))
  {
    $("#imagerows"+row).remove();
  }
}



addRow();
function addRow() {
	var tableLength = $("#featuresTable tbody tr").length;
	var count;
	if(tableLength > 0) {		
		count = $("#featuresTable tbody tr:last").attr('value');
		count = Number(count) + 1;
	} else {
		count = 1;
	}


var tr = '<tr value="'+count+'" id="row'+count+'">'+
  '<td>'+
		'<input class="form-control" type="text" name="label[]" id="label'+count+'" autocomplete="off"  />'+
	'</td>'+
  '<td>'+
		'<input class="form-control" type="text" name="value[]" id="value'+count+'" autocomplete="off"  />'+
	'</td>'+
	'<td align="center">'+
		'<button class="btn" type="button" onclick="removefeaturesrow('+count+')"><i class="la la-trash"></i></button>'+
	'</td>'+
'</tr>';

if(tableLength > 0) {							
	$("#featuresTable tbody tr:last").after(tr);
} else {				
	$("#featuresTable tbody").append(tr);
}		
// $("#features"+count).focus();

} // /add row


function removefeaturesrow(row = null)
{
	if(confirm('Are you sure delete this row?'))
	{
	   var tableFeaturesLength = $("#featuresTable tbody tr").length;
		if(tableFeaturesLength > '1') {
			$("#row"+row).remove();
			var previous_row = row - 1;
			var next_row = row + 1;
			$("#features"+previous_row).focus();		
			$("#features"+next_row).focus();		
		}
	}
}
</script>
@endsection