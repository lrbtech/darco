@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Product Reviews</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">All Reviews</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
        </div>
      </div>
      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">All Reviews</h4>
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
                          <th>Vendor Name</th>
                          <th>Customer Name</th>
                          <th>Product Name</th>
                          <th>Comments</th>
                          <th>Ratting</th>
                          <th>Date & Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($product_reviews as $key => $row)
                        <tr>
                            <td>#{{$key + 1}}</td>
                            <td>
                            {{\App\Http\Controllers\PageController::viewvendorname($row->vendor_id)}}
                            </td>
                            <td>
                            {{\App\Http\Controllers\PageController::viewcustomername($row->customer_id)}}
                            </td>
                            <td>
                            {{\App\Http\Controllers\PageController::viewproductname($row->product_id)}}
                            </td>
                            <td>{{$row->message}}</td>
                            <td>
                            @if($row->rating == '1')
                            <div>
                              <img src="/app-assets/images/raty/star-on.png">&nbsp;
                              <img src="/app-assets/images/raty/star-off.png">&nbsp;
                              <img src="/app-assets/images/raty/star-off.png">&nbsp;
                              <img src="/app-assets/images/raty/star-off.png">&nbsp;
                              <img src="/app-assets/images/raty/star-off.png">
                            </div>
                            @elseif($row->rating == '2')
                            <div>
                              <img src="/app-assets/images/raty/star-on.png">&nbsp;
                              <img src="/app-assets/images/raty/star-on.png">&nbsp;
                              <img src="/app-assets/images/raty/star-off.png">&nbsp;
                              <img src="/app-assets/images/raty/star-off.png">&nbsp;
                              <img src="/app-assets/images/raty/star-off.png">
                            </div>
                            @elseif($row->rating == '3')
                            <div>
                              <img src="/app-assets/images/raty/star-on.png">&nbsp;
                              <img src="/app-assets/images/raty/star-on.png">&nbsp;
                              <img src="/app-assets/images/raty/star-on.png">&nbsp;
                              <img src="/app-assets/images/raty/star-off.png">&nbsp;
                              <img src="/app-assets/images/raty/star-off.png">
                            </div>
                            @elseif($row->rating == '4')
                            <div>
                              <img src="/app-assets/images/raty/star-on.png">&nbsp;
                              <img src="/app-assets/images/raty/star-on.png">&nbsp;
                              <img src="/app-assets/images/raty/star-on.png">&nbsp;
                              <img src="/app-assets/images/raty/star-on.png">&nbsp;
                              <img src="/app-assets/images/raty/star-off.png">
                            </div>
                            @elseif($row->rating == '5')
                            <div>
                              <img src="/app-assets/images/raty/star-on.png">&nbsp;
                              <img src="/app-assets/images/raty/star-on.png">&nbsp;
                              <img src="/app-assets/images/raty/star-on.png">&nbsp;
                              <img src="/app-assets/images/raty/star-on.png">&nbsp;
                              <img src="/app-assets/images/raty/star-on.png">
                            </div>
                            @endif
                            </td>
                            <td>{{$row->created_at}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Vendor Name</th>
                          <th>Customer Name</th>
                          <th>Product Name</th>
                          <th>Comments</th>
                          <th>Ratting</th>
                          <th>Date & Time</th>
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
$('.product-reviews').addClass('active');

function ChangeStatus(id,status){
    var r = confirm("Are you sure");
    if (r == true) {
      spinner_body.show();   
      $.ajax({
        url : '/admin/reviews-status/'+id+'/'+status,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          spinner_body.hide();   
          toastr.success(data, 'Status Changed Successfully');
          location.reload();
        }
      });
    } 
}
</script>
@endsection