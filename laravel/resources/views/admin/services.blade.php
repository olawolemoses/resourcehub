@include('includes.admin_header')
<div class="modal fade col-md-6 offset-md-3" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
    
     <h5 class="modal-title" id="exampleModalLabel">Delete Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal">
          
       <form action="/deleteservice" method="get" id="delete-user-form" >
         @csrf
         <input type="hidden" name="service_id" id="service_id" value="">
       <p> Are You sure you want to delete this service </p>
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
@include('includes.admin.status')
	<h5>Services Management</h5>
	<div class="row">
		<div class="col-md-12">
			<form class="form-inline dp" method='get' action='/searchservice'>
				
			  <div class="form-group col-md-4">
			    <label for="">Search By Service Name &nbsp; </label>
			    <input type="text" class="form-control" name="service">
			  </div>

			  <div class="form-group col-md-4">
			    <a href="/addservice" style="color: #66ef46; font-size: 13px;text-decoration: none;"> + Add new services</a>
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
				      <th scope="col">NAME</th>
				      <th scope="col">CATEGORY</th>
				      <th scope="col">PRICE</th>
				      <th scope="col">TAGS</th>
				      <th scope="col">ACTION</th>
				    </tr>
				  </thead>
				  <tbody>
                  @foreach($services as $service)
                  <tr>
                      <td>{{$service->service_name}}</td>
                      <td>{{$service->category->category_name}}</td>
                      <td> ₦{{$service->price}}</td>
                      @if(count($service->tags) > 1)
                      <td>{{$service->tags}},</td>
                      @else
                      <td>{{$service->tags}}</td>
                      @endif
                      <td><a href="/editservice/{{$service->id}}"><i class="fa fa-edit"></i></a> &emsp; <i data-toggle="modal" data-target="#deleteModal" class="fa fa-trash" data-service_id ="{{$service->id}}"></i></td>
                  </tr>
                  @endforeach
				   </tbody>
				</table>

				<!-- pagination -->
					<nav aria-label="The pagination box" class="page col-md-4 offset-md-4">
					  <ul class="pagination">
					    {{$services->links()}}
					  </ul>
					</nav>
		</div>
	</div>

</div>
<script>
         $('#deleteModal').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)
            var service_id = button.data('service_id')
            var modal = $(this)
            modal.find('.modal-body #service_id').val(service_id)
         })
</script>

@include('includes.admin_footer')