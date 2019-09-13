<!-- Button trigger modal -->
<button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#delete_menu_{{$menu->id}}">
    <i class="fas fa-trash-alt"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="delete_menu_{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="delete_menu_{{$menu->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        	<div class="modal-header">
                <h5 class="modal-title" id="delete_menu_{{$menu->id}}">Delete Menu {{$menu->name}} ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
	        	@if ($menu->posts()->count())
	        		This menu has posts, please edit or delete posts before deleting this menu.
	        	@else
	                <form action="{{route('menu.destroy', $menu->id)}}" method="POST">
					    @method('DELETE')
					    @csrf
					    <button class="btn btn-danger btn-sm">Delete !</button>
						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
					</form>
	        	@endif
	        </div>
        </div>
    </div>
</div>