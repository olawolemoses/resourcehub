<div class="row">
    <div class="col-md-6">
        <img src="/picture/{{ $profile_pic }}" class="mx-auto d-block profilePic" />
    </div>
    <div class="col-md-6" style="padding: 7px;padding-top: 15px;">
        <span> {{Auth::user()->customer->name() }}</span>
        <p><a href="{{ route('showPicture', ['user' => $user]) }}">change photo</a></p>
    </div>
    <!--<form method="get" action="{{ route('services') }}">-->
    <!--    @csrf-->
    <!--    <button type="submit" class="btn">ORDER A SERVICE</button>-->
    <!--</form>-->
    
    
</div>

<div class="row">
    <div class="col-md-12 sandals">
		<div class="list-group slab">
            <a href="{{ route('merchant_index',['user'=>$user]) }}" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="{{ route('merchant_update', ['user'=>$user]) }}" class="list-group-item list-group-item-action">Profile</a>
            <a href="{{ route('merchant_orders',['user'=>$user]) }}" class="list-group-item list-group-item-action">Orders</a>
            <a href="{{ route('merchant_services', ['user'=>$user]) }}" class="list-group-item list-group-item-action">Services</a>
            <a href="{{ route('merchant_issues', ['user'=>$user]) }}" class="list-group-item list-group-item-action">Issues</a>
        </div>
    </div>
</div>