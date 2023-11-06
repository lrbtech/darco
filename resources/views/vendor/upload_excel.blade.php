@extends('vendor.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Upload Excel</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/vendor/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Upload Excel Only Product</a>
                 </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                <form id="search_form" action="/vendor/import-excel" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            Upload Validation Error<br><br>
                            <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif

                        @if($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif                        
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><a download href="/excel/upload_product_excel.xlsx">Sample Excel Download Here</a> (Please select Category / sub category / Child Category before uploading excel)</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="category">Category</label>
                            <select required onchange="changecategory()" id="category" name="category" class="form-control">
                            <option value="">SELECT</option>
                            @foreach($category as $row)
                            <option value="{{$row->id}}">{{$row->category}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="subcategory">Sub Category</label>
                            <select onchange="changesubcategory()" id="subcategory" name="subcategory" class="form-control">
                            <option value="">SELECT</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="subsubcategory">Child Category</label>
                            <select id="subsubcategory" name="subsubcategory" class="form-control">
                            <option value="">SELECT</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="subsubcategory">Upload Excel</label>
                            <input type="file" id="excel_file" name="excel_file" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <br>
                      <button type="submit" class="btn btn-primary">Upload Excel</button>
                    </div>
                </div>
                </form>
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
$('.upload-excel').addClass('active');

function changecategory(){
  var id = $('#category').val();
  // alert(id);
  $.ajax({
    url : '/get-sub-category/'+id,
    type: "GET",
    success: function(data)
    {
      $('#subcategory').html(data);
    }
  });
}

function changesubcategory(){
  var id = $('#subcategory').val();
  $.ajax({
    url : '/get-sub-category/'+id,
    type: "GET",
    success: function(data)
    {
      $('#subsubcategory').html(data);
    }
  });
}

</script>
@endsection