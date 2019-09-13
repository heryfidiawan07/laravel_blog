<div id="post_carousel" class="carousel slide text-center bg-silver" data-ride="carousel">
    
    <ol class="carousel-indicators">
        @if ($post->pictures()->count() > 1)
            @foreach ($post->pictures as $key => $pict)
                <li data-target="#post_carousel" data-slide-to="{{$key}}" @if($key==0) class="active" @endif>
                    <img src="{{ asset('storage/post/thumb/'.$pict->img) }}" class="d-block w-100" alt="{{$post->title}}" height="20">
                </li>
            @endforeach
        @endif
    </ol>
    
    <div class="carousel-inner">
        @if ($post->pictures->count())
            @foreach ($post->pictures as $key => $pict)
                <div class="carousel-item @if($key==0) active @endif">
                    <img src="{{ asset('storage/post/img/'.$pict->img) }}" id="img-post-show" alt="{{$post->title}}">
                </div>
            @endforeach
        @endif
    </div>
	
	@if ($post->pictures()->count() > 1)
	    <a class="carousel-control-prev" href="#post_carousel" role="button" data-slide="prev">
	        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	        <span class="sr-only">Previous</span>
	    </a>
	    <a class="carousel-control-next" href="#post_carousel" role="button" data-slide="next">
	        <span class="carousel-control-next-icon" aria-hidden="true"></span>
	        <span class="sr-only">Next</span>
	    </a>
	@endif
</div>
