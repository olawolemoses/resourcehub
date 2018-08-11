<h5>Profile</h5>



                    <form method="post" action="{{ route('profile_update') }}" class="row">
                        @csrf
                        
                        
                        <div class="col-md-5">
                            
                            <div class="card-body">
                                @if ($errors->count() > 0 )
                                    <div class="alert alert-danger" style="display:block">
                                        @foreach( $errors->all() as $error )
                                           <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif
                                
                                @if( $flash = session('message') )
                                    <div class="alert alert-success" style="display:block" role="alert">
                                        {{ $flash }}
                                    </div>
                                @endif
                            </div>
                                    
                             <label for="">Title</label>
                             <input type="text" name="title" value="{{ $profile->title }}" required class="form-control">
                             
                             <label for="">Firstname</label>
                             <input type="text" name="firstname" value="{{ $user->firstname }}" required class="form-control">
    
                             <label for="">Lastname</label>
                             <input type="text" name="lastname" value="{{ $user->lastname }}" required class="form-control">
    
    
                             <label for="">Email</label>
                             <input type="email" name="username" value="{{ $user->username }}" required class="form-control">
    
    
                             <label for="">Street</label>
                             <input type="text" name="street" value="{{ $profile->street }}" required class="form-control">
    
    
                             <label for="">city</label>
                             <input type="text" name="city" value="{{ $profile->city }}" required class="form-control">
    
                             <label for="">State</label>
                             <input type="text" name="state" value="{{ $profile->state }}" required class="form-control">
                             
                             <label for="">Country</label>
                             <input type="text" name="country" value="{{ $profile->country }}" required class="form-control">
            
                             <label for="">Mobile no</label>
                             <input type="text" name="mobile_no" value="{{ $profile->mobile_no }}" required class="form-control">
            
                             <label for="">Profile picture</label>
                             <input type="text" name="profile_picture" value="{{ $profile->profile_picture }}" class="form-control">
            
                             
                            <div class="row">
                                 <button type="submit" class="btn col-md-2 offset-md-10" style="background:#707bea;color:#fff;" >SAVE</button>
                            </div>
                        </div>
                             
                    </form>
                
                    <form method="post" action="{{ route('password_update') }}" class="row">
                        @csrf
                        
                        <h5>Password Update</h5>
                        
                        <div class="col-md-5">
                             <label for="">Old Password</label>
                             <input type="password" name="old_password" value="***********************************" class="form-control">
        
                             <label for="">New Password</label>
                             <input type="password" name="new_password" class="form-control">
        
                             <label for="">Comfirm Password</label>
                             <input type="password" name="new_password_confirmation" class="form-control">
        
                        
                         
                            <div class="row">
                                 <button type="submit" class="btn col-md-2 offset-md-10" style="background:#707bea;color:#fff;" >SAVE</button>
                            </div>
                        </div>
                        
                    </form>
                
                </div>
