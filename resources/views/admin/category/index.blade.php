@extends('admin.layouts.app')

@section('content')
    
    <h3 class="mt-2">Category List</h3>
    <div class="table-responsive">
        @include('admin.category.create')
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
                @foreach ($categories as $category)
                    <tr>
                        <td>
                        	<a href="{{ route('category.slug', $category->slug) }}">
                        		{{$category->name}}
                        	</a>
                        </td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->description}}</td>
                        <td class="text-center">
                        	@if ($category->menu_type == 1)
                        		<span class="text-success"><i class="fas fa-check-circle"></i></span>
                        	@else
                        		<span class="text-danger"><i class="fas fa-times-circle"></i></span>
                        	@endif
                        </td>
                        <td><i class="fas fa-newspaper"></i> {{$category->posts()->count()}}</td>
                        <td>{{$category->user->name}}</td>
                        <td><small>{{ date('d M, Y', strtotime($category->created_at))}}</small></td>
                        <td>
                            @include('admin.category.edit')
                            @include('admin.category.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection