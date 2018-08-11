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
   	  	  <a href="{{ route('index') }}">Home</a> | <a href="{{ route('findalawyer') }}">Find lawyer</a> | <a href="{{ route('searchlawyer') }}">Search Result</a>
   	  </div>
        
   	</div>


   <!--	<div class="container" style="padding-top: 10px; padding-bottom: 10px;"> 

          
             <img src="img/banner.png" style="width: 100%;" alt="">
         

      </div>-->
    <div class="container" style="padding-top: 10px; padding-bottom: 10px;"> 

           @foreach($resultads as $searchads)
                 <div style="width:100%;"><img src="{{asset('/img/'.$searchads->banner_file_name)}}" style="width: 100%;" alt=""></div>
           @endforeach
      </div> 

   


   <div class="container-fluid" style="padding-top: 0px;min-height: 100vh;">
   	<div class="container">
   		

		<div class="row">
			<div class="col-md-3 sideBin">
				
				<button class="btn topSand" type="button" data-toggle="collapse" data-target="#locationcollapseExample" aria-expanded="false" aria-controls="locationcollapseExample">
				    Location <i class="material-icons" style="float: right;">arrow_drop_down</i>
				  </button>

				  <div class="locationShow" id="locationcollapseExample">
					  <form>
						  <div class="form-group">
						    <input type="text" class="form-control locationSearcher" placeholder="Search a location">
						  </div>
						</form>

                        @foreach($locations as $loci =>$count)
                        <label class="containers">&emsp;{{ $loci }}( {{ $count }})
                            <input type="checkbox" onchange="filterByLocation('{{ $loci }}');" value="{{ $loci }}">
                            <span class="checkmark"></span>
                        </label>
                        @endforeach

						<a href="#" class="all">see all</a>
					  
					</div>



					<button class="btn topSand" type="button" data-toggle="collapse" data-target="#categorycollapseExample" aria-expanded="false" aria-controls="categorycollapseExample">
				    Service Category <i class="material-icons" style="float: right;">arrow_drop_down</i>
				  </button>

				  <div class="locationShow" id="categorycollapseExample">
					  <form>
						  <div class="form-group">
						    <input type="text" class="form-control locationSearcher" placeholder="Search a Category">
						  </div>
						</form>
						
						
                        @foreach($categories as $k => $category)
                        <label class="containers">&emsp;{{ $category['name'] }}( {{ $category['count'] }})
                            <input type="checkbox" onchange="filterByCategory('{{ $k }}');" value="{{ $k }}">
                            <span class="checkmark"></span>
                        </label>
                        @endforeach

						<a href="#" class="all">see all</a>
					  
					</div>





				 <button class="btn topSand" type="button" data-toggle="collapse" data-target="#pricecollapseExample" aria-expanded="false" aria-controls="pricecollapseExample">
				    Price <i class="material-icons" style="float: right;">arrow_drop_down</i>
				  </button>

				  <div class="locationShow" id="pricecollapseExample">
					  

                        <label class="containers">&emsp;15,000 - 20,000
                            <input type="checkbox" onchange="filterByPrice(15000, 20000);">
                            <span class="checkmark"></span>
                        </label>
            
                        <label class="containers">&emsp;10,000 -15,000
                            <input type="checkbox" onchange="filterByPrice(10000, 15000);">
                            <span class="checkmark"></span>
                        </label>
            
                        <label class="containers">&emsp;5,000 - 10,000
                            <input type="checkbox" onchange="filterByPrice(5000, 10000);">
                            <span class="checkmark"></span>
                        </label>
            
                        <label class="containers">&emsp;1,000 - 5,000
                            <input type="checkbox" onchange="filterByPrice(1000, 5000);">
                            <span class="checkmark"></span>
                        </label>
            
                        <label class="containers">&emsp;0 - 1,000
                            <input type="checkbox" onchange="filterByPrice(0, 1000);">
                            <span class="checkmark"></span>
                        </label>								
                        <a href="#" class="all">see all</a>
					</div>


			</div>



			<div class="col-md-9">
				<div class="col-md-12">
					<div class="row fat">
						<div class="col-md-12">
							<h5>search result for " {{ request()->input('search') }} "</h5>

							<span>{{ $services->count() }} Search result</span>
						</div>
						
					</div>



                    @foreach( $services as $service )
                    
					<!-- vendors listing -->
					<div class="col-md-12 venor">
						<div class="row">
							
    							<div class="col-md-2">
    								<img src="/img/{{ $service->user->profile->profile_picture }}" alt="...">
    							</div>
    
    							<div class="col-md-8">
    								<span>
    								    <a href="{{ route('profile', ['user'=>$service->user, 'service'=>$service] ) }}">{{ $service->user->name() }}</a>
    								</span>
    								<p class="statement">
    								    
    									{{ $service->service_description }}
    									
    								</p>
    
    								<p class="statement"><i class="material-icons vote">star</i> 4.0 (67 clients) </p>
    							</div>
    
    							<div class="col-md-2 text-center">
    							    <p class="statement">
    							    @if( $service->user->merchant->available )
                                        <span class="dot"></span> Available 
                                    @else <span class="dot" style="background-color: red;"></span> Not Available @endif </p>
    								<p class="price">&#8358; {{ number_format( $service->price, 2 ) }} </p>
    								
    								<form action="{{ route('profile', ['service'=>$service, 'user'=>$service->user] ) }}" method="get">
    								    <button type="submit" class="btn btn-block">CONTACT</button>
    								</form>
    							</div>	
								
				
								
							</div>
						</div>

					<!--vendor -->
					<!-- vendors listing -->
					
			        @endforeach

					<!-- pagination -->
					{{--
					<nav aria-label="Page navigation example">
					  <ul class="pagination justify-content-end">
					    <li class="page-item active"><a class="page-link" href="#">1</a></li>
					    <li class="page-item"><a class="page-link" href="#">2</a></li>
					    <li class="page-item"><a class="page-link" href="#">3</a></li>
					    <li class="page-item"><a class="page-link" href="#">4</a></li>
					    <li class="page-item"><a class="page-link" href="#">...</a></li>
					  </ul>
					</nav>
					--}}
					
					<!-- pagination -->
					<nav aria-label="Page navigation example">
						@if( isset($location) )								
							 {{ $services->withPath('searchlawyer/')->appends(['search' => $q, 'location'=> $location])->links() }}
						@else
						     {{ $services->withPath('searchlawyer/')->appends([ 'search' => $q])->links() }}
						@endif
					</nav>					

					
				</div>
			</div>



		</div>

   	</div>
   </div>



@endsection

        
@section('scripts')
@include('includes/filter-script')
<script>
	$(document).ready(function() {
		
		$('.containers').click(function() {
		  if ($("input", this).is(':checked')) {
		      var loci = $(this).val();
		      filterByLocation( loci );
		  }
		});

	});
</script>
@endsection