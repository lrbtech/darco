@extends('website.layouts')
@section('extra-css')

@endsection
@section('content')
<main class="translate main pages">
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
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="login_wrap widget-taber-content">
                                <div class="padding_eight_all ">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Creating your own profile</h1>
                                        <p class="mb-30">Already have an account? <a href="/login">Login</a></p>
                                    </div>
                                    <form id="form" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group mb-3">
                                            <label>First Name</label>
                                            <input autocomplete="off" type="text" name="first_name" id="first_name" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                              <label>Last Name</label>
                                              <input autocomplete="off" type="text" name="last_name" id="last_name" class="form-control">
                                            </div>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group mb-3">
                                            <label>Email address</label>
                                            <input value="<?php echo $_GET['email']; ?>" autocomplete="off" type="email" name="email" id="email" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group mb-3">
                                            <label>Mobile</label>
                                            <input autocomplete="off" type="number" name="mobile" id="mobile" class="form-control">
                                          </div>
                                        </div>

                                        <div class="col-md-6">
                                          <div class="form-group mb-3">
                                            <label>Password</label>
                                            <input autocomplete="off" id="password" name="password" type="password" class="form-control">
                                          </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Confirm Password</label>
                                            <div class="form-group">
                                                <input autocomplete="off" id="password_confirmation" name="password_confirmation" type="password" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                      
                                      </div>
                                  
                                        

                                      <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group mb-3">
                                            <label>Country</label>
                                            <select id="country" name="country" class="form-control">
                                              <option value="">SELECT</option>
                                              <option value="1">kuwait</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group mb-3">
                                            <label>City</label>
                                            <select onchange="changecity()" id="city" name="city" class="form-control">
                                              <option value="">SELECT</option>
                                              @foreach($city as $row)
                                              <option value="{{$row->id}}">{{$row->city}}</option>
                                              @endforeach
                                            </select>
                                            <input type="hidden" value="kuwait" name="country" id="country">
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group mb-3">
                                            <label>Area</label>
                                            <select id="area" name="area" class="form-control">
                                              <option value="">SELECT</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Zipcode</label>
                                            <div class="form-group">
                                                <input autocomplete="off" id="zipcode" name="zipcode" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                      </div>
                                        <!-- <div class="payment_option mb-50">
                                            <div class="custome-radio">
                                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" checked="" />
                                                <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">I am a customer</label>
                                            </div>
                                            <div class="custome-radio">
                                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" checked="" />
                                                <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">I am a vendor</label>
                                            </div>
                                        </div> -->
                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="privacy_policy" id="privacy_policy" value="" />
                                                    <label class="form-check-label" for="privacy_policy">
                                                      <span>I agree to terms and conditions.</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- <a href="/privacy-policy"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a> -->
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

<div class="modal fade custom-modal" id="popupmodal" tabindex="-1" aria-labelledby="popupmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div style="overflow: scroll;height:500px;width:95%;" class="modal-body">
                <?php echo $settings->terms_and_conditions; ?>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra-js')
<script>
$('#privacy_policy').click(function(){
  // alert('hi');
  $('#popupmodal').modal('show');
  $('#popupmodal').modal({
    backdrop: 'static',
    keyboard: false,
  });
  //$('#modal-title').text('Add Category');
});

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
  if ($("#privacy_policy").is(":checked")) {
    spinner_body.show();
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#form')[0]);
    $.ajax({
      url : '/save-individual-register',
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
	else{
		toastr.error('Accept Terms & Privacy Policy');
	}
}
</script>
@endsection