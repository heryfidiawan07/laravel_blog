@extends('admin.layouts.app')

@section('content')
    
    <h3 class="mt-2">Page List</h3>
    <div class="table-responsive">
        <a href="{{route('page.create')}}" class="btn btn-primary btn-sm mb-1">
		    <i class="fas fa-pencil-alt"></i> Create Page
		</a>
		@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col" class="text-center">Form</th>
                    <th scope="col">User</th>
                    <th scope="col">Created</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>
                        	<a href="{{ route('page.show', ['page' => $page->slug]) }}">
                        		{{$page->name}}
                        	</a>
                        </td>
                        <td>{{$page->title}}</td>
                        <td class="text-center">
                        	@if ($page->form == 1)
                        		<span class="text-success"><i class="fas fa-check-circle"></i></span>
                        	@else
                        		<span class="text-danger"><i class="fas fa-times-circle"></i></span>
                        	@endif
                        </td>
                        <td>{{$page->user->name}}</td>
                        <td><small>{{ date('d M, Y', strtotime($page->created_at))}}</small></td>
                        <td>
                            <a href="/page/{{$page->slug}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="{{route('page.edit', ['page' => $page->id])}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            @if ($page->privacy_policy==0)
                            	@include('admin.page.delete')
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection