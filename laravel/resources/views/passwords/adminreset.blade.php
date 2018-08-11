<!doctype html>
<html lang="en">
<head>
    
    <title>Admin Reset Password</title>

</head>    
<body>
</body>    
</html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">

    <title>Password Reset</title>
  </head>
  <body>
  <div class="container-fluid adminBack" style="background-image: none;">
      <div class="back">
            
          <div class="container">
              <div class="row">
                <div class="col-md-4 offset-md-4 panelLog">
                   <div class="col-md-12 text-center logHead">
                        PASSWORD RESET
                   </div>

                   <div class="col-md-12">
                           @if($errors->any())
                           <h4>{{$errors->first()}}</h4>
                            @endif  
                       <form style="padding-left: 20px;padding-right: 20px;padding-top: 20px;" method="POST" action="/resetpassword" >

                             @csrf
                               <input type="hidden" name="token" value="{{$token }}">
                          <div class="alert alert-success" role="alert" style="display:none;">
                            Your password has been updated
                          </div>
                      
                          <div class="form-group">
                            <label for="pass-text" class="col-form-label">Username</label>
                            <input type="email" class="form-control" id="pass-text"  value="{{$email or old('username')}}" readonly name="username" >
                          </div>
                          
                          <div class="form-group">
                            <label for="pass-text" class="col-form-label">Password</label>
                            <input type="password" class="form-control" id="pass-reset" name="password">
                          </div>

                          <div class="form-group">
                            <label for="pass-text" class="col-form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="pass-cofirm" name="password_confirmation">
                          </div>

                          <button type="submit" class="btn btn-warning btn-block" style="color: #fff;font-weight: bold;margin-bottom: 15px;">RESET PASSWORD</button>
                        </form>
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