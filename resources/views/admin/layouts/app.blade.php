<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

		{{-- Title Icon --}}
        <link href="@if($app){{ asset('storage/app/thumb/'.$app->img) }}@endif" rel='shortcut icon'>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
	
		{{-- ======== Vendor ======== --}}
		<!-- Custom fonts for this template-->
		<link href="{{ asset('style-vendor/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<!-- Custom styles for this template-->
		<link href="{{ asset('style-vendor/css/sb-admin-2.min.css') }}" rel="stylesheet">
		{{-- ======== End Vendor ========== --}}

        @yield('css')
        <style>
        	* {
        		font-size: 14px;
        	}
        </style>
    </head>
    <body>
        
		<div id="wrapper">
			@include('admin.layouts.sidebar')
			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">
				<!-- Main Content -->
				<div id="content">														
					@include('admin.layouts.navbar')
					<!-- Begin Page Content -->
					<div class="container-fluid">
						@yield('content')
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- End of Main Content -->
				<!-- Footer -->
				<footer class="sticky-footer bg-white mt-3">
					@include('admin.layouts.footer')
				</footer>
				<!-- End of Footer -->
			</div>
			<!-- End of Content Wrapper -->
		</div>

        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
        
        {{-- ========= Vendor ========= --}}
        <!-- Bootstrap core JavaScript-->
		<script src="{{ asset('style-vendor/vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('style-vendor/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<!-- Core plugin JavaScript-->
		<script src="{{ asset('style-vendor/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
		<!-- Custom scripts for all pages-->
		<script src="{{ asset('style-vendor/js/sb-admin-2.min.js') }}"></script>
		{{-- ========= End Vendor ========= --}}
        @yield('js')

    </body>
</html>