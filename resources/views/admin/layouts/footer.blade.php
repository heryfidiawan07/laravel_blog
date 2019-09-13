<div class="container my-auto">
	<div class="copyright text-center my-auto">
		@if ($app)
			@if(! is_null($app->img)) <img src="{{ asset('storage/app/thumb/'.$app->img) }}" class="rounded-circle mb-3" height="30"> @endif
		@endif
		<p>
		    &copy; Copyright {{date('Y')}}. <a href="{{ url('/') }}" class="text-dark">@if ($app){{$app->app_name}}@endif</a>
		</p>
		<p>All Rights Reserved</p>
		@if ($app)
		    <p>
		        <small>By <a class="text-dark" href="mailto:heryfidiawan07@gmail.com"><i>Hery_Dev__</i></a></small>
		    </p>
		@endif
	</div>
</div>