@extends('layouts.merchant_layout')

@section('content')

<div class="container" style="padding-top: 90px;">

	<div class="row">
		
		<div class="col-md-11" style="background: #fff;padding: 0;">

		<h5 style="font-weight: normal;font-size: 14px;padding: 25px;padding-left:40px;font-weight: 500;">PERSONAL INFORMATION</h5>

				<div class="col-md-12">
				    
				            @if ( $errors->count() > 0 )
                                <div class="alert alert-danger"  style="display:block" role="alert">
                                    @foreach( $errors->all() as $error )
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif 
					
					<form method="POST"       
					    @if(!empty( $merchant->user_id) ) 
                            action="{{ route('merchant_update', ['merchant' => $merchant] ) }}"
                        @else
                            action="{{ route('merchant_register') }}"
                        @endif>
                        @csrf
						<div class="col-md-12">
							<div class="col-md-6">
								  <div class="form-group">
								    <label for="">Title</label>
								    <input name="title" value="{{ old('title') ?? $merchant->title }}" type="text" class="form-control" placeholder="">
								  </div>

								  <div class="form-group">
								    <label for="">First Name</label>
								    <input type="text" name="firstname" class="form-control" placeholder="" value="{{ old('firstname') ?? $merchant->firstname }}">
								  </div>


								  <div class="form-group">
								    <label for="">Last Name</label>
								    <input type="text" name="lastname" value="{{ old('lastname') ?? $merchant->lastname }}" class="form-control" placeholder="" >
								  </div>


								  <div class="form-group">
								    <label for="">Mobile Number</label>
								    <input type="text" name="bvn_mobile_no" value="{{ old('bvn_mobile_no') ?? $merchant->bvn_mobile_no }}" class="form-control" placeholder="" >
								  </div>


								  <div class="form-group">
								    <label for="">Email Address</label>
								    <input name="email_address" value="{{ old('email_address') ?? $merchant->email_address }}" type="email" class="form-control" placeholder="" >
								  </div>
							</div>
							<div class="col-md-6">
								
							</div>
						</div>
					
					</div>

					

					<h5 style="font-weight: normal;background: #f8f9fd;font-size: 14px;padding: 25px;padding-left: 35px;font-weight: 500;">SERVICE INFORMATION</h5>
					<div class="col-md-12">

						<div class="col-md-12">
							<div class="col-md-6">
								 <div class="form-group">
								    <label for="">Company Name</label>
								    <input name="store_name" value="{{ old('store_name') ?? $merchant->store_name }}"  type="text" class="form-control" placeholder="">
								  </div>

								 <div class="form-group">
								    <label for="">Merchant URL</label>
								    <input name="store_name_url" value="{{ old('store_name_url') ?? $merchant->store_name_url }}" type="text" class="form-control" placeholder="" >
								  </div>
								  
								 <div class="form-group">
								    <label for="">Store About Us</label>
								    <input name="store_about_us" value="{{ old('store_about_us') ?? $merchant->store_about_us }}" type="text" class="form-control" placeholder="" >
								  </div>
								  
								 <div class="form-group">
								    <label for="">Store Portfolio</label>
								    <input name="store_portfolio" value="{{ old('store_portfolio') ?? $merchant->store_portfolio }}" type="text" class="form-control" placeholder="" >
								  </div>

								 <div class="form-group">
								    <label for="">Store Street</label>
								    <input name="street" value="{{ old('street') ?? $merchant->street  }}" type="text" class="form-control" placeholder="" >
								  </div>
								  
								 <div class="form-group">
								    <label for="">City</label>
								    <input name="city" value="{{ old('city') ?? $merchant->city }}" type="text" class="form-control" placeholder="" >
								  </div>
								  
								 <div class="form-group">
								    <label for="">State</label>
								    <input name="state" value="{{ old('state') ?? $merchant->state  }}" type="text" class="form-control" placeholder="" >
								  </div>
								  
								 <div class="form-group">
								    <label for="">Country</label>
								    <input name="country" value="{{ old('country') ?? $merchant->country  }}" type="text" class="form-control" placeholder="" >
								  </div>								  
								  
							</div>
							<div class="col-md-6"></div>
						</div>
					  
					  	<div class="col-md-2" style="margin-left: 20px;margin-top: 20px;">
					  		<button type="submit" class="btn btn-block" style="background: #6cd852;color: #fff;margin-bottom: 30px;">SAVE </button>
					  	</div>
					  
					</form>

				</div>

				</div>

	</div>



</div>




<style>
	
	label {
		font-size: 13px;
		color: #4a4a4a;
	}

</style>


@endsection