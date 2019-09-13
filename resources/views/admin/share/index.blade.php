@extends('admin.layouts.app')

@section('content')

    <h3 class="mt-2">Share Button List</h3>
    
    <div class="row">
        
        <div class="col-sm-6 mb-3">
            <form method="POST" action="{{route('share.store')}}">
                @csrf
                <div class="col-auto my-1">
                    @foreach ($providers as $provider => $url)
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="share" value="{{$provider}}::{{$url}}" name="provider[]"
                            @foreach ($share as $shr)
                            	@if ($shr->provider_class == $provider)
                            		disabled 
                            	@endif
                            @endforeach
                            >
                            <label class="form-check-label" for="share">
                                <i class="{{$provider}} fa-2x"></i>
                            </label>
                        </div>
                    @endforeach
                </div>
                <button class="btn btn-primary btn-sm">
                	<i class="fas fa-paper-plane"></i> Save
                </button>
            </form>
        </div>

        <div class="col-sm-6">
        	@foreach ($share as $shr)
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<i class="{{$shr->provider_class}} fa-2x"></i>
						<form action="{{route('share.destroy', ['shr' => $shr->id])}}" method="POST">
						    @method('DELETE')
						    @csrf
						    <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
						</form>
					</li>
				</ul>
        	@endforeach
        </div>

    </div>

@endsection