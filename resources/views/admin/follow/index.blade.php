@extends('admin.layouts.app')

@section('content')

    <h3 class="mt-2">Social Media List</h3>
    
    <div class="row">
        
        <div class="col-sm-6">
            @foreach ($providers as $key => $provider)
                <form method="POST" action="{{route('follow.store')}}">
                    @csrf
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <label class="form-check-label" for="follow">
                                    <i class="{{$provider}}"></i>
                                    <input type="hidden" name="provider" value="{{$provider}}">
                                </label>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="url" placeholder=
                        "<?php
                        	$text = explode('-', $provider);
                        	if($text[1] == 'globe'){
                        		echo 'website url';
                        	}else {
                        		echo $text[1] . ' url';
                        	}
                        ?>"
                         required 
                            @foreach ($follows as $follow)
                                @if ($follow->provider_class == $provider)
                                    disabled 
                                @endif
                            @endforeach
                        >
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <button type="submit" class="badge badge-primary"
                                    @foreach ($follows as $follow)
                                        @if ($follow->provider_class == $provider)
                                            disabled 
                                        @endif
                                    @endforeach
                                >
                                    <i class="fas fa-paper-plane"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>

        <div class="col-sm-6">
            @foreach ($follows as $follow)
            	<form method="POST" action="{{ route('follow.update', $follow->id) }}">
                    @csrf
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <label class="form-check-label" for="follow">
                                    <i class="{{$follow->provider_class}}"></i>
                                </label>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="url_edit" value="{{$follow->url}}" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <button type="submit" class="badge badge-primary">
                                    <i class="fas fa-paper-plane"></i> Update
                                </button>
                                | |
                                @include('admin.follow.delete')
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>

    </div>

@endsection