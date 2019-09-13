@extends('layouts.app')

@if ($post->pictures()->count())
@section('image'){{ asset('storage/post/img/'.$post->pictures[0]->img) }}@endsection
@endif
@section('title'){{$post->title}}@endsection
@section('description'){{$post->summary}}@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('css/post.css') }}">
	<link rel="stylesheet" href="{{ asset('css/prism.css') }}">
@endsection

@section('content')
<div class="container">
	
	<div class="row">
		<div class="col-lg-8">
		    <h2 class="post-title-show parent-color bold">{{$post->title}}</h2>
		    <hr>
		    @if ($post->pictures()->count())
		    	@include('post.image')
		    	<hr>
		    @endif
		    <div class="text-post-show mb-2">
		    	{!! $post->body !!}
		    </div>
		    
		    @if ($post->categories()->count())
			    <i class="fas fa-cubes" style="width: 20px;"></i>
			    @foreach ($post->categories as $category)
			    	<a href="{{ route('category.slug', $category->slug) }}" class="badge badge-secondary p-2 mt-2">{{$category->name}}</a>
			    @endforeach
		    @endif
		    
		    @if ($post->tags()->count())
		    	<br>
				<i class="fas fa-tags" style="width: 20px;"></i>
				@foreach ($post->tags as $tag)
					<a href="{{ route('tag.slug', $tag->slug) }}" class="badge badge-dark p-2 mt-2">{{$tag->name}}</a>
				@endforeach
		    @endif

		    @if ($post->comments()->count())
		        @include('post.comment')
		    @endif
		    
		    @if ($post->comment == 1)
		    	@include('post.comment_store')
		    @endif
		</div>

		<div class="col-lg-4 mt-5">
			
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

@section('js')
	<script src="{{ asset('js/prism.js') }}"></script>
@endsection