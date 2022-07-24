@extends('website.layouts')
@section('extra-css')

@endsection
@section('content')

<div class="container mt-5 mb-5" id="singleOverviewofProf">
	<div class="" style="background:beige">
	<div class="row">
		<div class="col-md-6">
	<div class="slideshow-container">
          <div class="mySlides fade">
            <!-- <div class="numbertext">1 / 3</div> -->
            <img src="/project_image/{{$vendor->profile_image}}" class="w3-animate-fading"  style="width:100%">
            <!-- <div class="text">Caption Text</div> -->
          </div>
		  @foreach($vendor_project as $row)
          <div class="mySlides fade"><img src="/project_image/{{$row->image}}" class="w3-animate-fading" style="width:100%"></div>
		  @endforeach
          <!-- <div class="mySlides fade"><img src="/website_assets/images/home/banner5.jpg" class="w3-animate-fading" style="width:100%"></div>
          <div class="mySlides fade"><img src="/website_assets/images/home/banner.jpg" class="w3-animate-fading" style="width:100%"></div> -->

        </div>
    </div>
    <div class="col-md-6 text-left"><br>
		<img src="/website_assets/images/logo.png" width="50px" title="Your Logo">
		
		<div class="company-name">
			<h1>{{$vendor->business_name}}</h1>
		<span class="f16 fwt-500"><i class="fas fa-phone-volume"></i>&nbsp;{{$vendor->mobile}}</span><br>
		<span class="f16 fwt-500"><i class="fas fa-envelope-open-text"></i>&nbsp; {{$vendor->email}}</span><br>
		<span class="f16 fwt-500"><i class="fas fa-globe"></i>&nbsp; {{$vendor->website}}</span><br>
		<span class="f16 fwt-500"><i class="fas fa-map-marker-alt"></i>&nbsp; {{$vendor->address}}</span><br>
		<div id="starRating" class="starRating">
			<span class="fas fa-star checked"></span>
			<span class="fas fa-star checked"></span>
			<span class="fas fa-star checked"></span>
			<span class="fas fa-star checked"></span>
			<span class="fas fa-star-half-alt checked"></span>
			<span>4.9</span> - <span class=""><a data-toggle="tab" href="#reviewtab" role="tab">73 Reviews</a></span>
		</div><br>
		

		<button class="btn btn-danger btn-sm"> <i class="far fa-bookmark"></i> &nbsp; Save for Later</button>
		</div>
    </div>
	</div>
</div>

<br>

