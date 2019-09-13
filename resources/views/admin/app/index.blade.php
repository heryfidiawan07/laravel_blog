@extends('admin.layouts.app')

@section('css')
    <link href="{{ asset('admin/css/multiple-upload.css') }}" rel="stylesheet">
@endsection

@section('content')
    
    <h3 class="mt-2">App Setting</h3>
    <div class="row">
    	<div class="col-md-6">
    		@if ($app)
			    <div class="table-responsive">
			        <table class="table table-hover">
			            <tbody>
			            	<tr>
			                	<th scope="col">Img</th>
			                    <td>
			                    	@if (! is_null($app->img))
			                    		<img src="{{ asset('storage/app/thumb/'.$app->img) }}" width="100">
			                    	@endif
			                    </td>
			                </tr>
			                <tr>
			                	<th scope="col">Name</th>
			                    <td>{{$app->app_name}}</td>
			                </tr>
			                <tr>
			                	<th scope="col">Title</th>
			                    <td>{{$app->title}}</td>
							</tr>
							<tr>
								<th scope="col">Description</th>
			                    <td>{{$app->description}}</td>
			                </tr>
			                <tr>
			                	<th scope="col">Author</th>
			                    <td>{{$app->author}}</td>
			                </tr>
			                <tr>
			                	<th scope="col">Company</th>
			                    <td>{{$app->company}}</td>
			                </tr>
			                <tr>
			                	<th scope="col">Email</th>
			                    <td>{{$app->email}}</td>
			                </tr>
			                <tr>
			                	<th scope="col">Phone</th>
			                    <td>{{$app->phone}}</td>
			                </tr>
			                <tr>
			                	<th scope="col">Fax</th>
			                    <td>{{$app->fax}}</td>
			                </tr>
			                <tr>
			                	<th scope="col">Address</th>
			                    <td>{{$app->address}}</td>
			                </tr>
			                <tr>
			                	<th scope="col">Created</th>
			                    <td><small>{{ date('d M, Y', strtotime($app->created_at))}}</small></td>
			                </tr>
			            </tbody>
			        </table>
			    </div>
    		@endif

    	</div>
    	<div class="col-md-6">
    		@if (! $app)
    			@include('admin.app.create')
    		@else
    			@include('admin.app.edit')
    		@endif
    	</div>
    </div>

@endsection

@section('js')
	<script src="{{ asset('admin/js/multiple-upload.js') }}"></script>
@endsection