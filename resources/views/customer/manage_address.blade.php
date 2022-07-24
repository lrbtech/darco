@extends('website.layouts1')
@section('extra-css')
@endsection
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Customer <span></span> My Address
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
                                        <h3 class="mb-0">Manage Address</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Address Type</th>
                                                        <th>Name</th>
                                                        <th>Mobile</th>
                                                        <th>Address</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($manage_address as $row)
                                                    <tr>
                                                        <td>
                                                        @if($row->address_type == 0)
                                                        Home 
                                                        @elseif($row->address_type == 1)
                                                        Office
                                                        @endif
                                                        </td>
                                                        <td>{{$row->contact_person}}</td>
                                                        <td>{{$row->mobile}}</td>
                                                        <td>{{$row->address_line1}} <br> {{$row->address_line2}}</td>
                                                        <td>
                                                        @if($row->is_active == 1)
                                                        Default 
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
$('.manage-address').addClass('active');

</script>
@endsection
