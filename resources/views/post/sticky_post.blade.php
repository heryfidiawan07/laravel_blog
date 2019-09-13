<div id="sticky_post" class="carousel slide mb-3" data-ride="carousel">
	<div class="carousel-inner">
		@foreach ($sticky as $key => $post)
			<div class="carousel-item @if($key==0) active @endif">
				<div class="row">
					<div class="col-md-5">
						<a href="{{ route('post.show', $post->slug) }}" class="no-underline">
							<div class="card bg-light">
								<img @if($post->pictures()->count()) src="{{ asset('storage/post/thumb/'.$post->pictures[0]->img) }}" @else src="{{ asset('parts/no-image.png') }}" @endif class="card-img" alt="{{$post->title}}" id="img-post-sticky">
							</div>
						</a>
					</div>
					<div class="col-md-7">
						<a href="{{ route('post.show', $post->slug) }}" class="no-underline">
							<h2 class="card-title text-success">{{str_limit($post->title, 70)}}</h2>
							<p><small class="text-dark">{{ date('d M, Y', strtotime($post->created_at))}}</small></p>
						</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
	@if($sticky->count() > 1)
		<a class="carousel-control-prev" href="#sticky_post" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#sticky_post" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	@endif
</div>