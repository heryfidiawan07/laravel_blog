@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
@endif
<form method="POST" action="{{route('message.store')}}">
    @csrf

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" value="{{old('title')}}" name="title">
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email"@auth value="{{Auth::user()->email}}" readonly @else value="{{old('email')}}" @endauth name="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="body">Message</label>
        <textarea class="form-control @error('body') is-invalid @enderror" rows="7" name="body">{{old('body')}}</textarea>
        @error('body')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
    	<label for="g-recaptcha">Validation</label>
    	@include('partials.g-recaptcha')
    </div>
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fas fa-paper-plane"></i> Send
    </button>
</form>