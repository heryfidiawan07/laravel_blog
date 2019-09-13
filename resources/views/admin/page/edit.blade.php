@extends('admin.layouts.app')

@section('content')

	<h2 class="mb-3">Edit Page</h2>
	<form method="POST" action="{{route('page.update', $page->id)}}">
	    @method('PUT')
	    @csrf

	    <div class="form-group">
	        <label for="name">Name</label>
	        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" value="{{$page->name}}" name="name">
	        @error('name')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
	    </div>
	    <div class="form-group">
	        <label for="title">Title <small class="text-success">Search engine optimization.</small></label>
	        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" value="{{$page->title}}" name="title">
	        @error('title')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
	    </div>
	    <div class="form-group">
	        <label for="body-mce">Body</label>
	        <textarea id="body_mce" class="form-control @error('body') is-invalid @enderror" rows="20" name="body">{{$page->body}}</textarea>
	        @error('body')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
	    </div>
	    <div class="form-group">
	    	<label for="form">Include Form ?</label>
	    	<select name="form" id="form" class="form-control @error('form') is-invalid @enderror">
	    		@if ($page->form == 1)
	    			<option value="1">Yes</option>
	    		@endif
	    		<option value="0">No</option>
	    		<option value="1">Yes</option>
	    	</select>
	    	@error('form')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
	    </div>
	    <button type="submit" class="btn btn-primary btn-sm">
	        <i class="fas fa-paper-plane"></i> Update
	    </button>
	</form>

@endsection

@section('js')
	<script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
	<script src="{{ asset('admin/js/mce.js') }}"></script>
@endsection