@auth
	<hr>
	<form action="{{ route('comment.store', $post->id) }}" method="POST">
		@csrf
		<div class="form-group">
			<textarea name="body" class="form-control" rows="4" placeholder="Leave a comment">{{old('body')}}</textarea>
		</div>
		<button type="submit" class="btn btn-primary btn-sm">
	        <i class="fas fa-paper-plane"></i> Send
	    </button>
	</form>
@else
	<hr>
	<form>
		<div class="form-group">
			<textarea name="body" class="form-control" rows="4" disabled>Please login to leave comment !</textarea>
		</div>
		<button type="button" class="btn btn-primary btn-sm" disabled>
	        <i class="fas fa-paper-plane"></i> Send
	    </button>
	</form>
@endauth