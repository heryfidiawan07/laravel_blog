<div class="footer bg-GainsBoro p-3">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				@if ($app)
					<p>{{$app->title}}</p>
				@endif
				@include('partials.follow')
				@if($app)
					<p class="text-secondary mt-3">
						Contact
						<br>
						<a href="telp://{{$app->phone}}" class="no-underline text-secondary">
							<i class="fas fa-phone text-secondary"></i> {{$app->phone}}
						</a>
						<br>
						<a href="mailto:{{$app->email}}" class="no-underline text-secondary">
							<i class="fas fa-envelope"></i> {{$app->email}}
						</a>
					</p>
				@endif
				@if ($privacy_policy)
					<p class="mt-2">
						<a href="{{ route('page.show', $privacy_policy->slug) }}" class="no-underline text-secondary">
							<i class="fas fa-chevron-right"></i> {{$privacy_policy->name}}
						</a>
					</p>
				@endif
			</div>
			<div class="col-lg-2"></div>
			<div class="col-lg-4 col-md-6">
				<div class="mb-2">
					@if ($footCats->count())
						<b>Category</b>
						<br>
					    @foreach ($footCats as $category)
					    	<a href="{{ route('category.slug', $category->slug) }}" class="badge badge-secondary p-2 mt-2">{{$category->name}}</a>
					    @endforeach
				    @endif
				</div>
				<div class="mb-3">
				    @if ($footTags->count())
				    	<b class="mt-2">Tags</b>
						<br>
						@foreach ($footTags as $tag)
							<a href="{{ route('tag.slug', $tag->slug) }}" class="badge badge-dark p-2 mt-2">{{$tag->name}}</a>
						@endforeach
				    @endif
				</div>
				@guest
					<a class="text-secondary mr-3 no-underline" href="{{ route('login') }}">{{ __('Login') }}</a>
	                @if (Route::has('register'))
						<a class="text-secondary no-underline" href="{{ route('register') }}">{{ __('Register') }}</a>
	                @endif
				@endguest
			</div>
		</div>
		<div class="text-center">
			@if($app && $app->img != null) <img src="{{ asset('storage/app/thumb/'.$app->img) }}" class="rounded-circle" height="40"> @endif
			<p class="text-dark mt-2">
		        &copy; Copyright {{date('Y')}}. <a href="{{ url('/') }}" class="text-dark">@if ($app){{$app->app_name}}@endif</a>
		        <br>
		        All Rights Reserved
		    </p>
		    @if ($app)
		        <p class="text-dark">
		            <small>By <a class="text-dark" href="mailto:heryfidiawan07@gmail.com"><i>Hery_Dev__</i></a></small>
		        </p>
		    @endif
		</div>
	</div>
</div>