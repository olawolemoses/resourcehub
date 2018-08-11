@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Hi {{ $name }}</div>

                <div class="card-body">
                   <p>
                       Your account has been deactivated. To reactivate your account kindly click on the link
                       <a href="{{ route('customer.reactivate', ['user'=>$user]) }}">
                           reactivate</a>
                   </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
