@include('includes.admin_header')
<div class="container" style="padding-top: 90px;">
@if(session('success'))
<div class='alert alert-success'>{{session('success')}}</div>
@endif
	<h5>Service Management</h5>
	<div class="row">
		
		<div class="col-md-6">
			<form class="" style="margin-bottom: 70vh;" method="POST" action="/addservice">
				@csrf
				
			<input type='hidden' name='user_id' value='{{Auth::user()->id}}' >
			  <div class="form-group">
			  	<label for="">Service Name</label>
			    <input type="text" class="form-control" placeholder="" name="service_name">
			  </div>

			  <div class="form-group">
			  	<label for="">Service Description</label>
			    <textarea name="service_description" id="" cols="30" rows="10" style="height: 150px;" class="form-control"></textarea>
			  </div>

			  <div class="form-group">
			  	<label for="">Service Category</label>
			    <select name="category_id" id="" class="form-control">
			        @foreach($categories as $category)
			    	<option value="{{$category->id}}">{{$category->category_name}}</option>
			    	@endforeach
			    </select>
			  </div>

			  <div class="form-group">
			  	<label for="">Price</label>
			    <input type="text" class="form-control" placeholder="" name="service_price">
			  </div>
              
              <div class="form-group">
			  	<label for="">Tags</label>
			    <input type="text" class="form-control" placeholder="" name="service_tags">
			  </div>

			  <button class="btn btn-success">CREATE SERVICE</button>
			  
			</form>

		</div>

	</div>

</div>

<style>
	label {
		 font-size: 14px;
	}

	form button.btn-success {
		 background: #66ef46;
		 color: #fff;
		 border: none;
	}
</style>

@include('includes.admin_footer')