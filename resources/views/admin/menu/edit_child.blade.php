<!-- Button trigger modal -->
<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#edit_menu_child_{{$child->id}}">
    <i class="fas fa-edit"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="edit_menu_child_{{$child->id}}" tabindex="-1" role="dialog" aria-labelledby="edit_menu_child_{{$child->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_menu_child_{{$child->id}}">Edit Menu {{$child->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form method="POST" action="{{route('menu.update', $child->id)}}">
                	@method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name_edit') is-invalid @enderror" id="name" placeholder="Enter name" value="{{$child->name}}" name="name_edit">
                        @error('name_edit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title <small class="text-success">Search engine optimization.</small></label>
                        <input type="text" class="form-control @error('title_edit') is-invalid @enderror" id="title" placeholder="Enter title" value="{{$child->title}}" name="title_edit">
                        @error('title_edit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description <small class="text-success">Search engine optimization.</small></label>
                        <textarea class="form-control @error('description_edit') is-invalid @enderror" rows="3" name="description_edit">{{$child->description}}</textarea>
                        @error('description_edit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    	<label for="parent">Parent</label>
                    	<select name="parent_id_edit" id="parent" class="form-control">
                    		<option value="{{$child->parent->id}}">{{$child->parent->name}}</option>
                    		<option value="0">Default</option>
                    		@foreach ($parents as $parent)
                    			<option value="{{$parent->id}}">{{$parent->name}}</option>
                    		@endforeach
                    	</select>
                    </div>
                    <div class="form-group">
                    	<label for="status">Status</label>
                    	<select name="status_edit" id="status" class="form-control">
                    		@if ($child->status == 0)
                    			<option value="0">Draft</option>
                    		@endif
                    		<option value="1">Active</option>
                    		<option value="0">Draft</option>
                    	</select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-paper-plane"></i> Save
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>