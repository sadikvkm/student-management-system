<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{config('app.name')}} | @yield('title')</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}"> 
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo"> <a href="#"><b>{{trans('default.app-name')}}</b></a></div>
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">{{trans('default.login-sub-title')}}</p>
				@yield('content')
			</div>
		</div>
	</div>
	<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>