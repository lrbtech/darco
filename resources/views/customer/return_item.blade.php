@extends('website.layouts')
@section('extra-css')
<link rel="stylesheet" href="/assets/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/theme/light.css">


</style>
@endsection
@section('content')
<main class="translate main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Customer <span></span> Return Items
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
                                        <h3 class="mb-0">Your Items</h3>
                                    </div>
                                    <div class="card-body">
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Date</th>
                <th>Vendor</th>
                <th>Product</th>
                <th>Image</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
          @foreach($return_item as $row)
            <tr>
                <td>#{{$row->order_id}}</td>
                <td>{{$row->date}}</td>
                <td>
                {{\App\Http\Controllers\PageController::viewvendorname($row->vendor_id)}}</
                </td>
                <td>{{$row->product_name}}</td>
                <td><img style="width:200px;" src="/return_image/{{$row->image}}"></td>
                <td width="15%">
                @if($row->status == 0)
                Waiting for Pickup 
                @elseif($row->status == 1)
                Item Pickup
                @elseif($row->status == 2)
                Request Canceled
                @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
    </div>
</main>
@endsection
@section('extra-js')
<script type="text/javascript">
$('.return-item').addClass('active');

</script>
@endsection
