@extends('admin.layouts.app')

@section('css')
    <link href="{{ asset('admin/css/multiple-upload.css') }}" rel="stylesheet">
@endsection

@section('content')

	<h2 class="mb-3">Edit Post</h2>
	<form method="POST" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
		@method('PUT')
	    @csrf

	    <div class="form-group">
	        <label for="title">Title</label>
	        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" value="{{$post->title}}" name="title">
	        @error('title')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
	    </div>
	    <div class="form-group">
	    	<label for="menu_id">Menu</label>
	    	<select name="menu_id" id="menu_id" class="form-control">
	    		<option value="{{$post->menu->id}}">{{$post->menu->name}}</option>
	    		@foreach ($menus as $menu)
	    			<option value="{{$menu->id}}">{{$menu->name}}</option>
	    		@endforeach
	    	</select>
	    </div>
	    <div class="form-group">
	        <label for="body-mce">Image</label>
	        @if ($post->pictures()->count())
	            <div>
	                @foreach ($post->pictures as $pict)
						<figure class="figure">
							<img src="{{ asset('storage/post/thumb/'.$pict->img) }}" width="100" class="figure-img img-fluid rounded">
							<figcaption class="figure-caption text-center">
								<a href="{{route('picture.destroy', ['picture' => $pict->id])}}" class="text-danger"><i class="fas fa-trash-alt"></i></a>
							</figcaption>
						</figure>
	                @endforeach
	            </div>
	        @endif
	        <div class="card">
	            @include('partials.multiple-upload')
	        </div>
	    </div>
	    <div class="form-group">
	        <label for="body-mce">Body</label>
	        <textarea id="body_mce" class="form-control @error('body') is-invalid @enderror" rows="20" name="body">{{$post->body}}</textarea>
	        @error('body')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
	    </div>
	    <div class="form-group">
	        <label for="status">Status</label>
	        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
	            @if ($post->status == 0)
	                <option value="0">Draft</option>
	            @endif
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
	            @if ($post->sticky == 1)
	                <option value="1">Yes</option>
	            @endif
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
	            @if ($post->comment == 1)
	                <option value="1">Yes</option>
	            @endif
	            <option value="0">No</option>
	            <option value="1">Yes</option>
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
	                        <input class="form-check-input" type="checkbox" value="{{$category->id}}" id="category_{{$category->id}}" name="categories[]"
	                        	@if ($post->categories()->count())
		                            @foreach ($post->categories as $checked)
		                            	@if ($checked->id == $category->id)
		                            		checked
		                            	@endif
		                            @endforeach
		                        @endif
	                        >
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
	                        <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tag_{{$tag->id}}" name="tags[]"
	                        @if ($post->tags()->count())
	                            @foreach ($post->tags as $checked)
	                                @if ($checked->id == $tag->id)
	                                    checked 
	                                @endif
	                            @endforeach
	                        @endif
	                        >
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
    <script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('admin/js/mce.js') }}"></script>
    <script src="{{ asset('admin/js/multiple-upload.js') }}"></script>
@endsection