<div class="row">
	<div class="col-sm-7 col-md-8">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="tab1" data-toggle="tab" href="#abouttab" role="tab">About Us</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="tab2" data-toggle="tab" href="#projtab" role="tab">Our Projects</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="tab3" data-toggle="tab" href="#reviewtab" role="tab">Reviews</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade  show active" id="abouttab" role="tabpanel">
  	<p><?php echo $vendor->about_us; ?></p>
  </div>
  <div class="tab-pane fade" id="projtab" role="tabpanel" >
  	<div class="row">
	  	@foreach($vendor_project as $row)
  		<div class="col-sm-4 col-6">
  			<div class="item">
  				<a href="/project_image/{{$row->image}}" data-lightbox="photos"><img class="img-fluid" src="/project_image/{{$row->image}}"></a>
  				<h4>{{$row->project_name}}</h4>
  			</div>
  		</div>
		@endforeach
  		<!-- <div class="col-sm-4 col-6">
  			<div class="item">
  				<a href="/website_assets/images/d1.jpg" data-lightbox="photos"><img class="img-fluid" src="/website_assets/images/d1.jpg"></a>
  				<h4>Project 2</h4>
  			</div>
  		</div>
  		<div class="col-sm-4 col-6">
  			<div class="item">
  				<a href="/website_assets/images/d1.jpg" data-lightbox="photos"><img class="img-fluid" src="/website_assets/images/d1.jpg"></a>
  				<h4>Project 3</h4>
  			</div>
  		</div>
  		<div class="col-sm-4 col-6">
  			<div class="item">
  				<a href="/website_assets/images/d1.jpg" data-lightbox="photos"><img class="img-fluid" src="/website_assets/images/d1.jpg"></a>
  				<h4>Project 4</h4>
  			</div>
  		</div>
  		<div class="col-sm-4 col-6">
  			<div class="item">
  				<a href="/website_assets/images/d1.jpg" data-lightbox="photos"><img class="img-fluid" src="/website_assets/images/d1.jpg"></a>
  				<h4>Project 5</h4>
  			</div>
  		</div>
  		<div class="col-sm-4 col-6">
  			<div class="item">
  				<a href="/website_assets/images/d1.jpg" data-lightbox="photos"><img class="img-fluid" src="/website_assets/images/d1.jpg"></a>
  				<h4>Project 6</h4>
  			</div>
  		</div> -->
  	</div>
  </div>
  <div class="tab-pane fade" id="reviewtab" role="tabpanel">
  		
	<div class="container1">
		<div class="col-md-12" id="fbcomment">
			<div class="header_comment">
				<div class="row">
					<div class="col-md-6 text-left">
					  <span class="count_comment">75 Comments</span>
					</div>
					<div class="col-md-6 text-right">
					  <span class="sort_title">Sort by</span>
					  <select class="sort_by" class="form-control">
						<option>Top</option>
						<option>Newest</option>
						<option>Oldest</option>
					  </select>
					</div>
				</div>
			</div>

			<div class="body_comment mt-4">
				<div class="row">
					<div class="avatar_comment col-md-1">
					  <img src="/website_assets/images/commentBox-image.jpg" alt="avatar"/>
					</div>
					<div class="box_comment col-md-11">
					  <textarea class="form-control" placeholder="Add a comment..."></textarea>
					  <div class="box_post mt-3">
						<div class="text-right">
						  <button onclick="submit_comment()" class="btn btn-primary" type="button" value="1">Post your review</button>
						</div>
					  </div>
					</div>
				</div>
				<hr>
				<div class="row">
					<ul id="list_comment" class="col-md-12">
						<!-- Start List Comment 1 -->
						<li class="box_result row">
							<div class="avatar_comment col-md-1">
								<img src="/website_assets/images/commentBox-image.jpg" alt="avatar" width="50px" />
							</div>
							<div class="result_comment col-md-11">
								<h4>User 1</h4>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star-half-alt checked"></span>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
								<div class="tools_comment">
									<a class="like" href="#"><i class="far fa-thumbs-up"></i> Helpful</a>
									<span class="float-right">April 12, 2022</span>
								</div>
								<ul class="child_replay">
									<li class="box_reply row">
										<div class="avatar_comment col-md-1">
											<img src="/website_assets/images/commentBox-image.jpg" class="img-responsive" alt="avatar"/>
										</div>
										 <div class="result_comment col-md-11">
											<h4>RR Interior and Decors</h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
										</div>
									</li>
								</ul>
							</div>
						</li>
						<li><hr></li>
						<li class="box_result row">
							<div class="avatar_comment col-md-1">
								<img src="/website_assets/images/commentBox-image.jpg" alt="avatar"/>
							</div>
							<div class="result_comment col-md-11">
								<h4>User 1</h4>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star-half-alt checked"></span>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
								<div class="tools_comment">
									<a class="like" href="#"><i class="far fa-thumbs-up"></i> Helpful</a>
									<span class="float-right">March 01, 2022</span>
								</div>
								<ul class="child_replay">
									<li class="box_reply row">
										<div class="avatar_comment col-md-1">
											<img src="/website_assets/images/commentBox-image.jpg" class="img-responsive" alt="avatar"/>
										</div>
										 <div class="result_comment col-md-11">
											<h4>RR Interior and Decors</h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
										</div>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				
				</div>
			</div>
		</div>
	</div>

  </div>
</div>
</div>


<div class="col-sm-5 col-md-4">
	<div class="card2 text-left">
	<h2 class="f16">To Contact our professional. Please fill your details below.</h2><br>
	<form id="enquiry-form" action="#" method="post">
	{{csrf_field()}}
		<input value="{{$vendor->id}}" type="hidden" name="vendor_id" id="vendor_id">
		<div class="form-group">
			<input autocomplete="off" type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
		</div>
		<div class="form-group">
			<input autocomplete="off" type="email" name="email" id="email" class="form-control" placeholder="Enter your email address" required>
		</div>
		<div class="form-group">
			<input autocomplete="off" type="tel" name="mobile" id="mobile" class="form-control" placeholder="Enter your contact number" required>
		</div>
		<div class="form-group">
			<textarea autocomplete="off" name="comments" id="comments" class="form-control" placeholder="Enter your comments"></textarea>
		</div>
		<button onclick="Send()" type="button" class="btn btn-primary">Submit</button>
	</form>
</div>
	</div>

</div>
</div>



@endsection
@section('extra-js')
<script>
function Send(){
  spinner_body.show();
  $(".text-danger").remove();
  $('.form-group').removeClass('has-error').removeClass('has-success');
  var formData = new FormData($('#enquiry-form')[0]);
    $.ajax({
      url : '/send-vendor-enquiry',
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data)
      {   
        spinner_body.hide();             
        $("#enquiry-form")[0].reset();
        location.reload();
        toastr.success(data, 'Successfully Send');
      },error: function (data) {
        spinner_body.hide(); 
        var errorData = data.responseJSON.errors;
        $.each(errorData, function(i, obj) {
          $('#'+i).after('<p class="text-danger">'+obj[0]+'</p>');
          $('#'+i).closest('.form-group').addClass('has-error');
          toastr.error(obj[0]);
        });
      }
    });
}
</script>
@endsection