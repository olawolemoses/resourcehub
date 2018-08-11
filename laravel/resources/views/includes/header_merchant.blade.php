<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
    
    <script src="/js/jquery.js" crossorigin="anonymous"></script>



    <title>Legal Concierge</title>
  </head>
  <body style="background: #f8f9fd;">


<i class="fa fa-bars selBar"></i>


<div class="container-fluid">
  <div class="row">
    
        
        <div class="col-md-2 sideBar">
              
              <div class="list-group menuBit">
                <a href="{{ route('merchant_index', ['user'=>auth()->user()]) }}" class="list-group-item list-group-item-action active"><i class="fa fa-dashboard"></i> Dashboard</a>
                <a href="{{ route('merchant_orders', ['user'=>auth()->user()]) }}" class="list-group-item list-group-item-action"><i class="fa fa-clipboard"></i> Orders</a>
                <a href="{{ route('merchant_services', ['user'=>auth()->user()]) }}" class="list-group-item list-group-item-action"><i class="fa fa-cloud-upload"></i> Services</a>
                <a href="{{ route('merchant_issues', ['user'=>auth()->user()]) }}" class="list-group-item list-group-item-action"><i class="fa fa-envelope"></i> Issues</a>
                <a href="{{ route('merchant_update', ['user'=>auth()->user()]) }}" class="list-group-item list-group-item-action"><i class="fa fa-cog"></i> Profile</a>
              </div>

        </div>




        <div class="col-md-10 offset-md-2">
            

                <nav class="navbar fixed-top navbar-expand-lg navbar-light mishnav" style="background: #f8f9fd;">
                    <div class="container mishcontain">
                      <!--<a class="navbar-brand" href="#">
                          <img src="img/logo.png" style="height: 100%;" class="d-inline-block align-top" alt="">
                      </a> -->


                        <form class="form-inline mr-auto my-2 my-lg-0">
            
                         </form>
            

                        <ul class="navbar-nav mt-2 mt-lg-0 nasty">
                         
                          <li class="nav-item mynav active">
                            <a class="nav-link" href="#"> <i class="fa fa-bell"></i> <span>Notifications</span></a>
                          </li>
                         

                          <li class="nav-item mynav dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i> <span>Hi 
                                @if(! is_null( auth()->user->merchant ) )
                                     {{ auth()->user->merchant->store_name }}
                                @else
                                    {{ auth()->user->customer->name() }}
                                @endif
                                </span>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                              </div>
                          </li>
                        </ul>
                     
                    
                      </div>
                    </nav>

      