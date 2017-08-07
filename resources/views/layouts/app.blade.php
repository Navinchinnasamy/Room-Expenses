<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Navin') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/material/material.indigo-pink.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/material/material-icon.css') }}" rel="stylesheet">

    <!-- Scripts -->
	<script src="{{ asset('plugins/jquery.min.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('plugins/material/material.min.js') }}"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
	<style>
		.container {
			margin-top: 6%;
		}
	</style>
</head>
<body> 
    <div id="app">
		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		  <header class="mdl-layout__header">
			 <div class="mdl-layout__header-row">
				<!-- Title -->
				<span class="mdl-layout-title">{{ config('app.name', 'Room-Expense') }}</span>
				<!-- Add spacer, to align navigation to the right -->
				<div class="mdl-layout-spacer"></div>
				<!-- Navigation -->
				<nav class="mdl-navigation">
					@if (Auth::guest())
						<a class="mdl-navigation__link" href="{{ route('login') }}" style="color:gray">Login</a>
						<a class="mdl-navigation__link" href="{{ route('register') }}" style="color:gray">Register</a>   
					@else
						<a class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ route('logout') }}"
										onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
										Logout
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</a>
						<a class="mdl-navigation__link" href="javascript:void(0);" style="color:gray">{{ Auth::user()->name }}</a>
						<a class="mdl-navigation__link" href="{{ route('expense.index') }}" style="color:gray">Expense</a>   
						<a class="mdl-navigation__link" href="{{ route('expense.create') }}" style="color:gray">Expense Add</a>   
					@endif
				</nav>
			 </div>
		  </header>
		  @if (!Auth::guest())
		  <div class="mdl-layout__drawer">
			 <span class="mdl-layout-title">{{ config('app.name', 'Room-Expense') }}</span>
			 <nav class="mdl-navigation">
				<a class="mdl-navigation__link" href="{{ route('home') }}">Home</a>
				<a class="mdl-navigation__link" href="{{ route('expense.index') }}">Expense</a>    
				<a class="mdl-navigation__link" href="{{ route('expense.create') }}">Expense Add</a>    
			 </nav>
		  </div>
		  @endif
		</div>
		<main class="mdl-layout__content">
			<div class="page-content">
				@yield('content')
			</div>
		</main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
