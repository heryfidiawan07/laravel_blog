@foreach ($comment->childs as $child)
	<div class="bg-light p-3 border-left mt-1">
		@if ($child->user->status == 2)
			<div class="text-danger">#############</div>
		@else
			{!! nl2br(strip_tags($child->body)) !!}
		@endif
		<div class="bg-white p-1 mt-2">
			<a @if ($child->user->status == 2) class="text-danger" @else href="/user/{{$child->user->slug}}" class="text-muted" @endif>
				@if (is_null($child->user->img) || $child->user->status == 2)
					<i class="fas fa-user"></i>
				@else
					<img src="{{ asset('storage/user/'.$child->user->img) }}" class="rounded-circle" width="20">
				@endif
				@if ($child->user->status == 2)
					<span class="text-danger">####</span>
				@else
					{{$child->user->name}}
				@endif
			</a>
			, <small>{{ date('d M, Y', strtotime($child->created_at))}}</small>
			@auth
				@if (Auth::user()->id == $child->user->id)
					<a class="badge badge-primary float-right mt-1" data-toggle="collapse" href="#comment_{{$child->id}}" role="button" aria-expanded="false" aria-controls="comment_{{$child->id}}"><i class="fas fa-edit"></i></a>

					<div class="collapse" id="comment_{{$child->id}}">
						<form action="{{ route('comment.update', $child->id) }}" method="POST" class="mt-2">
							@csrf
							<div class="form-group">
								<textarea name="body_update" id="" class="form-control" rows="3">{{$child->body}}</textarea>
							</div>
							<button type="submit" class="btn btn-warning btn-sm">
						        <i class="fas fa-paper-plane"></i> Update
						    </button>
						</form>
					</div>
				@endif
			@endauth
		</div>
	</div>
@endforeach