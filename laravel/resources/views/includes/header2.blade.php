<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
    <script src="/js/jquery.js" crossorigin="anonymous"></script>
    <srcipt src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle/3.0.3/jquery.cycle.all.js"></srcipt>
    
    <title>Legal Concierge</title>
  </head>
  <body>
    <!-- login modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body loginSplash">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <button type="button" onclick="location.href='/redirect/linkedin';" class="btn btn-info btn-block btn-lg" style="color: #fff;width: 100%;font-size: 15px;">LOGIN WITH LINKEDIN</button>

              <button type="button" onclick="location.href='/redirect/google';" class="btn btn-danger btn-block btn-lg" style="color: #fff;width: 100%;margin-bottom: 20px;font-size: 15px;">LOGIN WITH GOOGLE</button>


              <div class="alert alert-danger" role="alert">
                This is a danger alert—check it out!
              </div>

              <div class="form-group">
                <label for="email-address" class="col-form-label">Email Address</label>
                <input type="email" class="form-control" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="email-address">
                @if ($errors->has('username'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('username') }}</strong></span>
                @endif
              </div>
              <div class="form-group">
                <label for="pass-text" class="col-form-label">Password</label>
                <input name="password" type="password" class="form-control" id="pass-text">
                @if ($errors->has('password'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('username') }}</strong></span>
                @endif
              </div>

              <button type="submit" class="btn btn-warning btn-block" style="color: #fff;font-weight: bold;margin-bottom: 15px;">LOGIN</button>
            </form>

            @if(Auth::check())
            <p class="text-center forgotten"><a href="{{ route('password.email') }}">I forgot my password</a></p>
            @else
            <p class="text-center">Dont have an account? <a href="{{ route('register') }}">Register</a></p>
            @endif
          </div>





          <div class="modal-body resetSplash">
        <form method="POST" action="{{ route('register') }}">
            @if ( $errors->count() > 0 )
              <div class="alert alert-danger">
                  @foreach( $errors->all() as $error )
                      <li>{{ $error }}</li>
                  @endforeach
              </div>
            @endif
            @csrf
            
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
            <form>
              <button onclick="location.href='/redirect/linkedin';" type="button" class="btn btn-info btn-block btn-lg" style="color: #fff;width: 100%;font-size: 15px;">LOGIN WITH LINKEDIN</button>

              <button type="button" class="btn btn-primary btn-block btn-lg" style="color: #fff;width: 100%;font-size: 15px;">LOGIN WITH FACEBOOK</button>
              
              <button onclick="location.href='/redirect/google';" type="button" class="btn btn-danger btn-block btn-lg" style="color: #fff;width: 100%;margin-bottom: 20px;font-size: 15px;">LOGIN WITH GOOGLE</button>


              <div class="form-group">
                <label for="firstname" class="col-form-label">Firstname</label>
                <input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" id="firstname">
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
                <label for="email-address" class="col-form-label">Email Address</label>
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
            <img src="/img/logo.png" style="height: 100%;" class="d-inline-block align-top" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          
          <form class="form-inline mr-auto my-2 my-lg-0">
            
          </form>


          <ul class="navbar-nav mt-2 mt-lg-0">
            <li class="nav-item mynav active">
              <a class="nav-link" href="#">How it works</a>
            </li>

          @if(! Auth::check())   
            <li class="nav-item mynav active">
              <a class="nav-link" href="JavaScript:;" data-toggle="modal" data-target="#loginModal"> Login</a>
            </li>
            <li class="nav-item mynav">
               <button type="button" data-toggle="modal" data-target="#signupModal" class="btn btn-warning">REGISTER</button>
            </li>
        @else
            <li class="nav-item mynav dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Hi {{ Auth::user()->customer->name() }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                  <a class="dropdown-item" href="{{ route('customer.show', ['user' => Auth::user()->id ]) }}">Profile</a>
                  <a class="dropdown-item" href="{{ route('customer.show.orders', ['user' => Auth::user()->id ]) }}">Orders</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
          @endif
          </ul>
        </div>
      
        </div>
      </nav>
