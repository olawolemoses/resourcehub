@include('includes.admin_header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
 <div class="container" style="padding-top: 90px;">
  	 
<h5>Dashboard</h5>

  	 <div class="row">
  	 	

  	 	 <div class="col-md-3 patnet">
  	 	 	 <div class="row">
  	 	 	 	 <div class="col-12">
  	 	 	 	 	 <div class="crossPat" style="background: #50e3c2;"></div>
  	 	 	 	 </div>

  	 	 	 	 <div class="col-8">
  	 	 	 	 	Total number of Users
  	 	 	 	 </div>

  	 	 	 	 <div class="col-4">
  	 	 	 	     @if(count($users) > 0)
  	 	 	 	    {{count($users)}}
  	 	 	 	    @else
  	 	 	 	    {{'No Users Found'}}
  	 	 	 	    @endif
  	 	 	 	 </div>

  	 	 	 </div>
  	 	 </div>


		<div class="col-md-3 patnet">
  	 	 	 <div class="row">
  	 	 	 	 <div class="col-12">
  	 	 	 	 	 <div class="crossPat" style="background: #4a90e2;"></div>
  	 	 	 	 </div>

  	 	 	 	 <div class="col-8">
  	 	 	 	 	Total number of Vendors
  	 	 	 	 </div>
                   
  	 	 	 	 <div class="col-4">
  	 	 	 	 	 @if(count($vendors) > 0)
  	 	 	 	    {{count($vendors)}}
  	 	 	 	    @else
  	 	 	 	    {{'No Vendors Found'}}
  	 	 	 	    @endif
  	 	 	 	 </div>

  	 	 	 </div>
  	 	 </div>



  	 	 <div class="col-md-3 patnet">
  	 	 	 <div class="row">
  	 	 	 	 <div class="col-12">
  	 	 	 	 	 <div class="crossPat" style="background: #f8e71c;"></div>
  	 	 	 	 </div>

  	 	 	 	 <div class="col-8">
  	 	 	 	 	Total resource downloaded
  	 	 	 	 </div>

  	 	 	 	 <div class="col-4">
  	 	 	 	   30
  	 	 	 	 </div>

  	 	 	 </div>
  	 	 </div>



  	 	 <div class="col-md-3 patnet">
  	 	 	 <div class="row">
  	 	 	 	 <div class="col-12">
  	 	 	 	 	 <div class="crossPat" style="background: #1cedf8;"></div>
  	 	 	 	 </div>

  	 	 	 	 <div class="col-8">
  	 	 	 	 	Number of visitors today
  	 	 	 	 </div>

  	 	 	 	 <div class="col-4">
  	 	 	         20
  	 	 	 	 </div>

  	 	 	 </div>
  	 	 </div>



  	 </div>


  	 <div class="row" style="margin-top: 50px;">
  	 	 
		   <div class="col-md-12">
		   		<h5>Financial management</h5>

		   		<div class="graph bar-graph">
		   			<canvas id="myBarGraph"></canvas>
		   		</div>
		   </div>

  	 </div>



  	 <div class="row" style="margin-top: 50px;">
  	 	<h5>New Orders</h5>



  	 	<div class="col-md-6">
  	 		
				<table class="table table-striped sta" style="background: #fff;">
				  <thead>
				    <tr>
				      <th scope="col">Clients</th>
				      <th scope="col">Service Name</th>
				      <th scope="col">Status</th>
				      <th scope="col">Price</th>
				    </tr>
				  </thead>
				  <tbody>
				      @if(count($orders) > 0)
				      
				     <tr>
				         <td colspan='5'>{{'No New Orders for today'}}</td>
				     </tr>
				      @else
				      @foreach($orders as $order)
				      <tr>
				          <td></td>
				          <td></td>
				          <td></td>
				          <td></td>
				      </tr>
				      @endforeach
				      @endif
				
			
				  </tbody>
				</table>

  	 	</div>





  	 	<div class="col-md-6">
  	 		
			
			<table class="table table-striped sta" style="background: #fff;">
				  <thead>
				    <tr style="display: none;">
				      <td scope="col">Firstname</td>
				      <td scope="col">Account Type</td>
				      <td scope="col">Email</td>
				    </tr>
				  </thead>
				  <tbody>
				     
				   
				  </tbody>
				</table>


  	 	</div>
  	 </div>
  </div>



<script>
	var ctx = document.getElementById('myBarGraph').getContext('2d');
	



	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: ["Mon", "Tue", "Wed", "tdu", "Fri"],
	        datasets: [
	        {
	            label: 'deposits',
	            data: [120000, 25000, 108000, 4000, 58000, 140000],
	            backgroundColor: [
	                '#795f9d',
	                '#795f9d',
	                '#795f9d',
	                '#795f9d',
	                '#795f9d'
	            ]
	        },
	        {
	        	label: 'witddrawn',
	        	data: [98000, 50000, 71000, 10000, 105000],
	        	backgroundColor: [
					'#d3bfec',
					'#d3bfec',
					'#d3bfec',
					'#d3bfec',
					'#d3bfec'
	        	]
	        }]
	    },
	    options: {

	    	reponsive: false,

	    	scales: {
		        xAxes: [{
		            barThickness : 15
		        }]
		    }
	    }

	});



</script>

@include('includes.admin_footer')