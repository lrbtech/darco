@extends('website.layouts')
@section('extra-css')

@endsection
@section('content')

<div class="container mt-5 mb-5" id="Prof_lists">
	<div class="page-header">
	<div class="container d-flex flex-column align-items-center">
		<h2 class="mt-4">Design-Build Contractors & Firms Near Me</h2>
		<p>Don’t know how to begin?</p>
	</div>
</div>
<div class="card">
	<form>
		<div class="row">
			<div class="col-4 col-md-3 col-lg-2"><select class="form-control"><option>All Filter</option></select></div>
			<div class="col-4 col-md-3 col-lg-2"><select class="form-control"><option>Location</option></select></div>
			<div class="col-4 col-md-3 col-lg-2"><select  class="form-control"><option>Category</option></select></div>
			<div class="col-4 col-md-3 col-lg-2"><select  class="form-control"><option>Project Type</option></select></div>
			<div class="col-4 col-md-3 col-lg-2"><select  class="form-control"><option>Style</option></select></div>
			<div class="col-4 col-md-3 col-lg-2"><select  class="form-control"><option>Budget</option></select></div>
		</div>
	</form>
	<hr>
	@foreach($vendor as $row)
	<div class="row mt-2 mb-2">
		<div class="col-md-4"><a href="/professionals/overview/{{$row->id}}"><img src="/project_image/{{$row->profile_image}}" class="img-responsive"></a></div>
		<div class="col-md-8">
			<table border="0" width="100%" style="text-align: left;" cellpadding="10" cellspacing="10">
				<tbody>
					<tr>
						<td width="100"><a href="/professionals/overview/{{$row->id}}"><img src="/website_assets/images/logo.png"></a></td>
						<td class="starRating" colspan="2">
							<a href="/professionals/overview/{{$row->id}}"><h2>{{$row->business_name}}</h2></a>
							<span>4.9</span> <span class="fas fa-star checked"></span><span class="fas fa-star checked"></span><span class="fas fa-star checked"></span><span class="fas fa-star checked"></span><span class="fas fa-star-half-alt checked"></span>  <span class=""><a href="javascript:;">73 Reviews</a></span>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<em>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</em>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<table border="0" width="100%" class="contactDetail">
								<tr>
									<td>
										<span><i class="fas fa-phone-volume"></i>&nbsp; {{$row->mobile}}</span><br> 
										<span><i class="fas fa-map-marker-alt"></i> {{$row->address}}</span>
									</td>
									<td>
										<a href="/professionals/overview/{{$row->id}}" class="btn btn-success"> &nbsp; Send Message</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<hr>
	@endforeach
	<div class="row mt-2 mb-2">
		<div class="col-md-4"><a href="overview.php"><img src="/website_assets/images/bg3.jpg" class="img-responsive"></a></div>
		<div class="col-md-8">
			<table border="0" width="100%" style="text-align: left;" cellpadding="10" cellspacing="10">
				<tbody>
					<tr>
						<td width="100"><a href="overview.php"><img src="/website_assets/images/logo.png"></a></td>
						<td class="starRating" colspan="2">
							<a href="overview.php"><h2>RR Interior and Decors</h2></a>
							<span>4.9</span> <span class="fas fa-star checked"></span><span class="fas fa-star checked"></span><span class="fas fa-star checked"></span><span class="fas fa-star checked"></span><span class="fas fa-star-half-alt checked"></span>  <span class=""><a href="javascript:;">73 Reviews</a></span>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<em>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</em>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<table border="0" width="100%" class="contactDetail">
								<tr>
									<td><span><i class="fas fa-phone-volume"></i>&nbsp; +1 123 123 9745</span><br> <span><i class="fas fa-map-marker-alt"></i> 576 Wald Street, California, United States</span></td>
									<td><button class="btn btn-success"> &nbsp; Send Message</button></td>
								</tr>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<hr>
	<div class="row mt-2 mb-2">
		<div class="col-md-4"><a href="overview.php"><img src="/website_assets/images/d3.jpg" class="img-responsive"></a></div>
		<div class="col-md-8">
			<table border="0" width="100%" style="text-align: left;" cellpadding="10" cellspacing="10">
				<tbody>
					<tr>
						<td width="100"><a href="overview.php"><img src="/website_assets/images/logo.png"></a></td>
						<td class="starRating" colspan="2">
							<a href="overview.php"><h2>RR Interior and Decors</h2></a>
							<span>4.9</span> <span class="fas fa-star checked"></span><span class="fas fa-star checked"></span><span class="fas fa-star checked"></span><span class="fas fa-star checked"></span><span class="fas fa-star-half-alt checked"></span>  <span class=""><a href="javascript:;">73 Reviews</a></span>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<em>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</em>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<table border="0" width="100%" class="contactDetail">
								<tr>
									<td><span><i class="fas fa-phone-volume"></i>&nbsp; +1 123 123 9745</span><br> <span><i class="fas fa-map-marker-alt"></i> 576 Wald Street, California, United States</span></td>
									<td><button class="btn btn-success"> &nbsp; Send Message</button></td>
								</tr>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>
</div>



@endsection
@section('extra-js')
@endsection