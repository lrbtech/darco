@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Product Report</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">{{$language[89][Auth::guard('admin')->user()->lang]}}</a>
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
                <form id="search_form" action="/admin/excel-product-report" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <?php
                  $first_date = date('Y-m-d',strtotime('first day of this month'));
                  $last_date = date('Y-m-d',strtotime('last day of this month'));
                  ?>
                    <div class="col-sm-3">
                      <label class="col-form-label">From Date</label>
                      <input value="{{date('Y-m-d', strtotime('first day of this month'))}}" autocomplete="off" id="from_date" name="from_date" type="date" class="form-control mt-15" placeholder="Search From Date">
                    </div>
                    <div class="col-sm-3">
                      <label class="col-form-label">To Date</label>
                      <input value="{{date('Y-m-d', strtotime('last day of this month'))}}" autocomplete="off" id="to_date" name="to_date" type="date" class="form-control mt-15" placeholder="Search To Date">
                    </div>
                    <div class="col-sm-3">
                        <label class="col-form-label">Search Vendor</label>
                        <select id="vendor_id" name="vendor_id" class="select2 form-control mt-15">
                            <option value="">Search Vendor</option>
                            @foreach($vendor as $vendor1)
                            <option value="{{$vendor1->id}}">{{$vendor1->first_name}} {{$vendor1->last_name}} - {{$vendor1->email}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                      <button id="search" type="button" class="btn btn-primary">Search</button>
                      <br>
                      <button onclick="PrintReport()" id="print" type="button" class="btn btn-primary">Print</button>
                      <br>
                      <button type="submit" class="btn btn-primary">Excel</button>
                    </div>
                </div>
                </form>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                  <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Vendor</th>
                          <th>Product</th>
                          <th>Total Orders</th>
                          <th>Qty</th>
                          <th>Price</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Vendor</th>
                          <th>Product</th>
                          <th>Total Orders</th>
                          <th>Qty</th>
                          <th>Price</th>
                          <th>Total</th>                        
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
@endsection
@section('extra-js')
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>

<script>
$('.product-report').addClass('active');

var orderPageTable = $('#datatable').DataTable({
  "processing": true,
  "serverSide": true,
  //"pageLength": 50,
  "ajax":{
      "url": "/admin/get-product-report",
      "dataType": "json",
      "type": "POST",
      // "data":{ _token: "{{csrf_token()}}"}
      "data": function (d) {
        d.from_date = $("#from_date").val();
        d.to_date = $("#to_date").val();
        d.vendor_id = $("#vendor_id").val();
        d._token = '{{csrf_token()}}';
      },
  },
  "columns": [
    { data: 'DT_RowIndex', name: 'DT_RowIndex'},
    { data: 'vendor', type: 'vendor'},
    { data: 'product', name: 'product'},
    { data: 'total_orders', type: 'total_orders'},
    { data: 'qty', name: 'qty' },
    { data: 'price', name: 'price' },
    { data: 'total', name: 'total' },
  ]
});

$('#search').click(function(){
    var new_url = '/admin/get-product-report';
    orderPageTable.ajax.url(new_url).load(null, false);
    //orderPageTable.draw();
});


function PrintReport(){
    spinner_body.show();
    var formData = new FormData($('#search_form')[0]);
    $.ajax({
        url : '/admin/print-product-report',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
            spinner_body.hide();
            var mywindow = window.open('', 'BIlling Application', 'height=600,width=900');
            var is_chrome = Boolean(mywindow.chrome);
            mywindow.document.write(data.html);
            mywindow.document.close(); 
            if (is_chrome) {
                setTimeout(function() {
                mywindow.focus(); 
                mywindow.print(); 
                mywindow.close();
                //location.reload();
                
                }, 250);
            } else {
                mywindow.focus(); 
                mywindow.print(); 
                mywindow.close();
                //location.reload();
            }
            //PrintDiv(data);
        }
    });
}

</script>
@endsection