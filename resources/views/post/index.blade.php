@extends('layouts.app')

@if ($app)
@section('image'){{ asset('storage/app/img/'.$app->img) }}@endsection
@endif
@section('title'){{$data->title}}@endsection
@section('description'){{strip_tags(str_limit($data->description, 145))}}@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection

@section('content')
<div class="container">

	<div class="row">
		<div class="col-md-9">
			<div class="row">
				@foreach ($posts as $post)
					<div class="col-lg-4 col-md-6 col-sm-6">
						<a href="{{ route('post.show', $post->slug) }}" class="no-underline hover-bold">
							<div class="card mt-3">
								<img @if($post->pictures()->count()) src="{{ asset('storage/post/thumb/'.$post->pictures[0]->img) }}" @else src="{{ asset('parts/no-image.png') }}" @endif class="card-img-top" alt="{{$post->title}}" id="img-post-news">
								<div class="card-body border-top">
									<div class="frame-title-post-news">
										<p class="card-title text-dark">{{str_limit($post->title, 40)}}</p>
									</div>
									<p class="card-text">
										<small class="text-dark">{{ date('d M, Y', strtotime($post->created_at))}}</small>
									</p>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>
			<div class="row">
				<div class="container">
					<div class="mt-3">
						{{$posts->links()}}
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
@endsection
