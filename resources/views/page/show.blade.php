@extends('layouts.app')

@if ($app)
@section('image'){{ asset('storage/app/img/'.$app->img) }}@endsection
@endif
@section('title'){{$page->name}}@endsection
@section('description'){{strip_tags(str_limit($page->title, 145))}}@endsection

@section('content')
<div class="container">
	
	<div class="row">
		<div class="col-md-7">
		    <h3 class="page-title-show bold">{{$page->title}}</h3>
		    <hr>
		    <div class="page-body-show" style="font-size: 16px;">
		    	{!! $page->body !!}
		    </div>
		    
		</div>

		<div class="col-md-5">
			@if ($page->form == 1)
		    	@include('page.form')
		    @endif
		</div>
	</div>

</div>
@endsection
