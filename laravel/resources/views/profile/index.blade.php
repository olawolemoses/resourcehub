@extends('layouts.new_layout')
@section('content')

<style>
  	nav.navbar {
  		 background: #e6e6e6;
  	}
  	body {
  		background: #f7f8fa;
  	}
  </style>





   <div class="container-fluid breadcrum" style="margin-top: 50px;">
   	  <div class="container">
   	  	   <a href="{{ route('index') }}">Home</a> | <a href="{{ route('findalawyer') }}">Find lawyer</a> | <a href="{{ route('searchlawyer') }}">Search Result</a> | <a href="#">{{ $user->name() }}</a>
   	  </div>
        
   	</div>



   <div class="container-fluid" style="padding-top: 0px;min-height: 100vh;padding-bottom: 50px;">
   	<div class="container">
   		

		<div class="row">

			 <div class="col-md-3 mainProfile">

			 	 <div class="col-md-12" style="background: #fff;padding-top: 20px; padding-bottom: 20px;box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.1);">
			 	 	
						<img src="/img/{{ $user->profile->profile_picture }}" alt="">

						<p style="color: #4a4a4a;"><span>{{ $user->name() }}</span></p>
						<p style="color: #4a4a4a;"><span>Called to bar:</span>   {{ $user->merchant->call_bar_no }}</p>
						<p style="color: #4a4a4a;"><span>Called to bar year:</span>   {{ $user->merchant->call_to_bar_year }}</p>
						<p style="color: #4a4a4a;"><span>Post Call Experience: </span> 
						
						@php
						    $year = date('Y');
						@endphp
						
						{{ $year - $user->merchant->call_to_bar_year }} years </p>

						<hr class="divider">


						<p style="color: #5e5e5e;"><i class="material-icons">group</i><span>Total clients: </span> {{ $user->merchant->total_clients }}</p>
						<p style="color: #5e5e5e;"><i class="material-icons">navigation</i><span>Location: </span> {{ $user->merchant->state }} </p>
						<p style="color: #5e5e5e;"><i class="fa fa-tag"></i><span>Category: </span> {{ $user->merchant->category->category_name }} </p>
						<p style="color: #5e5e5e;"><i class="material-icons">star</i>{{ $user->merchant->averageRatings }} (  {{ $user->merchant->total_clients }} Legal Concierge Clients )</p>


						<hr class="divider">
                        
                        @if(Auth::check() && $service->hasPaid( auth()->user()->id ) )
						<p style="color: #5e5e5e;"><i class="material-icons">mail</i><span>Email address</span>
						    <p>{{ $user->username }}</p>
						</p>
						<p style="color: #5e5e5e;"><i class="material-icons">call</i><span>Phone Number</span>
						    <p>{{ $user->profile->mobile_no }}</p>
						</p>
                        @else
                            <p style="color: #5e5e5e;"><i class="material-icons">mail</i><span>Email address</span>
    						    <p class="blur">{{ $user->username }}</p>
    						</p>
    						<p style="color: #5e5e5e;"><i class="material-icons">call</i><span>Phone Number</span>
    						    <p class="blur">{{ $user->profile->mobile_no }}</p>
    						</p>
    						
                             <form action="{{ route('service_checkout', [ 'service'=>$service ] ) }}" method="get">
    						    <button type="submit" class="btn col-md-6 offset-md-3">CONTACT</button>
                            </form>
    					@endif

			 	 </div>

			 </div>


			 <div class="col-md-9 mainProfileDetail">
			 		
			 	  <div class="col-md-12 stack">
			 	  	 <h6>{{ $user->firstname }}'s Profile
			 	  	 <p style="float: right;font-size: 12px;">
			 	  	                                       
                       @if( $user->merchant->available )
                           <span class="dot"></span> &nbsp; Available 
                       @else
                           <span class="dot" style="background-color: red;"></span> &nbsp; Not Available
                       @endif
                    </p>
			 	  </h6>

			 	  	 <p>
			 	  	     {!! $user->merchant->store_about_us !!}
			 	  	     
			 	 <!-- 	 	I am an intellectual property lawyer with 8 years of progressive experience in my field. My areas of focus are patentability opinions, copyright and trademark infringement issues, trademark letters and patent prosecution. I co-wrote the bestseller, ‘Understanding Trademarks’’ with Jude Ataga in 2016 and I am very much aware of my client’s need to take well thought out decisions. -->
						<!--<br><br>-->
						<!--Solving issues related to intellectual property is my priority and with my ability to negotiate and interpret agreements, my clients are assured of being well represented. -->
						<!--<br><br>-->

						<!--My services include.<br>-->
						<!--•	Client counselling on business laws and copyright laws.<br>-->
						<!--•	Handles issues concerning patent acquisition, copyrights, trademarks or other intellectual property.<br>-->
						<!--•	Agreement negotiation.-->

			 	  	 </p>
			 	  	 
			 	  </div>

			 	  <div class="col-md-12 stack">
			 	  	 <h6 style="color: #707bea;">Price</h6>

			 	  	 <table class="table">
			 	  	 	<thead>
			 	  	 		<tr>
			 	  	 			<th>RATES</th>
			 	  	 			<th>PAYMENT METHOD</th>
			 	  	 		</tr>
			 	  	 		
			 	  	 	</thead>
			 	  	 	<tbody>
			 	  	 		<tr>
			 	  	 			<td>Per section &emsp; &emsp; &#8358; {{ number_format( $service->price, 2 ) }}</td>
			 	  	 			<td>Credit Card</td>
			 	  	 		</tr>
			 	  	 	</tbody>
			 	  	 </table>
			 	  </div>


			 	  <div class="col-md-12 stack">
			 	  	 <h6 style="color: #707bea;">Availability</h6>
					
					@if( count( $availability ) )
    					@foreach( $availability as $avail )
    					 <p class="avail">
    					 	<span class="row">
    					 		<span class="col-md-1">
    						 		<img src="img/dot.png" alt="">
    						 	</span>
    						 	<span class="col-md-6">
    						 		{{ App\Models\Availability::days( )[$avail->id ] }}<br>
    								{{ $avail->from_time }} - {{ $avail->to_time }}
    						 	</span>
    					 	</span>
    					 </p>
    					 @endforeach
    			    @else
    			        <p class="avail"> Not set </p>
                    @endif
                    
			 	  </div>



				<div class="col-md-12 stack">
					<h6 style="color: #707bea;">Reviews</h6>

					<div class="col-md-12 reviewSpot">
					    @if(Auth::check())
    						<form action="{{ route('createReview') }}" method="POST"> @csrf
    							<textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="write a review"></textarea>
    							<input type="hidden" name="svx_id" value="{{ $service->id }}" />
    							<button class="btn">SEND</button>
    							
    						</form>
						@endif
					</div>

					
						
						<div class="row reviews">

                            @foreach( $reviews as $review)
							<div class="col-md-12">
								<div class="row">
									
									<div class="col-md-2">
									    @for($i=0; $i < $review->ratings_score; $i++ )
										    <i class="material-icons">star</i>
										@endfor
										
										<p class="date">
											Posted {{ $review->updated_at }}
										</p>
									</div>
									<div class="col-md-10">
										<h6>{{ $review->user->name() }}</h6>
										<p class="comment">
										    {{ $review->content }}
										</p>
									</div>

								</div>
							</div>
							@endforeach
						</div>
				</div>

			 </div>

		</div>
	</div>
</div>

@endsection
