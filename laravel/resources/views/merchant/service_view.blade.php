
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
										
					<h3 style="margin-top: 20px;font-weight: normal;">
		                SERVICES
					</h3>


			<div class="col-md-12">
				
			<table class="table">
                <tbody>
                    @if( !empty( $service ) )
                        
                            <tr>
                               <th>id</th>
                              <td>#{{ $service->id }}</td>
                            </tr>
                            <tr>
                                <th>service</th>
                              <td>{{ $service->service_name }} </td>
                             </tr>
                             <tr>
                                <th>description</th>
                                <td>{{ $service->service_description }}</td>
                             </tr>
                           
                    @endif
                </tbody>
            </table>
            
			
		<h3>Reviews</h3>
		
            
            <table class="table">
                <thead>
                    <tr>
                      <th>id</th>
                      <th>Customer</th>
                      <th>title</th>
                      <th>content</th>
                      <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @if( !empty( $reviews ) )
                        @foreach( $reviews as $review )
                            <tr>
                              <td>{{ $review->id }}</td>
                              <td><img src="/picture/{{ $review->user->customer->profile_picture }}" width="50" />
                                  {{ $review->user->customer->name() }} </td>
                              <td>{{ $review->title }} </td>
                              
                              <td>{{ $review->content }}</td>
                              <td>
                                  {{ $review->rating }}
                              </td>
                            </tr>
                        @endforeach
                    @endif
                    
                    
                </tbody>
            </table>
				
			
			</div>
			
				</form>

				<br />
				
		<hr />
		
		

			</div>
		</div>
	</div>
</div>

@endsection