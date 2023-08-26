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
                                              <label>Business Type <span style="color:red;">*</span></label>
                                              <div class="business_type mb-50">
                                                <div class="custome-radio">
                                                    <input value="0" class="form-check-input" type="radio" name="business_type" id="business_type1"/>
                                                    <label class="form-check-label" for="business_type1" >Vendor</label>
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
                                            <label>Business Name <span style="color:red;">*</span></label>
                                            <input autocomplete="off" type="text" name="business_name" id="business_name" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group mb-3">
                                            <label>First Name (Authorized Signator) <span style="color:red;">*</span></label>
                                            <input autocomplete="off" type="text" name="first_name" id="first_name" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                              <label>Last Name (Authorized Signator) <span style="color:red;">*</span></label>
                                              <input autocomplete="off" type="text" name="last_name" id="last_name" class="form-control">
                                            </div>
                                        </div>
                                      </div>

                                      <div class="row">
                                        
                                      </div>

                                      <div class="row">

                                        <div class="col-md-4">
                                          <div class="form-group mb-3">
                                            <label>Choose Package <span style="color:red;">*</span></label>
                                            <select id="package_id" name="package_id" class="form-control">
                                              <option value="">SELECT</option>
                                              @foreach($package as $row)
                                              <option value="{{$row->id}}">{{$row->package_name}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                        </div>

                                        <div class="col-md-4">
                                          <div class="form-group mb-3">
                                            <label>Country <span style="color:red;">*</span></label>
                                            <select onchange="changecountry()" id="country" name="country" class="form-control">
                                              <option value="">SELECT</option>
                                              @foreach($countrydata as $row)
                                              <option value="{{$row->name}}">{{$row->name}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group mb-3">
                                            <label>City <span style="color:red;">*</span></label>
                                            <select onchange="changecity()" id="city" name="city" class="form-control">
                                              <option value="">SELECT</option>
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
                                          <div class="form-group mb-3">
                                            <label>Address</label>
                                            <textarea id="address" name="address" class="form-control"></textarea>
                                          </div>
                                        </div>

                                        <div class="col-md-4">
                                          <div class="form-group mb-3">
                                            <label>Email address <span style="color:red;">*</span></label>
                                            <input value="<?php echo $_GET['email']; ?>" autocomplete="off" type="email" name="email" id="email" class="form-control">
                                          </div>
                                        </div>

                                        <div class="col-md-4">
                                          <div class="form-group mb-3">
                                            <label>Mobile <span style="color:red;">*</span></label>
                                            <div class="input-group mb-3">
                                              <div style="width:30%;" class="input-group-prepend">
                                                <input readonly type="text" name="country_code" id="country_code">
                                              </div>
                                              <input style="width:70%;" type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-4">
                                          <div class="form-group mb-3">
                                            <label>Password <span style="color:red;">*</span></label>
                                            <input autocomplete="off" id="password" name="password" type="password" class="form-control">
                                          </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Confirm Password <span style="color:red;">*</span></label>
                                            <div class="form-group">
                                                <input autocomplete="off" id="password_confirmation" name="password_confirmation" type="password" placeholder="" class="form-control">
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
                                                    <label class="form-check-label" for="privacy_policy">
                                                    <span class="view_popup">I agree to terms and conditions.</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- <a href="/pages/privacy-policy"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a> -->
                                        </div>
                                        <div id="recaptcha-container"></div>

                                        <div class="form-group mb-30">
                                          
                                            <button onclick="Send()" type="button" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit &amp; Register</button>
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
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
  
<script>
      
  var firebaseConfig = {
    apiKey: "AIzaSyCq7oCiv7fDIZ4UGDUnW4gTso43VJeVUUI",
    authDomain: "darstore-335c3.firebaseapp.com",
    projectId: "darstore-335c3",
    storageBucket: "darstore-335c3.appspot.com",
    messagingSenderId: "1033027003222",
    appId: "1:1033027003222:web:3066ac26694c9fdc332cf7",
    measurementId: "G-0MY5YNXKFD"
  };
    
  firebase.initializeApp(firebaseConfig);
</script>
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

function changecountry(){
  spinner_body.show();
  var id = $('#country').val();
  $.ajax({
    url : '/get-api-city/'+id,
    type: "GET",
    success: function(data)
    {
      $('#city').html(data);
      spinner_body.hide();
      getapicountrycode(id);
    }
  });
}

function changecity(){
  spinner_body.show();
  var id = $('#city').val();
  $.ajax({
    url : '/get-api-area/'+id,
    type: "GET",
    success: function(data)
    {
      $('#area').html(data);
      spinner_body.hide();
    }
  });
}

function getapicountrycode(id){
  spinner_body.show();
  $.ajax({
    url : '/get-api-countrycode/'+id,
    type: "GET",
    success: function(data)
    {
      $('#country_code').val(data);
      spinner_body.hide();
    }
  });
}

window.onload=function () {
  render();
};

function render() {
  window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
  recaptchaVerifier.render();
}

function Send(){
	if ($("#privacy_policy").is(":checked")) {
		spinner_body.show();
		$(".text-danger").remove();
		$('.form-group').removeClass('has-error').removeClass('has-success');
		var formData = new FormData($('#form')[0]);
		$("#savebutton").attr("disabled", true);
		$.ajax({
			url : '/send-vendor-otp',
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data)
			{     
				spinner_body.hide();  
				$("#savebutton").attr("disabled", false);  

        var mobile = $('#mobile').val();
        var country_code = $('#country_code').val();
        var number = '+'+''+country_code+''+mobile;

        phoneSendAuth(number);
  
        Swal.fire({
        title: 'Verify Your Otp',
        input: 'text',
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Verify',
        showLoaderOnConfirm: true,
        preConfirm: (otp) => {
          return coderesult.confirm(otp).then(function (result) {
              // var user=result.user;
              allowOutsideClick: () => !Swal.isLoading()
              console.log("success");
              Save();
              return true;
          }).catch(function (error) {
              // $("#error").text(error.message);
              // $("#error").show();
              //toastr.error("invalid code");
              console.log("invalid code");
              Swal.showValidationMessage("invalid code")
             
          });
        },
        
        }).then((result) => {
          // if (result.isConfirmed) {
        
          // }
          // else {
          //   $("#savebutton").attr("disabled", false);
          // }
        })

				// if(data.status == 1){
				// 	var mobile = $('#mobile').val();
				// 	Swal.fire({
				// 	title: 'Verify Your Otp',
				// 	input: 'text',
				// 	inputAttributes: {
				// 		autocapitalize: 'off'
				// 	},
				// 	showCancelButton: true,
				// 	confirmButtonText: 'Verify',
				// 	showLoaderOnConfirm: true,
				// 	preConfirm: (otp) => {
				// 		return fetch('verify-vendor-otp/'+mobile+'/'+otp)
				// 		.then(response => {
				// 			if (!response.ok) {
				// 				throw new Error(response.statusText)
				// 			}
				// 			// Swal.showValidationMessage(response)
				// 			return response.json()
				// 		})
				// 		.catch(error => {
				// 			// Swal.showValidationMessage(
				// 			// `Request failed: ${error}`
				// 			// )
				// 			Swal.showValidationMessage(`Invalid OTP`)
				// 		})
				// 	},
				// 	allowOutsideClick: () => !Swal.isLoading()
				// 	}).then((result) => {
				// 		if (result.isConfirmed) {
				// 			Save();
				// 		}
				// 		else {
				// 			$("#savebutton").attr("disabled", false);
				// 		}
				// 	})
				// } 
			
			},error: function (data) {
				spinner_body.hide();    
				$("#savebutton").attr("disabled", false);
				var errorData = data.responseJSON.errors;
				$.each(errorData, function(i, obj) {
					toastr.error(obj[0]);
					$('#'+i).after('<p class="text-danger">'+obj[0]+'</p>');
					$('#'+i).closest('.form-group').addClass('has-error');
					$("#savebutton").attr("disabled", false);
				});
			}
		});
	}
	else{
		toastr.error('Accept Terms & Privacy Policy');
	}
}

function phoneSendAuth(number) { 
  firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
      window.confirmationResult=confirmationResult;
      coderesult=confirmationResult;
      console.log(coderesult);
      // $("#sentSuccess").text("Message Sent Successfully.");
      // $("#sentSuccess").show();
  }).catch(function (error) {
      // $("#error").text(error.message);
      // $("#error").show();
      toastr.error(error.message);
  });
}

function codeverify(code) {
    coderesult.confirm(code).then(function (result) {
        var user=result.user;
        console.log(user);
    }).catch(function (error) {
        // $("#error").text(error.message);
        // $("#error").show();
        toastr.error(error.message);
    });
}

function Save(){
  if ($("#privacy_policy").is(":checked")) {
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
        // location.reload();
        toastr.success(data, 'Successfully Save');
        window.location.href="/vendor/login";
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