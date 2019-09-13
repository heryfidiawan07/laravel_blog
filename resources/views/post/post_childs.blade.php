@if ($childs->count())
	<div class="row">
		@foreach ($childs as $key => $post)
			@if ($key > 0)
				<div class="col-md-6 col-sm-6 col-post-parent-and-childs">
					<div class="card bg-dark card-overlay">
						<a href="{{ route('post.show', $post->slug) }}" class="no-underline text-white">
							<img @if($post->pictures()->count()) src="{{ asset('storage/post/thumb/'.$post->pictures[0]->img) }}" @else src="{{ asset('parts/no-image.png') }}" @endif class="card-img" id="img-post-childs" alt="{{$post->title}}">
							<div class="card-img-overlay d-flex flex-column">
								<div class="mt-auto">
									<h5 class="card-text bold">
										<span class="mr-auto">{{str_limit($post->title, 50)}}</span>
									</h5>
								</div>
							</div>
						</a>
					</div>
				</div>
			@endif
		@endforeach
	</div>
@endif
