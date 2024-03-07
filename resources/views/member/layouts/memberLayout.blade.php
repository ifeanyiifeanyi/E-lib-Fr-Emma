<!doctype html>
<html lang="en" class="semi-dark">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset("") }}logo.png" type="image/png" />
	<!--plugins-->
	<link href="{{ asset("") }}user/assets/plugins/notifications/css/lobibox.min.css" rel="stylesheet"/>
	<link href="{{ asset("") }}user/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="{{ asset("") }}user/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{ asset("") }}user/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{ asset("") }}user/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset("") }}user/assets/css/pace.min.css" rel="stylesheet"/>
	<script src="{{ asset("") }}user/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset("") }}user/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{ asset("") }}user/assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset("") }}user/assets/css/app.css" rel="stylesheet">
	<link href="{{ asset("") }}user/assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset("") }}user/assets/css/dark-theme.css" />
	<link rel="stylesheet" href="{{ asset("") }}user/assets/css/semi-dark.css" />
	<link rel="stylesheet" href="{{ asset("") }}user/assets/css/header-colors.css" />
	<title>{{ config('app.name') }} - @yield('title')</title>
    @yield('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body onload="info_noti()">
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('member.layouts.partials.aside')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('member.layouts.partials.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			@yield('member')
		</div>
		<!--end page wrapper -->
		@include('member.layouts.partials.footer')
	</div>
	<!--end wrapper-->

	@include('member.layouts.partials.rightBar')


    @include('member.layouts.partials.extra')
    
	@include('member.layouts.partials.scripts')
</body>

</html>