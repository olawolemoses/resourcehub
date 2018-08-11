@include('includes.admin_header')

<div class="container" style="padding-top: 90px;">
		
		<div class="row">
			

				<div class="col-md-6 offset-md-3 salad">
					<div class="row">
						
						<div class="col-12">
							<div class="pic"></div>
							<span class="sata">{{$user->name()}}</span>
						</div>
						
						<div class="col-12">
								
			<nav>
			  <div class="nav nav-tabs" id="nav-tab" role="tablist">
			    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Details</a>
			  <!--  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Contact</a>
			    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Financials</a>-->
			  </div>
			</nav>

			<div class="tab-content" id="nav-tabContent">
				<!-- tab 1 -->
			  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			  	

					<table class="table">
						<tbody>
							
							<tr>
								<td>User created</td>
							  @if($user->created_at != null)
				              <td>{{$user->created_at}}</td>
				              @else
				              <td><i>{{'Null Yo'}}</i></td>
				              @endif
							</tr>

							<tr>
								<td>Status</td>
								 @if($user->status == 0)
				               <td>{{"Inactive"}}</td>
				               @elseif($user->status == 1)
				               <td><i>{{'Active'}}</i></td>
				               @endif
							</tr>

							<tr>
								<td>Username</td>
								<td>{{$user->username}}</td>
							</tr>

							<tr>
								<td>Orders</td>
								<td><i>{{'No orders yet'}}</i></td>
							</tr>

							<tr>
								<td>Reviews</td>
								@if( $user->review->count() > 0 )
								<td>{{$user->review->count()}}</td>
								@else
							    <td>{{'No reviews made yet'}}</td>
								@endif
							</tr>

							<tr>
								<td>Spend</td>
								<td>0</td>
							</tr>

						</tbody>
					</table>
			  </div>

			  <!-- tab 2 -->
			  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
			  	   
					<table class="table">
						<tbody>
							
							<tr>
								<td>Email</td>
								<td>info@luxuarylawyer.com</td>
							</tr>

							<tr>
								<td>Phone number</td>
								<td>+234 073 404 890</td>
							</tr>

							<tr>
								<td>Category</td>
								<td>Criminal, Property</td>
							</tr>

							<tr>
								<td>Linked in</td>
								<td>Luxuary lawyer</td>
							</tr>

							<tr>
								<td>Address</td>
								<td>10a Adetokunbo ademola, Victoria island</td>
							</tr>

						</tbody>
					</table>

			  </div>

				<!-- tab 3 -->
			  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

			  </div>
			</div>
					
				</div>

					</div>
				</div>

		</div>

	</div>

<style>
	.nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
    color: #444;
    background-color: #fff;
    border-bottom: 3px solid #63438e;
}
.nav-tabs .nav-link:hover, .nav-tabs .nav-link:focus {
    border-bottom: 3px solid #63438e;
    color: #444;
}

tr {
	font-size: 13px;
}
tr td:nth-child(1) {
	font-weight: 500;
}
tr td:nth-child(2) {
	text-align: right;
}

.salad {
   padding: 50px;
   background: #fff;
   margin-top: 40px;
}
.pic {
    width: 60px;
    height: 60px;
    background: #d8d8d8;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    float: left;
}
.sata {
   font-size: 20px;
   float: left;
   margin-left: 20px;
   margin-top: 15px;
}
</style>


@include('includes.admin_footer')