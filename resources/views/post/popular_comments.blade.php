<div class="frame-parent-popular-comment">
	<h3 class="text-muted bold"><i class="fas fa-comments"></i> Popular Comments</h3>
	<div class="frame-post-popular-comment">
		@foreach ($popularComments as $post)
			<a href="{{ route('post.show', $post->slug) }}" class="text-muted no-underline hover-bold">
				<div class="card mb-2">
					<div class="row no-gutters">
						<div class="col-md-4 col-sm-4">
							<img @if($post->pictures()->count()) src="{{ asset('storage/post/thumb/'.$post->pictures[0]->img) }}" @else src="{{ asset('parts/no-image.png') }}" @endif class="card-img bg-light" id="img-post-popular-comment" alt="{{$post->title}}">
						</div>
						<div class="col-md-8 col-sm-8">
							<div class="card-body">
								<div class="frame-title-post-popular-comment">
									<p class="card-title">{{$post->title}}</p>
								</div>
								<small class="text-muted">
									<i class="fas fa-comments"></i> {{$post->comments()->count()}} - {{ date('d M, Y', strtotime($post->created_at))}}
								</small>
							</div>
						</div>
					</div>
				</div>
			</a>
		@endforeach
	</div>
</div>