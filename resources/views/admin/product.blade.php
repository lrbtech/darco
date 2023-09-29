@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">product</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">All Product</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <!-- <a href="/admin/add-product" class="float-md-right btn btn-danger round btn-glow px-2">Add New</a> -->
        </div>
      </div>
      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <form action="/admin/search-product" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-sm-3">
                      <label class="col-form-label">Search Vendor</label>
                      <select id="vendor_id" name="vendor_id" class="select2 form-control mt-15">
                          <option value="">Search Vendor</option>
                          @foreach($vendor as $vendor1)
                          <option value="{{$vendor1->id}}">{{$vendor1->business_name}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <label class="col-form-label">Status</label>
                      <select id="status" name="status" class="select2 form-control mt-15">
                        <option value="">All Status</option>
                        <option value="0">New</option>
                        <option value="1">Active</option>
                        <option value="2">InActive</option>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <br><br>
                      <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                  </div>
                  </form>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard table-responsive">
                    <table id="datatable" class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Vendor</th>
                          <th>Product Name</th>
                          <th>Sales Price</th>
                          <th>Stock</th>
                          <th>Image</th>
                          <th>Qr Code</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($product as $key => $row)
                      <?php $url = asset('').'qrcode-add-to-card/'.$row->sku_value; ?>
                        <tr>
                          <td>{{$key + 1}}</td>
                          <td>
                          {{\App\Http\Controllers\PageController::viewvendorname($row->vendor_id)}}
                          </td>
                          <td>{{$row->product_name}}</td>
                          <td>{{$row->sales_price}}</td>
                          <td>{{$row->stock}}</td>
                          <td>
                            <img style="height: 100px;" src="/product_image/{{$row->image}}">
                          </td>
                          <td>
                            <div id="qr_image{{$row->id}}">
                            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($url, 'QRCODE')}}" alt="barcode"   />
                            <!-- {!! DNS2D::getBarcodeHTML("$url", 'QRCODE') !!} -->
                            </div>
                          </td>
                          <td>
                          @if($row->status == 0)
                          Waiting for Admin Approval
                          @elseif($row->status == 1)
                          Approved
                          @elseif($row->status == 2)
                          Rejected
                          @endif
                          </td>
                          <td>
                            <div class="btn-group mr-1 mb-1">
                              <button type="button" class="btn btn-danger btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                              <div class="dropdown-menu open-left arrow" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <button onclick="downloadqrcode({{$row->id}})" class="dropdown-item" type="button">Download Qrcode</button>
                                <button onclick="Edit({{$row->id}})" class="dropdown-item" type="button">Edit</button>
                                <div class="dropdown-divider"></div>
                                @if($row->status == 0)
                                <button onclick="Delete({{$row->id}},1)"class="dropdown-item" type="button">Approve</button>
                                @elseif($row->status == 1)
                                <button onclick="Delete({{$row->id}},2)"class="dropdown-item" type="button">Reject</button>
                                @else 
                                <button onclick="Delete({{$row->id}},1)"class="dropdown-item" type="button">Approve</button>
                                @endif
                              </div>
                            </div>
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
                          <th>Qr Code</th>
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

<div class="modal fade" id="popup_modal"  tabindex="-1" role="dialog" aria-labelledby="popup_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="stock_form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="product_id" id="product_id">

                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-form-label">Update Stock</label>
                        <input autocomplete="off" type="text" id="stock" name="stock" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button onclick="UpdateStock()" class="btn btn-primary" type="button">Update</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('extra-js')
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
<script type="text/javascript" src="/html2canvas/html2canvas.min.js"></script>
<script type="text/javascript" src="/html2canvas/html2canvas.esm.js"></script>
<script type="text/javascript" src="/html2canvas/html2canvas.js"></script>

<script>
$('.product').addClass('active');

function downloadqrcode(id){
  spinner_body.show();   
  html2canvas(document.getElementById("qr_image"+id)).then(function(canvas){
    downloadImage(canvas.toDataURL(),"qr_code_"+id+".png");
    spinner_body.hide();   
    // $('#image_profile').html('');
    // $('#image_profile').hide();
  });
}

function downloadImage(uri, filename){
  var link = document.createElement('a');
  if(typeof link.download !== 'string'){
    window.open(uri);
  }
  else{
    link.href = uri;
    link.download = filename;
    accountForFirefox(clickLink, link);
  }
}

function clickLink(link){
  link.click();
}

function accountForFirefox(click){
  var link = arguments[1];
  document.body.appendChild(link);
  click(link);
  document.body.removeChild(link);
}

var action_type;
$('#add_new').click(function(){
  $('#popup_modal').modal({
    backdrop: 'static',
    keyboard: false,
  });
  $("#form")[0].reset();
  action_type = 1;
  $('#saveButton').text('Save');
  $('#modal-title').text('Add product');
  $(".text-danger").remove();
  $('.form-group').removeClass('has-error').removeClass('has-success');
});

function Save(){
  spinner_body.show();
  $(".text-danger").remove();
  $('.form-group').removeClass('has-error').removeClass('has-success');
  var formData = new FormData($('#form')[0]);
  if(action_type == 1){
    $.ajax({
      url : '/admin/save-product',
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
      url : '/admin/update-product',
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
  window.location.href="/admin/edit-product/"+id;
}
function Delete(id,status){
    var r = confirm("Are you sure");
    if (r == true) {
      spinner_body.show();   
      $.ajax({
        url : '/admin/delete-product/'+id+'/'+status,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          spinner_body.hide();   
          toastr.success(data, 'Successfully Delete');
          location.reload();
        }
      });
    } 
}

$('#category').change(function(){
  var id = $('#category').val();
  $.ajax({
    url : '/get-sub-category/'+id,
    type: "GET",
    success: function(data)
    {
      $('#subcategory').html(data);
    }
  });
});

$('#subcategory').change(function(){
  var id = $('#subcategory').val();
  $.ajax({
    url : '/get-sub-category/'+id,
    type: "GET",
    success: function(data)
    {
      $('#subsubcategory').html(data);
    }
  });
});
</script>
@endsection