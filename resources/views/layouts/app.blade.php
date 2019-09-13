<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if ($app)
    	<meta name="author"           content="{{$app->author}}" />
        <meta name="company"           content="{{$app->company}}" />
        <meta name="email"           content="{{$app->email}}" />
        <meta name="address"           content="{{$app->address}}" />
    @endif

    <title>@yield('title')</title>
	
	<meta name="url"           content="{{Request::url()}}" />
    <meta name="image"         content="@yield('image')" />
    <meta name="title"         content="@yield('title')" />
    <meta name="description"   content="@yield('description')" />

    <meta property="og:image" content="@yield('image')" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
	{{-- Title Icon --}}
	<link href="@if($app){{ asset('storage/app/thumb/'.$app->img) }}@endif" rel='shortcut icon'>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <!-- Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/social-media.css') }}" rel="stylesheet">
    @yield('css')
    <style>
    	body {
    		background-color: white;
    	}
    </style>
</head>
<body>
    <div id="app">
        
        @include('layouts.navbar')

        <main class="py-4">
            @yield('content')
            @include('partials.share')
        </main>

        @include('layouts.footer')

    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/share.js') }}" defer></script>
    @yield('js')

</body>
</html>
