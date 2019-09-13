@extends('layouts.app')

@if (is_null($user->img))
@if($app)
@section('image'){{ asset('storage/app/img/'.$app->img) }}@endsection
@endif
@else
@section('image'){{ asset('storage/user/'.$user->img) }}@endsection
@endif
@section('title'){{$user->name}}@endsection
@if($app)
@section('description'){{strip_tags(str_limit($app->title, 145))}}@endsection
@endif

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/upload.css') }}">
@endsection

@section('content')
<div class="container">
	
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col">
					<figure class="figure">
						@if (is_null($user->img))
							<img src="{{ asset('parts/user.jpg') }}" class="img-thumbnail" width="200">
						@else
							<img src="{{ asset('storage/user/'.$user->img) }}" class="img-thumbnail" width="200">
						@endif
						@auth
							@if (Auth::user()->id == $user->id)
								<figcaption class="figure-caption text-center">
									<a data-toggle="modal" href="#user_img" role="button" aria-expanded="false" aria-controls="user_img">
										<i class="fas fa-edit"></i>
									</a>
								</figcaption>
								@include('user.form_upload_img')
							@endif
						@endauth
					</figure>
				</div>
				<div class="col">
					<span class="bold mr-2" style="font-size: 20px;">{{$user->name}}</span>
					@auth
						@if (Auth::user()->id == $user->id)
							<a class="" data-toggle="collapse" href="#editName_{{$user->id}}" role="button" aria-expanded="false" aria-controls="editName_{{$user->id}}">
								<i class="fas fa-edit"></i>
							</a>
							@include('user.form_edit_name')
						@endif
					@endauth
					<p>Joined: <small>{{ date('d M, Y', strtotime($user->created_at))}}</small></p>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			
		</div>
	</div>

</div>
@endsection

@section('js')
	<script src="{{ asset('js/upload.js') }}" defer></script>
@endsection