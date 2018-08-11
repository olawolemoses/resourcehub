@extends('layouts.layout')
@section('content')
  <div class="container" style="margin-top: 100px;">
  	
		<div class="row">
		    
		    <div class="col-md-12">
				
				    <div class="row">
                        <div class="col-12 patch" style="padding-bottom: 16px; margin-bottom: 24px;">
                                    <p style="text-align:right">
                                        <a href="{{ route('clearcart') }}">empty</a>
                                    </p>                        
                                <table class="table" style="text-align:left">
                                      <thead>
                                          
                                        <tr>
                                          <th scope="col">#code</th>
                                          <th scope="col">name</th>
                                          <th scope="col">quantity</th>
                                          <th scope="col" style="text-align:right">amount</th>
                                        </tr>
                                      </thead>
                                      
                                      <tbody>
                                          @if(!empty($data) )
                                              @php ($i = 1)
                                              @foreach($data as $item)
                                            <tr>
                                              <td scope="row">
                                                    {{ $i++ }}
                                              </td>
                                              <td><img src="{{ $item['item_pic'] }}" width="50px" /></td>
                                              <td>{{ $item['name'] }}</td>
                                              <td>
                                                  {{ $item['quantity'] }}
                                              </td>
                                              <td style="text-align:right">
                                            N{{ number_format($item['price'] / 100,2) }}
                                              </td>
                                              
                                            </tr>
                                            @endforeach
                                        @endif
                                        
                                        <tr>
                                          <td colspan="3">Total</td>
                                          <td>{{ $total_quantity }} </td>
                                          <td style="text-align:right">N{{ number_format($total_price/100,2) }}</td>
                                        </tr>
                                      </tbody>
                                    </table>


                            <div class="row">
    							<div class="col-md-12">
    							    <form id="payment_form" action="{{ route('pay') }}" method="post" accept-charset="UTF-8" class="form-horizontal" role="form">
    							        
                                    @csrf
                                    <input type="hidden" name="email" value="{{ auth()->user()->username}}"> {{-- required --}}
                                    
                                    <input type="hidden" id="payment_form-amount" name="amount" value="{{ $total_price }}"> {{-- required in kobo --}}
                                    <input type="hidden" id="payment_form-quantity" name="quantity" value="{{ $total_quantity }}">
                                    <input type="hidden" id="payment_form-metdata" name="metadata" value="{{ json_encode($array = ['orders' => $data]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                    <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                                    <button class="btn btn-success btn-sm btn-block" style="border-radius: 0px; padding-top: 12px; padding-bottom: 12px; margin-top:54px;">PROCEED TO PAYMENT</button>
    			
    			                    </form>
                                </div>  
						</div>
						
                        </div>
						
					</div>
				</div>

			</div>
			
		</div>
		
    </div>