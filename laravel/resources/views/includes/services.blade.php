@include('includes.admin_header')
<div class="container" style="padding-top: 90px;">

	
	<h5>Category Management</h5>

	<div class="row">
		
			
		<div class="col-md-12">



			<form class="form-inline dp">
				
			  <div class="form-group col-md-4">
			    <label for="">Search a category &nbsp; </label>
			    <input type="text" class="form-control">
			  </div>

			  <div class="form-group col-md-4">
			    <a href="addcategory" style="color: #66ef46; font-size: 13px;text-decoration: none;"> + Add new category</a>
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
				      <td scope="col">S/N</td>
				      <td scope="col">CATEGORY TITLE</td>
				      <td scope="col">VENDORS IN CATEGORY</td>
				      <td scope="col">CLIENTS IN CATEGORY</td>
				      <td scope="col">ACTION</td>
				    </tr>
				  </thead>
				  <tbody>


				    <tr>
				    	<td>1</td>
				    	<td>Administration Law</td>
				    	<td>20</td>
				    	<td>0</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i data-toggle="modal" data-target="#deleteModal" class="fa fa-trash"></i></td>
				    </tr>

				   </tbody>
				</table>

				<!-- pagination -->
					<nav aria-label="The pagination box" class="page col-md-4 offset-md-4">
					  <ul class="pagination">
					    
					    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
					    <li class="page-item"><a class="page-link" href="#">2</a></li>
					    <li class="page-item"><a class="page-link" href="#">3</a></li>
					    <li class="page-item"><a class="page-link" href="#">4</a></li>
					    <li class="page-item"><a class="page-link" href="#">5</a></li>
					    
					  </ul>
					</nav>
		</div>
	</div>

</div>

@include('includes.admin_footer')