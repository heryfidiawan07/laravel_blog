@extends('admin.layouts.app')

@section('content')
    
    <h3 class="mt-2">Menu List</h3>
    <div class="table-responsive">
        @include('admin.menu.create')
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">User</th>
                    <th scope="col">Status</th>
                    <th scope="col">Posts</th>
                    <th scope="col">Created</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus->where('parent_id',0) as $menu)
                    <tr>
                        <td>
                        	<a href="{{route('menu.slug', $menu->slug)}}">{{$menu->name}}</a>
                        </td>
                        <td>{{$menu->title}}</td>
                        <td>{{$menu->description}}</td>
                        <td>{{$menu->user->name}}</td>
                        <td>
                        	<i @if ($menu->status == 0) class="fas fa-times-circle text-danger" @else class="fas fa-check-circle text-success" @endif ></i>
                        </td>
                        <td><i class="fas fa-newspaper"></i> {{$menu->posts()->count()}}</td>
                        <td><small>{{ date('d M, Y', strtotime($menu->created_at))}}</small></td>
                        <td>
                            @include('admin.menu.edit')
                            @include('admin.menu.delete')
                        </td>
                    </tr>
                    @if ($menu->childs->count())
                    	@foreach ($menu->childs as $child)
                    		<tr>
                    			<td>
                    				<a href="{{route('menu.slug', $child->slug)}}">
                    					<i>__{{$child->name}}</i>
                    				</a>
                    			</td>
		                        <td><i>{{$child->title}}</i></td>
		                        <td><i>{{$child->description}}</i></td>
		                        <td><i>{{$child->user->name}}</i></td>
		                        <td>
		                        	<i @if ($child->status == 0) class="fas fa-times-circle text-danger" @else class="fas fa-check-circle text-success" @endif ></i>
		                        </td>
		                        <td><i class="fas fa-newspaper"></i> {{$child->posts()->count()}}</td>
		                        <td>
		                        	<i><small>{{ date('d F, Y', strtotime($child->created_at))}}</small></i>
		                        </td>
		                        <td>
		                            @include('admin.menu.edit_child')
		                            @include('admin.menu.delete_child')
		                        </td>
                    		</tr>
                    	@endforeach
                	@endif
                @endforeach
            </tbody>
        </table>
    </div>

@endsection