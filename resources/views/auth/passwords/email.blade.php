@extends('auth.header')
@section('page_title', 'Reset Password')
@section('form')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {!! Form::open(array("route" => "password.email", "method" => "POST", "class" => "login-form")) !!}
    {{ csrf_field() }}
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
    <div class="row">
        <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12">Send Password Reset Link</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
