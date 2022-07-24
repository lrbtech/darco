@extends('website.layouts1')
@section('extra-css')
@endsection
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Customer <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            @include('customer.sidebar')
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Change Password</h5>
                                        </div>
                                        <div class="card-body">
                                            <form id="form" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Old Password <span class="required">*</span></label>
                                                        <input class="form-control" name="oldpassword" id="oldpassword" type="password" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>New Password <span class="required">*</span></label>
                                                        <input class="form-control" name="password" id="password" type="password" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Confirm Password <span class="required">*</span></label>
                                                        <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button onclick="ChangePassword()" type="button" class="btn btn-fill-out submit font-weight-bold">Change Password</button>
                                                    </div>
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
    </div>
</main>
@endsection
@section('extra-js')
<script type="text/javascript">
$('.change-password').addClass('active');
function ChangePassword(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/customer/update-password',
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
                                window.location.href="/login";
                            }
                        });
                        window.location.href="/login";
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
