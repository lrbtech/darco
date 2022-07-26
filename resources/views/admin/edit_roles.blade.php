@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/toggle/switchery.min.css">

<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/switch.css">
<link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-switch.css">


@endsection
@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Roles</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">All Roles</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Zero configuration table -->
        <form id="form" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input value="{{$roles->id}}" type="hidden" name="id" id="id">
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Roles</h4>
                    <br>
                    <div class="form-group">
                        <label class="col-form-label">Role Name</label>
                        <input value="{{$roles->role_name}}" autocomplete="off" type="text" id="role_name" name="role_name" class="form-control">
                    </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th style="width:40%;">#</th>
                            <th style="width:15%;">View</th>
                            <th style="width:15%;">Create</th>
                            <th style="width:15%;">Stitatus</th>
                            <th style="width:15%;">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>Dashboard</td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->dashboard == 'on' ? ' checked' : '') }} type="checkbox" name="dashboard" id="dashboard" class="switchery" />
                                    <label for="dashboard" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>Customers</td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->customers == 'on' ? ' checked' : '') }} type="checkbox" name="customers" id="customers" class="switchery" />
                                    <label for="customers" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>Vendors</td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->vendors == 'on' ? ' checked' : '') }} type="checkbox" name="vendors" id="vendors" class="switchery" />
                                    <label for="vendors" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>Reviews</td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->reviews == 'on' ? ' checked' : '') }} type="checkbox" name="reviews" id="reviews" class="switchery" />
                                    <label for="reviews" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>Product Category</td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->product_category == 'on' ? ' checked' : '') }} type="checkbox" name="product_category" id="product_category" class="switchery" />
                                    <label for="product_category" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->product_category_create == 'on' ? ' checked' : '') }} type="checkbox" name="product_category_create" id="product_category_create" class="switchery" />
                                    <label for="product_category_create" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->product_category_edit == 'on' ? ' checked' : '') }} type="checkbox" name="product_category_edit" id="product_category_edit" class="switchery" />
                                    <label for="product_category_edit" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->product_category_delete == 'on' ? ' checked' : '') }} type="checkbox" name="product_category_delete" id="product_category_delete" class="switchery" />
                                    <label for="product_category_delete" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Professional Category</td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->professional_category == 'on' ? ' checked' : '') }} type="checkbox" name="professional_category" id="professional_category" class="switchery" />
                                    <label for="professional_category" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->professional_category_create == 'on' ? ' checked' : '') }} type="checkbox" name="professional_category_create" id="professional_category_create" class="switchery" />
                                    <label for="professional_category_create" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->professional_category_edit == 'on' ? ' checked' : '') }} type="checkbox" name="professional_category_edit" id="professional_category_edit" class="switchery" />
                                    <label for="professional_category_edit" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->professional_category_delete == 'on' ? ' checked' : '') }} type="checkbox" name="professional_category_delete" id="professional_category_delete" class="switchery" />
                                    <label for="professional_category_delete" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Idea Category</td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->idea_category == 'on' ? ' checked' : '') }} type="checkbox" name="idea_category" id="idea_category" class="switchery" />
                                    <label for="idea_category" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->idea_category_create == 'on' ? ' checked' : '') }} type="checkbox" name="idea_category_create" id="idea_category_create" class="switchery" />
                                    <label for="idea_category_create" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->idea_category_edit == 'on' ? ' checked' : '') }} type="checkbox" name="idea_category_edit" id="idea_category_edit" class="switchery" />
                                    <label for="idea_category_edit" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->idea_category_delete == 'on' ? ' checked' : '') }} type="checkbox" name="idea_category_delete" id="idea_category_delete" class="switchery" />
                                    <label for="idea_category_delete" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->city == 'on' ? ' checked' : '') }} type="checkbox" name="city" id="city" class="switchery" />
                                    <label for="city" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->city_create == 'on' ? ' checked' : '') }} type="checkbox" name="city_create" id="city_create" class="switchery" />
                                    <label for="city_create" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->city_edit == 'on' ? ' checked' : '') }} type="checkbox" name="city_edit" id="city_edit" class="switchery" />
                                    <label for="city_edit" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->city_delete == 'on' ? ' checked' : '') }} type="checkbox" name="city_delete" id="city_delete" class="switchery" />
                                    <label for="city_delete" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Orders</td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->orders == 'on' ? ' checked' : '') }} type="checkbox" name="orders" id="orders" class="switchery" />
                                    <label for="orders" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>Settlement Report</td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->settlement_report == 'on' ? ' checked' : '') }} type="checkbox" name="settlement_report" id="settlement_report" class="switchery" />
                                    <label for="settlement_report" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>Users</td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->users == 'on' ? ' checked' : '') }} type="checkbox" name="users" id="users" class="switchery" />
                                    <label for="users" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->users_create == 'on' ? ' checked' : '') }} type="checkbox" name="users_create" id="users_create" class="switchery" />
                                    <label for="users_create" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->users_edit == 'on' ? ' checked' : '') }} type="checkbox" name="users_edit" id="users_edit" class="switchery" />
                                    <label for="users_edit" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->users_delete == 'on' ? ' checked' : '') }} type="checkbox" name="users_delete" id="users_delete" class="switchery" />
                                    <label for="users_delete" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Roles</td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->roles == 'on' ? ' checked' : '') }} type="checkbox" name="roles" id="roles" class="switchery" />
                                    <label for="roles" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->roles_create == 'on' ? ' checked' : '') }} type="checkbox" name="roles_create" id="roles_create" class="switchery" />
                                    <label for="roles_create" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->roles_edit == 'on' ? ' checked' : '') }} type="checkbox" name="roles_edit" id="roles_edit" class="switchery" />
                                    <label for="roles_edit" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->roles_delete == 'on' ? ' checked' : '') }} type="checkbox" name="roles_delete" id="roles_delete" class="switchery" />
                                    <label for="roles_delete" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Terms and Conditions</td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->terms_and_conditions == 'on' ? ' checked' : '') }} type="checkbox" name="terms_and_conditions" id="terms_and_conditions" class="switchery" />
                                    <label for="terms_and_conditions" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>Privacy Policy</td>
                            <td>
                                <div class="form-group pb-1">
                                    <input {{ ($roles->privacy_policy == 'on' ? ' checked' : '') }} type="checkbox" name="privacy_policy" id="privacy_policy" class="switchery" />
                                    <label for="privacy_policy" class="font-medium-2 text-bold-600 ml-1"></label>
                                </div>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="modal-footer">
                        <button onclick="Save()" class="btn btn-primary" type="button">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        </form>
        <!--/ Zero configuration table -->
        
      </div>
    </div>
  </div>

@endsection
@section('extra-js')
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>


<script src="/app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js"
type="text/javascript"></script>
<script src="/app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/forms/switch.js" type="text/javascript"></script>

<script>
$('.roles').addClass('active');


function Save(){
    spinner_body.show();
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#form')[0]);
    $.ajax({
      url : '/admin/update-roles',
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data)
      {   
        spinner_body.hide();             
        $("#form")[0].reset();
        window.location.href="/admin/roles";
        toastr.success(data, 'Successfully Save');
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