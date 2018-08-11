@extends('layouts.new_layout')
@section('content')
<div class="container" style="margin-top: 130px;margin-bottom: 70px;">
    	
  			<div class="row case">
  				
                   <div class="col-md-5">
                       <div class="topHead">Item</div>
                       <div class="bottomHead">{{ $document->title }}</div>
                   </div>
                   <div class="col">
                        <div class="topHead">Price</div>
                       <div class="bottomHead">{{ number_format( $document->amount, 2 ) }}</div>
                   </div>
                   <div class="col">
                        <div class="topHead">Quantity</div>
                       <div class="bottomHead">1</div>
                   </div>
                   <div class="col">
                         <div class="topHead">Total</div>
                         <div class="bottomHead">NGN {{ number_format( $document->amount, 2 ) }}</div>
                   </div>

              </div>
              
              <div class="row case" style="border-top:none;">

                    <div class="col-md-4 offset-md-8">
                        <div class="row">
                            <div class="col-6" style="text-align:right;">
                                <p>Sub total</p>
                                <p>Sales Tax</p>
                                <p>Shipping charge</p>
                                <p>Total amount</p>
                            </div>
                            <div class="col-6" style="color:#5e5e5e;">
                                <p>NGN {{ number_format( $document->amount, 2 ) }}</p>
                                <p>NGN 0.00</p>
                                <p>NGN 0.00</p>
                                <p style="color:#707bea;font-weight:600;">NGN {{ number_format( $document->amount, 2 ) }}</p>
                            </div>
                        </div>
                    </div>

              </div>


            <form id="payment_form" action="{{ route('pay') }}" method="post" accept-charset="UTF-8" class="form-horizontal" role="form">
               <div class="row case" style="border-top:none;">

                <div class="col-md-4 offset-md-8" style="padding-top:50px;padding-bottom:50px;">
                    <div class="row">
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
                            <button class="btn col-7" style="background:#707bea;color:#fff;">PROCEED TO CHECKOUT</button>
                    </div>
                </div>

                </div>
            </form>

    </div>
	


<style>
    .case button {
        font-size: 11px;
        border-radius: 3px;
        -webkit-border-radius: 3px;
        height: 40px;
    }
    .col-6 {
        font-size: 14px;
        padding: 50px 10px;
    }
    body {
        background: #f7f8fa;
    }
    .case {
        color: #9b9b9b;
        background: #fff;
        border: 1px solid #ebebf2;
        
        padding: 0;
    }
    .case .col-md-5, .case .col {
        padding: 0;
        margin: 0;
    }
    .case .topHead {
        background: #f5f5f5;
    }
    .bottomHead {
        border-bottom: 1px solid #ebebf2;
    }
    .topHead, .bottomHead {
        padding: 30px;
        font-size: 14px;
    }
</style>
@endsection