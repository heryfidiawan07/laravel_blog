<!-- Button trigger modal -->
<button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#bannerDelete_{{$banner->id}}">
    <i class="fas fa-trash-alt"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="bannerDelete_{{$banner->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteBanner_{{$banner->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        	<div class="modal-header">
                <h5 class="modal-title" id="deleteBanner_{{$banner->id}}">
                	Delete banner <img src="{{ asset('storage/banner/'.$banner->img) }}" width="200"> ?
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('banner.destroy', $banner->id)}}" method="POST">
				    @method('DELETE')
				    @csrf
				    <button class="btn btn-danger btn-sm">Delete !</button>
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				</form>
	        </div>
        </div>
    </div>
</div>