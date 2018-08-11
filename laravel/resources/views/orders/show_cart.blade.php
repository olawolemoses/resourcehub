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
                                          <th scope="col">&nbsp;</th>
                                          <th scope="col">name</th>
                                          <th scope="col">quantity</th>
                                          <th scope="col" style="text-align:right">amount</th>
                                          <th scope="col">&nbsp;</th>
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
                                            N{{ number_format($item['price']/100,2) }}
                                              </td>
                                              <td><a href="{{ route('removefromcart', ['service'=>$item['itemID']]) }}">remove</a></td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        
                                        <tr>
                                          <td colspan="3">Total</td>
                                          <td>{{ $total_quantity }} </td>
                                          <td style="text-align:right">N{{ number_format($total_price/100,2) }}</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                      </tbody>
                                    </table>


                            <div class="row">
    							<div class="col-md-12">
    							    <form id="payment_form" action="{{ route('checkout') }}" method="get" accept-charset="UTF-8" class="form-horizontal" role="form">
    							        @csrf
    							        <button class="btn btn-success btn-sm btn-block" style="border-radius: 0px; padding-top: 12px; padding-bottom: 12px; margin-top:54px;">PROCEED TO CHECKOUT</button>
    							    </form>
    							    
                                </div>  
						</div>
						
                        </div>
						
					</div>
				</div>

			</div>
			
		</div>
		
    </div>