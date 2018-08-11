
@extends('layouts.layout')

@section('content')

<div class="container-fluid" style="padding-top: 80px;background: #f5f5f5;min-height: 100vh;">
	
<div class="container">
	<div class="row">
		
		<div class="col-md-3 proCap" style="padding: 0;">

			<div class="row">
				<div class="col-md-6">
				<img src="/picture/{{ $profile_pic }}" class="mx-auto d-block profilePic" />
				</div>
				<div class="col-md-6" style="padding: 7px;padding-top: 15px;">
					<span>
					    @if( !is_null( $merchant->store_name ) )
					    {{ $merchant->store_name }}
					    @else
					    {{ $merchant->firstname }} {{ $merchant->lastname }}
					    @endif
					    </span>
					<p><a href="{{ route('showPicture', ['user' => $user]) }}">change photo</a>
					</p>
				</div>

				<button class="btn">ADD A SERVICE</button>


				


			</div>


			<style>
				.menuBit2 {
					 width: 100%;
				}
				.menuBit2 a:hover, .menuBit2 a.active {
					width: 100%;
					border-radius: 0;
					background: #502e7d;
					color: #fff;
					border: none;
					border-left: 3px solid #d3bfec;


				}
				.menuBit2 a {
					border-radius: 0;
					background: #63438e;
					color: #d3bfec;
				}
			</style>



			<div class="list-group menuBit2">
                <a href="{{ route('merchant_index',['user'=>$user]) }}" class="list-group-item list-group-item-action active"> Dashboard</a>
                <!--<a href="#" class="list-group-item list-group-item-action"> Appointments</a>-->
                <!--<a href="usermanage" class="list-group-item list-group-item-action"> Revenue</a>-->
                <a href="{{ route('merchant_orders',['user'=>$user]) }}" class="list-group-item list-group-item-action"> Order</a>
                <a href="{{ route('merchant_services', ['user'=>$user]) }}" class="list-group-item list-group-item-action"> Services</a>
                <a href="{{ route('merchant_issues', ['user'=>$user]) }}" class="list-group-item list-group-item-action"> Issues</a>
                <a href="{{ route('merchant_update', ['user'=>$user]) }}" class="list-group-item list-group-item-action"> Profile</a>
              </div>



			
			
		</div>

		<div class="col-md-9 proTap" style="padding: 0;padding-top: 0;">
			
				
				<h5 style="font-weight: normal;background: #ebebf2;font-size: 15px;padding: 17px;font-weight: 500;">NEW SERVICE</h5>

				<div class="col-md-12">
					
					<form method="POST" action="{{ route('merchant_new_service', ['merchant' => $merchant] ) }}" enctype="multipart/form-data">
                        @csrf
						<div class="col-md-12">
							<div class="col-md-6">
								  <div class="form-group">
								    <label for="">Service Name</label>
								    <input name="service_name" value="{{ old('service_name') }}" type="text" class="form-control" placeholder="">
								  </div>

								  <div class="form-group">
								    <label for="">service_description</label>
								    <input type="text" name="service_description" class="form-control" placeholder="" value="{{ old('service_description') }}">
								  </div>


								  <div class="form-group">
								    <label for="">tags</label>
								    <input type="text" name="tags" value="{{ old('tags') }}" class="form-control" placeholder="" >
								  </div>


								  <div class="form-group">
								    <label for="">category_id</label>
								    <input type="text" name="category_id" value="{{ old('category_id') }}" class="form-control" placeholder="" >
								  </div>


								  <div class="form-group">
								    <label for="">price</label>
								    <input name="price" value="{{ old('price')  }}" type="text" class="form-control" placeholder="" >
								  </div>								  
								  
								  <div class="form-group">
								    <label for="">service_photo_image</label>
								    <input name="service_photo_image" value="{{ old('service_photo_image') }}" type="file" class="form-control" placeholder="" >
								  </div>
							
							</div>
							<div class="col-md-6"></div>
						</div>
					  
					  	<div class="col-md-4" style="margin-left: 20px;">
					  		<button type="submit" class="btn btn-block" style="background: #6cd852;color: #fff;margin-bottom: 30px;">SAVE </button>
					  	</div>
					  
					</form>

				</div>


		</div>

	</div>
</div>
</div>

@endsection
