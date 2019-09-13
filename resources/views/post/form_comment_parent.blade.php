<br>
<a class="text-muted border-top d-block" data-toggle="collapse" href="#parent_comment_{{$comment->id}}" role="button" aria-expanded="false" aria-controls="parent_comment_{{$comment->id}}">
	<small>Reply <i class="fas fa-comment"></i> {{$comment->childs()->count()}}</small>
</a>
@if ($comment->user['status'] != 2)
	<div class="collapse" id="parent_comment_{{$comment->id}}">
		<form action="{{ route('comment.store_parent', $comment->id) }}" method="POST" class="mt-2">
			@csrf
			<div class="form-group">
				<textarea name="body_parent" id="" class="form-control" rows="3">{{old('body_parent')}}</textarea>
			</div>
			<button type="submit" class="btn btn-warning btn-sm">
		        <i class="fas fa-paper-plane"></i> Reply
		    </button>
		</form>
	</div>
@endif