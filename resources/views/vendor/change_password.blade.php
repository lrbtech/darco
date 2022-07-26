@extends('vendor.layouts')
@section('extra-css')

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
                <li class="breadcrumb-item active">Change Password
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Basic Editor start -->
        <section id="basic">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Change Password</h4>
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
                    <form action="#" class="form-horizontal" id="form" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group col-md-6">
                            <label>Old Password <span class="required">*</span></label>
                            <input class="form-control" name="oldpassword" id="oldpassword" type="password" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>New Password <span class="required">*</span></label>
                            <input class="form-control" name="password" id="password" type="password" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Confirm Password <span class="required">*</span></label>
                            <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" />
                        </div>
                        <div class="modal-footer col-md-6">
                            <button onclick="ChangePassword()" class="btn btn-primary" type="button">Change Password</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Basic Editor end -->

      </div>
    </div>
</div>
@endsection
@section('extra-js')


<script>
$('.change-password').addClass('active');

function ChangePassword(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/vendor/update-password',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);                
            if(data.status == 1){
                Swal.fire({
                    text: 'Change Password Successfully',
                    icon: 'success',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $("#form")[0].reset();
                        $.ajax({
                            type: 'POST',
                            url: '/logout',
                            data:{ _token: "{{csrf_token()}}"},
                            success: function()
                            {
                                window.location.href="/vendor/login";
                            }
                        });
                    }
                }) 
            }
            else{
                Swal.fire({
                    text: data.message,
                    icon: 'error',
                    }).then((result) => {
                    if (result.isConfirmed) {
                    }
                })
            }
        },
        error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                $("#"+i).after('<p class="text-danger">'+obj[0]+'</p>');
                $('#'+i).closest('.form-group').addClass('has-error');
            });
        }
    });
}

</script>
@endsection