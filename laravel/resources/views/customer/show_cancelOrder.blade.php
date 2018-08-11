@extends('layouts.layout')

@section('content')
<div class="container-fluid" style="padding-top: 80px;background: #f5f5f5;min-height: 100vh;">
	
	<div class="container">
		<div class="row">
			
			<div class="col-md-3 proCap">
				@include('includes.customer_profile')
			</div>

			<div class="col-md-9 proTap">			
				<form method="POST" action="{{ route('cancel.order', ['user'=>$user, 'order'=>$order]) }}" enctype="multipart/form-data">
					@csrf

					@if ( $errors->count() > 0 )
						<div class="alert alert-danger" style="display:block" role="alert">
							@foreach( $errors->all() as $error )
								<li>{{ $error }}</li>
							@endforeach
						</div>
					@endif
										
					<h5 style="margin-top: 20px;font-weight: normal;">
						CANCEL ORDER
					</h5>

					@if( $flash = session('message') )
						<div class="alert alert-success" style="display:block" role="alert">
							{{ $flash }}
						</div>
					@endif

					<div class="col-md-12">
						<div class="col-md-6">
							<div class="form-group">
								<label for="picture" class="col-form-label">
										Please explain why you would 
		like to cancel the order.</label>
								<textarea class="form-control" name="explanation" id="explain"></textarea>
							</div>
						</div>
						<div class="col-md-6">
							
						</div>
					</div>
					
						<div class="col-md-4 offset-md-4">
							<button type="submit" class="btn" style="background: #6cd852;color: #fff;">SEND</button>
						</div>	
						</form>
						<br />
					</div>
		</div>
	</div>
</div>

@endsection