<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Login your account</title>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/website_assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous" />
        <link rel="stylesheet" href="/website_assets/css/all.css" />
        <link rel="stylesheet" href="/website_assets/css/style.css" />
        <link rel="stylesheet" href="/website_assets/css/responsive.css" />
    </head>
    <body id="login">
        <div class="d-lg-flex half">
            <div class="bg order-1 order-md-1" style="background-image: url(website_assets/images/login-bg-01.jpg);"></div>
            <div class="contents order-2 order-md-2">
                <div class="container" id="loginForm">
                    <div class="row align-items-center justify-content-center">
                      <div class="col-md-3">
                        <div class="social-login">
                            <a href="/home" class="btn facebook"> <i class="fab fa-home"></i> Back to Home Page</a><br>
                            <a href="#" class="btn facebook"> <i class="fab fa-facebook-f"></i> Login by Facebook </a><br>
                            <a href="#" class="btn twitter"> <i class="fab fa-twitter"></i>  Login by Twitter</a><br>
                            <a href="#" class="btn googleplus"> <i class="fab fa-google-plus-g"></i> Login by Google+</a>
                             <a href="/vendor/login" class="btn facebook"> <i class="fab fa-home"></i> Vendor Login</a><br>
                        </div>
                      </div>
                      <div class="col-md-1"><div class="vl"></div></div>
                        <div class="col-md-6">
                          
                            <div class="mb-4">
                                <h3>Sign In</h3>
                                <p class="mb-4">Please sign in your details to know your expectation...</p>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                                <div class="form-group first">
                                    <label for="email">Email ID</label>
                                    <input style="color:#000;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input style="color:#000;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-flex mb-5 align-items-center">
                                    <label>
                                        <input name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}  type="checkbox">Remember me
                                    </label>
                                    <span class="ml-auto">
                                        <a href="#" class="forgot-pass" id="forgot-pass">Forgot Password ?</a>
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                            </form>
                            <div class="text-center mt-5"><h5>Don't have an account yet? <a href="javascript:;" data-toggle="modal" data-target="#enteringViewpoint">Join Now</a></h5></div>
                        </div>
                    </div>
                </div>
                <div class="container" id="forget" style="display:none">
                    <div class="row align-items-center justify-content-center">
                      <div class="col-md-1"><div class="vl"></div></div>
                        <div class="col-md-7">
                          <a href="javascript:;" id="backtoLogin">Remember your password? Back to Login</a><br><br>
                            <div class="mb-4">
                                <h3>Forget Your Password?</h3>
                                <p class="mb-4">Enter your email address and we'll send you a link to reset your password.</p>
                            </div>
                            <form action="#" method="post">
                                <div class="form-group first">
                                    <label for="username">Email address</label>
                                    <input type="text" class="form-control" id="emailId" required />
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- Modal enteringViewpoint -->
<div class="modal fade" id="enteringViewpoint" tabindex="-1" role="dialog" aria-labelledby="enteringViewpointLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Choose who you are?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <a href="/individual-register" class="style3" id="view1">
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
            <a href="/professional-register" class="style3" id="view2">
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
<script src="/website_assets/js/jquery.slim.min.js"></script>
<script src="/website_assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("#forgot-pass").click(function () {
        $('#loginForm').hide();
        $('#forget').show();
    })
    $("#backtoLogin").click(function () {
        $('#loginForm').show();
        $('#forget').hide();
    })
})
</script>
</body>
</html>