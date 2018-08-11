<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <script type="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"></script>
    <script src="../js/jquery.js" crossorigin="anonymous"></script>

    <title>Legal Concierge</title>
  </head>
  <body style="background: #f8f9fd;">


<i class="fa fa-bars selBar"></i>

<div class="container-fluid">
  <div class="row">
        <div class="col-md-2 sideBar">
            
              <div class="list-group menuBit">
                <a href="/admin-dashboard" class="list-group-item list-group-item-action active"><i class="fa fa-dashboard"></i>Dashboard</a>
                <a href="/services" class="list-group-item list-group-item-action"><i class="fa fa-wrench"></i>Service Mgt.</a>
                <a href="/users" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> User mgt</a>
                <a href="/ads" class="list-group-item list-group-item-action"><i class="fa fab fa-buysellads"></i>Ads Mgt.</a>
                <!-- <a href="/test" class="list-group-item list-group-item-action"><i class="fa fab fa-buysellads"></i>Ads Mgt.</a>-->
                <a href="/serviceorders" class="list-group-item list-group-item-action"><i class="fa fa-shopping-cart"></i>Service Orders</a>
                <!--<a href="#" class="list-group-item list-group-item-action"><i class="material-icons">work</i> Withdrawals</a>-->
                <a href="/categories" class="list-group-item list-group-item-action"><i class="fa fa-tag"></i>Category Mgt.</a>
              <!--  <a href="/admindocuments" class="list-group-item list-group-item-action"><i class="fa fa-file"></i>Document Mgt.</a>-->
                <a href="/account-settings/{{Auth::user()->id}}" class="list-group-item list-group-item-action"><i class="fa fa-cog"></i> Account Settings</a>
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
                            <a class="nav-link" href="#"><i class="fa fa-envelope"></i> <span>Messages</span></a>
                          </li>
                          <li class="nav-item mynav active">
                            <a class="nav-link" href="#"> <i class="fa fa-bell"></i> <span>Notifications</span></a>
                          </li>
                         
                          <li class="nav-item mynav dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i> <span>Hi
                                {{Auth::user()->firstname}}
                                </span>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="/admin-logout">Logout</a>
                                <a class="dropdown-item" href="/account-settings/{{Auth::user()->id}}">Profile</a>
                               
                          </li>
                        </ul>
                    
                      </div>
                    </nav>

      