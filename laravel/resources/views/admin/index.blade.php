<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    
    <title>Admin Login</title>
  </head>
  <body>


  <div class="container-fluid adminBack">
      <div class="back">
            
          <div class="container">
              <div class="row">
                  
                  
                  <!-- login part -->
                <div class="col-md-4 offset-md-4 panelLog loginSplash">
                   <div class="col-md-12 text-center logHead">
                        WELCOME ADMIN
                   </div>

                   <div class="col-md-12">
                       <!--<img src="img/adminlogin.png" class="mx-auto d-block loginPicAdmin" alt="">-->


                       <form method="POST" action="/admin" style="padding-left: 20px;padding-right: 20px;"  >

                               {{ csrf_field() }}
                               @if (count($errors))

                            <div class="form-group" >
                              <div class="alert alert-danger" style="display: block !important"> 
                               <ul>
                              @foreach($errors->all() as $error)
                               
                              <li> {{ $error }} </li>

                            @endforeach
                          </ul>
                        </div>
                        </div>
                            @endif

                       <!--   <div class="alert alert-danger" role="alert">
                            This is a danger alert—check it out!
                          </div>-->
                          <div class="form-group">
                            <label for="email-address" class="col-form-label">Email Address</label>
                            <input type="email" class="form-control" id="email-address" name="username"  placeholder="Your Email" required>
                          </div>
                          <div class="form-group">
                            <label for="pass-text" class="col-form-label">Password</label>
                            <input type="password" class="form-control" id="pass-text" name="password"  placeholder="Your Password" required>
                          </div>
                          <button type="submit" class="btn btn-danger btn-block" style="color: #fff;font-weight: bold;margin-bottom: 15px;">LOGIN</button>
                        </form>

                        <p class="text-center forgotten"><a href="javascript:;">I forgot my password</a></p>
                        
                   </div>
                </div>
                
                
                <!-- reset part -->
                <div class="col-md-4 offset-md-4 panelLog resetSplash" style="display:none;">
                   <div class="col-md-12 text-center logHead">
                        ADMIN RESET PASSWORD
                   </div>

                   <div class="col-md-12">
                     
                              @if($errors->any())
                            <h6>{{$errors->first()}}</h6>
                            @endif
                       <form method="POST" action="/admin-forgot" style="padding-left: 20px;padding-right: 20px;" >
                             @csrf
                          <div class="alert alert-danger" role="alert">
                            This is a danger alert—check it out!
                          </div>
                          <div class="form-group">
                              <p>Enter your registered email and a reset password link would be sent to your email</p>
                          </div>
                          <div class="form-group">
                            <label for="email-address" class="col-form-label">Email Address</label>
                            <input type="email" class="form-control" id="email-address" name="username"  placeholder="Your Email" required>
                          </div>
                          
                          <button type="submit" class="btn btn-danger btn-block" style="color: #fff;font-weight: bold;margin-bottom: 15px;">RESET PASSWORD</button>

                        </form>

                        <p class="text-center logging"><a href="javascript:;">Go back to login</a></p>

                   </div>
                </div>
                
            
            </div>


          </div>
            


      </div>
  </div>


<style>
  
</style>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js" crossorigin="anonymous"></script>
    <script src="js/popper.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
  </body>
</html>