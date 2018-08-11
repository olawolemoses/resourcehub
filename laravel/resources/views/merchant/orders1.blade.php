
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
                      <th>date</th>
                      <th>status</th>
                      <th>total</th>
                      <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @if( !empty( $orders ) )
                        @foreach( $orders as $order )
                            <tr>
                              <td>{{ $order->id }}</td>
                              <td>{{ $order->service->service_name }} </td>
                              <td>{{ $order->order_date->format('F m, Y') }}</td>
                              <td>
                                  @if( $order->fulfilled == 0 )
                                    new unfulfilled order  
                                  @elseif( $order->fulfilled == 1 )
                                    processed
                                  @elseif( $order->fulfilled == 2 )
                                    fulfilled
                                  @endif
                              </td>
                              <td> N{{ number_format( $order->amount/ 100, 2 ) }} </td>
                              <td> <a href="{{ route('merchant_orders_view', ['order'=>$order, 'user'=>$user] ) }} ">View</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
					
			
			</div>
			
				</form>

				<br />
			</div>
		</div>
	</div>
</div>

@endsection