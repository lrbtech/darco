@extends('vendor.layouts')
@section('extra-css')

@endsection
@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Profile</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/vendor/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">My Profile</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form">Profile Info</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div class="card-text">
                    </div>
                    <form id="form" class="form" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value="{{$profile->id}}">
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="first_name">First Name</label>
                              <input value="{{$profile->first_name}}" type="text" id="first_name" class="form-control" placeholder="First Name" name="first_name">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="last_name">Last Name</label>
                              <input value="{{$profile->last_name}}" type="text" id="last_name" class="form-control" placeholder="Last Name" name="last_name">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="username">Username</label>
                              <input value="{{$profile->username}}" type="text" id="username" class="form-control" placeholder="Username" name="username">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="mobile">Mobile Number</label>
                              <input value="{{$profile->mobile}}" type="text" id="mobile" class="form-control" placeholder="Mobile Number" name="mobile">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="email">E-mail</label>
                              <input readonly value="{{$profile->email}}" type="email" id="email" class="form-control" placeholder="E-mail" name="email">
                            </div>
                          </div>
                        </div>
                        <h4 class="form-section"><i class="la la-paperclip"></i> Business Info</h4>
                        <div class="form-group">
                          <label for="business_name">Business Name</label>
                          <input value="{{$profile->business_name}}" type="text" id="business_name" class="form-control" placeholder="Business Name" name="business_name">
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="website">Website</label>
                              <input value="{{$profile->website}}" type="text" id="website" class="form-control" name="website">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="landline">Landline</label>
                              <input value="{{$profile->landline}}" type="text" id="landline" class="form-control" placeholder="Landline" name="landline">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="city">City</label>
                              <input value="{{$profile->city}}" type="text" id="city" class="form-control" name="city">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="area">Area</label>
                              <input value="{{$profile->area}}" type="text" id="area" class="form-control" placeholder="area" name="area">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <textarea id="address" rows="5" class="form-control" name="address" placeholder="Address">{{$profile->address}}</textarea>
                        </div>
                        <div class="form-group">
                          <label>Profile Image</label>
                          <label id="profile_image" class="file center-block">
                            <input type="file" id="profile_image" name="profile_image">
                            <span class="file-custom"></span>
                          </label>
                          <br>
                          <img style="height:100px;" src="/profile_image/{{$profile->profile_image}}">
                        </div>
                      </div>
                      <div class="form-actions">
                        <center>
                        <button onclick="Save()" type="button" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> Save
                        </button>
                        </center>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          
          </div>
        </section>
        <!-- // Basic form layout section end -->
      </div>
    </div>
  </div>
@endsection
@section('extra-js')

<script>
$('.profile').addClass('active');

function Save(){
  spinner_body.show();
  $(".text-danger").remove();
  $('.form-group').removeClass('has-error').removeClass('has-success');
  var formData = new FormData($('#form')[0]);
    $.ajax({
      url : '/vendor/update-profile',
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data)
      {
        spinner_body.hide();   
        console.log(data);
        $("#form")[0].reset();
        location.reload();
        toastr.success(data, 'Successfully Update');
      },error: function (data) {
        var errorData = data.responseJSON.errors;
        spinner_body.hide();   
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