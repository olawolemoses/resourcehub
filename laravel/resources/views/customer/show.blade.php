@extends('layouts.layout')

@section('content')
<div class="container-fluid" style="padding-top: 80px;background: #f5f5f5;min-height: 100vh;">
	
	<div class="container">
		<div class="row">
			
			<div class="col-md-3 proCap">

				@include('includes.customer_profile')
				
			</div>

			<div class="col-md-9 proTap">			
				<form method="POST" action="{{ route('update', ['user'=>$user]) }}">
					@csrf
					@if ( $errors->count() > 0 )
						<div class="alert alert-danger" style="display:block" role="alert">
							@foreach( $errors->all() as $error )
								<li>{{ $error }}</li>
							@endforeach
						</div>
					@endif
										
					<h5 style="margin-top: 20px;font-weight: normal;">
						PROFILE SETTINGS
					</h5>

					@if( $flash = session('message') )
						<div class="alert alert-success" style="display:block" role="alert">
							{{ $flash }}
						</div>
					@endif



			<div class="col-md-12">
				<div class="col-md-6">
					<div class="form-group">
						<label for="email-address" class="col-form-label">Firstname</label>
						<input value="{{ $user->customer->firstname }}"  type="text" class="form-control" name="firstname" id="email-address">
					</div>

					<div class="form-group">
						<label for="email-address" class="col-form-label">Lastname</label>
						<input value="{{ $user->customer->lastname }}" type="text" class="form-control" name="lastname" id="email-address">
					</div>
				</div>
				<div class="col-md-6">
					
				</div>
			</div>

			<div class="col-md-12">
				<div class="col-md-6">
					<div class="form-group">
						<label for="email-address" class="col-form-label">Username</label>
						<input readonly value="{{ $user->username }}" type="email" class="form-control" name="username" id="email-address">
					</div>

					<div class="form-group">
						<label for="email-address" class="col-form-label">Password</label>
						<input value="***********************************" type="password" class="form-control" name="password" id="email-address">
					</div>
				</div>
				<div class="col-md-6">
					
				</div>
			</div>	
			
			<div class="col-md-12">
				<div class="col-md-6">
					<div class="form-group">
						<label for="email-address" class="col-form-label">Confirm Password</label>
						<input value="***********************************" type="password" class="form-control" name="password_confirmation" id="email-address">
					</div>

					<div class="form-group">
						<label for="email-address" class="col-form-label">Mobile No</label>
						<input value="{{ $user->customer->mobile_no }}" type="text" class="form-control" name="mobile_no" id="email-address">
					</div>
				</div>
				<div class="col-md-6">
					
				</div>
			</div>	
			
			<div class="col-md-12">
				<div class="col-md-6">		
					<div class="form-group">
						<label for="email-address" class="col-form-label">Street</label>
						<input value="{{ $user->customer->street }}" type="text" class="form-control" name="street" id="email-address">
					</div>

					<div class="form-group">
						<label for="email-address" class="col-form-label">City</label>
						<input value="{{ $user->customer->city }}" type="text" class="form-control" name="city" id="email-address">
					</div>
				</div>
				<div class="col-md-6">
					
				</div>
			</div>	
			
			<div class="col-md-12">
				<div class="col-md-6">
					<div class="form-group">
						<label for="email-address" class="col-form-label">State</label>
						<input value="{{ $user->customer->state }}" type="text" class="form-control" name="state" id="email-address">
					</div>
					<div class="form-group">
						<label for="email-address" class="col-form-label">Country</label>
						<input value="{{ $user->customer->country }}" type="text" class="form-control" name="country" id="email-address">
					</div>	
				</div>
				<div class="col-md-6">
					
				</div>
			</div>	
			
				<div class="col-md-4 offset-md-4">
						<button type="submit" class="btn" style="background: #6cd852;color: #fff;">UPDATE</button>
				</div>	
				</form>
				<br />
				<hr />
				
				
				
				
				<div class="modal fade" id="deactivate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                            <div class="row text-center">
                                <i class="fa fa-warning" style="width:100%;text-align:center;font-size:27px;margin-top:40px;color:#ee586b;"></i>
                                <h6 style="font-weight:normal;width:100%;text-align:center;margin-top: 15px;">DEACTIVATE ACCOUNT</h6>
                                <p style="width:100%;text-align:center;margin-top: 15px;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget est sed 
felis tincidunt tristique. Nullam congue convallis eros eget semper. 
                                </p>
                                
                                
                                <div class="col-md-4 offset-md-4 text-center" style="padding-bottom:30px;">
                						<form method="POST" action="{{ route('deactivate', ['user' => $user] ) }}">
                							@csrf
                							 <button 
                							 	type="submit" 
                							 	class="btn btn-success btn-block" 
                							 	style="">DEACTIVATE</button>
                						</form>
                				</div>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
				
				
				
				
				<div class="col-md-4 offset-md-4 text-center" style="padding-bottom:30px;">
				    <button type="button" class="btn btn-danger btn-button" data-toggle="modal" data-target="#deactivate">DEACTIVATE ACCOUNT</button>
				</div>
				
				
				
				
					
			</div>
		</div>
	</div>
</div>

@endsection