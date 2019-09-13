<form method="POST" action="{{route('app.store')}}" enctype="multipart/form-data">
    @csrf
	
	<div class="form-group">
		<label for="img">Logo</label>
		<a href="javascript:void(0)" onclick="$('#pro-image').click()">
			<i class="fas fa-upload"></i> Upload Logo
		</a>
		<input type="file" id="pro-image" name="img" style="display: none;" class="form-control">
		<div class="preview-images-zone"></div>
		@error('img')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
	</div>
    <div class="form-group">
        <label for="app_name">Name</label>
        <input type="text" class="form-control @error('app_name') is-invalid @enderror" id="app_name" placeholder="Enter app_name" value="{{old('app_name')}}" name="app_name">
        @error('app_name')
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
        <label for="author">Author</label>
        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" placeholder="Enter author" value="{{old('author')}}" name="author">
        @error('author')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="company">Company</label>
        <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" placeholder="Enter company" value="{{old('company')}}" name="company">
        @error('company')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{old('email')}}" name="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter phone" value="{{old('phone')}}" name="phone">
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="fax">Fax</label>
        <input type="text" class="form-control @error('fax') is-invalid @enderror" id="fax" placeholder="Enter fax" value="{{old('fax')}}" name="fax">
        @error('fax')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" id="address" rows="5" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address">{{old('address')}}</textarea>
        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fas fa-paper-plane"></i> Save
    </button>
</form>