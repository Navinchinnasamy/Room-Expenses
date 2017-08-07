<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login/style.css') }}">
    <script>
        window.Laravel = {
        !!json_encode([
            'csrfToken' = > csrf_token(),
        ])
        !!
        }
        ;
    </script>
</head>
<body>
{{--
<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">--}}
    {!! Form::open(array("route" => "login", "method" => "POST")) !!}
    {{ csrf_field() }}
    <div class="group">
        <input type="email" name="email" id="email" value="{{ old('email') }}"/><span class="highlight"></span><span
                class="bar"></span>
        @if ($errors->has('email'))
        <span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
        @endif
        <label>Email</label>
    </div>
    <div class="group">
        <input type="password" name="password" id="password"/><span class="highlight"></span><span class="bar"></span>
        @if ($errors->has('password'))
        <span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
        @endif
        <label>Password</label>
    </div>
    <button type="submit" class="button buttonBlue">Login
        <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
    </button>
    {!! Form::close() !!}
    {{--
</form>
--}}
<footer><a href="http://www.navin.comze.com/mybot" target="_blank"><img
                src="https://www.polymer-project.org/images/logos/p-logo.svg"></a>
    <p>You Gotta Love <a href="http://www.navin.comze.com/mybot" target="_blank">Navin</a></p>
</footer>
<script src="{{ asset('plugins/jquery.min.js') }}"></script>
<script src="{{ asset('js/login/index.js') }}"></script>
</body>
</html>
