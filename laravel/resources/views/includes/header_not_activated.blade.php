<!doctype html>
<html lang="en">
  <head>
      <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117121888-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117121888-1');
</script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
    
    <script src="/js/jquery.js" crossorigin="anonymous"></script>
    <script src="/js/jquery.cycle.js"></script>


    <title>Footprint</title>
  </head>
  <body>
      
      
    <!-- login modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body loginSplash">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <button type="button" onclick="location.href='/redirect/linkedin';"  class="btn btn-info btn-block btn-lg" style="color: #fff;width: 100%;font-size: 15px;"> <i class="fa fa-linkedin"></i> LOGIN WITH LINKEDIN</button>
              <button type="button" onclick="location.href='/redirect/google';"  class="btn btn-danger btn-block btn-lg" style="color: #fff;width: 100%;margin-bottom: 20px;font-size: 15px;"> <i class="fa fa-google"></i> LOGIN WITH GOOGLE</button>

              <div class="alert alert-danger" role="alert">
                This is a danger alert—check it out!
              </div>

              <div class="form-group">
                <label for="email-address" class="col-form-label">Email Address</label>
                <input type="email" name="username" class="form-control" id="email-address">
                @if ($errors->has('username'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('username') }}</strong></span>
                @endif
              </div>
              <div class="form-group">
                <label for="pass-text" class="col-form-label">Password</label>
                <input type="password" name="password" class="form-control" id="pass-text">
                 @if ($errors->has('password'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('username') }}</strong></span>
                @endif
              </div>
              <button type="submit" class="btn btn-warning btn-block" style="color: #fff;font-weight: bold;margin-bottom: 15px;">LOGIN</button>
            </form>

            @if(!Auth::check())
            <p class="text-center forgotten"><a href="Javascript:;">I forgot my password</a></p>
            <p class="text-center">Dont have an account? <a href="{{ route('register') }}">Register</a></p>
            <p class="text-center"><input type="checkbox" name="remember_me" id="pass-text" value="1" /> Remember Me</p>
            @endif
          </div>

          <div class="modal-body resetSplash">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                @if ( $errors->count() > 0 )
                    <div class="alert alert-danger">
                        @foreach( $errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
              <h6 class="text-center">
                 Enter yor account email to recieve a link allowing you to reset your password<br><br>
              </h6>

              <div class="alert alert-success" role="alert">
                This is a success alert—check it out!
              </div>
              <div class="alert alert-danger" role="alert">
                This is a danger alert—check it out!
              </div>


              <div class="form-group">
                <label for="email-address" class="col-form-label">Email Address</label>
                <input type="email" class="form-control" name="username" id="email-address">
              </div>

              <button type="submit" class="btn btn-warning btn-block" style="color: #fff;font-weight: bold;margin-bottom: 15px;">REQUEST RESET</button>
            </form>

            <p class="text-center logging"><a href="{{ route('login') }}">Go to login</a></p>
          </div>
          
        </div>
      </div>
    </div>

    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
              <button type="button" onclick="location.href='/redirect/linkedin';"  class="btn btn-info btn-block btn-lg" style="color: #fff;width: 100%;font-size: 15px;"> <i class="fa fa-linkedin"></i> REGISTER WITH LINKEDIN</button>
              <button type="button" onclick="location.href='/redirect/google';" class="btn btn-danger btn-block btn-lg" style="color: #fff;width: 100%;margin-bottom: 20px;font-size: 15px;"> <i class="fa fa-google"></i> REGISTER WITH GOOGLE</button>
              
              <div class="form-group">
                <label for="full-name" class="col-form-label">Firstname</label>
                <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname"  class="form-control" id="firstname">
                @if ($errors->has('firstname'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('firstname') }}</strong></span>
                @endif  
              </div>

              <div class="form-group">
                <label for="lastname" class="col-form-label">Lastname</label>
                <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" id="lastname">
                  @if ($errors->has('lastname'))
                      <span class="invalid-feedback"><strong>{{ $errors->first('lastname') }}</strong></span>
                  @endif   
              </div>
              <div class="form-group">
                <label for="email-address" class="col-form-label">Email</label>
                <input type="email" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="email-address">
                  @if ($errors->has('username'))
                      <span class="invalid-feedback"><strong>{{ $errors->first('username') }}</strong></span>
                  @endif  
              </div>

              <div class="form-group">
                <label for="pass-text" class="col-form-label">Password</label>
                <input name="password" type="password" class="form-control" id="pass-text">
                  @if ($errors->has('password'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                  @endif     
              </div>

              <div class="form-group">
                <label for="pass-text-r" class="col-form-label">Comfirm Password</label>
                <input name="password_confirmation" type="password" class="form-control" id="pass-text-r">
                  @if ($errors->has('password_confirmation'))
                      <span class="invalid-feedback"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                  @endif     
              </div>

              <button type="submit" class="btn btn-warning btn-block" style="color: #fff;font-weight: bold;margin-bottom: 15px;">REGISTER</button>
            </form>

            <p class="text-center">Already have an account? <a href="{{ route('login') }}">Login</a></p>
          </div>
          
        </div>
      </div>
    </div>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light mishnav">
      <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/img/logo.png" style="height: 30px;" class="d-inline-block align-top" alt="">
        </a>
        @if( $flash = session('status') )
        <div class="alert alert-success" style="display:block" role="alert">
          {{ $flash }}
        </div>
        @endif
      
        @if ( $errors->count() > 0 )
            <div class="alert alert-danger"  style="display:block" role="alert">
                @foreach( $errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif       

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          
         
              <form class="form-inline mr-auto my-2 my-lg-0" style="margin-top: 15px;">
              <div class="input-group mb-3 laga" style="display: none;margin-bottom: 0px;">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-append">
                  <button class="btn btn-warning" type="submit" style="color: #fff;">SEARCH</button>
                </div>
              </div>
          </form>
          


          <ul class="navbar-nav mt-2 mt-lg-0">
            <li class="nav-item mynav active">
              <a class="nav-link" href="{{ route('resource_list') }}">Legal Documents</a>
            </li>
          </ul>
        </div>
      
        </div>
      </nav>




<div class="modal fade col-md-6 offset-md-3" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete luxury lawyer’s account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         account icluding all your publicatons and statistics will be gone. they cannot be retrived. please 
click the cancel button to discard
      </div>
      <div class="modal-footer">
        <button type="button" class="btn closeDia" data-dismiss="modal">Cancel</button>
        <button type="button" data-toggle="modal" data-target="#deletedModal" data-dismiss="modal" class="btn actionDia">Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade col-md-6 offset-md-3" id="deletedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        You have successfully deleted luxury lawyer

        <i class="fa fa-trash text-center" style="font-size: 50px;width: 100%; margin-top: 40px;margin-bottom: 30px; color:#63438e;"></i>
      </div>
      
    </div>
  </div>
</div>




 <script>
    $(document).ready(function() {

        $(document).scroll(function() {
          var y = $(this).scrollTop();
          if (y > 400) {
            $('.laga').fadeIn();
          } else {
            $('.laga').fadeOut();
          }
        });

    });
 </script>