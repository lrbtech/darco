@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">idea-book</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">All idea-books</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <!-- <a href="/admin/add-idea-book" id="add_new" class="float-md-right btn btn-danger round btn-glow px-2" type="button">Add New</a> -->
        </div>
      </div>
      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <form action="/admin/search-idea-book" method="post" enctype="multipart/form-data">
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
                  <div class="card-body card-dashboard">
                    <table id="datatable" class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Vendor</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($idea_book as $key => $row)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>
                            {{\App\Http\Controllers\PageController::viewvendorname($row->vendor_id)}}
                            </td>
                            <td>{{$row->title}}</td>
                            <td>
                              <img style="height: 100px;" src="/project_image/{{$row->image}}">
                            </td>
                            <td>
                              @if($row->status == 0)
                              Waiting for Admin Approval
                              @elseif($row->status == 1)
                              Active
                              @elseif($row->status == 2)
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
                                        <button onclick="Delete({{$row->id}},1)"class="dropdown-item" type="button">Active</button>
                                        @elseif($row->status == 1)
                                        <button onclick="Delete({{$row->id}},2)"class="dropdown-item" type="button">DeActive</button>
                                        @else 
                                        <button onclick="Delete({{$row->id}},1)"class="dropdown-item" type="button">Active</button>
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
                            <th>Title</th>
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



@endsection
@section('extra-js')
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>


<script>
$('.idea-book').addClass('active');

function Edit(id){
  window.location.href="/admin/edit-idea-book/"+id;
}
function Delete(id,status){
    var r = confirm("Are you sure");
    if (r == true) {
      spinner_body.show();   
      $.ajax({
        url : '/admin/delete-idea-book/'+id+'/'+status,
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

</script>
@endsection