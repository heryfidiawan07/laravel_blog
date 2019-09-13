<!-- Button trigger modal -->
<button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#delete_message_{{$message->id}}">
    <i class="fas fa-trash-alt"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="delete_message_{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="delete_message_{{$message->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_message_{{$message->id}}">Delete Message {{$message->title}} ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('message.destroy', $message->id)}}" method="POST">
				    @method('DELETE')
				    @csrf
				    <button class="btn btn-danger btn-sm">Delete !</button>
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				</form>
            </div>
        </div>
    </div>
</div>