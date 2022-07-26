@extends('admin.layouts')
@section('extra-css')

@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">

        <!-- eCommerce statistic -->
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info">{{$total_customer}}</h3>
                      <h6>Total Customer</h6>
                    </div>
                    <div>
                      <i class="icon-basket-loaded info font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="warning">{{$total_vendor}}</h3>
                      <h6>Total Vendor</h6>
                    </div>
                    <div>
                      <i class="icon-pie-chart warning font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%"
                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="success">{{$total_order}}</h3>
                      <h6>Total Order</h6>
                    </div>
                    <div>
                      <i class="icon-user-follow success font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">{{$total_order_value}}</h3>
                      <h6>Total Order Value</h6>
                    </div>
                    <div>
                      <i class="icon-heart danger font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%"
                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ eCommerce statistic -->


        <!-- Recent Transactions -->
        <div class="row">
          <div id="recent-transactions" class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Recent Transactions</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right"
                      href="#" target="_blank">Order Summary</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div class="table-responsive">
                  <table id="recent-orders" class="table table-hover table-xl mb-0">
                    <thead>
                      <tr>
                        <th class="border-top-0">Order ID</th>
                        <th class="border-top-0">Date</th>
                        <th class="border-top-0">Customer</th>
                        <th class="border-top-0">Vendor </th>
                        <th class="border-top-0">Shipping</th>
                        <th class="border-top-0">Status</th>
                        <th class="border-top-0">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $row)
                      <tr>
                        <td class="text-truncate"><a href="#">#{{$row->id}}</a></td>
                        <td class="text-truncate"><a href="#">{{$row->date}}</a></td>
                        <td class="text-truncate">
                          <span>{{\App\Http\Controllers\PageController::viewcustomername($row->customer_id)}}</</span>
                        </td>
                        <td class="text-truncate">
                          <span>{{\App\Http\Controllers\PageController::viewvendorname($row->vendor_id)}}</</span>
                        </td>
                        <td class="text-truncate">KWD {{$row->shipping_charge}}</td>
                        <td class="text-truncate">
                          <span>@if($row->shipping_status == 0)
                          Order Confirmed 
                          @elseif($row->shipping_status == 1)
                          Order Processing
                          @elseif($row->shipping_status == 2)
                          Order Dispatched
                          @elseif($row->shipping_status == 3)
                          Delivered
                          @endif</span>
                        </td>
                        <td class="text-truncate">KWD {{$row->total}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Recent Transactions -->


      </div>
    </div>
</div>

@endsection
@section('extra-js')
<script>
$('.dashboard').addClass('active');
</script>
@endsection

