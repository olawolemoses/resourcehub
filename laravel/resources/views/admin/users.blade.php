@include('includes.admin_header')
<div class="modal fade col-md-6 offset-md-3" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
    
     <h5 class="modal-title" id="exampleModalLabel">Deactivate User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal">
          
       <form action="/deactivateuser" method="get" id="delete-user-form" >
         @csrf
         <input type="hidden" name="user_id" id="user_id" value="">
       <p> Are You sure you want to deactive user </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn closeDia remove-data-from-delete-form" data-dismiss="modal">Cancel</button>
        <button type="submit"   class="btn actionDia" > Delete</button>
       
      </div>
      </form>
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
@include('includes.admin.status')
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
				      <td scope="col">NAME</td>
				      <td scope="col">EMAIL</td>
				      <td scope="col">USER TYPE</td>
				      <td scope="col">DATE JOINED</td>
				      <td scope="col">ACTION</td>
				    </tr>
				  </thead>
				  <tbody>
				  @foreach($users as $user)
				   <tr>
				       <td>{{$user->name()}}</td>
				       <td>{{$user->username}}</td>
				       @if($user->user_type == 1)
				       <td>{{'Customer'}}</td>
				       @elseif($user->user_type == 2)
				       <td>{{'Mechant'}}</td>
				       @endif
				       @if($user->created_at != null)
				       <td>{{$user->created_at}}</td>
				       @else
				       <td><i>{{'Null Yo'}}</i></td>
				       @endif
				       <td><a href="/edituser/{{$user->id}}"><i class="fa fa-eye"></i></a> &emsp; <span ><label class="switchz">      
                         <input type="checkbox" >
                         <span id="sliderz" class="roundz"></span> 
                        </label></span>
                     <!--   <i data-toggle="modal" data-target="#deleteModal" class="fa fa-trash" ></i>-->
				      
				       </td>
				   </tr>
				  @endforeach
				   </tbody>
				</table>

				<!-- pagination -->
					<nav aria-label="The pagination box" class="page col-md-4 offset-md-4">
					  <ul class="pagination">
					    
					    {{$users->links()}}
					    
					  </ul>
					</nav>
		</div>
	</div>

</div>
<style>
    	/* This is to hide default HTML checkbox */
	.switchz input {display:none;}
	
	label.switchz{
	    position:relative;
	}
	/* The slider */
	#sliderz {
	height: 20px;
		width: 45px;
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 7px;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;


	}
	
	#sliderz:before {
		position: absolute;
		content: "";
		height: 15px;
		width: 15px;
		left: 2px;
		top:2px;
		bottom: 0px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
	}
	
	input:checked + #sliderz {
	background-color: #d3bfec;
	}
	
	input:focus + #sliderz {
		box-shadow: 0 0 1px #2196F3;
	}
	
	input:checked + #sliderz:before {
		-webkit-transform: translateX(26px);
		-ms-transform: translateX(26px);
		transform: translateX(26px);
	}
	
	/* Rounded sliders */
	#sliderz.roundz {
		border-radius: 34px;
		
	}
	
	#sliderz.roundz:before {
		border-radius: 50%;
		
	}
</style>

<script>
         $('#deleteModal').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)
            var user_id = button.data('user_id')
            var modal = $(this)
            modal.find('.modal-body #user_id').val(user_id)
        })
        
</script>

</div>

@include('includes.admin_footer')