<?php include("header.php"); ?>





<div class="modal fade col-md-6 offset-md-3" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete luxury lawyer’s account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         account icluding all your publicatons and statistics will be gone. they cannot be retrived. please 
click the cancel button to discard
      </div>
      <div class="modal-footer">
        <button type="button" class="btn closeDia" data-dismiss="modal">Cancel</button>
        <button type="button" data-toggle="modal" data-target="#deletedModal" data-dismiss="modal" class="btn actionDia">Delete</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade col-md-6 offset-md-3" id="deletedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        You have successfully deleted luxury lawyer

        <i class="fa fa-trash text-center" style="font-size: 50px;width: 100%; margin-top: 40px;margin-bottom: 30px; color:#63438e;"></i>
      </div>
      
    </div>
  </div>
</div>





<div class="container" style="padding-top: 90px;">

	
	<h5>Order Management</h5>

	<div class="row">
		
			
		<div class="col-md-12">



			<form class="form-inline dp">
				<sup style="width: 100%;"></sup>
			  <div class="form-group col-md-4">
			    <label for="">Filter by client &nbsp; </label>
			    <input type="text" class="form-control client">
			  </div>
			  <div class="form-group col-md-4">
			    <label for="">Filter by consultant &nbsp; </label>
			    <input type="text" class="form-control consultant" id="">
			  </div>
			  
			</form>



			<script>
				$(document).ready(function() {

					$('.filteremail, .filterdate, .filterusertype').change(function() {
						var consultant = $('.consultant').val();
						var client = $('.client').val();

						$('.dp sup').html("Find user where <b>Client is " + client + " and consultant is " + consultant);
					});
						
				});
			</script>

		</div>

	</div>

<style>
		.nud tr td:nth-child(4) {
			max-width: 40%;
		}	
</style>



	<div class="row">
		<div class="col-md-12">	


				<table class="table table-striped ned nud">
				  <thead>
				    <tr>
				      <td scope="col">S/N</td>
				      <td scope="col">CLIENT</td>
				      <td scope="col">CONSULTANT</td>
				      <td scope="col-2">DESCRIPTION</td>
				      <td scope="col">PRICE</td>
				      <td scope="col">ACTION</td>
				    </tr>
				  </thead>
				  <tbody>

@foreach($orders as $order)	
      <tr>
        <td>
        	@if($service = App\Models\Service::where('id','=',$order->service_id)->first())
        	{{ $service->service_name }}
        	@endif
        </td>
        <td>
        	@if($customer = App\Models\Customer::where('id','=',$order->customer_id)->first())
        	{{ $customer->firstname }}
        	@endif
        </td>
        <td>
        	@if($order->fulfilled == 0)
        	{{'Job Not done'}}
        	@elseif($order->fulfilled == 1)
        	{{'Job done'}}
        	@endif
        </td>
        <td>
        	@if($order->paid == 0)
        	{{'Not Paid'}}
        	@elseif($order->paid == 1)
        	{{'Paid'}}
        	@endif
        </td>
        <td>
        	{{ $order->order_date->format('jS F Y') }}
        </td>
        <td>
         <a href="/orders-delete/{{ $order->id }}">Cancel</a> | <a href="/orders-view/{{ $order->id }}">View</a>
        </td>
      </tr>
      @endforeach

				   </tbody>
				</table>




				<!-- pagination -->
					<nav aria-label="The pagination box" class="page col-md-4 offset-md-4">
					    <ul class="pagination">
                            
              {{ $orders->links() }}

            </ul>
					</nav>


		</div>
	</div>


</div>






<?php include("footer.php"); ?>