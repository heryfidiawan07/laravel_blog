<hr>
@foreach ($post->comments->where('parent_id',0) as $comment)
	<div class="card mb-1">
		<div class="card-body">
			@if ($comment->user['status'] == 2)
				<div class="text-danger">#############</div>
			@else
				{!! nl2br(strip_tags($comment->body)) !!}
			@endif
			@auth
				@if (Auth::user()->id == $comment->user['id'])
					@include('post.form_comment_update')
				@endif
				@include('post.form_comment_parent')
			@endauth
			@if ($comment->childs()->count())
				@include('post.form_comment_child_update')
			@endif
		</div>
		<div class="card-footer">
			<a @if ($comment->user['status'] == 2) class="text-danger" @else href="/user/{{$comment->user['slug']}}" class="text-muted" @endif>
    			@if (is_null($comment->user['img']) || $comment->user['status'] == 2)
					<i class="fas fa-user"></i>
    			@else
    				<img src="{{ asset('storage/user/'.$comment->user['img']) }}" class="rounded-circle" width="20">
    			@endif
    			@if ($comment->user['status'] == 2)
    				<span class="text-danger">####</span>
    			@else
    				{{$comment->user['name']}}
    			@endif
			</a>
			, <small>{{ date('d M, Y', strtotime($comment->created_at))}}</small>
		</div>
	</div>
@endforeach