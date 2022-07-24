@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Reviews</h3>
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
            <button id="add_new" class="float-md-right btn btn-danger round btn-glow px-2" type="button">Add New</button>
          <!-- <div class="dropdown float-md-right">
            <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton"
            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
            <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton"><a class="dropdown-item" href="#"><i class="la la-calendar-check-o"></i> Calender</a>
              <a class="dropdown-item" href="#"><i class="la la-cart-plus"></i> Cart</a>
              <a class="dropdown-item" href="#"><i class="la la-life-ring"></i> Support</a>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="la la-cog"></i> Settings</a>
            </div>
          </div> -->
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
                            <th>Invoice ID</th>
                            <th>Vendor Name</th>
                            <th>Customer Name</th>
                            <th>Comments</th>
                            <th>Reviews</th>
                            <th>Date & Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($reviews as $key => $row)
                        <tr>
                            <td>#{{$row->invoice_id}}</td>
                            <td>
                            @foreach($vendor as $row)
                            @if($row->id == $row->vendor_id)
                                @if($row->business_name != '')
                                {{$row->business_name}}
                                @else
                                {{$row->name}}
                                @endif
                            @endif
                            @endforeach
                            </td>
                            <td>
                            @foreach($customer as $cus)
                            @if($cus->id == $row->customer_id)
                            {{$cus->name}}
                            @endif
                            @endforeach
                            </td>
                            <td>{{$row->comments}}</td>
                            <td>
                            @if($row->reviews == '1')
                                <div class="mb-1 font-small-2">
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bx-star text-muted"></i>
                                <i class="cursor-pointer bx bx-star text-muted"></i>
                                <i class="cursor-pointer bx bx-star text-muted"></i>
                                <i class="cursor-pointer bx bx-star text-muted"></i>
                                </div>
                            @elseif($row->reviews == '2')
                                <div class="mb-1 font-small-2">
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bx-star text-muted"></i>
                                <i class="cursor-pointer bx bx-star text-muted"></i>
                                <i class="cursor-pointer bx bx-star text-muted"></i>
                                </div>
                            @elseif($row->reviews == '3')
                                <div class="mb-1 font-small-2">
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bx-star text-muted"></i>
                                <i class="cursor-pointer bx bx-star text-muted"></i>
                                </div>
                            @elseif($row->reviews == '4')
                                <div class="mb-1 font-small-2">
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bx-star text-muted"></i>
                                </div>
                            @elseif($row->reviews == '5')
                                <div class="mb-1 font-small-2">
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                <i class="cursor-pointer bx bxs-star text-warning"></i>
                                </div>
                            @endif
                            </td>
                            <td>{{$row->created_at}}</td>
                            <td>
                            @if($row->status == 0)
                            Waiting
                            @elseif($row->status == 1)
                            Approved
                            @elseif($row->status == 2)
                            Denied
                            @endif
                            </td>
                            <td>
                                <div class="btn-group mr-1 mb-1">
                                    <button type="button" class="btn btn-danger btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                                    <div class="dropdown-menu open-left arrow" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <button onclick="Edit({{$row->id}})"class="dropdown-item" type="button">Edit</button>
                                        <div class="dropdown-divider"></div>
                                        @if($row->status == 0)
                                        <button onclick="Delete({{$row->id}},1)"class="dropdown-item" type="button">DeActive</button>
                                        @else 
                                        <button onclick="Delete({{$row->id}},0)"class="dropdown-item" type="button">Active</button>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>Invoice ID</th>
                            <th>Vendor Name</th>
                            <th>Customer Name</th>
                            <th>Comments</th>
                            <th>Reviews</th>
                            <th>Date & Time</th>
                            <th>Status</th>
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

@endsection
@section('extra-js')
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>

<script>
$('.reviews').addClass('active');

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