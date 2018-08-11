@extends('layouts.layout')
@section('content')
	<div class="container" style="margin-top: 20vh">
		
		<div class="col-md-4 offset-md-4 smart">
			<div class="hashHead text-center">
				<i class="fa fa-credit-card"></i>
				<p>
					Your payment was successful Thanks for using our services
				</p>
			</div>

			<div class="hashBody">
				<div class="row">
					<div class="col-12" style="text-align: right;">
						Reference<br>
						<strong>{{ $reference }}</strong>
                    </div>

					<div class="col-6">
						Billed to <br>
						<strong>{{ $customerName }}<br>
						{{ $customerEmail }}</strong>
					</div>

					<div class="col-6" style="text-align: right;">
						Payment date<br>
						<strong>{{ $datePaidAt }}</strong>
                    </div>
				</div>
				<div class="row">&nbsp;</div>

				<div class="row san">
					<div class="col-6">
						<u>Service</u><br>
						<strong>{{ $service->title }}</strong><br>
						
					</div>
					<div class="col-6" style="text-align: right;">
						Price<br>
						<strong>N{{ $amount }}</strong>
					</div>

					<div class="col-md-12">
						<hr>
					</div>

					<div class="col-6">Quantity</div>
										
					<div class="col-6" style="text-align: right;">
						<strong> {{ $quantity }} </strong>
					</div>

					<div class="col-md-12">
						<hr>
					</div>

					<div class="col-6">Amount Paid</div>

					<div class="col-6" style="text-align: right;">N{{ $amount }}</div>	
				</div>
			</div>
        </div>
        
        <div class="col-md-4 offset-md-4 smart">
            <form action="{{ route( 'document_profile', ['order'=>$order ] ) }}" method="post" accept-charset="UTF-8" class="form-horizontal" role="form">
                
                @csrf                
                <button class="btn btn-success btn-sm btn-block" style="border-radius: 0px; padding-top: 12px; padding-bottom: 12px; margin-top:54px;">PROCEED TO THE UNBLURRED DOCUMENT</button>
			</form>
			<br />
        </div>
		
	</div>




<style>

.smart {
	padding: 0px;
}
.hashHead {
	background: #502e7d;
	padding: 20px;
	color: #fff;
}
.hashHead p {
	font-size: 12px;
}
.hashHead i {
	font-size: 27px;
}
.hashBody {
	padding: 20px;
	font-size: 12px;
	background: #f9f9f9;
}
.san {
	padding-top: 20px;
	padding-bottom: 20px;
	width: 96%;
	margin-left: 2%;
	background: #ebebf2;
}
</style>

@endsection