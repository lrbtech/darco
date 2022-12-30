@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">{{$language[21][Auth::guard('admin')->user()->lang]}}</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">{{$language[22][Auth::guard('admin')->user()->lang]}}</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
        <!-- <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
            <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton"
            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
            <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton"><a class="dropdown-item" href="#"><i class="la la-calendar-check-o"></i> Calender</a>
              <a class="dropdown-item" href="#"><i class="la la-cart-plus"></i> Cart</a>
              <a class="dropdown-item" href="#"><i class="la la-life-ring"></i> Support</a>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="la la-cog"></i> Settings</a>
            </div>
          </div>
        </div> -->
      </div>
      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">{{$language[22][Auth::guard('admin')->user()->lang]}}</h4>
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
                  <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>{{$language[23][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[24][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[25][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[26][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[27][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[28][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[29][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[30][Auth::guard('admin')->user()->lang]}}</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>#</th>
                            <th>{{$language[23][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[24][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[25][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[26][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[27][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[28][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[29][Auth::guard('admin')->user()->lang]}}</th>
                            <th>{{$language[30][Auth::guard('admin')->user()->lang]}}</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
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

<div class="modal fade" id="commission_modal"  tabindex="-1" role="dialog" aria-labelledby="commission_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Add New</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
              <form id="commission_form" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden" name="vendor_id" id="vendor_id">

              <div class="form-group">
                  <label class="col-form-label">Vendor Commission %$_COOKIE</label>
                  <input autocomplete="off" type="number" id="vendor_commission" name="vendor_commission" class="form-control">
              </div>

              </form>
          </div>
          <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
              <button onclick="UpdateCommission()" class="btn btn-primary" type="button">Update</button>
          </div>
      </div>
  </div>
</div>
@endsection
@section('extra-js')
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>

<script>
$('.vendor').addClass('active');

var orderPageTable = $('#datatable').DataTable({
  "processing": true,
  "serverSide": true,
  //"pageLength": 50,
  "ajax":{
      "url": "/admin/get-vendor",
      "dataType": "json",
      "type": "POST",
      "data":{ _token: "{{csrf_token()}}"}
  },
  "columns": [
    { data: 'DT_RowIndex', name: 'DT_RowIndex'},
    { data: 'date', date: 'date'},
    { data: 'type', type: 'type'},
    { data: 'name', name: 'name'},
    { data: 'mobile', name: 'mobile' },
    { data: 'email', name: 'email' },
    { data: 'vendor_commission', name: 'vendor_commission' },
    { data: 'status', name: 'status' },
    { data: 'action', name: 'action' },
  ]
});

function UpdateCommission(){
  spinner_body.show();
  $(".text-danger").remove();
  $('.form-group').removeClass('has-error').removeClass('has-success');
  var formData = new FormData($('#commission_form')[0]);
  $.ajax({
    url : '/admin/update-commission',
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    dataType: "JSON",
    success: function(data)
    {   
      spinner_body.hide();             
      $("#commission_form")[0].reset();
      $('#commission_modal').modal('hide');
      //location.reload();
      var new_url = '/admin/get-vendor';
      orderPageTable.ajax.url(new_url).load(null, false);
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
function EditCommission(id){
  spinner_body.show();   
  $.ajax({
    url : '/admin/edit-commission/'+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      spinner_body.hide();   
      $('#modal-title').text('Update Commission');
      $('#save').text('Save Change');
      $('input[name=vendor_commission]').val(data.vendor_commission);
      $('input[name=vendor_id]').val(id);
      $('#commission_modal').modal({
        backdrop: 'static',
        keyboard: false,
      });
    }
  });
}

function Delete(id,status){
  var r = confirm("Are you sure");
  if (r == true) {
    $.ajax({
      url : '/admin/delete-vendor/'+id+'/'+status,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        toastr.success(data, 'Successfully Delete');
        // location.reload();
        var new_url = '/admin/get-vendor';
        orderPageTable.ajax.url(new_url).load(null, false);
      }
    });
  } 
}
</script>
@endsection