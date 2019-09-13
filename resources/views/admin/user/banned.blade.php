@if (Auth::user()->id != $user->id)
	<!-- Button trigger modal -->
	<button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#banned_user_{{$user->id}}">
		Banned !
	</button>
	<!-- Modal -->
	<div class="modal fade" id="banned_user_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="banned_user_{{$user->id}}" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="banned_user_{{$user->id}}">Banned User {{$user->name}} ?</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	                <form action="{{route('user.banned', ['user' => $user->id])}}" method="POST">
					    @method('PUT')
					    @csrf
					    <button class="btn btn-danger btn-sm">Banned !</button>
						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
					</form>
	            </div>
	        </div>
	    </div>
	</div>
@endif