@extends('website.layouts')
@section('extra-css')
<style>
    @import url(https://fonts.googleapis.com/css?family=Raleway);

.main-title{
  color: #2d2d2d;
  text-align: center;
  text-transform: capitalize;
  padding: 0.7em 0;
}

.content {
    padding: 0rem 0;
}

.content {
  position: relative;
  width: 90%;
  max-width: 400px;
  margin: auto;
  overflow: hidden;
}

.content .content-overlay {
  background: rgba(0,0,0,0.7);
  position: absolute;
  height: 99%;
  width: 100%;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  opacity: 0;
  -webkit-transition: all 0.4s ease-in-out 0s;
  -moz-transition: all 0.4s ease-in-out 0s;
  transition: all 0.4s ease-in-out 0s;
}

.content:hover .content-overlay{
  opacity: 1;
}

.content-image{
  width: 100%;
}

.content-details {
  position: absolute;
  text-align: center;
  padding-left: 1em;
  padding-right: 1em;
  width: 100%;
  top: 50%;
  left: 50%;
  opacity: 0;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-transition: all 0.3s ease-in-out 0s;
  -moz-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
}

.content:hover .content-details{
  top: 50%;
  left: 50%;
  opacity: 1;
}

.content-details h3{
  color: #fff;
  font-weight: 500;
  letter-spacing: 0.15em;
  margin-bottom: 0.5em;
  text-transform: uppercase;
}

.content-details p{
  color: #fff;
  font-size: 0.8em;
}

.fadeIn-bottom{
  top: 80%;
}

.fadeIn-top{
  top: 20%;
}

.fadeIn-left{
  left: 20%;
}

.fadeIn-right{
  left: 80%;
}
</style>
@endsection
@section('content')

    
<div class="page-header">
    <div class="container d-flex flex-column align-items-center">
        <h2 class="mt-4">Category / {{$name->category}}</h2>
    </div>
</div>
    <div class="container mt-5 mb-5">
        <div class="row">
      
        @foreach($category as $row)
       <div class="col-md-4 pb-5">
            <div class="content">
                <a href="/product-list" target="_blank">
                <div class="content-overlay"></div>
                <img class="content-image" src="/upload_files/{{$row->image}}">
                <div class="content-details fadeIn-top">
                    <h3>{{$row->category}}</h3>
                    <p>Click Here</p>
                </div>
                </a>
            </div>
      </div>
        @endforeach

        </div>
    </div>




            



@endsection
@section('extra-js')
@endsection