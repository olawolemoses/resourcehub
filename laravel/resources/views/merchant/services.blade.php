
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
		                ORDERS
					</h5>


			<div class="col-md-12">
				
			<table class="table">
                <thead>
                    <tr>
                      <th>id</th>
                      <th>service</th>
                      <th>description</th>
                      <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @if( !empty( $services ) )
                    @foreach( $services as $service )
                    <tr>
                          <td>#{{ $service->id }}</td>
                          <td>{{ $service->service_name }} </td>
                          <td>{{ $service->service_description }}</td>
                          <td>
                              <a href="{{ route('merchant_service_view', ['user'=>$user, 'service'=>$service] ) }}">View</a>
                          </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
					
			
			
			</div>
			
				</form>
				
				<a href="{{ route('merchant_new_service', ['merchant'=>$merchant]) }}">Upload new services</a>
				

				<br />
			</div>
		</div>
	</div>
</div>

@endsection