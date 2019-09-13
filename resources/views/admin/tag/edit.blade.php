<!-- Button trigger modal -->
<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#edit_tag_{{$tag->id}}">
    <i class="fas fa-edit"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="edit_tag_{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="edit_tag_{{$tag->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_tag_{{$tag->id}}">Edit Tag {{$tag->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form method="POST" action="{{route('tag.update', $tag->id)}}">
                	@method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name_edit') is-invalid @enderror" id="name" placeholder="Enter name" value="{{$tag->name}}" name="name_edit">
                        @error('name_edit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title <small class="text-success">Search engine optimization.</small></label>
                        <input type="text" class="form-control @error('title_edit') is-invalid @enderror" id="title" placeholder="Enter title" value="{{$tag->title}}" name="title_edit">
                        @error('title_edit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description <small class="text-success">Search engine optimization.</small></label>
                        <textarea class="form-control @error('description_edit') is-invalid @enderror" rows="3" name="description_edit">{{$tag->description}}</textarea>
                        @error('description_edit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    	<label for="menu_type_edit">Add to menu</label>
                    	<select name="menu_type_edit" id="menu_type_edit" class="form-control">
                    		@if ($tag->menu_type == 1)
                    			<option value="1">Yes</option>
                    		@endif
                    		<option value="0">No</option>
                    		<option value="1">Yes</option>
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