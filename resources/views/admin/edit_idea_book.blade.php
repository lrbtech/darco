@extends('admin.layouts')
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
    bottom: 166px;
    left: 80%;
    background-color: transparent;
    border: none;
    font-size: 30px;
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
  i.la.la-plus-circle {
    font-size: 63px;
    /* text-align: center; */
    padding: 36px;
    color: #fff;
}
.primary-img{
  color: #801580;
    font-size: 16px;
    text-align: center;
    font-weight: 600;
    font-family: sans-serif;
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
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item active">Edit Idea Book</li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <!-- <a onclick="Delete({{$idea_book->id}})" href="#" class="float-md-right btn btn-danger round btn-glow px-2" type="button">Delete Idea Book</a> -->
        </div>
      </div>
      <div class="content-body">
          <section id="validation">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Edit Idea Book</h4>
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
                    <input type="hidden" name="id" value="{{$idea_book->id}}">
                    <input type="hidden" name="vendor_id" value="{{$idea_book->vendor_id}}">
                      <!-- Step 1 -->
                      <h6>Basic Details</h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="title">
                                Title : <span class="danger">*</span>
                              </label>
                              <input value="{{$idea_book->title}}" type="text" class="form-control required" id="title" name="title">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="category">Category</label>
                                  <select onchange="changecategory()" id="category" name="category" class="form-control">
                                    <option value="">SELECT</option>
                                    @foreach($category as $category1)
                                    @if($category1->id == $idea_book->category)
                                    <option selected value="{{$category1->id}}" >{{$category1->category}}</option>
                                    @else
                                    <option value="{{$category1->id}}" >{{$category1->category}}</option>
                                    @endif
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
                              <label for="description">Description</label>
                                <textarea name="description" id="description" rows="8" class="tinymce"><?php echo $idea_book->description; ?></textarea>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div id="image_view" class="row">
                                <div value="1" class="center form-input panel_image">
                                  <label for="file-ip-1">
                                  <img id="file-ip-1-preview" src="/project_image/{{$idea_book->image}}">
                                  <!-- <button type="button" class="imgRemove" onclick="myImgRemove(1)"></button> -->
                                  </label>
                                  <input type="file" name="profile_image" id="file-ip-1" accept=".png,.jpg,.jpeg" onchange="showPreview(event, 1);">
                                  <p class="primary-img">Primary Image</p>
                                </div>
                                @foreach($idea_book_images as $key => $row)
                                <div value="{{$key+2}}" class="center form-input panel_image">
                                  <label for="file-ip-{{$key+2}}">
                                  <img id="file-ip-{{$key+2}}-preview" src="/project_image/{{$row->image}}">
                                  <button type="button" class="imgRemove" onclick="DeleteImage({{$row->id}})"></button>
                                  </label>
                                  <input type="hidden" name="image_id[]" value="{{$row->id}}">
                                  <input type="file" name="images[]" id="file-ip-{{$key+2}}" accept=".png,.jpg,.jpeg" onchange="showPreview(event, {{$key+2}});">
                                </div>
                                @endforeach
                                <div class="work center form-input">
                                  <div class="img" style="height:150px !important;background-color:#091a3a !important;">
                                      <a onclick="AddImages()" class="create-story" href="javascript:void(0)">
                                        <i class="la la-plus-circle"></i>
                                        <!-- <h4 class="story-line">Add More Images</h4> -->
                                      </a>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            <center>
                                <button onclick="Save()" class="btn btn-primary" type="button">Update</button>
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
// $('.idea-book').addClass('active');

getsubcategory();
function getsubcategory(){
  $.ajax({
      url : '/get-idea-book-sub-category/'+<?php echo $idea_book->category; ?>,
      type: "GET",
      success: function(data)
      {
        $('#subcategory').html(data);
        $('select[name=subcategory]').val(<?php echo $idea_book->subcategory; ?>);
      }
  });
}

function changecategory(){
  var id = $('#category').val();
  // alert(id);
  $.ajax({
    url : '/get-idea-book-sub-category/'+id,
    type: "GET",
    success: function(data)
    {
      $('#subcategory').html(data);
    }
  });
}


function Delete(id){
    var r = confirm("Are you sure Completely delete from our site");
    if (r == true) {
      $.ajax({
        url : '/admin/delete-idea-book/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success('Successfully Delete');
          window.location = "/admin/idea-book";
        }
      });
    } 
}

function DeleteImage(id){
    var r = confirm("Are you sure Completely delete from our site");
    if (r == true) {
      $.ajax({
        url : '/admin/delete-idea-book-image/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success('Successfully Delete');
          location.reload();
        }
      });
    } 
}

function Save(){
    spinner_body.show();
    $(".text-danger").remove();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    var formData = new FormData($('#form')[0]);
    var description = tinyMCE.get('description').getContent();
    formData.append('description', description);
    $.ajax({
        url : '/admin/update-idea-book',
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
                  window.location = "/admin/idea-book";
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
   '<input type="hidden" name="image_id[]">'+
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