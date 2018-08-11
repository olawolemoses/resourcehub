@extends('layouts.layout')

@section('content')

<div class="container-fluid profileHead">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="/img/{{ $service->service_photo_image }}" class="mx-auto d-block profilePic" />
            </div>
            <div class="col-md-6">
                <h5> {{ $service->merchant->store_name }}</h5>
                <p><b>Joined:</b> {{ $service->merchant->created_at->format('F jS, Y') }} &emsp; <i class="material-icons">room</i>{{ $service->merchant->state . ', ' . $service->merchant->country }}</p>
                <p><b>Category :</b> {{ $service->category->category_name }}</p>
                <p class="desc">
                    {{ $service->service_description }}
				</p>
				<p><b>rating :</b><span style="font-size:100%;color:#ffc352;"> &starf;</span> {{ number_format($service->averageRatings, 1) }}</p>
            </div>
            <div class="col-md-3">
                <div class="col-md-12 text-center profile-dix">
                    <form action="{{ route('order', ['service'=>$service->id]) }}" method="post" accept-charset="UTF-8" class="form-horizontal" role="form">
                            @csrf
                            <button type="submit" name="pay_now" class="btn myBtnColor" title="Hire">Hire</button> <br />
                    </form>
                </div>
                <div class="col-md-12 text-center">
                    <p><b>&#8358; {{ number_format( $service->price, 2 ) }}</b> per session</p>
                </div>            
            </div>
        </div>
        

    </div>
</div>

<div class="container-fluid" style="border-top: 3px solid #3e98f5;">
	<div class="container">
		
		<nav>
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
			<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">About</a>
			<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Portfolio / Availability</a>
			<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Review</a>
		</div>
		</nav>


		<div class="tab-content" id="nav-tabContent">
			<!-- tab 1 -->
			<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			

				<div class="row tbcn">
					<div class="col-md-8">
						<p>
						{!! $service->merchant->store_about_us !!}
						</p>
					</div>

					<div class="col-md-4">
						 @if(Auth::check() && Auth::user()->customer->hasMadeOrder( $service->id )) 
						
						<h6><br><br>Rate and write a Review</h6>
						<form method="POST" action="{{ route('createReview') }}" class="reviewForm">
							<div class="form-group">
								@csrf
									<label for="">Title</label>
									<input type="text" name="title" class="form-control" id="" placeholder="">
								</div>
								<input name="svx_id" type="hidden"  value="{{ $service->id }}" />
								<input name="number" type="number" class="rating" hidden="" />

								<div class="form-group">
								<label for="">Rating</label>
									<div>
										<i class="material-icons s1">star</i>
										<i class="material-icons s2">star</i>
										<i class="material-icons s3">star</i>
										<i class="material-icons s4">star</i>
										<i class="material-icons s5">star</i>
									</div>
								</div>

								<div class="form-group">
								<label for="">Review</label>
								<textarea name="content" class="form-control" id="" rows="3"></textarea>
								</div>
								<button type="submit" class="btn">SUBMIT YOUR REVIEW</button>
						</form>
						@endif
					</div>
				</div>


			</div>

			<!-- tab 2 -->
			<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				<div class="row tbcn">
					<div class="col-md-8">
					<p>
						{!! $service->merchant->store_portfolio !!}
					</p>
					</div>


					<div class="col-md-4">
						<h6><br><br>AVAILABILITY</h6>


						<div class="row nad">
								<div class="col-8">
								16th March , 2018.<br>
								9 am - 12 noon
								</div>
								<div class="col-4">Comfirmed</div>
						</div>
						<!-- nad -->


						<div class="row nad">
								<div class="col-8">
								16th March , 2018.<br>
								9 am - 12 noon
								</div>
								<div class="col-4">Comfirmed</div>
						</div>
						<!-- nad -->



						<div class="row nad">
								<div class="col-8">
								16th March , 2018.<br>
								9 am - 12 noon
								</div>
								<div class="col-4">Comfirmed</div>
						</div>
						<!-- nad -->

					</div>
				</div>
				

			</div>


			<!-- tab 3 -->
			<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
				<div class="row">
					<div class="col-md-12">						
						<h6><br><br>REVIEWS({{ $reviewsCount }})</h6>
                            @foreach($reviews as $review)
                                <!-- nad -->
                                @if( !is_null($review->user->customer) )
                                    <div class="row nad">
                                            <div class="col-10">
                                                <span class="nameBase">{{ $review->user->customer->firstname }} {{ $review->user->customer->lastname }}</span>
                                                <p>
                                                    {{ $review->content }} 
                                                    <br />
                                                    <span style="font-size:100%;color:#ffc352;"> &starf;</span> 
                                                    {{ number_format ($review->ratings_score, 1) }}
                                                </p>
                                            </div>
    
                                            <div class="col-2">{{ $review->created_at->diffForHumans() }}</div>
                                    </div>
                                @endif
                                <!-- nad -->
                                @endforeach
                                {{ $reviews->links() }}
                    </div>
                </div>
			</div>

		

	</div>
</div>


@endsection