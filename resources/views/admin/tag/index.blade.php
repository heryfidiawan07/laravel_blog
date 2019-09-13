@extends('admin.layouts.app')

@section('content')

    <h3 class="mt-2">Tag List</h3>
    <div class="table-responsive">
        @include('admin.tag.create')
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col" class="text-center">Menu Type</th>
                    <th scope="col">Posts</th>
                    <th scope="col">User</th>
                    <th scope="col">Created</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>
                        	<a href="{{ route('tag.slug', $tag->slug) }}">
                        		{{$tag->name}}
                        	</a>
                        </td>
                        <td>{{$tag->title}}</td>
                        <td>{{$tag->description}}</td>
                        <td class="text-center">
                        	@if ($tag->menu_type == 1)
                        		<span class="text-success"><i class="fas fa-check-circle"></i></span>
                        	@else
                        		<span class="text-danger"><i class="fas fa-times-circle"></i></span>
                        	@endif
                        </td>
                        <td><i class="fas fa-newspaper"></i> {{$tag->posts()->count()}}</td>
                        <td>{{$tag->user->name}}</td>
                        <td><small>{{ date('d M, Y', strtotime($tag->created_at))}}</small></td>
                        <td>
                            @include('admin.tag.edit')
                            @include('admin.tag.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection