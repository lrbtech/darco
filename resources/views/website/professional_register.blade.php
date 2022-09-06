@extends('website.layouts')
@section('extra-css')

@endsection
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Register
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-11 col-lg-11 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <!-- <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white"> -->
                              <div class="login_wrap widget-taber-content">
                                  <div class="padding_eight_all">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Let’s  get started by creating your profile</h1>
                                        <p class="mb-30">Please fill the below details, it may help us to update your profile information</p>
                                        <p class="mb-30">Already have an account? <a href="/vendor/login">Login</a></p>
                                    </div>
                                    <form id="form" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                      <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                              <label>Business Type</label>
                                              <div class="business_type mb-50">
                                                <div class="custome-radio">
                                                    <input value="0" class="form-check-input" type="radio" name="business_type" id="business_type1"/>
                                                    <label class="form-check-label" for="business_type1" >Shop</label>
                                                </div>
                                                <div class="custome-radio">
                                                    <input value="1"  class="form-check-input" type="radio" name="business_type" id="business_type2" />
                                                    <label class="form-check-label" for="business_type2">Professionals</label>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group mb-3">
                                            <label>Business Name</label>
                                            <input autocomplete="off" type="text" name="business_name" id="business_name" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group mb-3">
                                            <label>First Name (Authorized Signator)</label>
                                            <input autocomplete="off" type="text" name="first_name" id="first_name" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                              <label>Last Name (Authorized Signator)</label>
                                              <input autocomplete="off" type="text" name="last_name" id="last_name" class="form-control">
                                            </div>
                                        </div>
                                      </div>

                                      <div class="row">
                                        
                                      </div>

                                      <div class="row">
                                        <div class="col-md-4">
                                          <div class="form-group mb-3">
                                            <label>Email address</label>
                                            <input value="<?php echo $_GET['email']; ?>" autocomplete="off" type="email" name="email" id="email" class="form-control">
                                          </div>
                                        </div>

                                        <div class="col-md-4">
                                          <div class="form-group mb-3">
                                            <label>Password</label>
                                            <input autocomplete="off" id="password" name="password" type="password" class="form-control">
                                          </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Confirm Password</label>
                                            <div class="form-group">
                                                <input autocomplete="off" id="password_confirmation" name="password_confirmation" type="password" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                      
                                      </div>
                                  
                                        

                                      <div class="row">
                                        <div class="col-md-4">
                                          <div class="form-group mb-3">
                                            <label>Mobile</label>
                                            <input autocomplete="off" type="number" name="mobile" id="mobile" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group mb-3">
                                            <label>Country</label>
                                            <select id="country" name="country" class="form-control">
                                              <option value="">SELECT</option>
                                              <option value="1">kuwait</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group mb-3">
                                            <label>City</label>
                                            <select onchange="changecity()" id="city" name="city" class="form-control">
                                              <option value="">SELECT</option>
                                              @foreach($city as $row)
                                              <option value="{{$row->id}}">{{$row->city}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group mb-3">
                                            <label>Area</label>
                                            <select id="area" name="area" class="form-control">
                                              <option value="">SELECT</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Zipcode</label>
                                            <div class="form-group">
                                                <input autocomplete="off" id="zipcode" name="zipcode" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                      </div>


                                      <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group mb-3">
                                            <label>TRADE LICENSE NO</label>
                                            <input autocomplete="off" type="text" name="trade_license_no" id="trade_license_no" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group mb-3">
                                            <label>VAT CERTIFICATE NO</label>
                                            <input autocomplete="off" type="text" name="vat_certificate_no" id="vat_certificate_no" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group mb-3">
                                            <label>Civil ID  / Passport</label>
                                            <input autocomplete="off" type="text" name="civi_id_or_passport" id="civi_id_or_passport" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group mb-3">
                                            <label>Commercial LICENSE NO</label>
                                            <input autocomplete="off" type="text" name="commercial_license_no" id="commercial_license_no" class="form-control">
                                          </div>
                                        </div>
                                      </div>


                                      <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group mb-3">
                                            <label>ID Proof</label>
                                            <input autocomplete="off" type="file" name="id_proof" id="id_proof" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group mb-3">
                                            <label>Civil ID  / Passport Copy</label>
                                            <input autocomplete="off" type="file" name="civi_id_or_passport_copy" id="civi_id_or_passport_copy" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group mb-3">
                                            <label>Commercial LICENSE COPY</label>
                                            <input autocomplete="off" type="file" name="commercial_license_copy" id="commercial_license_copy" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group mb-3">
                                            <label>Article of Association</label>
                                            <input autocomplete="off" type="file" name="article_of_association" id="article_of_association" class="form-control">
                                          </div>
                                        </div>
                                      </div>
                                      
                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="privacy_policy" id="privacy_policy" value="" />
                                                    <label class="form-check-label" for="privacy_policy"><span>I agree to terms &amp; Policy.</span></label>
                                                </div>
                                            </div>
                                            <a href="/pages/privacy-policy"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                        </div>
                                        <div class="form-group mb-30">
                                            <button onclick="Save()" type="button" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit &amp; Register</button>
                                        </div>
                                        <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                    </form>
                                </div>
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
function changecity(){
  var id = $('#city').val();
  // alert(id);
  $.ajax({
    url : '/get-area/'+id,
    type: "GET",
    success: function(data)
    {
      $('#area').html(data);
    }
  });
}

function Save(){
  spinner_body.show();
  $(".text-danger").remove();
  $('.form-group').removeClass('has-error').removeClass('has-success');
  var formData = new FormData($('#form')[0]);
  $.ajax({
    url : '/save-professional-register',
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    dataType: "JSON",
    success: function(data)
    {   
      spinner_body.hide();             
      $("#form")[0].reset();
      location.reload();
      toastr.success(data, 'Successfully Save');
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