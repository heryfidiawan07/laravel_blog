<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
		<div class="sidebar-brand-icon rotate-n-15">
			@if($app && $app->img != null) <img src="{{ asset('storage/app/thumb/'.$app->img) }}" class="rounded-circle" height="40"> @endif
		</div>
		<div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
	</a>
	<!-- Divider -->
	<hr class="sidebar-divider my-0">
	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="{{ route('admin.dashboard') }}">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<!-- Divider -->
	{{-- <hr class="sidebar-divider"> --}}
	<!-- Heading -->
	{{-- <div class="sidebar-heading">
		=====
	</div> --}}
	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link" href="{{route('menu.index')}}">
			<i class="fas fa-list"></i>
			<span>Menu</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pages" aria-expanded="true" aria-controls="pages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Pages</span>
		</a>
		<div id="pages" class="collapse" aria-labelledby="pages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a href="{{route('page.index')}}" class="collapse-item">
					<i class="fas fa-fw fa-folder"></i> All Page
				</a>
				<a href="{{route('page.create')}}" class="collapse-item">
					<i class="fas fa-pencil-alt"></i> Create Page
				</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#posts" aria-expanded="true" aria-controls="posts">
			<i class="fas fa-newspaper"></i>
			<span>Posts</span>
		</a>
		<div id="posts" class="collapse" aria-labelledby="posts" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a href="{{route('post.index')}}" class="collapse-item">
					<i class="fas fa-newspaper"></i> All Post
				</a>
				<a href="{{route('post.create')}}" class="collapse-item">
					<i class="fas fa-pencil-alt"></i> Create Post
				</a>
			</div>
		</div>
	</li>
	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#utilities" aria-expanded="true" aria-controls="utilities">
			<i class="fas fa-fw fa-wrench"></i>
			<span>Utilities</span>
		</a>
		<div id="utilities" class="collapse" aria-labelledby="utilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a href="{{route('app.index')}}" class="collapse-item">
					<i class="fas fa-cogs"></i> App Setting
		        </a>
				<a href="{{ route('user.index') }}" class="collapse-item">
		            <i class="fas fa-users-cog"></i> Users
		        </a>
		        <a href="{{ route('banner.index') }}" class="collapse-item">
		            <i class="fas fa-ad"></i> Banner
		        </a>
		        <a href="{{route('message.index')}}" class="collapse-item"> 
					<i class="fas fa-envelope"></i> Messages
				</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{route('category.index')}}">
			<i class="fas fa-cubes"></i>
			<span>Categories</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{route('tag.index')}}">
			<i class="fas fa-tags"></i>
			<span>Tags</span>
		</a>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider">
	<!-- Heading -->
	<div class="sidebar-heading">
		Social Media
	</div>
	<li class="nav-item">
		<a href="{{route('follow.index')}}" class="nav-link">
            <i class="fab fa-instagram"></i>
            <span>Follow</span>
        </a>
        <a href="{{route('share.index')}}" class="nav-link">
            <i class="fas fa-share-alt"></i>
            <span>Share</span>
        </a>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">
	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>
