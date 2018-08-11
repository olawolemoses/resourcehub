
@extends('layouts.layout')

@section('content')

<div class="container-fluid" style="padding-top: 80px;background: #f5f5f5;min-height: 100vh;">
	
<div class="container">
	<div class="row">
		
		<div class="col-md-3 proCap" style="padding: 0;">

			<div class="row">
				<div class="col-md-6">
				<img src="/picture/{{ $profile_pic }}" class="mx-auto d-block profilePic" />
				</div>
				<div class="col-md-6" style="padding: 7px;padding-top: 15px;">
					<span>
					    @if( !is_null( $merchant->store_name ) )
					    {{ $merchant->store_name }}
					    @else
					    {{ $merchant->firstname }} {{ $merchant->lastname }}
					    @endif
					    </span>
					<p><a href="{{ route('showPicture', ['user' => $user]) }}">change photo</a>
					</p>
				</div>

				<button class="btn">ADD A SERVICE</button>


				


			</div>


			<style>
				.menuBit2 {
					 width: 100%;
				}
				.menuBit2 a:hover, .menuBit2 a.active {
					width: 100%;
					border-radius: 0;
					background: #502e7d;
					color: #fff;
					border: none;
					border-left: 3px solid #d3bfec;


				}
				.menuBit2 a {
					border-radius: 0;
					background: #63438e;
					color: #d3bfec;
				}
			</style>



			<div class="list-group menuBit2">
                <a href="{{ route('merchant_index',['user'=>$user]) }}" class="list-group-item list-group-item-action active"> Dashboard</a>
                <!--<a href="#" class="list-group-item list-group-item-action"> Appointments</a>-->
                <!--<a href="usermanage" class="list-group-item list-group-item-action"> Revenue</a>-->
                <a href="{{ route('merchant_orders',['user'=>$user]) }}" class="list-group-item list-group-item-action"> Order</a>
                <a href="{{ route('merchant_services', ['user'=>$user]) }}" class="list-group-item list-group-item-action"> Services</a>
                <a href="{{ route('merchant_issues', ['user'=>$user]) }}" class="list-group-item list-group-item-action"> Issues</a>
                <a href="{{ route('merchant_update', ['user'=>$user]) }}" class="list-group-item list-group-item-action"> Profile</a>
              </div>



			
			
		</div>

		<div class="col-md-9 proTap" style="padding: 0;padding-top: 0;">
			
				
				<h5 style="font-weight: normal;background: #ebebf2;font-size: 15px;padding: 17px;font-weight: 500;">PERSONAL INFORMATION</h5>

				<div class="col-md-12">
					
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

					

					<h5 style="font-weight: normal;background: #ebebf2;font-size: 15px;padding: 17px;font-weight: 500;">MERCHANT INFORMATION</h5>
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
								    <label for="">Store City</label>
								    <input name="city" value="{{ old('city') ?? $merchant->city }}" type="text" class="form-control" placeholder="" >
								  </div>								  
								  
								  <div class="form-group">
								    <label for="">Store State</label>
								    <input name="state" value="{{ old('state') ?? $merchant->state  }}" type="text" class="form-control" placeholder="" >
								  </div>

								  <div class="form-group">
								    <label for="">Country</label>
								    <input name="country" value="{{ old('country') ?? $merchant->country }}" type="text" class="form-control" placeholder="" >
								  </div>
							</div>
							<div class="col-md-6"></div>
						</div>
					  
					  	<div class="col-md-4" style="margin-left: 20px;">
					  		<button type="submit" class="btn btn-block" style="background: #6cd852;color: #fff;margin-bottom: 30px;">SAVE </button>
					  	</div>
					  
					</form>

				</div>


		</div>

	</div>
</div>
</div>

@endsection
