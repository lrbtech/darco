@extends('website.layouts')
@section('extra-css')

@endsection
@section('content')

    
<div class="page-header">
	<div class="container d-flex flex-column align-items-center">
		<h2 class="mt-4">Let’s  get started by creating your profile.</h2>
		<p>Please fill the below details, it may help us to update your profile information</p>
	</div>
</div>

<div class="container mt-5 mb-5">
	<div class="card2">
    <form id="form" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="row">
        <div class="col-md-6">
          <div class="form-group mb-3">
            <label>Business Name</label>
            <input autocomplete="off" type="text" name="business_name" id="business_name" class="form-control">
          </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
              <label>Business Type</label>
              <select name="business_type" id="business_type" class="form-control">
                <option value="">Select category</option>
                <option value="0">Shop</option>
                <option value="1">Professionals</option>
              </select>
            </div>
        </div>
      </div>

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
            <input autocomplete="off" type="email" name="email" id="email" class="form-control">
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
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="checkbox" onchange="document.getElementById('password_confirmation').type = this.checked ? 'text' : 'password'">
					<label class="form-check-label">Show</label> 
					<div class="form-group">
						<input autocomplete="off" id="password_confirmation" name="password_confirmation" type="password" placeholder="" class="form-control">
					</div>
				</div>
      
      </div>
	
				

      <div class="row">
        <div class="col-md-6">
          <div class="form-group mb-3">
            <label>City</label>
            <input autocomplete="off" type="text" name="city" id="city" class="form-control">
            <input type="hidden" value="kuwait" name="country" id="country">
          </div> 
      	</div>
      	<div class="col-md-6">
          <div class="form-group mb-3">
          	<label>Area</label>
           	<input autocomplete="off" type="text" name="area" id="area" class="form-control">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label><input type="checkbox" name="agree"> I agree to the <a href="javascript:;">terms and conditions</a></label>
      </div>
      <div class="text-center mb-2">
        <button onclick="Save()" type="button" class="btn btn-dark btn-md mr-0"> Register </button>
      </div>
        
    </form>
	</div>
</div>

@endsection
@section('extra-js')
<script>
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