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
									<h5><br>Search Results for '{{ $q }}'</h5>
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
								@if( $location != '')								
									 {{ $services->withPath('search/')->appends(['_token' => $_token, 'search' => $q, 'location'=> $location])->links() }}
								@else
								 {{ $services->withPath('search/')->appends(['_token' => $_token, 'search' => $q])->links() }}
								@endif
                               

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

@endsection

@section('scripts')
	@include('includes/filter-script')
@endsection