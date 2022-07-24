@extends('website.layouts1')
@section('extra-css')
@endsection
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Customer <span></span> My Orders
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
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
                                        <h3 class="mb-0">Your Orders</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Product</th>
                                                        <th>Status</th>
                                                        <th>Total(KWD)</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($orders as $row)
                                                    <tr>
                                                        <td>#{{$row->id}}</td>
                                                        <td>{{$row->date}}</td>
                                                        <td>
                                                          <a href="/product-details/{{$row->id}}">{{$row->product_name}}</a><br>
                                                        </td>
                                                        <td>
                                                        @if($row->shipping_status == 0)
                                                        Order Confirmed 
                                                        @elseif($row->shipping_status == 1)
                                                        Order Processing
                                                        @elseif($row->shipping_status == 2)
                                                        Order Dispatched
                                                        @elseif($row->shipping_status == 3)
                                                        Delivered
                                                        @endif
                                                        </td>
                                                        <td>{{$row->total}}</td>
                                                        <td>
                                                          @if($row->shipping_status == 3)
                                                          <a href="/customer/track-order/{{$row->id}}" class="btn-small d-block">Track Order</a>
                                                          @endif
                                                          <br>
                                                          <a target="_blank" href="/print-invoice/{{$row->id}}" class="btn-small d-block">View</a>
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
$('.orders').addClass('active');

</script>
@endsection
