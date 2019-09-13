<!-- Button trigger modal -->
<button class="btn btn-primary btn-sm mb-1" type="button" data-toggle="modal" data-target="#create_tag">
    <i class="fas fa-pencil-alt"></i> Create Tag
</button>
<!-- Modal -->
<div class="modal fade" id="create_tag" tabindex="-1" role="dialog" aria-labelledby="create_tag" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_tag">Create Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form method="POST" action="{{route('tag.store')}}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" value="{{old('name')}}" name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title <small class="text-success">Search engine optimization.</small></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" value="{{old('title')}}" name="title">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description <small class="text-success">Search engine optimization.</small></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" rows="3" name="description">{{old('description')}}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    	<label for="menu_type">Add to menu</label>
                    	<select name="menu_type" id="menu_type" class="form-control">
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