@include('includes.admin_header')

<div class="modal fade col-md-6 offset-md-3" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Are you sure you want to delete this user?
      </div>
      <form action="/merchant_delete" method="get">
          {{ csrf_field() }}
          
      <input type="hidden" value="" name="merchant_id" id="merchant_id">
      <div class="modal-footer">
        <button type="button" class="btn closeDia" data-dismiss="modal">Cancel</button>
        <button id="deletebtn" type="submit" data-toggle="modal"  data-dismiss="modal" class="btn actionDia">Delete</button>
        </form>
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

<div class="container-fluid profileHead">
		<div class="container" style="background: #fff;padding: 20px;">
			<div class="row">
				<div class="col-md-3">
					<img src="../img/profile.png" class="mx-auto d-block profilePic" />
				</div>
				<div class="col-md-6">
					<h5>{{ $merchant_user->firstname }}</h5>
					<p><b>Established:</b>{{$merchant_user->created_at->format('jS F Y')}} &emsp; <i class="material-icons">room</i>{{ $merchant_user->state }}, {{ $merchant_user->country }}.</p>
					<p><b>Category :</b> Legal services ( intellectual property )</p>
					<p class="desc">
						Victors Law Firm, Ikeja and partner in Teju Legal Services. I am an intellectual property lawyer with 8 years of progressive experience in my field.
					</p>
				</div>
				<div class="col-md-3">
					<div class="col-md-12 text-center profile-dix">
						<button class="btn myBtnColor2" data-toggle="modal" data-target="#deleteModal" data-merchant_id="{{ $merchant_user->id }}">DELETE USER</button>
					</div>
					<div class="col-md-12 text-center" style="margin-top: 20px;">
					<a href="/user_deactivate/{{ $user_id }}"	<span class="badge badge-pill badge-danger" style="padding: 10px;color: #fff;cursor:pointer">Deactivate User</span></a>
					</div>
				</div>
			</div>
			

		</div>
	</div>


	<div class="container-fluid" style="border-top: 3px solid #3e98f5;">
		<div class="container" style="background: #fff; padding: 20px;">
			
			<nav>
			  <div class="nav nav-tabs" id="nav-tab" role="tablist">
			    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">About</a>
			    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Portfolio / Availability</a>
			    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Review</a>
			  </div>
			</nav>


			<div class="tab-content" id="nav-tabContent">
				<!-- tab 1 -->
			  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			  	

					<div class="row tbcn">
						<div class="col-md-12">
							<p>
								Victors Law Firm, Ikeja and partner in Teju Legal Services. I am an intellectual property lawyer with 8 years of progressive experience in my field. My areas of focus are patentability opinions, copyright and trademark infringement issues, trademark letters and patent prosecution. I co-wrote the bestseller, ‘Understanding Trademarks’’ with Jude Ataga in 2016 and I am very much aware of my client’s need to take well thought out decisions. <br><br>

								Solving issues related to intellectual property is my priority and with my ability to negotiate and interpret agreements, my clients are assured of being well represented. 

							</p>
							
							<h6 style="margin-top: 25px;margin-bottom: 5px;">SERVICES OFFERED</h6>
							
							<p style="margin-top: -20px;">
                                  <ul>
								@foreach($services_offered as $service)

                                 <li> {{ $service->service_name }}</li>
                             
								@endforeach
							    </ul>

							</p>
						</div>

						
					</div>


			  </div>

			  <!-- tab 2 -->
			  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
			  	   <div class="row tbcn">
			  	   	   <div class="col-md-8">
			  	   	   	
							<p>
								<h6>PORTFOLIO</h6>

								<ul class="nego">
									<li>Earned distinction as one of the firm’s highest producers as well as one of its youngest associates entrusted with handling high-profile cases with substantial client exposure and the potential for negative publicity.</li>
									<li>Partner with corporate clients’ in-house legal teams to provide vigorous defense against lawsuits/legal actions alleging antitrust violations, product liability, catastrophic personal injury and wrongful death. Prepare and manage cases proceeding to trial in Lagos and Abuja and guide settlement negotiations.</li>
									<li>Partner with corporate clients’ in-house legal teams to provide vigorous defense against lawsuits/legal actions alleging antitrust violations, product liability, catastrophic personal injury and wrongful death. Prepare and manage cases proceeding to trial in Lagos and Abuja and guide settlement negotiations.</li>
									<li>Partner with corporate clients’ in-house legal teams to provide vigorous defense against lawsuits/legal actions alleging antitrust violations, product liability, catastrophic personal injury and wrongful death. Prepare and manage cases proceeding to trial in Lagos and Abuja and guide settlement negotiations.</li>
									<li>Partner with corporate clients’ in-house legal teams to provide vigorous defense against lawsuits/legal actions alleging antitrust violations, product liability, catastrophic personal injury and wrongful death. Prepare and manage cases proceeding to trial in Lagos and Abuja and guide settlement negotiations.</li>
								</ul>
							</p>

			  	   	   </div>


			  	   	   <div class="col-md-4">
			  	   	   	   <h6><br><br>AVAILABILITY</h6>


			  	   	   	   <div class="row nad">
			  	   	   	   	  	 <div class="col-8">
			  	   	   	   	  	 	16th March , 2018.<br>
									9 am - 12 noon
			  	   	   	   	  	 </div>
			  	   	   	   	  	 <div class="col-4">Comfirmed</div>
			  	   	   	   </div>
			  	   	   	   <!-- nad -->


			  	   	   	   <div class="row nad">
			  	   	   	   	  	 <div class="col-8">
			  	   	   	   	  	 	16th March , 2018.<br>
									9 am - 12 noon
			  	   	   	   	  	 </div>
			  	   	   	   	  	 <div class="col-4">Comfirmed</div>
			  	   	   	   </div>
			  	   	   	   <!-- nad -->



			  	   	   	   <div class="row nad">
			  	   	   	   	  	 <div class="col-8">
			  	   	   	   	  	 	16th March , 2018.<br>
									9 am - 12 noon
			  	   	   	   	  	 </div>
			  	   	   	   	  	 <div class="col-4">Comfirmed</div>
			  	   	   	   </div>
			  	   	   	   <!-- nad -->

			  	   	   </div>
			  	   </div>
					

			  </div>


				<!-- tab 3 -->
			  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

					<div class="row">
						<div class="col-md-12">
							
							<h6><br><br>REVIEWS</h6>

                         
					

							<div class="row nad">
								 <div class="col-10">
								 	<span class="nameBase">Idris Alli</span>
								 	<p>
								 		Donec facilisis tortor ut augue lacinia, at viverra est semper. Sed sapien Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi suscipit ultricies magna, sit amet imperdiet mauris egestas venenatis. Duis lacinia sollicitudin.
								 	</p>
								 </div>

								 <div class="col-2">16th february</div>
							</div>
							<!-- nad -->


						


						
				

						</div>
					</div>


			  </div>
			</div>


		</div>
	</div>
<script>
    $('#deleteModal').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)
            var merchant_id = button.data('merchant_id')
            var modal = $(this)
            modal.find('#merchant_id').val(merchant_id)
            //$('#delete-user-form').attr('action',"user/"+user_id)
        })
    
</script>

@include('includes.admin_footer')