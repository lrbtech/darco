@extends('website.layouts')
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
    <div class="page-content pt-50 pb-50">
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
                                            <h5>Account Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <form id="form" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>First Name <span class="required">*</span></label>
                                                        <input type="text" name="first_name" id="first_name" value="{{$profile->first_name}}" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Last Name <span class="required">*</span></label>
                                                        <input type="text" name="last_name" id="last_name" value="{{$profile->last_name}}" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>User Name <span class="required">*</span></label>
                                                        <input type="text" name="username" id="username" value="{{$profile->username}}" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Mobile <span class="required">*</span></label>
                                                        <input type="text" name="mobile" id="mobile" value="{{$profile->mobile}}" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Email ID <span class="required">*</span></label>
                                                        <input type="email" name="email" id="email" readonly value="{{$profile->email}}" class="form-control">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button onclick="Update()" type="button" class="btn btn-fill-out submit font-weight-bold">Update Profile</button>
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
$('.profile').addClass('active');
function Update(){
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $("#save").attr("disabled", true);
    var formData = new FormData($('#form')[0]);
    // var description = tinyMCE.get('description').getContent();
    // formData.append('description', description);
    $.ajax({
        url : '/customer/update-profile',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            Swal.fire({
                text: 'Successfully Update',
                icon: 'success',
                }).then((result) => {
                if (result.isConfirmed) {
                    $("#form")[0].reset();
                    location.reload();
                    $("#save").attr("disabled", false);
                }
            }) 
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                $("#"+i).after('<p class="text-danger">'+obj[0]+'</p>');
                $('#'+i).closest('.form-group').addClass('has-error');
            });
            $("#save").attr("disabled", false);
        }
    });
}

</script>
@endsection
