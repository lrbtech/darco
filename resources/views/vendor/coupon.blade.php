@extends('vendor.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Coupon</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/vendor/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Coupon</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <button id="add_new" class="float-md-right btn btn-danger round btn-glow px-2" type="button">Add New coupon</button>
      
        </div>
      </div>
      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">All Coupon</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                  <div class="card-body card-dashboard">
                    <table id="datatable" class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Coupon Code</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Coupon Value</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($coupon as $key => $row)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$row->coupon_code}}</td>
                            <td>{{$row->start_date}}</td>
                            <td>{{$row->end_date}}</td>
                            <td>{{$row->coupon_value}}</td>
                            <td>
                                <div class="btn-group mr-1 mb-1">
                                  <button type="button" class="btn btn-danger btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                                  <div class="dropdown-menu open-left arrow" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                      <button onclick="Edit({{$row->id}})"class="dropdown-item" type="button">Edit</button>
                                      <div class="dropdown-divider"></div>
                                      <button onclick="Delete({{$row->id}})"class="dropdown-item" type="button">Delete</button>
                                  </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Coupon Code</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Coupon Value</th>
                            <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--/ Zero configuration table -->
        
      </div>
    </div>
  </div>

<div class="modal fade" id="popup_modal"  tabindex="-1" role="dialog" aria-labelledby="popup_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Coupon Title</label>
                        <input autocomplete="off" type="text" id="coupon_title" name="coupon_title" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Coupon Code</label>
                        <input autocomplete="off" type="text" id="coupon_code" name="coupon_code" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Start Date</label>
                        <input autocomplete="off" type="date" id="start_date" name="start_date" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">End Date</label>
                        <input autocomplete="off" type="date" id="end_date" name="end_date" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Coupon Value Type</label>
                        <select id="value_type" name="value_type" class="form-control">
                            <option value="">SELECT</option>
                            <option value="1">Amount</option>
                            <option value="2">Percentage</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Coupon Value (% or Amount)</label>
                        <input autocomplete="off" type="number" id="coupon_value" name="coupon_value" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Minimum Order Value</label>
                        <input autocomplete="off" type="number" id="min_order_value" name="min_order_value" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Maximum Coupon Value</label>
                        <input autocomplete="off" type="number" id="max_coupon_value" name="max_coupon_value" class="form-control">
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button onclick="Save()" class="btn btn-primary" type="button">Save</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('extra-js')
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>


<script>
$('.coupon').addClass('active');

var action_type;
$('#add_new').click(function(){
  $('#popup_modal').modal({
    backdrop: 'static',
    keyboard: false,
  });
  $("#form")[0].reset();
  action_type = 1;
  $('#saveButton').text('Save');
  $('#modal-title').text('Add Coupon');
  $(".text-danger").remove();
  $('.form-group').removeClass('has-error').removeClass('has-success');
});

function Save(){
  spinner_body.show();
  $(".text-danger").remove();
  $('.form-group').removeClass('has-error').removeClass('has-success');
  var formData = new FormData($('#form')[0]);
  if(action_type == 1){
    $.ajax({
      url : '/vendor/save-coupon',
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data)
      {   
        spinner_body.hide();             
        $("#form")[0].reset();
        $('#popup_modal').modal('hide');
        location.reload();
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
  }else{
    $.ajax({
      url : '/vendor/update-coupon',
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
        $('#popup_modal').modal('hide');
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
}
function Edit(id){
  spinner_body.show();   
  $.ajax({
    url : '/vendor/edit-coupon/'+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      spinner_body.hide();        
      $('#modal-title').text('Update Coupon');
      $('#save').text('Save Change');
      $('input[name=coupon_title]').val(data.coupon_title);
      $('input[name=coupon_code]').val(data.coupon_code);
      $('input[name=start_date]').val(data.start_date);
      $('input[name=end_date]').val(data.end_date);
      $('select[name=value_type]').val(data.value_type);
      $('input[name=coupon_value]').val(data.coupon_value);
      $('input[name=min_order_value]').val(data.min_order_value);
      $('input[name=max_coupon_value]').val(data.max_coupon_value);
      $('input[name=id]').val(id);
      $('#popup_modal').modal({
        backdrop: 'static',
        keyboard: false,
      });
      action_type = 2;
    }
  });
}
function Delete(id){
    var r = confirm("Are you sure");
    if (r == true) {
      spinner_body.show();   
      $.ajax({
        url : '/vendor/delete-coupon/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          spinner_body.hide();   
          toastr.success(data, 'Successfully Delete');
          location.reload();
        }
      });
    } 
}

</script>
@endsection