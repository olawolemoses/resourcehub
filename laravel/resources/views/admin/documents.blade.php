@include('includes.admin_header')
<div class="container" style="padding-top: 90px;">
	<h5>Document Management</h5>
	
	<div class="row">
		<div class="col-md-12">
			<form class="form-inline dp" action="/searchdocuments" method="get">
			  <div class="form-group col-md-4">
			    <label for="">Search the documents &nbsp; </label>
			    <input type="text" class="form-control" name="searchdocuments">
			  </div>

			  <div class="form-group col-md-4">
			    <a href="adddocument" style="color: #66ef46; font-size: 13px;text-decoration: none;"> + Add new document</a>
			  </div>
			  <div class="form-group col-md-4">
			  </div>
			</form>
			@include('includes.admin.status')
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">	


				<table class="table table-striped ned">
				  <thead>
				    <tr>
				      <th scope="col">NAME</th>
				      <th scope="col">CATEGORY</th>
				      <th scope="col">PRICE</th>
				      <th scope="col">OWNER</th>
				      <th scope="col">ACTION</th>
				    </tr>
				  </thead>
				  <tbody>
				  @foreach($documents as $document)
                  <tr>
                      <td>{{$document->title}}</td>
                      <td>{{$document->title}}</td>
                      <td> ₦{{$document->amount}}</td>
                      <td>{{$document->author_name}}</td>
                      <td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i data-toggle="modal" data-target="#deleteModal" class="fa fa-trash"></i></td>
                  </tr>
                   @endforeach


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
					    
					    {{$documents->links()}}
					    
					  </ul>
					</nav>
		</div>
	</div>
</div>

@include('includes.admin_footer')