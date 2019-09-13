<div class="container mb-4 mt-3">
	<div class="row">
		<div class="col-md-7">
			<h3>
				<a class="bold italic text-muted" id="app-name" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
			</h3>
		</div>
		<div class="col-md-5">
			@include('partials.follow')
		</div>
	</div>
</div>
<nav class="navbar navbar-expand-md bg-secondary shadow-sm fixed-top">
    <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    	<i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            @if ($tags)
            	@foreach ($tags as $tag)
                	<li class="nav-item">
	                    <a class="nav-link text-white bold" href="{{ route('tag.slug', ['tag' => $tag->slug]) }}">{{$tag->name}}</a>
	                </li>
            	@endforeach
            @endif
            @if ($categories)
            	@foreach ($categories as $category)
                	<li class="nav-item">
	                    <a class="nav-link text-white bold" href="{{ route('category.slug', ['category' => $category->slug]) }}">{{$category->name}}</a>
	                </li>
            	@endforeach
            @endif
            @if ($menus)
            	@foreach ($menus as $menu)
                	<li class="nav-item @if($menu->childs_active()->count()) dropdown @endif">
	                    <a class="nav-link text-white bold @if($menu->childs_active()->count()) dropdown-toggle @endif" @if($menu->childs_active()->count()) href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre @else href="{{ route('menu.slug', ['menu' => $menu->slug]) }}" @endif>
	                    	{{$menu->name}}
	                    	@if($menu->childs_active()->count())
	                    		<span class="caret"></span>
	                    	@endif
	                    </a>
	                    @if($menu->childs_active()->count())
	                    	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	                    		@foreach ($menu->childs as $child)
		                        	<a class="dropdown-item" href="{{ route('menu.slug', ['menu' => $child->slug]) }}">
		                        		{{$child->name}}
		                        	</a>
		                        @endforeach
		                    </div>
	                    @endif
	                </li>
            	@endforeach
            @endif
            @if ($pages)
            	@foreach ($pages as $page)
                	<li class="nav-item">
	                    <a class="nav-link text-white bold" href="{{ route('page.show', ['page' => $page->slug]) }}">{{$page->name}}</a>
	                </li>
            	@endforeach
            @endif
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link text-white bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
	                <li class="nav-item">
	                    <a class="nav-link text-white bold" href="{{ route('register') }}">{{ __('Register') }}</a>
	                </li>
                @endif
            @else
                @if (Auth::user()->admin())
                	<li class="nav-item">
                		<a class="nav-link text-white bold" href="{{route('admin.dashboard')}}">
	                        Dashboard
	                    </a>
                	</li>
                @endif
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link text-white bold dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                        @if (is_null(Auth::user()->img))
                        	<i class="fas fa-user"></i>
                        @else
                        	<img src="{{ asset('storage/user/'.Auth::user()->img) }}" class="rounded-circle" width="20">
                        @endif
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    	<a class="dropdown-item bold" href="{{ route('user.show', Auth::user()->slug) }}">
                            Profile
                        </a>
                        <a class="dropdown-item bold" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>