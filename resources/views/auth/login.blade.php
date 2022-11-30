@extends('website.layouts')
@section('extra-css')
<link rel="stylesheet" href="/website_assets/css/style.css">

@endsection
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Login
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <img class="border-radius-15" src="/assets/images/login.png" alt="" />
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content">
                                <div class="padding_eight_all ">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Login</h1>
                                        <p class="mb-30">Don't have an account? <a href="javascript:;" onclick="Signup()">Create here</a></p>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                        <div class="form-group">
                                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus placeholder="Email ID">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}  />
                                                    <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                                </div>
                                            </div>
                                            <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Log in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="signup_modal" tabindex="-1" role="dialog" aria-labelledby="signup_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Choose who you are?</h4>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <a href="/individual-register?email=" class="style3" id="view1">
              <div class="card">
                <div class="card-title"><h4>Individual</h4></div>
                <div class="card-desc text-center">
                  <span id="img-icon"></span><br> <br>
                  <p>I am a owner of the property, selling the lands, homes, appliances, like etc.,</p>
                <div class="text-left">  
                </div>
              </div>
              <button type="button" class="btn btn-dark btn-md">Join us</button>
            </div>
          </a>
          </div>
          <div class="col-sm-6">
            <a href="/professional-register?email=" class="style3" id="view2">
            <div class="card">
              <div class="card-title"><h4>Professional</h4></div>
              <div class="card-desc text-center">
                <span id="img-icon2"></span><br> <br>
                <p>We offer home improvement service or sell home products, lands.</p>
                <div class="text-left">
              </div>
              </div>
              <button type="button" class="btn btn-dark btn-md">Join us</button>
            </div>
          </a>
          </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>        
@endsection
@section('extra-js')
<script>
  function Signup(){
    $('#signup_modal').modal('show');
  }
</script>
@endsection