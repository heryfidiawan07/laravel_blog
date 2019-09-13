@extends('admin.layouts.app')

@section('content')

    <h3 class="mt-2">User List</h3>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                	<th scope="col">Img</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Joined</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                    	<td>
                    		@if (is_null($user->img))
                    			<i class="fas fa-user"></i>
                    		@else
                    			<img src="{{ asset('storage/user/'.$user->img) }}" alt="" width="25" class="rouded-circle">
                    		@endif
                    	</td>
                        <td>
                        	<a href="{{ route('user.show', $user->slug) }}">
                        		{{$user->name}}
                        	</a>
                        </td>
                        <td>
                        	@if ($user->status == 0)
                        		<span class="text-muted">Unverified</span>
                        	@elseif($user->status == 1)
                        		<span class="text-success">Verified</span>
                        	@elseif($user->status == 2)
                        		<span class="text-danger">Banned</span>
                        	@endif
                        </td>
                        <td><small>{{ date('d M, Y', strtotime($user->created_at))}}</small></td>
                        <td>
                            @include('admin.user.banned')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>

@endsection