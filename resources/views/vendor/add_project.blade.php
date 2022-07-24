@extends('vendor.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/tinymce/tinymce.min.css">

<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/wizard.css">

<style>
.app-content .wizard.wizard-notification > .steps > ul > li.current .step {
    border: 2px solid #40e7f8;
    color: #40e7f8;
    line-height: 36px;
}
.app-content .wizard.wizard-notification > .steps > ul > li.current .step:after {
    border-top-color: #40e7f8;
}
.app-content .wizard > .steps > ul > li.done .step {
    background-color: #40e7f8;
    border-color: #40e7f8;
    color: #fff;
}
.app-content .wizard.wizard-notification > .steps > ul > li:before, .app-content .wizard.wizard-notification > .steps > ul > li:after {
    top: 39px;
    width: 50%;
    height: 2px;
    background-color: #40e7f8;
}
.app-content .wizard.wizard-notification > .steps > ul > li.done .step:after {
    border-top-color: #40e7f8;
}
   .center {
    display:inline;
    margin: 3px;
    padding:5px;
   }
  .form-input {
    width:150px;
    /* padding:3px; */
    background:#fff;
    /* border:2px dashed dodgerblue; */
  }
  .form-input input {
    display:none;
  }
  .form-input label {
    display:block;
    width:150px;
    height: auto;
    max-height: 150px;
    background:#666;
    border-radius:10px;
    cursor:pointer;
  }
  
  .form-input img {
    width:150px;
    height: 150px;
    margin: 2px;
    opacity: .4;
  }
  .imgRemove{
    position: relative;
    bottom: 154px;
    left: 80%;
    background-color: transparent;
    border: none;
    font-size: 50px;
    outline: none;
  }
  .imgRemove::after{
    /* content: ' \21BA'; */
    content: ' \00d7';
    color: #fff;
    font-weight: 900;
    border-radius: 8px;
    cursor: pointer;
  }
</style>
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Master</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/vendor/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item active">Add Project</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
          <section id="validation">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Create New Project</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
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
                  <div class="card-body">
                    <form id="form" method="POST" action="#" class="steps-validation wizard-notification">
                    {{csrf_field()}}
                      <!-- Step 1 -->
                      <h6>Basic Details</h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="project_name">
                                Project Name : <span class="danger">*</span>
                              </label>
                              <input type="text" class="form-control required" id="project_name" name="project_name">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="category">Category</label>
                                  <select onchange="changecategory()" id="category" name="category" class="form-control">
                                    <option value="">SELECT</option>
                                    @foreach($category as $row)
                                    <option value="{{$row->id}}">{{$row->category}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="subcategory">Sub Category</label>
                                  <select id="subcategory" name="subcategory" class="form-control">
                                    <option value="">SELECT</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="description">Project Description</label>
                                <textarea name="description" id="description" rows="8" class="tinymce"></textarea>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div id="image_view" class="row">
                              <div value="1" class="center form-input panel_image">
                                <label for="file-ip-1">
                                <img id="file-ip-1-preview" src="/upload_files/preview.png">
                                <!-- <button type="button" class="imgRemove" onclick="myImgRemove(1)"></button> -->
                                </label>
                                <input type="file" name="image" id="file-ip-1" accept=".png,.jpg,.jpeg" onchange="showPreview(event, 1);">
                              </div>
                              <div class="work center form-input">
                                <div class="img" style="height:150px !important;background-color:#091a3a !important;">
                                    <a onclick="AddImages()" class="create-story" href="javascript:void(0)">
                                      <div class="fas fa-plus"></div>
                                      <h4 class="story-line">Add More Images</h4>
                                    </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            <center>
                                <button onclick="Save()" class="btn btn-primary" type="button">Save</button>
                            </center>
                            </div>
                        </div>
                       
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


          </div>
        </section>
        <!-- Basic Editor end -->

      </div>
    </div>
</div>
@endsection
@section('extra-js')
<script src="/app-assets/vendors/js/editors/tinymce/tinymce.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/editors/editor-tinymce.js" type="text/javascript"></script>

<script src="/app-assets/vendors/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
<script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js" type="text/javascript"></script>
<!-- <script src="/app-assets/js/scripts/forms/wizard-steps.js" type="text/javascript"></script> -->

<script>
// $('.product').addClass('active');

// $('#category').change(function(){
function changecategory(){
  var id = $('#category').val();
  // alert(id);
  $.ajax({
    url : '/get-professional-sub-category/'+id,
    type: "GET",
    success: function(data)
    {
      $('#subcategory').html(data);
    }
  });
}


function Save(){
    spinner_body.show();
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#form')[0]);
    var description = tinyMCE.get('description').getContent();
    formData.append('description', description);
    $.ajax({
        url : '/vendor/save-project',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            if(data.status == 0){
              Swal.fire({
                  title: data.message,
                  icon: "success",
               }).then(function() {
                  window.location = "/vendor/project";
                  spinner_body.hide();
               });
            }
            else if(data.status == 2){
               toastr.error(data.message);
               spinner_body.hide();
            }  
        },error: function (data) {
            spinner_body.hide();
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
              //  if(i == 'mobile'){
              //     $("#mobile_error").after('<p class="text-danger">'+obj[0]+'</p>');
              //     $('#mobile').closest('.form-group').addClass('has-error');
              //  }
              //  else{
                  toastr.error(obj[0]);
                  $("#"+i).after('<p class="text-danger">'+obj[0]+'</p>');
                  $('#'+i).closest('.form-group').addClass('has-error');
                //}
            });
         }
    });
}



function showPreview(event, number){
   if(event.target.files.length > 0){
      let src = URL.createObjectURL(event.target.files[0]);
      let preview = document.getElementById("file-ip-"+number+"-preview");
      preview.src = src;
      preview.style.display = "block";
   } 
}
// function myImgRemove(number) {
//    document.getElementById("file-ip-"+number+"-preview").src = "/upload_files/preview.png";
//    document.getElementById("file-ip-"+number).value = null;
// }
function AddImages() {
var tableLength = $("#image_view .panel_image").length;
var count;
if(tableLength > 0) {		
   count = $("#image_view .panel_image:last").attr('value');
   count = Number(count) + 1;
} else {
   count = 1;
}
var tr =
'<div value="'+count+'" id="imagerows'+count+'" class="center form-input panel_image">'+
   '<label for="file-ip-'+count+'">'+
   '<img id="file-ip-'+count+'-preview" src="/upload_files/preview.png">'+
   '<button type="button" class="imgRemove" onclick="removeImageRows('+count+')"></button>'+
   '</label>'+
   '<input type="file" name="images[]" id="file-ip-'+count+'" accept=".png,.jpg,.jpeg" onchange="showPreview(event, '+count+');">'+
'</div>';
if(tableLength > 0) {	
   $("#image_view .panel_image:last").after(tr);
} else {	
   $("#image_view .panel_image").append(tr);
}	 
} // /add row
function removeImageRows(row)
{
   if(confirm('Are you sure delete this row?'))
   {
      $("#imagerows"+row).remove();
   }
}

</script>
@endsection