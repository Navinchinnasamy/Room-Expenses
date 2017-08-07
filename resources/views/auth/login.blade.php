<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Room Expenses: Login</title>
        <link rel="stylesheet" href="{{ asset('css/login/login_material.css') }}">
		  <script>
			window.Laravel = {!! json_encode([
				'csrfToken' => csrf_token(),
			]) !!};
		</script>
	</head>
	<body>
    {{--<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">--}}
		  {{ csrf_field() }}
    <div class="materialContainer">
        <div class="box">
            <div class="title">LOGIN</div>
            {!! Form::open(array("route" => "login", "method" => "POST")) !!}
            <div class="input">
                <label for="email">Username</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}"/>
                <span class="spin"></span>
            </div>

            <div class="input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <span class="spin"></span>
            </div>

            <div class="button login">
                <button type="submit"><span>GO</span> <i class="fa fa-check"></i></button>
            </div>
            {!! Form::close() !!}
            <a href="" class="pass-forgot">Forgot your password?</a>

        </div>

        <div class="overbox">
            <div class="material-button alt-2"><span class="shape"></span></div>

            <div class="title">REGISTER</div>

            <div class="input">
                <label for="regname">Username</label>
                <input type="text" name="regname" id="regname">
                <span class="spin"></span>
            </div>

            <div class="input">
                <label for="regpass">Password</label>
                <input type="password" name="regpass" id="regpass">
                <span class="spin"></span>
            </div>

            <div class="input">
                <label for="reregpass">Repeat Password</label>
                <input type="password" name="reregpass" id="reregpass">
                <span class="spin"></span>
            </div>

            <div class="button">
                <button><span>NEXT</span></button>
            </div>
        </div>
    </div>
    {{--</form>--}}
		<footer><a href="http://www.navin.comze.com/mybot" target="_blank"><img src="https://www.polymer-project.org/images/logos/p-logo.svg"></a>
		  <p>You Gotta Love <a href="http://www.navin.comze.com/mybot" target="_blank">Navin</a></p>
		</footer>
		<script src="{{ asset('plugins/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/login/login_material.js') }}"></script>
	</body>
</html>
