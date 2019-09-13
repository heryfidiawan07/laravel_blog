<a class="badge badge-primary float-right mt-1" data-toggle="collapse" href="#update_comment_{{$comment->id}}" role="button" aria-expanded="false" aria-controls="update_comment_{{$comment->id}}"><i class="fas fa-edit"></i></a>
<br>
<div class="collapse" id="update_comment_{{$comment->id}}">
	<form action="{{ route('comment.update', $comment->id) }}" method="POST" class="mt-2">
		@csrf
		<div class="form-group">
			<textarea name="body_update" id="" class="form-control" rows="3">{{$comment->body}}</textarea>
		</div>
		<button type="submit" class="btn btn-warning btn-sm">
	        <i class="fas fa-paper-plane"></i> Update
	    </button>
	</form>
</div>