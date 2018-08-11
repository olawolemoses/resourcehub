@include('includes.admin_header')

<div class="modal fade col-md-6 offset-md-3" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
    
     <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal">
          
       <form action="/category-delete" method="get" id="delete-user-form" >
         @csrf
         <input type="hidden" name="category_id" id="category_id" value="">
       <p> Are You sure you want to delete this category </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn closeDia remove-data-from-delete-form" data-dismiss="modal">Cancel</button>
        <button type="submit"   class="btn actionDia" > Delete</button>
       
      </div>
      </form>
    </div>
  </div>
</div>

<div class="container" style="padding-top: 90px;">

	<h5>Category Management</h5>
<div class="form-group col-md-4">
			    <a href="/addcategory" style="color: #66ef46; font-size: 13px;text-decoration: none;"> + Add new category</a>
			  </div>
	<div class="row">
		
			
		<div class="col-md-12">

			<form class="form-inline dp" method="GET" action="/category-search">
				@csrf
			  <div class="form-group col-md-4">
			    <label for="">Search a category &nbsp; </label>
			    <input type="text" class="form-control" name="category">
			  </div>
			  <div class="form-group col-md-4">
			    
			  </div>
			  
			</form>

		</div>

	</div>

	<div class="row">
		<div class="col-md-12">	


				<table class="table table-striped ned">
				  <thead>
				    <tr>
				      <th scope="col">CATEGORY NAME</th>
				      <th scope="col">CATEGORY DESCRIPTION</th>
				      <th scope="col">SERVICES COUNT</th>
				      <th scope="col">ACTION</th>
				    </tr>
				  </thead>
				  <tbody>
				   @if(count($categories) > 0)   

                   @foreach($categories as $category)
				    <tr>
				    	<td>{{ $category->category_name}}</td>
				    	<td>{{ $category->category_description}}</td>
				    	<td>{{count($categories)}}</td>
				    	<td> <a href="/editcategory/{{$category->id}}"><i class="fa fa-edit"></i></a> &emsp; <i data-toggle="modal" data-target="#deleteModal" class="fa fa-trash" data-category_id ="{{$category->id}}"></i></td>
				    </tr>
                 @endforeach
                 @else
                 <tr>
                     <td colspan="4">{{"No Results"}}</td>
                 </tr>
                 @endif
				   </tbody>
				</table>


				<!-- pagination -->
					<nav aria-label="The pagination box" class="page col-md-4 offset-md-4">
					  <ul class="pagination">
					    
					  
					    
					  </ul>
					</nav>


		</div>
	</div>


</div>

<script>
        $('#deleteModal').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)
            var category_id = button.data('category_id')
            var modal = $(this)
            modal.find('.modal-body #category_id').val(category_id)
           // $('#delete-user-form').attr('action',"user/"+user_id)
        })
        
    //  $('.delete-user').on('click', function () {
    //$('#delete-user-form').attr('action', $(this).data('user_id'));
</script>

@include('includes.admin_footer')
