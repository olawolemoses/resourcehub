@include("includes.header")








   <div class="container-fluid" style="background: url('/img/backback.png') no-repeat center center / cover; min-height: 100vh;">
   	
		<div class="row">
			

				<div class="col-md-4 offset-md-4 credential">
					
					<span>Sign In with</span>

					<div class="row" style="padding-top: 10px;">
						<div class="col-md-3 text-center">
							<a href="/redirect/linkedin"><i class="fa fa-linkedin" style="background: #0077b5;"></i></a>
						</div>

						<div class="col-md-3 text-center">
							<a href="/redirect/google"><i class="fa fa-google" style="background: #db3236;"></i></a>
						</div>

						<div class="col-md-3 text-center">
							<a href="/redirect/facebook"><i class="fa fa-facebook-square" style="background: #4a67ad;"></i></a>
						</div>

						<div class="col-md-3 text-center">
							<a href="/redirect/twitter"><i class="fa fa-twitter" style="background: #4c9fec;"></i></a>
						</div>

					</div>

					<div class="row" style="margin-top: 30px;color: #d8d8d8;">
						<div class="col-5"><hr></div>
						<div class="col-2 text-center">or</div>
						<div class="col-5"><hr></div>
					</div>

					<div class="row" style="margin-top: 30px;">
						
							<div class="col-md-12">
                                		    
                                <div class="card-body">
                                    @if ($errors->count() > 0 )
                                        <div class="alert alert-danger" style="display:block">
                                            @foreach( $errors->all() as $error )
                                               <li>{{ $error }}</li>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                
                                @if( $flash = session('status') )
                                <div class="alert alert-success" style="display:block" role="alert">
                                    {{ $flash }}
                                </div>
                                @endif
                            
							  <form action="{{ route('login') }}" method="post"> @csrf
							      
								<label for="">Username</label>
								<input name="username" type="text" class="form-control">

								<label for="">Password</label>
								<input name="password" type="password" class="form-control">

								<button class="btn col-md-4 offset-md-4">SIGN IN</button>

								<p><a href="/forgotpassword">I forgot my password</a></p>

								<p>Don't have an account ? <a href="{{ route('register') }}">Sign up</a></p>
								
							  </form>
							</div>
							

						
					</div>
					

				</div>


		</div>


   </div>

		











    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/popper.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
  </body>
</html>