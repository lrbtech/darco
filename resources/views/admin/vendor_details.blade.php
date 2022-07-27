@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Customers</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Customer Details</a>
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
<section id="configuration">
    <div class="row">

        <div class="col-xl-12 col-lg-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{$vendor->first_name}} {{$vendor->last_ame}}</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                <!-- <p>Use <code>.nav-linetriangle</code> class for bottom triangle active type. </p> -->
                <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                    <li class="nav-item">
                    <a class="nav-link active" id="profile" data-toggle="tab" aria-controls="view_profile" href="#view_profile"
                        aria-expanded="true">View Profile</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="products" data-toggle="tab" aria-controls="product_details" href="#product_details"
                        aria-expanded="false">Products</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="orders" data-toggle="tab" aria-controls="order_details" href="#order_details"
                        aria-expanded="false">Orders</a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" id="couponn" data-toggle="tab" aria-controls="coupon_details" href="#coupon_details"
                        aria-expanded="false">Coupon Used</a>
                    </li> -->
                </ul>
                <div class="tab-content px-1 pt-1">

<div role="tabpanel" class="tab-pane active" id="view_profile" aria-expanded="true" aria-labelledby="profile">
    <div class="col-12">
        <table class="table table-borderless">
        <tbody>
            <tr>
            <td>Business Namee:</td>
            <td class="users-view-username">{{$vendor->business_name}}</td>
            </tr>
            <tr>
            <td>Name:</td>
            <td class="users-view-name">{{$vendor->first_name}} {{$vendor->last_ame}}</td>
            </tr>
            <tr>
            <td>E-mail:</td>
            <td class="users-view-email">{{$vendor->email}}</td>
            </tr>
            <tr>
            <td>Mobile:</td>
            <td class="users-view-email">{{$vendor->mobile}}</td>
            </tr>

        </tbody>
        </table>
        <h5 class="mb-1"><i class="ft-info"></i> Personal Info</h5>
        <table class="table table-borderless mb-0">
        <tbody>
            <tr>
            <td>Country:</td>
            <td>{{$vendor->kuwait}}</td>
            </tr>
            <tr>
            <td>City:</td>
            <td>{{\App\Http\Controllers\PageController::viewcityname($vendor->city)}}</td>
            </tr>
            <tr>
            <td>Area:</td>
            <td>{{\App\Http\Controllers\PageController::viewcityname($vendor->area)}}</td>
            </tr>
            <tr>
            <td>Address:</td>
            <td>{{$vendor->address}}</td>
            </tr>
        </tbody>
        </table>
    </div>

</div>
<div class="tab-pane" id="product_details" aria-labelledby="products">
    <div class="table-responsive">
        <table class="table zero-configuration">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Sales Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($product as $key => $row)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$row->product_name}}</td>
                <td>{{$row->sales_price}}</td>
                <td>{{$row->stock}}</td>
                <td>
                    <img style="height: 100px;" src="/product_image/{{$row->image}}">
                </td>
                <td>
                @if($row->status == 0)
                Active
                @else 
                DeActive
                @endif
                </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Sales Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Status</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="tab-pane" id="order_details" aria-labelledby="orders">
    <div class="table-responsive">
        <table class="table zero-configuration">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Sub Total</th>
                    <th>Shipping Charge</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach($orders as $row)
                <tr>
                    <td>#{{$row->id}}</td>
                    <td>{{\App\Http\Controllers\PageController::viewvendorname($row->vendor_id)}}</td>
                    <td>{{$row->sub_total}}</td>
                    <td>{{$row->shipping_charge}} KWD</td>
                    <td>{{$row->total}} KWD</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Sub Total</th>
                    <th>Shipping Charge</th>
                    <th>Total</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
{{-- <div class="tab-pane" id="coupon_details" aria-labelledby="couponn">
    <div class="table-responsive">
        <table class="table zero-configuration">
            <thead>
                <tr>
                    <th>Coupon Code</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Discount Type</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
            @foreach($coupon as $row)
            @if($row->user_type == '')
                <tr>
                <td>
                    @if(date('Y-m-d') > $row->end_date )
                    <span style="color:red">{{$row->coupon_code}}</span>
                    @else
                    <span style="color:green">{{$row->coupon_code}}</span>
                    @endif
                </td>
                <td>{{$row->start_date}}</td>
                <td>{{$row->end_date}}</td>
                <td>
                    @if($row->discount_type == '1')
                    Discount from product
                    @elseif($row->discount_type == '2')
                    Discount % from product
                    @elseif($row->discount_type == '3')
                    Discount from total cart
                    @else
                    Discount % from total cart
                    @endif
                </td>
                <td>{{$row->amount}}</td>
                </tr>
            @else 
            <?php 
                $arraydata=array();
                foreach(explode(',',$row->user_id) as $user1){
                $arraydata[]=$user1;
                }
            ?>
                @if(in_array($customer->id , $arraydata))
                <tr>
                <td>
                    @if(date('Y-m-d') > $row->end_date )
                    <span style="color:red">{{$row->coupon_code}}</span>
                    @else
                    <span style="color:green">{{$row->coupon_code}}</span>
                    @endif
                </td>
                <td>{{$row->start_date}}</td>
                <td>{{$row->end_date}}</td>
                <td>
                    @if($row->discount_type == '1')
                    Discount from product
                    @elseif($row->discount_type == '2')
                    Discount % from product
                    @elseif($row->discount_type == '3')
                    Discount from total cart
                    @else
                    Discount % from total cart
                    @endif
                </td>
                <td>{{$row->amount}}</td>
                </tr>
                @endif
            @endif
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Coupon Code</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Discount Type</th>
                    <th>Amount</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div> --}}


                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
        
      </div>
    </div>
  </div>
@endsection
@section('extra-js')
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>

<script>
$('.vendor').addClass('active');


</script>
@endsection