@extends('website.layouts')
@section('extra-css')
<link rel="stylesheet" href="/assets/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/theme/light.css">
<style>


</style>
@endsection
@section('content')
<main class="translate main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Customer <span></span> My Orders
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
<div class="invoice-inner">
    <div class="invoice-info" id="invoice_wrapper">
        <div class="invoice-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="invoice-numb">
                        <h4 class="invoice-header-1 mb-10 mt-20">Order ID: <span class="text-brand">#{{$orders->id}}</span></h4>
                        <h6 class="">Date: {{$orders->date}}</h6>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="invoice-name text-end">
                        <div class="logo">
                            <a href="/"><img src="/website_assets/images/logo-light.png" /></a>
                            <!-- <p class="text-sm text-mutted">205 North Michigan Avenue, Suite 810 <br> Chicago, 60601, USA</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="invoice-top">
            <div class="row">
                <div class="col-lg-9 col-md-6">
                    <div class="invoice-number">
                        <h4 class="invoice-title-1 mb-10">Order To</h4>
                        <p class="invoice-addr-1">
                            <strong>{{$vendor->business_name}}</strong> 
                            <br />
                            {{$vendor->email}} 
                            <br />
                            {{$vendor->mobile}}, 
                            <br />
                            {{$vendor->address}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- <div class="invoice-number">
                        <h4 class="invoice-title-1 mb-10">Bill To</h4>
                        <p class="invoice-addr-1">
                            <strong>{{$billing_address->contact_person}}</strong> <br />
                            {{$customer->email}}<br />
                            {{$billing_address->contact_mobile}}, <br />
                            {{$billing_address->address_line1}} , {{$billing_address->address_line2}}
                        </p>
                    </div> -->
                </div>
            </div>
            <!-- <div class="row mt-2">
                <div class="col-lg-9 col-md-6">
                    <h4 class="invoice-title-1 mb-10">Due Date:</h4>
                    <p class="invoice-from-1">30 November 2022</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="invoice-title-1 mb-10">Payment Method</h4>
                    <p class="invoice-from-1">Via Paypal</p>
                </div>
            </div> -->
        </div>
        <div class="invoice-center">
            <div class="table-responsive">
                <table class="table table-striped invoice-table">
                    <thead class="bg-active">
                        <tr>
                            <th style="width:40%;">Item Item</th>
                            <th style="width:20%;" class="text-center">Unit Price</th>
                            <th style="width:10%;" class="text-center">Quantity</th>
                            <th style="width:20%;" class="text-right">Amount</th>
                            <th style="width:10%;" class="text-right"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($order_items as $row)
                        <tr>
                            <td>
                                <div class="item-desc-1">
                                    <span>{{$row->product_name}}</span>
                                    <small><?php echo $row->product_attributes; ?></small>
                                </div>
                            </td>
                            <td class="text-center">KWD {{$row->price}}</td>
                            <td class="text-center">{{$row->qty}}</td>
                            <td class="text-right">KWD {{$row->total}}</td>
                            <td>
                            @if($row->return_policy == 0)
                            @if($row->is_return == 0)
                                @if(strtotime(date('Y-m-d')) <= strtotime($row->return_date))
                                @if($orders->shipping_status == 3)
                                    <a onclick="ReurnPopup({{$row->id}})" href="javascript:void(0)" class="btn btn-lg btn-custom btn-print hover-up"> Return Item </a>
                                @endif
                                @endif
                            @else 
                                Product Return
                            @endif
                            @endif
                            </td>
                        </tr>
                    @endforeach
                        <tr>
                            <td colspan="3" class="text-end f-w-600">SubTotal</td>
                            <td class="text-right">KWD {{$orders->sub_total}}</td>
                            <td></td>
                        </tr>
                        @if($orders->discount_value > 0)
                        <tr>
                            <td colspan="3" class="text-end f-w-600">Discount({{$orders->coupon_code}})</td>
                            <td class="text-right">KWD {{$orders->discount_value}}</td>
                            <td></td>
                        </tr>
                        @endif
                        <!-- <tr>
                            <td colspan="3" class="text-end f-w-600">Tax( {{$orders->tax_percentage}}% )</td>
                            <td class="text-right">KWD {{$orders->tax_amount}}</td>
                            <td></td>
                        </tr> -->
                        @if($orders->shipping_charge > 0)
                        <tr>
                            <td colspan="3" class="text-end f-w-600">Shipping</td>
                            <td class="text-right">KWD {{$orders->shipping_charge}}</td>
                            <td></td>
                        </tr>
                        @endif
                        <tr>
                            <td colspan="3" class="text-end f-w-600">Grand Total</td>
                            <td class="text-right f-w-600">KWD {{$orders->total}}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="invoice-bottom">
            <div class="row">
                <div class="col-sm-6">
                    <!-- <div>
                        <h3 class="invoice-title-1">Important Note</h3>
                        <ul class="important-notes-list-1">
                            <li>All amounts shown on this invoice are in US dollars</li>
                            <li>finance charge of 1.5% will be made on unpaid balances after 30 days.</li>
                            <li>Once order done, money can't refund</li>
                            <li>Delivery might delay due to some external dependency</li>
                        </ul>
                    </div> -->
                </div>
                <div class="col-sm-6 col-offsite">
                    <div class="text-end">
                        <p class="mb-0 text-13">Thank you for your business</p>
                        <p><strong>{{$vendor->business_name}}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="invoice-btn-section clearfix d-print-none">
        @if($orders->shipping_status != 3)
        <a onclick="OrderCancel({{$orders->id}})" href="javascript:void(0)" class="btn btn-lg btn-custom btn-print hover-up"> 
        <!-- <img src="/frontend/assets/imgs/theme/icons/icon-print.svg" alt="" />  -->
        Order Cancel </a>
        @endif
        <a target="_blank" href="/print-invoice/{{$orders->id}}" class="btn btn-lg btn-custom btn-print hover-up"> <img src="/frontend/assets/imgs/theme/icons/icon-print.svg" alt="" /> Print </a>
        <a download href="/print-invoice/{{$orders->id}}" class="btn btn-lg btn-custom btn-download hover-up"> <img src="/frontend/assets/imgs/theme/icons/icon-download.svg" alt="" /> Download </a>
    </div>
</div>    


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<div class="modal fade" id="popup_modal"  tabindex="-1" role="dialog" aria-labelledby="popup_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Return Item</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> -->
            </div>
            <div class="modal-body">
                <form id="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="item_id" id="item_id">

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label>Return Reason</label>
                        <select id="return_reason" name="return_reason">
                            <option value="">SELECT REASON</option>
                            @foreach($return_reason as $row)
                            <option>{{$row->return_reason}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Image</label>
                        <input type="file" id="image" name="image">
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Description</label>
                        <textarea id="description" name="description"></textarea>
                        <textarea style="display:none;" id="return_pickup_description" name="return_pickup_description">return make it as 14 days</textarea>
                    </div>
                </div>

                </form>
            </div>
            <div class="modal-footer">
                <button onclick="ClosePopup()" class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button onclick="ReturnItem()" class="btn btn-primary" type="button">Return Item</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra-js')
<script type="text/javascript">
$('.orders').addClass('active');

function ReurnPopup(id){
  $('#popup_modal').modal('show');
  $("#form")[0].reset();
  $('#item_id').val(id);
  $(".text-danger").remove();
  $('.form-group').removeClass('has-error').removeClass('has-success');
}


function ClosePopup(){
    $('#popup_modal').modal('hide');
    $("#form")[0].reset();
}

function ReturnItem(){
    spinner_body.show();
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#form')[0]);
    $.ajax({
      url : '/customer/save-return-item',
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data)
      {   
        spinner_body.hide();             
        $("#form")[0].reset();
        $('#popup_modal').modal('hide');
        location.reload();
        toastr.success(data, 'Successfully Return');
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

function OrderCancel(id){
    Swal.fire({
    title: 'Are you sure?',
    icon: "success",
    showDenyButton: true,
    // showCancelButton: true,
    denyButtonText: 'No',
    confirmButtonText: 'Yes',
    customClass: {
        // confirmButton: 'btn-radius btn-ok',
        // denyButton: 'btn-radius btn-cancel',
    }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url : '/customer/order-cancel/'+id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    toastr.success(data, 'Successfully Canceled');
                    window.location.assign('/customer/orders');
                }
            });
        } 
        else if (result.isDenied) {
            Swal.fire({
                text: 'Request Canceled',
                icon: "info",
                customClass: {
                //   confirmButton: 'btn-radius btn-ok',
                }
            });
        }
    })
}

</script>
@endsection
