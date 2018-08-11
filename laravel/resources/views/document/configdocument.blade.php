@extends('layouts.layout')

@section('content')

<div class="container-fluid" style="padding: 0px;background: url('/img/document.png') no-repeat center center / cover;">
	
	<div class="ceremon">
		<div class="row">
			<div class="col-md-7">
				<h1>{{ $document->title }}</h1>
				<h4>{{ $document->description }}</h4>
			</div>
		</div>
		
	</div>

</div>

<div class="container">

	<div class="col-md-12" style="text-align:left">
	      <form action="{{ route('configdata', ['document'=>$document] ) }}" Class="row" id="payment_form" method="post" accept-charset="UTF-8" class="form-horizontal" role="form">@csrf
              <div id="build-wrap" style="width:100%"></div>
              <div class="col-md-12">
					<div class="row">
						<!-- <button type='submit' class="btn col-md-2 offset-md-8">SAVE FOR LATER</button> -->
							<button type="submit" class="btn col-md-2 neddy">PROCEED TO PAYMENT</button>
					</div>
 			 </div>
 		  </form>
	</div>
</div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="http://formbuilder.online/assets/js/form-builder.min.js"></script>
  <script src='https://formbuilder.online/assets/js/form-render.min.js'></script>
  <script>

    jQuery(function($) {
          var container = document.getElementById('build-wrap'),
            options = {
              container,
              formData: '@json($form)',
              dataType: 'json'
            };
          $(container).formRender(options);
        });
  </script>
@endsection