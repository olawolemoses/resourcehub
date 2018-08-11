<div class="row">
    <div class="col-md-6">
        <img src="/picture/{{ $profile_pic }}" class="mx-auto d-block profilePic" />
    </div>
    <div class="col-md-6" style="padding: 7px;padding-top: 15px;">
        <span> {{Auth::user()->customer->name() }}</span>
        <p><a href="{{ route('showPicture', ['user' => $user]) }}">change photo</a></p>
    </div>
    <form method="get" action="{{ route('services') }}">
        @csrf
        <button type="submit" class="btn">ORDER A SERVICE</button>
    </form>
    
    
</div>
