@foreach ($news as $post)
	<div class="col-lg-4 col-md-6 col-sm-6">
		<a href="{{ route('post.show', $post->slug) }}" class="no-underline hover-bold">
			<div class="card mt-3 card-overlay">
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