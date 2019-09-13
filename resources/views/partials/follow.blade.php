@if($follow->count())
	<b>Follow:</b>
	<br>
	@foreach ($follow as $flw)
		<a href="{{$flw->url}}" class="badge badge-light p-2 mt-2"><i class="{{$flw->provider_class}} fa-2x"></i></a>
	@endforeach
@endif