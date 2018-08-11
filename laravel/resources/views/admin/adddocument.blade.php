@include('includes.admin_header')
<div class="container" style="padding-top: 90px;">

	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		    <h5>Add Document</h5>
		    <form method="POST" action="/adddocument">
		        @csrf
		        <input type="hidden" name="user_id"  value='{{Auth::user()->id}}'>
		        <div class="form-group">
		            <input type="text" name="document_name" class="form-control" placeholder="Document Name">
		        </div>
		        <div class="form-group">
		             <textarea cols="45" rows="10" name="document_description">
		             </textarea>
		        </div>
		         <div class="form-group">
		            <input type="text" name="document_price" class="form-control" placeholder="Document Price">
		        </div>
		        <div class="form-group">
		            <select class="form-control" name="document_category" placeholder='Document Category' >
		                @foreach($categories as $category)
		                <option value="{{$category->id}}">{{$category->category_name}}</option>
		                @endforeach
		            </select>
		        </div>
		         <div class="form-group">
		            <input type="text" name="document_tags" class="form-control" placeholder="Tags">
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