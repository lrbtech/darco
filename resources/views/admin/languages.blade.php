@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Languages</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">All Languages</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
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
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <form id="languagesTable">
                       {{ csrf_field() }}
                    </form>
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
<link rel="stylesheet" type="text/css" href="/language/pe7-icon.css">
<link rel="stylesheet" type="text/css" href="/language/_jsgrid-theme.scss">
<link rel="stylesheet" type="text/css" href="/language/jsgrid.css">
<script src="/language/jsgrid.min.js" type="text/javascript"></script>

<script type="text/javascript">
$('.languages').addClass('active');

    $("#languagesTable").jsGrid({
        width: "100%",
        filtering: true,
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 15,
        pageButtonCount: 5,
        deleteConfirm: "Do you really want to delete the data?",
        controller:{
          loadData:function(filter){
              return  $.ajax({
                  type:"GET",
                  url:"/admin/fetch_language",
                  data:filter
              });
          },
      insertItem: function(item){
       return $.ajax({
        type: "POST",
        url: "/admin/insert_language",
        data:{english:item.english,arabic:item.arabic,_token: "{{csrf_token()}}"}
       });
      },
       updateItem: function(item){
       return $.ajax({
        type: "POST",
        url: "/admin/update_language",
        data: {english:item.english,arabic:item.arabic,_token: "{{csrf_token()}}",id:item.id}
       });
      },
       deleteItem: function(item){
       return $.ajax({
        type: "POST",
        url: "/admin/delete_language",
        data: {_token: "{{csrf_token()}}",id:item.id}
       });
      },
        },
        fields: [
          {
            name:"id",
            type:"hidden",
            css:"hide"
          },
          { name: "index",  type: "readonly",width:10},
          { name: "english",title:"English Content", type: "text",validate:"required"},
          { name: "arabic",title:"Arabic Content", type: "text",validate:"required"},
          { type: "control" }
        ]
    });
</script>
@endsection