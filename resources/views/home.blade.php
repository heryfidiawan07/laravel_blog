@extends('layouts.app')

@if ($app)
@section('image'){{ asset('storage/app/img/'.$app->img) }}@endsection
@section('title'){{$app->title}}@endsection
@section('description'){{strip_tags(str_limit($app->description, 145))}}@endsection
@endif

@section('css')
	<link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection

@section('content')
<div class="container">

	<div class="row">
		<div class="col-md-7 col-post-parent-and-childs">
			@include('post.post_parent')
		</div>
		<div class="col-md-5">
			@include('post.post_childs')
		</div>
	</div>

	@include('partials.banner')
	
	<div class="row mb-3">
		<div class="col-lg-8">

			@if($sticky->count())
				@include('post.sticky_post')
			@endif
			
			@if($news->count())
				<div class="row">
					@include('post.news')
				</div>
			@endif
			
		</div>
		<div class="col-lg-4">
			
			@if($popularComments->count())
				@include('post.popular_comments')
			@endif

			@if($userComments->count())
				@include('post.user_latest_comments')
			@endif
			
		</div>
	</div>

</div>
@endsection
