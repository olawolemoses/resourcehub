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

	
	<h5>User Management</h5>

	<div class="row">
		
			
		<div class="col-md-12">



			<form class="form-inline dp">
				<sup style="width: 100%;"></sup>
			  <div class="form-group col-md-4">
			    <label for="">Filter by email &nbsp; </label>
			    <input type="text" class="form-control filteremail">
			  </div>
			  <div class="form-group col-md-4">
			    <label for="">Filter by date &nbsp; </label>
			    <input type="date" class="form-control filterdate" id="">
			  </div>

			  <div class="form-group col-md-4">
			    <label for="">Filter by usertype &nbsp; </label>
			    <select name="" id="" class="form-control filterusertype">
			    	<option value="">Filter by usertype</option>
			    </select>
			  </div>
			  
			</form>



			<script>
				$(document).ready(function() {

					$('.filteremail, .filterdate, .filterusertype').change(function() {
						var email = $('.filteremail').val();
						var date = $('.filterdate').val();
						var usertype = $('.filterusertype').val();

						$('.dp sup').html("Find user where <b>Email is " + email + " , date is " + date + " and usertype is " + usertype);
					});
						
				});
			</script>

		</div>

	</div>


	<div class="row">
		<div class="col-md-12">	


				<table class="table table-striped ned">
				  <thead>
				    <tr>
				      <td scope="col">S/N</td>
				      <td scope="col">NAME</td>
				      <td scope="col">EMAIL</td>
				      <td scope="col">USER TYPE</td>
				      <td scope="col">DATE JOINED</td>
				      <td scope="col">ACTION</td>
				    </tr>
				  </thead>
				  <tbody>


				    <tr>
				    	<td>1</td>
				    	<td>Luxury Lawyer</td>
				    	<td>info@luxurylawyer.com</td>
				    	<td>Vendor</td>
				    	<td>12/03/2018</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i data-toggle="modal" data-target="#deleteModal" class="fa fa-trash"></i></td>
				    </tr>


				    <tr>
				    	<td>1</td>
				    	<td>Luxury Lawyer</td>
				    	<td>info@luxurylawyer.com</td>
				    	<td>Vendor</td>
				    	<td>12/03/2018</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i class="fa fa-trash"></i></td>
				    </tr>



				    <tr>
				    	<td>1</td>
				    	<td>Luxury Lawyer</td>
				    	<td>info@luxurylawyer.com</td>
				    	<td>Vendor</td>
				    	<td>12/03/2018</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i class="fa fa-trash"></i></td>
				    </tr>


				    <tr>
				    	<td>1</td>
				    	<td>Luxury Lawyer</td>
				    	<td>info@luxurylawyer.com</td>
				    	<td>Vendor</td>
				    	<td>12/03/2018</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i class="fa fa-trash"></i></td>
				    </tr>


				    <tr>
				    	<td>1</td>
				    	<td>Luxury Lawyer</td>
				    	<td>info@luxurylawyer.com</td>
				    	<td>Vendor</td>
				    	<td>12/03/2018</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i class="fa fa-trash"></i></td>
				    </tr>


				    <tr>
				    	<td>1</td>
				    	<td>Luxury Lawyer</td>
				    	<td>info@luxurylawyer.com</td>
				    	<td>Vendor</td>
				    	<td>12/03/2018</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i class="fa fa-trash"></i></td>
				    </tr>


				    <tr>
				    	<td>1</td>
				    	<td>Luxury Lawyer</td>
				    	<td>info@luxurylawyer.com</td>
				    	<td>Vendor</td>
				    	<td>12/03/2018</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i class="fa fa-trash"></i></td>
				    </tr>


				    <tr>
				    	<td>1</td>
				    	<td>Luxury Lawyer</td>
				    	<td>info@luxurylawyer.com</td>
				    	<td>Vendor</td>
				    	<td>12/03/2018</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i class="fa fa-trash"></i></td>
				    </tr>


				    <tr>
				    	<td>1</td>
				    	<td>Luxury Lawyer</td>
				    	<td>info@luxurylawyer.com</td>
				    	<td>Vendor</td>
				    	<td>12/03/2018</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i class="fa fa-trash"></i></td>
				    </tr>


				    <tr>
				    	<td>1</td>
				    	<td>Luxury Lawyer</td>
				    	<td>info@luxurylawyer.com</td>
				    	<td>Vendor</td>
				    	<td>12/03/2018</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i class="fa fa-trash"></i></td>
				    </tr>


				    <tr>
				    	<td>1</td>
				    	<td>Luxury Lawyer</td>
				    	<td>info@luxurylawyer.com</td>
				    	<td>Vendor</td>
				    	<td>12/03/2018</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i class="fa fa-trash"></i></td>
				    </tr>


				    <tr>
				    	<td>1</td>
				    	<td>Luxury Lawyer</td>
				    	<td>info@luxurylawyer.com</td>
				    	<td>Vendor</td>
				    	<td>12/03/2018</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i class="fa fa-trash"></i></td>
				    </tr>


				    <tr>
				    	<td>1</td>
				    	<td>Luxury Lawyer</td>
				    	<td>info@luxurylawyer.com</td>
				    	<td>Vendor</td>
				    	<td>12/03/2018</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i class="fa fa-trash"></i></td>
				    </tr>


				    <tr>
				    	<td>1</td>
				    	<td>Luxury Lawyer</td>
				    	<td>info@luxurylawyer.com</td>
				    	<td>Vendor</td>
				    	<td>12/03/2018</td>
				    	<td> <a href="view"><i class="fa fa-edit"></i></a> &emsp; <i class="fa fa-trash"></i></td>
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






<?php include("footer.php"); ?>