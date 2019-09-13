@extends('admin.layouts.app')

@section('content')
    
    <h3 class="mt-2">Message List</h3>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{$message->title}}</td>
                        <td>{{$message->email}}</td>
                        <td><small>{{ date('d M, Y', strtotime($message->created_at))}}</small></td>
                        <td>
                            <a href="{{ route('message.show', $message->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                            @include('admin.message.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
	</div>

@endsection