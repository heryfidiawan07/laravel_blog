@extends('admin.layouts.app')

@section('css')
    <link href="{{ asset('admin/css/multiple-upload.css') }}" rel="stylesheet">
@endsection

@section('content')

	<h2 class="mb-3">Create Post</h2>
	<form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
	    @csrf

	    <div class="form-group">
	        <label for="title">Title</label>
	        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" value="{{old('title')}}" name="title" required>
	        @error('title')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
	    </div>
	    <div class="form-group">
	    	<label for="menu_id">Menu</label>
	    	<select name="menu_id" id="menu_id" class="form-control">
	    		@foreach ($menus as $menu)
	    			<option value="{{$menu->id}}">{{$menu->name}}</option>
	    		@endforeach
	    	</select>
	    </div>
	    <div class="form-group">
	        <label for="img">Image</label>
	        @error('img')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
	        <div class="card">
	            @include('partials.multiple-upload')
	        </div>
	    </div>
	    <div class="form-group">
	        <label for="body-mce">Body</label>
	        <textarea id="body_mce" class="form-control @error('body') is-invalid @enderror" rows="20" name="body">{{old('body')}}</textarea>
	        @error('body')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
	    </div>
	    <div class="form-group">
	    	<label for="status">Status</label>
	    	<select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
	            <option value="1">Publish</option>
	    		<option value="0">Draft</option>
	    	</select>
	    	@error('status')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
	    </div>
	    <div class="form-group">
	        <label for="sticky">Sticky</label>
	        <select name="sticky" id="sticky" class="form-control @error('sticky') is-invalid @enderror">
	            <option value="0">No</option>
	            <option value="1">Yes</option>
	        </select>
	        @error('sticky')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
	    </div>
	    <div class="form-group">
	        <label for="comment">Allow Comments ?</label>
	        <select name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror">
	            <option value="1">Yes</option>
	            <option value="0">No</option>
	        </select>
	        @error('comment')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
	    </div>
	    <div class="form-group">
	        <div class="row">
	            <div class="col-md-6">
	                <label for="category">Category</label>
	                @foreach ($categories as $category)
	                    <div class="form-check">
	                        <input class="form-check-input" type="checkbox" value="{{$category->id}}" id="category_{{$category->id}}" name="categories[]">
	                        <label class="form-check-label" for="category_{{$category->id}}">
	                            {{$category->name}}
	                        </label>
	                    </div>
	                @endforeach
	            </div>
	            <div class="col-md-6">
	                <label for="tag">Tag</label>
	                @foreach ($tags as $tag)
	                    <div class="form-check">
	                        <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tag_{{$tag->id}}" name="tags[]">
	                        <label class="form-check-label" for="tag_{{$tag->id}}">
	                            {{$tag->name}}
	                        </label>
	                    </div>
	                @endforeach
	            </div>
	        </div>
	    </div>
	    <button type="submit" class="btn btn-primary btn-sm">
	        <i class="fas fa-paper-plane"></i> Save
	    </button>
	</form>

@endsection

@section('js')
	<script src="{{ asset('admin/js/multiple-upload.js') }}"></script>
	<script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
	<script src="{{ asset('admin/js/mce.js') }}"></script>
@endsection