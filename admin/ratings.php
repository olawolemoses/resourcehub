<?php include("header.php"); ?>








<div class="container" style="padding-top: 90px;">

	
	<h5>Ratings and Reviews</h5>

	<div class="row">
		
			
		<div class="col-md-12">


			<div class="col-md-12 sa">
				<div class="row pickH">
					<div class="col-md-7">Jhud Ejike posted a review on luxuary Lawyer</div>
					<div class="col-md-3">6th May 2017</div>
					<div class="col-md-2"><a href="javascript:;">View</a></div>
				</div>

				<div class="row pickB">
					<div class="col-md-12 row">
						<p class="col-11">Lorem ipsum dolor sit amet, id dicunt pertinacia usu, probo brute fuisset vim ei. Nec alii elitr suscipiantur ne, usu mazim mucius officiis cu. Nostro blandit sed in,</p>

						<i class="fa fa-trash col-1"></i>
					</div>
				</div>
			</div>


			<div class="col-md-12 sa">
				<div class="row pickH">
					<div class="col-md-7">Jhud Ejike posted a review on luxuary Lawyer</div>
					<div class="col-md-3">6th May 2017</div>
					<div class="col-md-2"><a href="javascript:;">View</a></div>
				</div>

				<div class="row pickB">
					<div class="col-md-12 row">
						<p class="col-11">Lorem ipsum dolor sit amet, id dicunt pertinacia usu, probo brute fuisset vim ei. Nec alii elitr suscipiantur ne, usu mazim mucius officiis cu. Nostro blandit sed in,</p>

						<i class="fa fa-trash col-1"></i>
					</div>
				</div>
			</div>



			<div class="col-md-12 sa">
				<div class="row pickH">
					<div class="col-md-7">Jhud Ejike posted a review on luxuary Lawyer</div>
					<div class="col-md-3">6th May 2017</div>
					<div class="col-md-2"><a href="javascript:;">View</a></div>
				</div>

				<div class="row pickB">
					<div class="col-md-12 row">
						<p class="col-11">Lorem ipsum dolor sit amet, id dicunt pertinacia usu, probo brute fuisset vim ei. Nec alii elitr suscipiantur ne, usu mazim mucius officiis cu. Nostro blandit sed in,</p>

						<i class="fa fa-trash col-1"></i>
					</div>
				</div>
			</div>
		

		</div>

	</div>


	


</div>






<style>
	.pickH {
		 background: #fff;
		 font-size: 14px;
		 padding: 12px;
		 margin-bottom: 10px;
	}
	.pickH a{
		color: #444;
		text-decoration: underline;
	}
	.pickB p {
		 padding: 30px;
		 padding-top: 0px;
	}
	.pickB {
		 display: none;
	}
	.pickB i {
		color: #63438e;
		margin-top: 4px;
	}
</style>



<script>
	$(document).ready(function() {

			$('.sa').click(function() {
				$('.pickB').hide();
				$('.pickB', this).show();
			});

	});
</script>






<?php include("footer.php"); ?>