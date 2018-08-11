@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-body">
                    @if ($errors->count() > 0 )
                        <div class="alert alert-danger">
                            @foreach( $errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif  
                </div>
                
            </div>

<br /> <br /> <br />

            <div class="card-body">
                                    
                <div class="wc-setup-content">        
                    <h1>Welcome to the FootPrints Merchant!</h1>
                    
                        <p>Hello {{ $user->merchant->firstname }} 
                            Thank you for choosing FootPrints to power your legal services!</p>
                        
                        
                </div>       
                </div>
        </div>
        
    </div>
</div>