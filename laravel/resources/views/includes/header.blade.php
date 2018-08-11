<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet"> 
    
    <script src="/js/jquery.js" crossorigin="anonymous"></script>
    <script src="/js/jquery.cycle.js" crossorigin="anonymous"></script>
    <script src="/js/URI.min.js"></script>
    <srcipt src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle/3.0.3/jquery.cycle.all.js"></srcipt>
    
    <title>Legal Concierge</title>
  </head>
  <body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light mishnav">
      <div class="container">
        

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          
          <ul class="navbar-nav mr-auto my-2 my-lg-0">
            <li class="nav-item mynav" style="border-right: 1px solid #eee;">
              <a class="nav-link" href="contact">contact <img src="/img/nig.png" style="width:20px;margin-left: 3px;margin-right: 3px; " alt=""> </a>
            </li>
            <li class="nav-item mynav">
              <a class="nav-link" href="mailto:info@legalconcierge.com">info@legalconcierge.com</a>
            </li>
          </ul>

          <a class="navbar-brand" href="#" style="margin: auto 0;">
            
          </a>
          <ul class="navbar-nav mt-2 mt-lg-0">
                @if(!Auth::check())
                    <li class="nav-item mynav">
                      <a class="nav-link" href="{{ route('register') }}">new to legal concierge? <span> SIGN UP</span></a>
                    </li>
                    <li class="nav-item mynav">
                      <a class="nav-link" href="{{ route('login') }}">Existing member? <span> SIGN IN</span></a>
                    </li>
                @else
                
                <li class="nav-item mynav">
                     <a class="nav-link" href="/">Welcome, {{ auth()->user()->name() }}</a>
                </li>

                <li class="nav-item mynav">
                  <a class="nav-link" href="/dashboard"> <span>Dashboard</span></a>
                </li>
                
                <li class="nav-item mynav">
                  <a class="nav-link" href="/logout"> <span> Logout</span></a>
                </li>
                
                @endif
                
            <li class="nav-item mynav dropdown" style="border-right: 1px solid #eee;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">shopping_cart</i> &nbsp;
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <!--<a class="dropdown-item" href="Javascript:;">JYUD IYKE</a>
                  <a class="dropdown-item" href="settings">profile settings</a>
                  <a class="dropdown-item" href="Javascript:;" data-toggle="modal" data-target="#deleteModal">delete account</a>
                  <a class="dropdown-item" href="Javascript:;">logout</a> -->
                </div>
            </li>


            <li class="nav-item mynav dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">search</i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <input type="text" class="form-control search" placeholder="search">
                </div>
            </li>



          </ul>
        </div>
      
        </div>
      </nav>