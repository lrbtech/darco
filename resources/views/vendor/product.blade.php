@extends('vendor.layouts')
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
                <li class="breadcrumb-item"><a href="/vendor/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">All Product</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <a href="/vendor/add-product" class="float-md-right btn btn-danger round btn-glow px-2">Add New</a>
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
                  <h4 class="card-title">All product</h4>
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
                            <th style="width:400px;">Product Name</th>
                            <th>Sales Price</th>
                            <th>Stock</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
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
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Sales Price</th>
                            <th>Stock</th>
                            <th>Image</th>
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
                <form id="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id">

                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-form-label">Product Name</label>
                        <input autocomplete="off" type="text" id="product_name" name="product_name" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-form-label">Category</label>
                        <select id="category" name="category" class="form-control">
                          <option value="">SELECT</option>
                          @foreach($category as $row)
                          <option value="{{$row->id}}">{{$row->category}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-form-label">Sub Category</label>
                        <select id="subcategory" name="subcategory" class="form-control">
                          <option value="">SELECT</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-form-label">Sub Sub Category</label>
                        <select id="subsubcategory" name="subsubcategory" class="form-control">
                          <option value="">SELECT</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-form-label">Mrp Price</label>
                        <input autocomplete="off" type="number" id="mrp_price" name="mrp_price" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-form-label">Sales Price</label>
                        <input autocomplete="off" type="number" id="sales_price" name="sales_price" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-form-label">Stock</label>
                        <input autocomplete="off" type="number" id="stock" name="stock" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-form-label">Size/Weight</label>
                        <input autocomplete="off" type="text" id="size_weight" name="size_weight" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-form-label">Materials</label>
                        <input autocomplete="off" type="text" id="materials" name="materials" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-form-label">Style</label>
                        <input autocomplete="off" type="text" id="style" name="style" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-form-label">Image</label>
                        <input autocomplete="off" type="file" id="image" name="image" class="form-control">
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-form-label">Description</label>
                        <textarea id="description" name="description" class="form-control"></textarea>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label class="col-form-label">Banner Image</label>
                    <input autocomplete="off" type="file" id="banner_image" name="banner_image" class="form-control">
                </div> -->

                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button onclick="Save()" class="btn btn-primary" type="button">Save</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('extra-js')
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>


<script>
$('.product').addClass('active');

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
      url : '/vendor/save-product',
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
      url : '/vendor/update-product',
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
  window.location.href="/vendor/edit-product/"+id;
}
function Delete(id,status){
    var r = confirm("Are you sure");
    if (r == true) {
      spinner_body.show();   
      $.ajax({
        url : '/vendor/delete-product/'+id+'/'+status,
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