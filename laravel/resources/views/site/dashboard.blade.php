@include("includes.header")

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body text-center">
        
      
      <i class="material-icons" style="font-size: 60px;color:red;margin-top:40px;width:100%;margin-bottom:30px;">close</i>
      <h5 class="col-md-12">DELETE ORDER</h5>
      <p class="col-md-12" style="font-size:14px;margin-bottom: 30px;">Deleting this order would also delete order history , are you sure you would like to continue</p>
      
      
        <button type="button" class="btn" data-dismiss="modal" style="background:transparent;color:#4a4a4a;font-size:14px;">Close</button>
        <button type="button" class="btn" style="background:#707bea;color:#fff;font-size:14px;">Save changes</button>
      </div>
      
    </div>
  </div>
</div>

 <style>
  	nav.navbar {
  		 background: #e6e6e6;
  	}
  	body {
  		background: #fff;
  	}
  </style>




<div class="container-fluid" style="margin-top: 50px;padding:0;">


      <div class="row dental">

        <div class="col-12" style="background:#f5f5f5;">
            <div class="list-group container" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="fa fa-user"></i> Profile</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"><i class="material-icons">work</i>Orders</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages"><i class="material-icons">notifications</i>Notification</a>
            </div>
        </div>

        <div class="col-12">
            <div class="tab-content container" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

                @include('site._profile', ['profile' => $profile, 'user'=>$user])
                
            </div>


            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                @include('site._orders', ['orders'=>$orders])
            </div>
            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
            </div>
        </div>

    </div>


</div>









@include("includes.footer")