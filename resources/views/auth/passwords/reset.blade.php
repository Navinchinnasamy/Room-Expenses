@extends('auth.header')
@section('page_title', 'Reset Password')
@section('form')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {!! Form::open(array("route" => "password.request", "method" => "POST", "class" => "login-form")) !!}
    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="row">
        <div class="input-field col s12 center">
            <h4>Register</h4>
            <p class="center">Reset Password</p>
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
            <button type="submit" class="btn waves-effect waves-light col s12">Reset Password</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
