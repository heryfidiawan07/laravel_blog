<!-- Button trigger modal -->
<a href="#" class="badge badge-danger" type="button" data-toggle="modal" data-target="#followDelete_{{$follow->id}}">
    <i class="fas fa-trash-alt"></i>
</a>
<!-- Modal -->
<div class="modal fade" id="followDelete_{{$follow->id}}" tabindex="-1" role="dialog" aria-labelledby="deletefollow_{{$follow->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletefollow_{{$follow->id}}">
                	Delete <i class="{{$follow->provider_class}}"></i> {{$follow->name}} ?
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="{{ route('follow.destroy', $follow->id) }}" class="btn btn-danger btn-sm">
                	Delete !
                </a>
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>