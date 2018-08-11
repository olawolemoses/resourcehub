@include('includes.admin_header')
<div class="container" style="padding-top: 90px;">

	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		    <h5>Add Category</h5>
		      @include('includes.admin.status')
		    <form method="POST" action="/addcategory">
		        @csrf
		        <div class="form-group">
		            <input type="text" name="category_name" class="form-control" placeholder="Category Name">
		        </div>
		        <div class="form-group">
		             <textarea cols="45" rows="10" name="category_description">
		             </textarea>
		        </div>
		        <div class="form-group">
		            <select class="form-control" name="status" >
		                <option value="1">Active</option>
		                <option value="0">Inactive</option>
		            </select>
		        </div>
		        <div class="form-group">
		            <input type="Submit" value="Create Category" class="btn btn-success">
		        </div>
		    </form>
		</div>
        <div class="col-md-4"></div>
	</div>

</div>
@include('includes.admin_footer')