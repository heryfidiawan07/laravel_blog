@extends('admin.layouts.app')

@section('content')
    
    <h3 class="mt-2">Message Show</h3>
	
	<div class="row">
		<div class="col-md-8">
		    <p><strong>{{$message->title}}</strong></p>
		    <p><strong>{{$message->email}}</strong></p>
		    <hr>
		    <div class="message-body-show" style="font-size: 16px;">
		    	{!! $message->body !!}
		    </div>
		</div>

		<div class="col-md-4">
		</div>
	</div>

@endsection
