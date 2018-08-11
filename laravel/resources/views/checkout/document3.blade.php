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





  <div class="container" style="margin-top: 100px;">
  	
		<div class="row">
			
			<div class="col-md-9">
				
				<!-- vendors listing -->

					<div class="col-md-12 venor">
						<div class="row">
							
							<div class="col-md-2">
								<img src="/img/{{ $document->photo }} " alt="...">
							</div>

							<div class="col-md-8">
								<span>{{ $document->title }}</span>
								<p class="statement">
									We are a full-service business, litigation and probate law firm with offices in victoria island , Lagos. The firm's seven attorneys have decades of extensive experience in litigation, business...
								</p>

								<p class="statement"><i class="material-icons vote">star</i> 4.0 (67 clients) </p>
							</div>

							<div class="col-md-2 text-center">
							    <p class="statement"><span class="dot"></span> Available</p>
								<p class="price">&#8358; {{ number_format( $document->amount, 2 ) }}</p>
									
								
							</div>	
								
				
								
							</div>
						</div>
			
					<!--vendor -->


					<div class="col-md-12 terms">
						
						 <p>
								<h6>TERMS OF SERVICE</h6>

								<ul class="nego">
									<li>Earned distinction as one of the firm’s highest producers as well as one of its youngest associates entrusted with handling high-profile cases with substantial client exposure and the potential for negative publicity.</li>
									<li>Partner with corporate clients’ in-house legal teams to provide vigorous defense against lawsuits/legal actions alleging antitrust violations, product liability, catastrophic personal injury and wrongful death. Prepare and manage cases proceeding to trial in Lagos and Abuja and guide settlement negotiations.</li>
									<li>Partner with corporate clients’ in-house legal teams to provide vigorous defense against lawsuits/legal actions alleging antitrust violations, product liability, catastrophic personal injury and wrongful death. Prepare and manage cases proceeding to trial in Lagos and Abuja and guide settlement negotiations.</li>
									<li>Partner with corporate clients’ in-house legal teams to provide vigorous defense against lawsuits/legal actions alleging antitrust violations, product liability, catastrophic personal injury and wrongful death. Prepare and manage cases proceeding to trial in Lagos and Abuja and guide settlement negotiations.</li>
									<li>Partner with corporate clients’ in-house legal teams to provide vigorous defense against lawsuits/legal actions alleging antitrust violations, product liability, catastrophic personal injury and wrongful death. Prepare and manage cases proceeding to trial in Lagos and Abuja and guide settlement negotiations.</li>
								</ul>
							</p>

					</div>

			</div>



			<div class="col-md-3">
				
				<div class="row">

					<div class="col-12 patch">
						<h6>Summary</h6>
						<div class="row">
							<div class="col-6">Subtotal</div> <div class="col-6 right"> <strong>N {{ number_format( $document->amount, 2 ) }}</strong> </div>
							<div class="col-6">Quantity</div> <div class="col-6 right"><strong>1</strong> </div>
						</div>

						<hr class="divider">	
						

						<div class="row">
							<div class="col-6">Total</div> <div class="col-6 right"> <strong>N {{ number_format( $document->price, 2 ) }}</strong></div>
						</div>
						
						<div class="row">
						    <form id="payment_form" action="{{ route('pay') }}" method="post" accept-charset="UTF-8" class="form-horizontal" role="form">
                                @csrf
                                
                                @php
                                    $orderID =  Paystack::genTranxRef();
                                    $quantity = 1;
                                @endphp
                            
                                <input type="hidden" name="email" value="{{ auth()->user()->username}}"> {{-- required --}}
                                <input type="hidden" name="orderID" value="{{ $orderID }}">
                                <input type="hidden" name="amount" value="{{ $quantity * $document->amount * 100 }}"> {{-- required in kobo --}}
                                <input type="hidden" name="quantity" value="{{ $quantity }}">
                                <input type="hidden" id="payment_form-metdata" name="metadata" value="{{ json_encode($array = ['orders' => [ 'doc_' . $document->id => ['itemID' => 'doc_' . $document->id, 'name' => $document->title, 'orderID' => $orderID, 'quantity' => $quantity, 'price' => $document->amount * 100,]]]) }}" > 
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                                <button class="btn btn-success btn-sm btn-block" style="border-radius: 0px; padding-top: 12px; padding-bottom: 12px; margin-top:54px;">PROCEED TO PAYMENT</button>
                            </form>
						</div>
						
					</div>


					<div class="col-12 patch">	
						<div class="row">	
								<div class="col-6"><img src="/img/pay1.png" alt=""></div> 
								<div class="col-6"><img src="/img/pay2.png" alt=""></div>
							<div class="col-12"><br><img src="/img/pay3.png" alt="" class="mx-auto d-block"></div>
						</div>
							
					</div>


					
				</div>

			</div>

		</div>

  </div>
  @endsection