@extends('admin.layouts.app')

@section('css')
    <link href="{{ asset('admin/css/multiple-upload.css') }}" rel="stylesheet">
@endsection

@section('content')

	@if($banners)
		<div class="row mb-5">
			@include('admin.banner.image')
		</div>
	@endif

	<div class="row">

		<div class="col-md-12">
			<form method="POST" action="{{route('banner.store')}}" enctype="multipart/form-data">
		    	@csrf
		    	<div class="form-group">
			        <label>
			        	Image <small class="text-warning"><i><u>The picture will be displayed with a resolution 1115px - 141px. We recommend using or design a banner first to make it look cool.</u></i></small>
			        </label>
			        @error('img')
			            <span class="invalid-feedback" role="alert">
			                <strong>{{ $message }}</strong>
			            </span>
			        @enderror
			        <div class="card">
			            @include('partials.multiple-upload')
			        </div>
			    </div>
			    <button type="submit" class="btn btn-primary btn-sm">
			        <i class="fas fa-paper-plane"></i> Save
			    </button>
		    </form>
		</div>

	</div>

    <h3 class="mt-4">Banner List</h3>
    
    @if($banners)
	    <div class="row">
	    	@foreach ($banners as $banner)
				<div class="card mb-3">
					<img src="{{ asset('storage/banner/'.$banner->img) }}" class="card-img-top">
					<div class="card-body text-center">
						@include('admin.banner.delete')
					</div>
				</div>
	    	@endforeach
	    </div>
	@endif

@endsection

@section('js')
	<script src="{{ asset('admin/js/multiple-upload.js') }}"></script>
@endsection