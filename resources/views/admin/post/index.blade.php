@extends('admin.layouts.app')

@section('content')
<a href="{{route('post.create')}}" class="btn btn-primary btn-sm mb-1">
    <i class="fas fa-pencil-alt"></i> Create Post
</a>
@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
@endif

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Post List</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Image</th>
	                    <th>Title</th>
	                    <th>Menu</th>
	                    <th>Categories</th>
	                    <th>Tags</th>
	                    <th>Status</th>
	                    <th>Comment</th>
	                    <th>Views</th>
	                    <th>User</th>
	                    <th>Created</th>
	                    <th class="text-center">Action</th>
					</tr>
				</thead>
				<tfoot>
				<tr>
					<th>Image</th>
                    <th>Title</th>
                    <th>Menu</th>
                    <th>Categories</th>
                    <th>Tags</th>
                    <th>Status</th>
                    <th>Comment</th>
                    <th>Views</th>
                    <th>User</th>
                    <th>Created</th>
                    <th class="text-center">Action</th>
				</tr>
				</tfoot>
				<tbody>
					@foreach ($posts as $post)
	                    <tr @if ($post->sticky == 1) class="text-success" @endif>
	                    	<td>
	                    		<img src="@if ($post->pictures()->count()){{ asset('storage/post/thumb/'.$post->pictures[0]->img) }}@else{{ asset('parts/no-image.png') }}@endif" alt="" class="img-responsive" width="70">
	                    	</td>
	                        <td style="min-width: 200px;">
	                        	<a href="{{route('post.show', $post->slug)}}">{{str_limit($post->title, 50)}}</a>
	                        </td>
	                        <td>
	                        	<a href="{{route('menu.slug', $post->menu->slug)}}" class="badge badge-light p-2 @if ($post->menu->status == 0) text-danger @endif">
	                        		{{$post->menu->name}}
	                        	</a>
	                        </td>
	                        <td>
	                            @foreach ($post->categories as $category)
	                                <a href="{{ route('category.slug', $category->slug) }}" class="badge badge-secondary">{{$category->name}}</a>
	                            @endforeach
	                        </td>
	                        <td>
	                            @foreach ($post->tags as $tag)
	                                <a href="{{ route('tag.slug', $tag->slug) }}" class="badge badge-secondary">{{$tag->name}}</a>
	                            @endforeach
	                        </td>
	                        <td align="center">
	                            @if ($post->status == 1)
	                                <span class="text-success">Publish</span>
	                            @else
	                                <span class="text-danger">Draft</span>
	                            @endif
	                        </td>
	                        <td align="center">
	                            <span @if ($post->comment == 0)class="text-danger" @endif>
	                                <i class="fas fa-comment"></i>
	                            </span>
	                            {{$post->comments()->count()}}
	                        </td>
	                        <td>
	                        	{{number_format($post->counter)}}
	                        </td>
	                        <td>{{$post->user->name}}</td>
	                        <td width="100">
	                        	<small>{{ date('d M, Y', strtotime($post->created_at))}}</small>
	                        </td>
	                        <td class="text-center" width="100">
	                            <a href="{{route('post.edit', $post->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
	                            @include('admin.post.delete')
	                        </td>
	                    </tr>
	                @endforeach
					
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('js')
	<!-- Page level plugins -->
	<script src="{{ asset('style-vendor/vendor/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('style-vendor/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

	<!-- Page level custom scripts -->
	<script src="{{ asset('style-vendor/js/demo/datatables-demo.js') }}"></script>
@endsection