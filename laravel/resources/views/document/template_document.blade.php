@extends('layouts.layout')

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
   	  	   <a href="/">Home</a> | Legal document
   	  </div>
</div>



   <div class="container">
   	
		<div class="col-md-12 whitepaper">
		    @if( isset($orderDocument) )
			 <iframe src="{{ route('configdata_show', ['document'=>$document, 'order'=>$orderDocument] ) }}" style="width:100%" height="800px" scrolling="no" frameborder="0"></iframe>
			@else
			 <iframe src="{{ route('configdata2', ['document'=>$document]) }}" style="width:100%" height="800px" scrolling="no" frameborder="0"></iframe>
            @endif			
		</div>


        <div class="col-md-12" style="text-align:right">
            @if( isset($orderDocument) )
        	<form class="row" id="payment_form" action="{{ route('configdata_show', ['document'=>$document, 'order'=>$orderDocument] ) }}" method="get" accept-charset="UTF-8" class="form-horizontal" role="form">
        		<!-- <button class="btn col-md-2 offset-md-8">SAVE FOR LATER</button> -->
        		<button type="submit" class="btn col-md-2 neddy">Download</button>
        	</form>   
            @else
        	<form class="row" id="payment_form" action="{{ route('document_checkout', ['document'=>$document] ) }}" method="post" accept-charset="UTF-8" class="form-horizontal" role="form">
                @csrf
        		<!-- <button class="btn col-md-2 offset-md-8">SAVE FOR LATER</button> -->
        		<button type="submit" class="btn col-md-2 neddy">PROCEED TO PAYMENT</button>
        	</form>
        	@endif
        	
        </div>

   </div>

@endsection