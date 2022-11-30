@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">{{$language[96][Auth::guard('admin')->user()->lang]}}</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">{{$language[96][Auth::guard('admin')->user()->lang]}}</a>
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
                  <h4 class="card-title">{{$language[96][Auth::guard('admin')->user()->lang]}}</h4>
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
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>{{$language[97][Auth::guard('admin')->user()->lang]}}</th>
                          <th>{{$language[98][Auth::guard('admin')->user()->lang]}}</th>
                          <th>{{$language[99][Auth::guard('admin')->user()->lang]}}</th>
                          <th>{{$language[100][Auth::guard('admin')->user()->lang]}}</th>
                          <th>{{$language[101][Auth::guard('admin')->user()->lang]}}</th>
                          <th>{{$language[102][Auth::guard('admin')->user()->lang]}}</th>
                          <th>{{$language[103][Auth::guard('admin')->user()->lang]}}</th>
                          <th>{{$language[104][Auth::guard('admin')->user()->lang]}}</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>{{$language[97][Auth::guard('admin')->user()->lang]}}</th>
                          <th>{{$language[98][Auth::guard('admin')->user()->lang]}}</th>
                          <th>{{$language[99][Auth::guard('admin')->user()->lang]}}</th>
                          <th>{{$language[100][Auth::guard('admin')->user()->lang]}}</th>
                          <th>{{$language[101][Auth::guard('admin')->user()->lang]}}</th>
                          <th>{{$language[102][Auth::guard('admin')->user()->lang]}}</th>
                          <th>{{$language[103][Auth::guard('admin')->user()->lang]}}</th>
                          <th>{{$language[104][Auth::guard('admin')->user()->lang]}}</th>
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
@endsection
@section('extra-js')
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>

<script>
$('.payments-out-report').addClass('active');

var orderPageTable = $('#datatable').DataTable({
  "processing": true,
  "serverSide": true,
  //"pageLength": 50,
  "ajax":{
      "url": "/admin/get-payments-out-report",
      "dataType": "json",
      "type": "POST",
      "data":{ _token: "{{csrf_token()}}"}
  },
  "columns": [
    { data: 'DT_RowIndex', name: 'DT_RowIndex'},
    { data: 'date', date: 'name'},
    { data: 'vendor', type: 'vendor'},
    { data: 'total', type: 'total'},
    { data: 'service_charge', name: 'service_charge' },
    { data: 'commission', name: 'commission' },
    { data: 'payable_amount', name: 'payable_amount' },
    { data: 'paid_status', name: 'paid_status' },
    { data: 'action', name: 'action' },
  ]
});

function ChangeStatus(id,status){
  var r = confirm("Are you sure");
  if (r == true) {
    $.ajax({
      url : '/admin/change-status-paymentsout/'+id+'/'+status,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        toastr.success(data, 'Successfully Update');
        // location.reload();
        var new_url = '/admin/get-payments-out-report';
        orderPageTable.ajax.url(new_url).load(null, false);
      }
    });
  } 
}
</script>
@endsection