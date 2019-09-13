@if ($parent)
	<div class="card bg-dark card-overlay">
		<a href="{{ route('post.show', $parent->slug) }}" class="text-white">
			<img @if($parent->pictures()->count()) src="{{ asset('storage/post/img/'.$parent->pictures[0]->img) }}" @else src="{{ asset('parts/no-image.png') }}" @endif class="card-img" id="img-post-parent" alt="{{$parent->title}}">
			<div class="card-img-overlay d-flex flex-column">
				<div class="mt-auto">
					<h2 class="card-text bold">
						<span class="mr-auto">{{str_limit($parent->title, 70)}}</span>
					</h2>
				</div>
			</div>
		</a>
	</div>
@endif