@extends('layouts.layout')

@section('content')

	<div class="container-fluid" style="background: #f9f9f9;padding-top: 90px;padding-bottom: 50px;">
		
		<div class="container">
			
				<div class="row">
					
					<div class="col-md-3">
						<figure>
							<img src="/file/documents/uploaded/{{ $document->photo }}" alt="" width="100%;">
						</figure>
						<form action="{{ route('order.document', ['document'=>$document->id]) }}" method="post" accept-charset="UTF-8" class="form-horizontal" role="form">
                            @csrf
                            <button type="submit" name="pay_now" class="btn myBtnColor btn-block" title="Hire">BUY BOOK</button> <br />
                    	</form>
                    	
                    	
					</div>


					<div class="col-md-9">
						<h4>{{ $document->title }}</h4>
						<p style="margin-top: 20px;"><b>{{ $document->author_name }}</b><br>{{ $document->published }}</p>

						<p>
							@for ($i = 1; $i <= intval( $document->averageRatings ); $i++)
								<i class="fa fa-star" style="color: #f9af33;"></i>
							@endfor
							@if(  $document->averageRatings - intval( $document->averageRatings) > 0 )
							<i class="fa fa-star-half" style="color: #f9af33;"></i>
							@endif
							{{  number_format( $document->averageRatings, 1 ) }}
							
						</p>

						<sup>{{ number_format($document->totalRatings ) }} customer reviews</sup>

						<h4 style="color: #502e7d;">&#8358; {{ number_format( $document->amount, 2 ) }}</h4>

						<p style="margin-top: 20px;font-size: 15px;">
							{{ \App\Helpers::trim_characters($document->description, 20) }}
						</p>


						<button class="btn" style="background: transparent;color: #502e7d;">
							<i class="material-icons" style="margin-right: 10px;margin-top: 4px;">visibility</i> PREVIEW
						</button>
					</div>


				</div>


		</div>

	</div>




	<div class="container-fluid" style="padding-top: 30px;padding-bottom: 50px;background: #ecedef;">
		

		<div class="container">
			
			<div class="row">
				
				<div class="col-md-3">
					<h5>Document Details</h5>
					<div class="row" style="font-size: 14px;">
						<div class="col-6">ISBN</div>
						<div class="col-6">{{ $document->isbn }}</div>
						<div class="col-6">Paper back</div>
						<div class="col-6">{{ $document->no_of_pages }} pages</div>
						<div class="col-6">Reading time</div>
						<div class="col-6">{{ $document->reading_time }}</div>
						<div class="col-6">Author</div>
						<div class="col-6">{{ $document->author_name }}</div>

					</div>
				</div>

				<div class="col-md-1"></div>


				<div class="col-md-8">
					<h5>Document Description</h5>
					<p style="font-size: 14px;">
						{{ $document->description }}
					</p>
				</div>

			</div>


			
			<div class="row" style="margin-top: 40px;">

				<h5>Other related books that might interest you</h5>
				
				@foreach( $related_documents as $related_document)
				<div class="col-md-3" style="margin-bottom: 15px;">
					<div class="row">
						<div class="col-5">
							<img src="/file/documents/cover/{{ $related_document->photo }}" alt="" style="width: 100%;">
						</div>

						<div class="col-7">
							<p style="font-size: 13px;font-weight: bold;">{{ $related_document->title }}</p>
							<sup>{{ $related_document->author_name }}<br>

								@for ($i = 1; $i <= intval( $related_document->averageRatings ); $i++)
									<i class="fa fa-star" style="color: #f9af33;"></i>
								@endfor
								@if(  $related_document->averageRatings - intval( $related_document->averageRatings) > 0 )
									<i class="fa fa-star-half" style="color: #f9af33;"></i>
								@endif

								{{  number_format( $related_document->averageRatings, 1 ) }}
							</sup>
							<h6 style="color: #502e7d;">&#8358; {{ number_format( $related_document->amount, 2 )  }}</h6>
						</div>
					</div>
				</div>
				@endforeach

			</div>




		</div>

</div>


@endsection
