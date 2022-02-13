<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{config('app.name')}} | @yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
    <style>
        .error {
            color: red;
        }
		form .row {
			margin-top: 10px;
		}
		.mouse {
			cursor: pointer;
		}
        label:not(.form-check-label):not(.custom-file-label) {
            font-weight: unset;
        }
    </style>
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<div class="preloader flex-column justify-content-center align-items-center"> 
            <h2><b>S</b></h2>
        </div>
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> </li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<i class="fas fa-sign-out-alt"></i>
				</li>
			</ul>
		</nav>
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<x-appLogo />
			<div class="sidebar">
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<x-authUserProfile />
					<div class="info"> <a href="#" class="d-block">{{authDetails('name')}}</a> </div>
				</div>
				<x-sideMenu />
			</div>
		</aside>
		<div class="content-wrapper">
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
						<h1 class="m-0">@yield('title')</h1> </div>
						<div class="col-sm-6">
                            @stack('module-actions')
							{{-- <ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Dashboard v1</li>
							</ol> --}}
						</div>
					</div>
				</div>
			</div>
			<section class="content">
				<div class="container-fluid">
					@if(flash()->message)
						<div id="app-action-notification-bar" class="alert alert-{{flash()->class}}" style="position: fixed;min-width: 20rem;top: 20px;right: 20px;z-index: 999999;">
							
							@switch(flash()->class)
								@case('success')
								<i class="fas fa-check"></i>
								@break
								@default
								@endswitch
							{{ flash()->message }}
						</div>
					@endif
					@yield('content')
				</div>
			</section>
		</div>
		<x-footer />
		<aside class="control-sidebar control-sidebar-dark">
		</aside>
	</div>
	<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script>
	    $.widget.bridge('uibutton', $.ui.button);
		var script_url = "{{url('/admin')}}"
	</script>
	<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
	<script src="{{asset('assets/plugins/sparklines/sparkline.js')}}"></script>
	<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
	<script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
	<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>
	<script src="{{asset('assets/dist/js/demo.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="{{asset('application.js')}}"></script>
	<script>
		$(document).ready(function() {
			setTimeout(function() {
				$('#app-action-notification-bar').remove();
			}, 3000)
		})
	</script>
    @stack('scripts')
</body>

</html>