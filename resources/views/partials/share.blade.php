@if ($share->count())
	<div class="container mt-5">
	    <i class="fas fa-share-alt" style="width: 20px;"></i>
	    @foreach ($share as $shr)
	    	<a href="{{$shr->url}}" class="badge badge-light border border-secondary p-2 mt-2 share"><i class="{{$shr->provider_class}} fa-2x"></i></a>
	    @endforeach
	</div>
@endif