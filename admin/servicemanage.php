<?php include("header.php"); ?>








<div class="container" style="padding-top: 90px;">

	
	<h5>Service Management</h5>

	<div class="row">
		
			
		<div class="col-md-6">



			<form class="" style="margin-bottom: 70vh;">
				
			  <div class="form-group">
			  	<label for="">Service Name</label>
			    <input type="text" class="form-control" placeholder="">
			  </div>

			  <div class="form-group">
			  	<label for="">Service Description</label>
			    <textarea name="" id="" cols="30" rows="10" style="height: 150px;" class="form-control"></textarea>
			  </div>

			  <div class="form-group">
			  	<label for="">Category</label>
			    <select name="" id="" class="form-control">
			    	<option value=""></option>
			    	<option value=""></option>
			    	<option value=""></option>
			    </select>
			  </div>


			  <div class="form-group">
			  	<label for="">Price</label>
			    <input type="number" class="form-control" placeholder="">
			  </div>


			  <div class="form-group">
			  	<label for="">Upload Service Image</label>
			    <input type="file" class="form-control" placeholder="">
			  </div>


			  <div class="form-group">
			  	<label for="">Service Type</label>
			    <select name="" id="" class="form-control">
			    	<option value="Legal Services">Legal Services</option>
			    	<option value="Legal Documents">Legal Documents</option>
			    </select>
			  </div>


			   <div class="form-group legal">
			  	<label for="">Upload Legal document</label>
			    <input type="file" class="form-control" placeholder="">
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






<?php include("footer.php"); ?>