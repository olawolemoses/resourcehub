@extends('layouts.new_layout')
@section('content')
  <div class="container-fluid headCat" style="margin-top: 50px;">
  	 <div class="back">
  	 	<div class="back2">
  	 		
  	 	
  	 	 
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h4>Quality lawyers at your fingertips</h4>
						<p>Fusce vehicula dolor arcu, sit amet blandit dolor mollis nec. Donec <br>viverra eleifend lacus, </p>
					</div>

					<div class="col-md-6" style="padding-bottom: 80px;">
					    <form method="GET" action="{{ route('searchlawyer') }}">
    						<div class="input-group mb-3">
    						    
        							<div class="input-group-prepend">
        							    <span class="input-group-text" id="basic-addon1" style="background: #fff;border: none;"> <i class="fa fa-search"></i></span>
        						    </div>
    							  
                						  
        						  <input type="text" name="search" id="search" class="form-control" placeholder="Search by category" aria-label="Recipient's username" aria-describedby="basic-addon2">
        						  <div class="input-group-append">
        						    <button class="btn" type="submit">SEARCH</button>
        						  </div>
                						  
    						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
  	 </div>
  </div>


  <div class="container" style="padding-top: 40px;">
  	  <div class="row">

            @foreach($arrs as $k => $arr)
                <div class="col-md-3 cat">
    				<h2>{{ $k }}</h2>
    				@foreach( $arr as $dept )
    				    <p><a href="{{ route('searchlawyer', ['search' => $dept->category_name ]) }}">{{ $dept->category_name }}</a></p>
    				@endforeach
    			</div>
    		@endforeach

  	  </div>
  </div>







<style>
	
</style>

@endsection

        
@section('scripts')
<script>
  $(document).ready(function() {
      
        $('#findalawyer').click(function() {
            
            window.location="{{ route('findalawyer') }}";
        });


  });
</script>
@endsection