@extends('layouts.index')
@section('content')
@section('page-topic','Login')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
    <div class="container m-t-100">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">{{__('auth.login')}}</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link" >{{__('auth.register')}}</a>
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
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            {{config('app.locale')}}
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('auth.failed') }}</strong>
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
                                        <label for="remember"> {{__('auth.remember_me')}}</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="{{__('auth.login')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">{{__('auth.forgot_password')}}?</a>
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
                                                <a href="{{url('/zaloLogin')}}"><i class="fab fa-pinterest-square fa-2x" aria-hidden="true"></i></a>
                                            </li>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" method="POST" action="{{ route('register') }}" role="form" style="display: none;">
                                    @csrf
                                    <div class="form-group">
                                        <input placeholder="{{__('auth.full_name')}}" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="{{__('auth.email')}}" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="{{__('auth.password')}}" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="{{__('auth.confirm_password')}}" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                    <div class="form-group" style="margin-top: 50px">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="{{__('auth.register_now')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <li class="t-center m-b-13">
                                                <a href="#"><i class="fab fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                                                &nbsp;
                                                <a href="#"><i class="fab fa-google-plus-square fa-2x" aria-hidden="true"></i></a>
                                                &nbsp;
                                                <a href="#"><i class="fab fa-pinterest-square fa-2x" aria-hidden="true"></i></a>
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