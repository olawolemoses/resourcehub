@include('includes.admin_header')

        <div class="container" style="padding-top: 90px;">
		<div class="row">

			<div class="col-md-6 offset-md-1">
			    @include('includes.admin.status')
					<form action="/account-settings" method="POST">
				      @csrf
						<h5>Account Settings</h5>
						<input type="hidden" name="user_id" value="{{$user->id}}">
						<label for="">First Name</label>
						<input type="text" class="form-control" name="first_name" value="{{$user->firstname}}">
                        <label for="">Last Name</label>
						<input type="text" class="form-control" name="last_name" value="{{$user->lastname}}">
						<label for="">Username</label>
						<input type="email" class="form-control" name="username" value="{{$user->username}}">
					<!--	<label for="">Old Password</label>
						<input type="password" class="form-control" name="oldpassword" value="">-->
						<label for="">New Password</label>
						<input type="password" class="form-control" name="password" value="">

						<label for="">Confirm Password</label>
						<input type="password" class="form-control" name="password_confirmation" value="">

						<button class="btn btn-success col-md-3 offset-md-9">SAVE</button>

					</form>

			</div>

		</div>

</div>

<style>
	form input {
		 margin-bottom: 10px;
		 height: 50px;
	}
	form button {
		 height: 42px;
	}
</style>

@include('includes.admin_footer')