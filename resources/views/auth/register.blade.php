@extends('auth.header')
@section('page_title', 'Register')
@section('form')
    {!! Form::open(array("route" => "register", "method" => "POST", "class" => "login-form")) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="input-field col s12 center">
            <h4>Register</h4>
            <p class="center">Join to our Room now !</p>
        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                   data-error=".errorName" required autofocus>
            @if ($errors->has('name'))
                <div class="errorName">{{ $errors->first('name') }}</div>
            @endif
            <label for="name" class="center-align">Name</label>
        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                   data-error=".errorEmail" required>
            @if ($errors->has('email'))
                <div class="errorEmail">{{ $errors->first('email') }}</div>
            @endif
            <label for="email" class="center-align">Email</label>
        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" class="form-control" name="password" data-error=".errorPassword"
                   required>
            @if ($errors->has('password'))
                <div class="errorPassword">{{ $errors->first('password') }}</div>
            @endif
            <label for="password">Password</label>
        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                   data-error=".errorConfirmPassword" required>
            @if ($errors->has('password_confirmation'))
                <div class="errorConfirmPassword">{{ $errors->first('password_confirmation') }}</div>
            @endif
            <label for="password-confirm">Password again</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12">Register Now</button>
        </div>
        <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Already have an account? <a
                        href="{{ url('/login') }}">Login</a></p>
            </div>
        </div>
    {!! Form::close() !!}
@endsection