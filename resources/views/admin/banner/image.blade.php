<div id="post_carousel" class="carousel slide text-center bg-silver" data-ride="carousel">

    <div class="carousel-inner">
        @if ($banners)
            @foreach ($banners as $key => $pict)
                <div class="carousel-item @if($key==0) active @endif">
                    <img src="{{ asset('storage/banner/'.$pict->img) }}" class="img-post-show">
                </div>
            @endforeach
        @endif
    </div>
	
	@if ($banners->count() > 1)
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