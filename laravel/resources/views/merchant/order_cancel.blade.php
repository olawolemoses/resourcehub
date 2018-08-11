
@extends('layouts.layout')

@section('content')
<div class="container-fluid" style="padding-top: 80px;background: #f5f5f5;min-height: 100vh;">
	
	<div class="container">
		<div class="row">
			
			<div class="col-md-3 proCap">
				@include('includes.merchant_profile')
			</div>

			<div class="col-md-9 proTap">			
				


			<div class="col-md-12">
    			<form method="POST" action="{{ route('merchant_order_cancel', ['user' => $user, 'order'=>$order] ) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <hr />
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Merchant Explanation</label>
                        <div class="col-md-6">
                            <textarea id="explanation" type="text" class="form-control{{ $errors->has('explanation') ? ' is-invalid' : '' }}" name="explanation" required autofocus>
                                
                            </textarea>
    
                            @if ($errors->has('description'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('explanation') }}</strong>
                            </span>
                            @endif
                            
                            <input type="radio" name="status" value="4" /> Accept
                            
                            <input type="radio" name="status" value="5" /> Cancel
                            
                        </div>
                    </div>
    
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
			</div>
			
				</form>

				<br />
			</div>
		</div>
	</div>
</div>

@endsection
