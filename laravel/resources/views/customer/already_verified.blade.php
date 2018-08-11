@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Already verified</div>
                <div class="card-body">
                   <p>
                       Your email has already been verified and activated. <br /><br />
                       Please <a href="{{ route('index') }}">click here</a> to go to the home page.
                   </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
