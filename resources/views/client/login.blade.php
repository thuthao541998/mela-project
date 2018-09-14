@extends('layouts.index')
@section('content')
@section('page-topic','Login')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
    <div class="login p-t-100 p-b-50" style="background-image: url('{{asset('images/icons/pattern1.png')}}')">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link" >Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body" style="margin-top: 20px">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form"  method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" role="form" style="display: block;">
                                    @csrf
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group text-center" style="margin-top: 20px">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <li class="t-center m-b-13">
                                                <a href="{{url('/facebook/redirect')}}"><i class="fab fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                                                &nbsp;
                                                <a href="{{url('/google/redirect')}}"><i class="fab fa-google-plus-square fa-2x" aria-hidden="true"></i></a>
                                                &nbsp;
                                                <a href="{{url('/zaloLogin')}}"><img  style="max-width: 26.5px; max-height: 32px; opacity: 0.6; border-radius: 3px; margin-bottom: 15px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQejjr1-rf0uhRpl13kjaAmaFvLA_Vsm33hrXIoPcL0ul1Jbs1c" alt="Z"></a>
                                            </li>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" method="POST" action="{{ route('register') }}" role="form" style="display: none;">
                                    @csrf
                                    <div class="form-group">
                                        <input placeholder="Username" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Email Address" id="email-register" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Password" id="password-register" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                    <div class="form-group" style="margin-top: 50px">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <li class="t-center m-b-13">
                                                <a href="{{url('/facebook/redirect')}}"><i class="fab fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                                                &nbsp;
                                                <a href="{{url('/google/redirect')}}"><i class="fab fa-google-plus-square fa-2x" aria-hidden="true"></i></a>
                                                &nbsp;
                                                <a href="{{url('/zaloLogin')}}"><img  style="max-width: 26.5px; max-height: 32px; opacity: 0.6; border-radius: 3px; margin-bottom: 15px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQejjr1-rf0uhRpl13kjaAmaFvLA_Vsm33hrXIoPcL0ul1Jbs1c" alt="Z"></a>
                                            </li>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('js/login.js')}}"></script>
@endsection