
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
				
			<form method="POST" action="{{ route('merchant_fulfill_order', ['user' => $user, 'order'=>$order] ) }}"
                enctype="multipart/form-data">
                
                @csrf
                                     
                
<hr />                        

                <div class="form-group row">
                    <label for="store_name" class="col-md-4 col-form-label text-md-right">Short Description</label>
                    <div class="col-md-6">
                        <textarea id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required autofocus></textarea>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="store_namfilenamee_url" class="col-md-4 col-form-label text-md-right">Filename</label>
                    <div class="col-md-6">
                        <input id="filename" type="file" class="form-control{{ $errors->has('filename') ? ' is-invalid' : '' }}" name="filename" value="{{ old('filename')}}" required autofocus>

                        @if ($errors->has('filename'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('filename') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="store_about_us" class="col-md-4 col-form-label text-md-right">Status</label>
                    <div class="col-md-6">
                        <select id="status" type="text" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" required autofocus>
                            <option value="0">Not Started</option>
                            <option value="1">Processing</option>
                            <option value="2">Fulfilled</option>
                        </select>

                        @if ($errors->has('status'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
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
