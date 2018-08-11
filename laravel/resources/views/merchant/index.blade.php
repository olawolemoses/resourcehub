
@extends('layouts.layout')

@section('content')
<div class="container-fluid" style="padding-top: 80px;background: #f5f5f5;min-height: 100vh;">
	
	<div class="container">
		<div class="row">
			
			<div class="col-md-3 proCap">
				@include('includes.merchant_profile')
			</div>

			<div class="col-md-9 proTap">			
				<form method="POST" action="{{ route('updatePicture', ['user'=>$user]) }}" enctype="multipart/form-data">
					@csrf
					@if ( $errors->count() > 0 )
						<div class="alert alert-danger" style="display:block" role="alert">
							@foreach( $errors->all() as $error )
								<li>{{ $error }}</li>
							@endforeach
						</div>
					@endif
										
					<h5 style="margin-top: 20px;font-weight: normal;">
						Dashboard
					</h5>


			<div class="col-md-12">
				
						
            <p>Hello {{ $merchant->firstname }} {{ $merchant->lastname }}.</p>
                    
                   <p> From your account dashboard you can view your recent 
                        <ul>
                            <li><a href="{{ route('merchant_orders',['user'=>$user]) }}">orders</a></li> 
                            <li><a href="{{ route('merchant_update', ['user'=>$user]) }}">edit your password and account details</a></li>
                            <li><a href="{{ route('merchant_services', ['user'=>$user]) }}">services</a></li>
                            <li><a href="{{ route('merchant_issues', ['user'=>$user]) }}">issues resolution</a></li>
                        </ul> 
                    </p>
					
			
			</div>
			
				</form>
				<br />
			</div>
		</div>
	</div>
</div>

@endsection