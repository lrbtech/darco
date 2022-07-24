@extends('vendor.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" href="/assets/css/font-awesome/css/font-awesome.min.css">
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,700');

#wrapper {
  padding-top: 30px;
  padding-right: 100px;
  padding-left: 100px;
}

h1,
h2,
h3 {
  font-family: 'Montserrat', sans-serif;
  font-weight: 300;
}

.main {
  width: 60%;
  float: left;
  margin-left: 100px;
  margin-top: 50px;
}

.left {
  position: relative;
  margin-top: 30px;
}

.right {
  width: 25%;
  float: right;
  background: #fff;
  padding: 30px;
  height: 70vh;
  min-height: 500px;
  position: relative;
  border-radius: 8px;
  margin-top: 50px;
  margin-bottom: 10vh;
}

.right:after,
.left:after {
  content: "";
  display: table;
  clear: both;
}

h1 {
  font-size: 50px;
  font-weight: 300;
  margin-bottom: 30px;
}

.input-wrap {
  position: relative;
}

.input-wrap i {
  position: absolute;
  right: 40px;
  background: #fff;
  top: 50%;
  transform: translateY(-50%);
  color: #333;
}

#searchbar {
  display: block;
  background: #fff;
  border-radius: 8px;
  width: 100%;
  padding: 20px 40px;
  font-family: 'Montserrat', sans-serif;
  font-size: 18px;
  color: #333;
}

#searchbar::-webkit-input-placeholder {
  color: #b9b9b9;
}

#searchbar::-moz-placeholder {
  color: #b9b9b9;
}

#searchbar:-ms-input-placeholder {
  color: #b9b9b9;
}

#searchbar:-moz-placeholder {
  color: #b9b9b9;
}

.item {
  cursor: -webkit-grab;
  margin-right: 10px;
  margin-bottom: 20px;
  padding: 0 0 20px 20px;
  display: block;
  border-bottom: 1px solid #ccc;
  background: rgba(255, 255, 255, 0.3);
  position: relative;
  transition: 0.3s width ease-out, 0.3s height ease-out;
}

.item i {
  margin-right: 10px;
}

.item i,
.item p {
  display: inline-block;
  vertical-align: middle;
}

.item p {
  line-height: 1.2;
  word-break: break-all;
  width: calc(100% - 50px);
}

.is-dropped {
  transform: scale(0);
  transition: 0.2s all ease-out;
}

.folder {
  float: left;
  width: 150px;
  height: 150px;
  background: rgba(0, 0, 0, 0.0);
  margin-right: 10px;
  position: relative;
  transition: 0.2s background-color ease-out;
  text-align: center;
}

.folder i.fa-folder {
  height: 90px;
  width: 100%;
  line-height: 100px;
  margin: 10px auto;
  font-size: 90px;
  transition: 0.2s all ease-out;
}

.folder i.fa-check {
  color: #fff;
  background: rgba(0, 0, 0, 0.1);
  border-radius: 50%;
  width: 60px;
  height: 60px;
  text-align: center;
  line-height: 60px;
  position: absolute;
  left: 0;
  right: 0;
  top: 34px;
  margin: auto;
  pointer-events: none;
  transform: scale(0);
  opacity: 0;
  font-size: 24px;
}

.folder.item-dropped i.fa-check {
  animation: animateValidation 1s linear;
}

@keyframes animateValidation {
  0% {
    transform: scale(1.5);
    opacity: 0;
  }
  40%,
  80% {
    transform: scale(1);
    opacity: 1;
  }
  100% {
    transform: scale(0);
    opacity: 0;
  }
}

.folder p {
  font-weight: 300;
  cursor: default;
  opacity: 0.5;
  transition: 0.2s all ease-out;
}

.folder:hover .fa-folder {
  transform: scale(1.1) !important;
}
.folder:hover p {
  transform: translateY(6px);
  opacity: 1;
}

i.fa-folder,
 .fa-folder {
  color: #eeca4e;
}


.tooltiper {
  position: relative;
  z-index: 3;
}

.tooltiper .tooltip {
  min-width: 110px;
  position: absolute;
  font-size: 0.7rem;
  text-align: left;
  background: rgba(0, 0, 0, 0.7);
  color: white;
  padding: 5px 10px;
  border-radius: 5px;
  display: block;
  top: 50%;
  left: 120px;
  transform: translateY(-50%) scale(0);
  line-height: 1.4em;
  opacity: 0;
  transform-origin: left;
  transition: transform 0.2s ease-out, opacity 0.1s ease-out 0.1s;
}

.tooltiper-up .tooltip {
  min-width: 0;
  position: absolute;
  font-size: 0.7rem;
  text-align: center;
  background: rgba(0, 0, 0, 0.7);
  color: white;
  padding: 5px 10px;
  border-radius: 5px;
  display: inline-block;
  top: -20px;
  left: 50%;
  transform: translate(-50%, -50%) scale(0);
  line-height: 1.4em;
  opacity: 0;
  transform-origin: bottom;
}

.tooltiper:hover .tooltip {
  opacity: 1;
  transform: translateY(-50%) scale(1);
  transition: transform 0.2s ease-out, opacity 0.1s ease-out;
}

.tooltiper-up:hover .tooltip {
  opacity: 1;
  transform: translate(-50%, -50%) scale(1);
  transition: transform 0.2s ease-out, opacity 0.1s ease-out;
}

.tooltiper .tooltip:after {
  right: 100%;
  top: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}

.tooltiper .tooltip:after {
  border-color: transparent;
  border-right-color: rgba(0, 0, 0, 0.7);
  border-width: 4px;
  margin-top: -4px;
}

.tooltiper-up .tooltip:after {
  border-width: 7px 7px 0 7px;
  border-color: rgba(0, 0, 0, 0.7) transparent transparent transparent;
  right: 0;
  left: 0;
  margin: 0 auto;
  top: 100%;
}

.folder-content {
  display: none;
  position: absolute;
  height: 420px;
  width: 1012px;
  background: rgba(255, 255, 255, 0.9);
  z-index: 10;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  left: 150px;
  top: 315px;
  border-radius: 8px;
  padding: 30px;
}

.folder-content h2 {
  font-size: 21px;
  padding-bottom: 10px;
  margin-bottom: 30px;
  border-bottom: 1px solid #ccc;
  cursor: default;
}

.folder-content h2 i {
  margin-right: 10px;
}

.easeout2 {
  transition: 0.2s all ease-out;
}

.folder-content.closed {
  transform: scale(0.8);
  opacity: 0;
}

.close-folder-content {
  position: absolute;
  right: 20px;
  top: 20px;
  background: #f3f3f3;
  padding: 5px 10px;
  border-radius: 5px;
}

.close-folder-content,
.close-folder-content i {
  transition: 0.16s all ease-out;
}

.close-folder-content:hover {
  background: #f95536;
}

.close-folder-content:hover i {
  color: #fff;
}

.folder-content .file {
  float: left;
  margin-right: 20px;
  bottom: 20px;
  text-align: center;
  padding: 20px;
}

.folder-content p {
  font-size: 14px;
}

.folder-content .file i {
  font-size: 36px;
  margin-bottom: 15px;
}

#myForm #result {
  background-color: #999;
  padding: 10px;
  border-radius: 10px;
  color: #222;
  margin-right: 30px;
  margin-left: 30px;
  border: 2px solid #000;
  display: none
}
</style>
@endsection
@section('content')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Idea Book</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/vendor/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Idea Book</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <a href="/vendor/add-idea-book" class="float-md-right btn btn-danger round btn-glow px-2" type="button">Add New Idea Book</a>
      
        </div>
      </div>
      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="wrapper">
  

          <h1>My Ideas Book</h1>
    
          @foreach($idea_book as $key => $row)
            <a href="/vendor/edit-idea-book/{{$row->id}}">
            <div class="top-droppable folder tooltiper tooltiper-up" data-tooltip="0 file">
              <i class="fa fa-folder" aria-hidden="true"></i>
              <i class="fa fa-check" aria-hidden="true"></i>
              <p>{{$row->title}}</p>
            </div>
            </a>
          @endforeach
    

 
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

toolTiper();
function toolTiper() {
  $(".tooltiper").each(function() {
    var eLcontent = $(this).attr("data-tooltip"),
      eLtop = $(this).position().top,
      eLleft = $(this).position().left;
    $(this).append('<span class="tooltip">' + eLcontent + "</span>");
  });
}

</script>
@endsection