@extends('layouts.layout')

@section('content')
<div class="container-fluid" style="padding-top: 80px;background: #f5f5f5;min-height: 100vh;">
	
	<div class="container">
		<div class="row">
			
			<div class="col-md-3 proCap">

				@include('includes.customer_profile')
				
			</div>

			<div class="col-md-9 proTap">
					@if(isset( $order) && count($order) > 0)
						<hr />


						<!-- vendors listing -->

						<div class="col-md-12 venor">
							<div class="row">
								<div class="col-4">
									<img src="/img/{{ $order->service->service_photo_image }}" alt="..." class="rounded-0" style="width: 100%;">
								</div>

								<div class="col-8">
									<h6>{{ $order->service->merchant->store_name }}</h6>
									<p class="statement">
										{{ $order->service->service_description }}
									</p>
									
									<div class="row saver">
										<div class="col-6">
											<p>&#8358; {{ number_format( $order->service->price, 2 ) }}</p>
											<p><i class="material-icons vote">star</i><span>{{ number_format( $order->service->averageRatings, 1) }}</span> <span>({{ $order->service->totalRatings }})</span> </p>
										</div>

										<div class="col-6">
											<button type="button" class="btn">COMPLETED</button>
										</div>
										<div class="col-12">
											@if(!count($order->cancelation) > 0 )
											<form method="get" action="{{ route('customer.cancel.order', ['user'=>$user, 'order'=>$order]) }}">
												@csrf
												<button type="submit" class="btn">Cancel</button>
											</form>
											@endif
										
										<p >
											@if(count($order->cancelation) > 0 )
												<strong>Status:</strong>
												<span style="color:red; text-decoration:underline">
													@if($order->cancelation->accept == 0)
														Pending Cancelation
													@elseif($order->cancelation->accept == 1)
														Accepted Cancelation
													@else
														Canceled Cancelation
													@endif
												</span>
											@endif
										</p>

										</div>
									</div>
									
								</div>
							</div>
							
							
						</div>
						<!--vendor -->
						<hr />
					@endif

					<div class="col-md-12" style="margin-top: 50px;">
						<div class="list-group lister">
						 <form action="{{ route('customer.show.orders', ['user'=>$user]) }}" method="get">
						     @csrf
						<button type="submit" class="list-group-item list-group-item-action list-group-item-dark">
							ORDERS
						</button>
						</form>
						     @if( !empty( $orderFulfillments ) )
					        <h4>Fulfillments</h4>
						    @foreach( $orderFulfillments as $fulfillment )
                            <div class="row">
                            <p>
                              {{ $fulfillment->id }} 
                              {{ $fulfillment->fulfilment_description }}
                            </p>
                              <span>
                              <a href="/orders/{{ $fulfillment->fulfilment_filename }}" download>download</a></span>
                              <br />
                              <b>Date Responded:</b>{{ $fulfillment->fulfillment_date }} <br />
                              
                              <b>Status</b>
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
                             
                              <!--<td> <a href="{{ route('merchant_orders_view', ['order'=>$order, 'user'=>$user] ) }}">View</a></td>-->
                            </div>
                        @endforeach
                        @endif
						
						<hr />

                        <h3>Other Orders</h3>
                        
						@foreach($orders as $order)
						    
							<form action="{{ route('customer.show.order', ['user' => Auth::user()->id, 'order' => $order->id ]) }}" method="get">
								@csrf
								<button type="submit" class="list-group-item list-group-item-action">
									<span class="row">
										<span class="col-md-8"> You hired {{ $order->service->merchant->store_name }} </span>
										<span class="col-md-4"> {{ $order->order_date->diffForHumans() }} <a href="#"><i class="fa fa-trash">Cancel</i></a> Pending</span>
									</span>
								</button>
							</form>
				
						@endforeach
						
                        <h3>Other Document Orders</h3>
						@foreach($orderDocuments as $order)
							<form action="{{route('downloadDocument',['document'=>'sample.pdf']) }}" method="get">
								@csrf
								<button type="submit" class="list-group-item list-group-item-action">
									<span class="row">
										<span class="col-md-8"> You bought <a href="#">{{ $order->document->title }}</a> from  {{ $order->document->merchant_id }} </span>
										<span class="col-md-4"> {{ $order->order_date->diffForHumans() }} <i class="fa fa-trash"><a href="{{route('downloadDocument',['document'=>'sample.pdf']) }}">Download</a></i></span>
									</span>
								</button>
							</form>
						@endforeach
						
						</div>
					</div>
					<hr />
			</div>

		</div>
	</div>
</div>

@endsection