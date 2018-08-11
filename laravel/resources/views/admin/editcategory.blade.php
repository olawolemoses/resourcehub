@include('includes.admin_header')
<div class="container" style="padding-top: 90px;">

	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		    @include('includes.admin.status')
		    <h5>Edit Category</h5>
		    <form method="POST" action="/categoryupdate">
		        @csrf
		        <input type='hidden' name="category_id" value='{{$category->id}}'>
		        <div class="form-group">
		            <input type="text" name="category_name" class="form-control" placeholder="Category Name" value="{{$category->category_name}}">
		        </div>
		        <div class="form-group">
		             <textarea cols="45" rows="10" name="category_description">
		              {{$category->category_description}} 
		             </textarea>
		        </div>
		        <div class="form-group">
		            <select class="form-control" name="status" >
		               <option value='1' class=@if($category->status == 1){{'selected'}})@endif>Active</option>
		               <option value='0' class=@if($category->status == 0){{'selected'}})@endif>Inactive</option>
		            </select>
		        </div>
		        <div class="form-group">
		            <input type="Submit" value="Update Category" class="btn btn-success">
		        </div>
		    </form>
		</div>
        <div class="col-md-4"></div>
	</div>

</div>
@include('includes.admin_footer')