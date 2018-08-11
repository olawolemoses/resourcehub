@extends('layouts.layout')
@section('content')
  <div class="container" style="margin-top: 100px;">
  	
		<div class="row">
			
			<div class="col-md-9">
				
				<div class="col-md-12 venor">
						<div class="row">
							<div class="col-4">
								<img src="/file/documents/uploaded/{{ $document->photo }}" alt="..." class="rounded-0" style="width: 100%;">
							</div>

							<div class="col-8">
								<h6>{{ $document->title }}</h6>
								<p class="statement">
                                    {{ $document->description }}
                                </p>
								
								<div class="row saver">
									<div class="col-7">
										<p>&emsp; &#8358; {{ number_format( $document->amount, 2 ) }} per copy</p>
										<p>&emsp;<i class="material-icons vote">star</i><span> {{ number_format( $document->averageRatings, 1 ) }} ({{ $document->totalRatings }})</span> </p>
									</div>	
									<div class="col-5">
										 <div class="form-group" style="padding: 20px; margin-right: 80px;">
										     <select class="form-control" id="exampleFormControlSelect1">
										      <option {{ ( $quantity == '1') ? 'selected': '' }}>1</option>
										      <option {{ ( $quantity == '2') ? 'selected': '' }}>2</option>
										      <option {{ ( $quantity == '3') ? 'selected': '' }}>3</option>
										      <option {{ ( $quantity == '4') ? 'selected': '' }}>4</option>
										      <option {{ ( $quantity == '5') ? 'selected': '' }}>5</option>
										    </select>
										  </div>
									</div>
								</div>
								
							</div>
						</div>
						
						
					</div>
					<!--vendor -->


					<div class="col-md-12" style="margin-top: 50px;font-size: 14px;">
						
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
					<div class="col-12 patch" style="padding-bottom: 16px; margin-bottom: 24px;">
						<h6>Summary</h6>
						<div class="row">
							<div class="col-6">Subtotal</div> <div class="col-6 right"> <strong>&#8358; {{ number_format( $document->amount * $quantity, 2 ) }} </strong> </div>
							<div class="col-6">Quantity</div> <div class="col-6 right"><strong>{{ $quantity }}</strong> </div>
						</div>
						<div class="row">&nbsp;</div>
						<br>
						<div class="row">
							<div class="col-6">Total</div> <div class="col-6 right"> <strong> &#8358; {{ number_format( $document->amount * $quantity, 2 ) }} </strong></div>						</div>
						<div class="row">&nbsp;</div>
						<div class="row">
							<div class="col-md-12">
							<form action="{{ route('pay') }}" method="post" accept-charset="UTF-8" class="form-horizontal" role="form">
                                @csrf
                                <input type="hidden" name="email" value="{{ auth()->user()->username}}"> {{-- required --}}
                                <input type="hidden" name="orderID" value="{{ $orderID }}">
                                <input type="hidden" name="amount" value="{{ $quantity * $document->amount * 100 }}"> {{-- required in kobo --}}
                                <input type="hidden" name="quantity" value="{{ $quantity }}">
                                <input type="hidden" name="metadata" value="{{ json_encode($array = ['doc_' . $document->id=> ['itemID' => 'doc_' . $document->id, 'orderID' => $orderID, 'quantity' => $quantity, 'price' => $document->amount*100,]]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                                <button class="btn btn-success btn-sm btn-block" style="border-radius: 0px; padding-top: 12px; padding-bottom: 12px; margin-top:54px;">PROCEED TO PAYMENT</button>
							</form>
							
							<form action="{{ route('add_doc_to_cart', ['document'=>$document->id]) }}" method="post" accept-charset="UTF-8" class="form-horizontal" role="form">
                            @csrf
                            <input type="hidden" id="payment_form-quantity" name="qty" value="1">
                            <input type="hidden" name="orderID" value="{{ $orderID }}">
                            <button type="submit" name="pay_now" class="btn myBtnColor" title="Hire">Add to Cart</button> <br />
                        </form>
                            </div>
						</div>
						
					</div>
					<br>
					<br>


					<div class="col-6">
                        <img src="/img/pay1.png" alt="">
                    </div> 
                    <div class="col-6">
                        <img src="/img/pay2.png" alt="">
                    </div>
					<div class="col-12">
                        <br><img src="/img/pay3.png" alt="" class="mx-auto d-block">
                    </div>
				</div>

			</div>

		</div>

  </div>




<style>
	.patch {
		background: #f9f9f9;
		font-size: 14px;
		padding-top: 50px;
		padding-bottom: 50px;
	}
	.right {
		text-align: right;
	}
</style>



@section('scripts')
<script>
	function getUrlPaths( refUrl )
    {
        var uri = URI(  refUrl );
		normalizeSearch = uri.query();
		return URI.parseQuery( normalizeSearch );	
    }

	$( function() {
		$('#exampleFormControlSelect1').on('change', function() {
			var newQty = this.value;
			var uri = URI(  location.href );
			var furi = uri.fragment(true);
			var lUrl = furi.origin() + '' + furi.pathname();
			queyrParts = getUrlPaths( location.href );
			query ="?qty=" + newQty;
			lUrl = lUrl + query;
			location.href =  lUrl;
		});
	});
</script>
@endsection