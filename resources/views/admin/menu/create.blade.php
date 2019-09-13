<!-- Button trigger modal -->
<button class="btn btn-primary btn-sm mb-1" type="button" data-toggle="modal" data-target="#create_menu">
    <i class="fas fa-pencil-alt"></i> Create Menu
</button>
<!-- Modal -->
<div class="modal fade" id="create_menu" tabindex="-1" role="dialog" aria-labelledby="create_menu" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_menu">Create Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form method="POST" action="{{route('menu.store')}}">
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
                    	<label for="parent">Parent</label>
                    	<select name="parent_id" id="parent" class="form-control">
                    		<option value="0">Default</option>
                    		@foreach ($menus->where('parent_id',0) as $menu)
                    			<option value="{{$menu->id}}">{{$menu->name}}</option>
                    		@endforeach
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