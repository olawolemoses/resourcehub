
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
		                ORDERS
					</h3>


			<div class="col-md-12">
				
			<table class="table">
                <tbody>
                    @if( !empty( $order ) )
                        
                            <tr>
                               <th>id</th>
                              <td>#{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th>service</th>
                              <td>{{ $order->service->service_name }} </td>
                             </tr>
                             <tr>
                                <th>customer</th>
                              <td>{{ $order->customer->name() }} </td>
                             </tr>
                            <tr> 
                            <th>date</th>
                              <td>{{ $order->order_date->format('F m, Y') }}</td>
                              </tr>
                            <tr>
                                <th>status</th>
                              <td>
                                 @if( $order->fulfilled == 0 )
                                    customer paid
                                  @elseif( $order->fulfilled == 1 )
                                    processed
                                  @elseif( $order->fulfilled == 2 )
                                    fulfilled
                                @elseif( $order->fulfilled == 3 )
                                    Cancel Pending
                                    
                                @elseif( $order->fulfilled == 4 )
                                    Cancel Approved By Merchant
                                    
                                @elseif( $order->fulfilled == 5 )
                                    Cancel Refuted By Merchant
                                  @endifne
                                  @endif
                              </td>
                              </tr>
                            <tr>
                                <th>total</th>
                              <td>N{{ number_format( $order->amount/ 100, 2 ) }}</td>
                              </tr>
                    @endif
                </tbody>
            </table>
            
			
		<h3>Order Fulfillment</h3>
		
            
            <table class="table">
                <thead>
                    <tr>
                      <th>id</th>
                      <th>Fulfillment Information</th>
                      <th>Filename</th>
                      <th>Fufilment date</th>
                      <th>status</th>
                      <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @if( !empty( $orderFulfillments ) )
                        @foreach( $orderFulfillments as $fulfillment )
                            <tr>
                              <td>{{ $fulfillment->id }}</td>
                              <td>{{ $fulfillment->fulfilment_description }} </td>
                              <td><a href="/orders/{{ $fulfillment->fulfilment_filename }}" download>download</a> </td>
                              <td>{{ $fulfillment->fulfillment_date }}</td>
                              <td>
                                  @if( $fulfillment->fulfilment_status == 0 )
                                    customer paid
                                  @elseif( $fulfillment->fulfilment_status == 1 )
                                    processed
                                  @elseif( $fulfillment->fulfilment_status == 2 )
                                    fulfilled
                                @elseif( $fulfillment->fulfilment_status == 3 )
                                    Cancel Pending
                                    
                                @elseif( $fulfillment->fulfilment_status == 4 )
                                    Cancel Approved By Merchant
                                    
                                @elseif( $fulfillment->fulfilment_status == 5 )
                                    Cancel Refuted By Merchant
                                  @endif
                              </td>
                              <!--<td> <a href="{{ route('merchant_orders_view', ['order'=>$order, 'user'=>$user] ) }}">View</a></td>-->
                            </tr>
                        @endforeach
                    @endif
                    
                    
                </tbody>
            </table>
					<a href="{{ route('merchant_fulfill_order', ['order' => $order, 'user'=>$user]) }}">fulfill order</a>
			
			</div>
			
				</form>

				<br />
				
		<hr />
		
		<h3>Payment Information</h3>
		
		<table>
		    <tr>
		        <th>reference id:</th>
		        <td> {{ $order->reference_no }}</td>
		    </tr>
		    <tr>
		        <th>amount paid:</th>
		        <td> N{{ number_format( $order->amount/ 100, 2 ) }} </td>
		    </tr>
		    <tr>
		        <th>Date paid:</th>
		        <td>{{ $order->order_date }}</td>
		    </tr>		    
		</table>
		
	<br />
		
	 
		
		
		
		<hr />
		@if( !is_null( $order->cancelation() ) )
		<h3>Cancel Order </h3>
		
		<hr />
		    
		    Customer canceled service.
		    
		    See below <br />


		    <strong>{{ $order->customer->name() }}</strong> : {{ $order->cancelation->explanation }}
		    
		    <hr />
		    
		    	@if( !is_null( $order->cancelation->thread() ) )
		    	    
		    	    @foreach($order->cancelation->thread()->get() as $thread )
		    	     <strong> {{ $thread->user->merchant->store_name }} </strong>  {{ $thread->explanation }}<br />
		    	    @endforeach
		    	@endif
		    
		    <br />
		    
		    <form method="POST" action="{{ route('merchant_order_cancel', ['user' => $user, 'order'=>$order] ) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <hr />
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Merchant Explanation</label>
                        <div class="col-md-6">
                            <textarea id="explanation" type="text" class="form-control{{ $errors->has('explanation') ? ' is-invalid' : '' }}" name="explanation" required autofocus></textarea>
    
                            @if ($errors->has('explanation'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('explanation') }}</strong>
                            </span>
                            @endif
                            
                            <input type="hidden" name="order_cancel_id" value="{{ $order->cancelation->id }}" />
                            
                            <input type="radio" name="status" value="5" /> Accept
                            
                            <input type="radio" name="status" value="6" /> Cancel
                            
                        </div>
                    </div>
    
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
		@endif

			</div>
		</div>
	</div>
</div>

@endsection