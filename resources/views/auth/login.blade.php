@extends('auth.header')
@section('page_title', 'Login')
@section('form')
    {!! Form::open(array("route" => "login", "method" => "POST", "class" => "login-form")) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="input-field col s12 center">
            <img src="{{ asset('template/images/login-logo.png') }}" alt=""
                 class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">Room Expenses - Login</p>
            </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="email" type="email" name="email" value="{{ old('email') }}" data-error=".errorEmail"/>
            @if ($errors->has('email'))
                <div class="errorEmail">{{ $errors->first('email') }}</div>
            @endif
            <label for="email" class="center-align">Username</label>
        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="password" data-error=".errorPassword"/>
            @if ($errors->has('password'))
                <div class="errorPassword">{{ $errors->first('password') }}</div>
            @endif
                <label for="password">Password</label>
            </div>
    </div>
    <div class="row hide">
        <div class="input-field col s12 m12 l12  login-text">
            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
            <label for="remember">Remember me</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12">Login</button>
            </div>
    </div>
    <div class="row">
        <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="{{ url('/register') }}">Register Now!</a></p>
            </div>
        <div class="input-field col s6 m6 l6">
            <p class="margin right-align medium-small"><a href="{{ route('password.request') }}">Forgot password ?</a>
            </p>
        </div>
    </div>
    {!! Form::close() !!}
@endsection