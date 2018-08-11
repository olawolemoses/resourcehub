@extends('layouts.layout')
@section('content')
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Reset Password</div>
                        <div class="card-body">
                            @if ($errors->count() > 0 )
                                <div class="alert alert-danger">
                                    @foreach( $errors->all() as $error )
                                    <li>{{ $error }}</li>  
                                    @endforeach
                                </div>
                            @endif  
                            </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.reset') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="username" type="email" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $email or old('username') }}" readonly required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning btn-block" style="color: #fff;font-weight: bold;margin-bottom: 15px;">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                    <br />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
