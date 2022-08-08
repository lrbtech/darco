@extends('website.layouts')
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
                                        <h3 style="float:left;" class="mb-0">Manage Address</h3>
                                        <button style="float:right;" id="add_new" class="float-md-right btn btn-danger round btn-glow px-2" type="button">Add New</button>
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
                                                        Activated
                                                        @else 
                                                        <a href="#" onclick="Active({{$row->id}})">Is Default Address?</a> 
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

<div class="modal fade" id="popup_modal"  tabindex="-1" role="dialog" aria-labelledby="popup_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> -->
            </div>
            <div class="modal-body">
                <form id="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id">

                <div class="row">
                    <div class="form-group col-lg-6">
                        <label>Address Type <span class="asterisk">*</span></label>
                        <div class="custome-radio">
                            <input value="0" class="form-check-input" type="radio" name="address_type" id="address_type1"/>
                            <label class="form-check-label" for="address_type1" >Home (7am-9pm, all days)</label>
                        </div>
                        <div class="custome-radio">
                            <input value="1"  class="form-check-input" type="radio" name="address_type" id="address_type2" />
                            <label class="form-check-label" for="address_type2">Office (9am-6pm, Weekdays)</label>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                    <label>Contact Person <span class="asterisk">*</span></label>
                    <input type="text" id="contact_person" name="contact_person" placeholder="Contact Person *">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                    <label>Contact Mobile <span class="asterisk">*</span></label>
                    <input type="text" id="contact_mobile" name="contact_mobile" placeholder="Contact Mobile">
                    </div>
                    <div class="form-group col-lg-6">
                    <label>Landmark <span class="asterisk">*</span></label>
                    <input type="text" id="landmark" name="landmark" placeholder="Landmark">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                    <label>Street address <span class="asterisk">*</span></label>
                    <input type="text" id="address_line1" name="address_line1" placeholder="Door No., Street address">
                    <br>
                    <input type="text" id="address_line2" name="address_line2" placeholder="Apartment, suite (optional)">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                    <label>City <span class="asterisk">*</span></label>
                    <input type="text" id="city" name="city" placeholder="City">
                    </div>
                    <div class="form-group col-lg-6">
                    <label>Area <span class="asterisk">*</span></label>
                    <input type="text" id="area" name="area" placeholder="Area">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                    <label>Pincode <span class="asterisk">*</span></label>
                    <input type="text" id="pincode" name="pincode" placeholder="Pincode">
                    </div>
                </div>

                </form>
            </div>
            <div class="modal-footer">
                <button onclick="ClosePopup()" class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button onclick="Save()" class="btn btn-primary" type="button">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra-js')
<script type="text/javascript">
$('.manage-address').addClass('active');

var action_type;
$('#add_new').click(function(){
  $('#popup_modal').modal('show');
  $("#form")[0].reset();
  action_type = 1;
  $('#saveButton').text('Save');
  $('#modal-title').text('New Address');
  $(".text-danger").remove();
  $('.form-group').removeClass('has-error').removeClass('has-success');
});

function ClosePopup(){
    $('#popup_modal').modal('hide');
    $("#form")[0].reset();
}
function Save(){
  spinner_body.show();
  $(".text-danger").remove();
  $('.form-group').removeClass('has-error').removeClass('has-success');
  var formData = new FormData($('#form')[0]);
  if(action_type == 1){
    $.ajax({
      url : '/customer/save-address',
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
        toastr.success(data, 'Successfully Save');
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
  }else{
    $.ajax({
      url : '/customer/update-address',
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data)
      {
        spinner_body.hide();   
        console.log(data);
        $("#form")[0].reset();
        $('#popup_modal').modal('hide');
        location.reload();
        toastr.success(data, 'Successfully Update');
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
}
function Edit(id){
  spinner_body.show();   
  $.ajax({
    url : '/customer/edit-address/'+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      spinner_body.hide();   
      $('#modal-title').text('Update Address');
      $('#save').text('Save Change');
      $('input[name=username]').val(data.username);
      $('input[name=email]').val(data.email);
      $('input[name=id]').val(id);
      $('#popup_modal').modal('show');
      action_type = 2;
    }
  });
}
</script>
@endsection
