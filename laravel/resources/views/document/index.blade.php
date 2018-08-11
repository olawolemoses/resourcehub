@extends('layouts.layout')

@section('content')
<div class="container-fluid tagger" style="background: #f9f9f9;margin-top: 60px;">
   	@include('includes.tagline')
</div>

<div class="container-fluid" style="background: #f0f3f7;padding-top: 30px;min-height: 100vh;">
   	<div class="container">
   		

				<div class="row">
				
				@include('includes/filters')


					<div class="col-md-9">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<h5><br>Service listing for All Services</h5>
								</div>
								<div class="col-md-6">
									<br>
									<span>{{ $servicesCount }} services</span>

									<select class="form-control" style="width:200px;float: right;">
										<option>Default select</option>
									</select>
								</div>
							</div>



							<!-- vendors listing -->
                            @foreach($services as $service)
								@include('includes/service')							
                            @endforeach



							<!-- pagination -->
							<nav aria-label="The pagination box" class="page">
                                {{--  {{ $services->appends(['search' => $q, 'location'=> $location])->links() }}  --}}

								{{--  <ul class="pagination">
									<li class="page-item disabled">
										<a class="page-link" href="#" tabindex="-1">Previous Page</a>
									</li>
									<li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">4</a></li>
									<li class="page-item"><a class="page-link" href="#">5</a></li>
									<li class="page-item">
										<a class="page-link" href="#">Next Page</a>
									</li>
								</ul>  --}}
							</nav>
						</div>
					</div>



				</div>

   	</div>
</div>
{{--  
<div class="panel panel-default">
    <div class="panel panel-heading">
        {{ $category->category_name }}
    </div>

    <div class="panel-body">
        <img src="{{ $category->picture}}.jpg" />
        {{ $category->category_description}}
    </div>
</div>

@foreach($services as $service)
    <div class="panel panel-default" style="padding: 20px 10px;">
         <a href="{{ $service->path() }}"><img src="{{ $service->service_photo_image }}.jpg" /></a> <br />
        <div class="panel panel-heading">
            <a href="{{ $service->path() }}">
                <strong> {{ $service->service_name }} </strong>
            </a>
        </div>

        <div class="panel-body">
            {{ $service->service_description }} <br />
            &#8358; {{ number_format($service->price, 2) }} 
            <br />
            <span style="font-size:100%;color:#ffc352;"> &starf;</span> 
            {{ number_format ($service->averageRatings, 1) }} ( {{ $service->totalRatings }} )
        </div>
        <hr />
    </div>
    @endforeach

    {{ $services->links() }}  --}}

@endsection

@section('scripts')
	@include('includes/filter-script')
@endsection