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
   	  	   <a href="">Home</a> | <a href="">Legal document</a> 
   	  </div>
</div>



   <div class="container">
   	
		<div class="col-md-12 whitepaper">
			 <iframe src="{{ route('configdata2') }}" style="width:100%" height="800px" scrolling="no" frameborder="0"></iframe>
		</div>


        <div class="col-md-12" style="text-align:right">
        	<form class="row" id="payment_form" action="{{ route('document_checkout', ['document'=>$document] ) }}" method="post" accept-charset="UTF-8" class="form-horizontal" role="form">
                @csrf
        		<!-- <button class="btn col-md-2 offset-md-8">SAVE FOR LATER</button> -->
        		<button type="submit" class="btn col-md-2 neddy">Download</button>
        	</form>
        </div>

   </div>

@endsection