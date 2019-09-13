@extends('admin.layouts.app')

@section('content')
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	</div>
	<!-- Content Row -->
	<div class="row">
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Posts</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								{{$posts->count()}}
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-newspaper fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total views</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								{{number_format($posts->sum('counter'))}}
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-eye fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Comments</div>
							<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
								{{$comments->count()}}
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-comments fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Messages</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								{{$messages->count()}}
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-envelope fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Content Row -->
	<div class="row">
		<!-- Area Chart -->
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Posts Chart</h6>
				</div>
				<div class="card-body">
					<div class="chart-bar">
						<canvas id="postsChart"></canvas>
						<p id="counter" value="{{$counter}}"></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection

@section('js')
	<!-- Page level plugins -->
	<script src="{{ asset('style-vendor/vendor/chart.js/Chart.min.js') }}"></script>
	<!-- Page level custom scripts -->
	<script src="{{ asset('admin/js/posts-chart-bar.js') }}"></script>
@endsection
