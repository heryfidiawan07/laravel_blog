<div class="frame-parent-latest-comment">
	<h3 class="text-muted bold mt-5"><i class="fas fa-comments"></i> Latest Comments</h3>
	<div class="frame-latest-comment">
		@foreach ($userComments as $comment)
			<a href="{{ route('post.show', $comment->commentable->slug) }}" class="text-muted no-underline hover-bold">
				<div class="media mb-3">
					@if (is_null($comment->user['img']) || $comment->user['status'] == 2)
						<img src="{{ asset('parts/user.jpg') }}" class="rounded-circle align-self-center mr-3" width="30">
					@else
						<img src="{{ asset('storage/user/'.$comment->user['img']) }}" class="rounded-circle align-self-center mr-3" width="30">
					@endif
					<div class="media-body">
						<p class="mb-0">
							@if ($comment->user['status'] == 2)
								<span class="text-danger">####</span>
							@else
								<b>{{$comment->user['name']}}</b> 
								commented on 
								<u>{{str_limit($comment->commentable->title, 20)}}</u> 
								<br>
								<small>{{ $comment->created_at->diffForHumans()}}</small>
							@endif
						</p>
					</div>
				</div>
			</a>
		@endforeach
	</div>
</div>