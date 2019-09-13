<div class="collapse mb-2" id="editName_{{$user->id}}">
	<form action="{{ route('user.edit', $user->slug) }}" method="POST">
		@csrf
		<div class="form-row">
			<div class="col-sm-7">
				<input type="text" class="form-control form-control-sm" name="name" value="{{$user->name}}" required>
			</div>
			<div class="col-auto">
				<button type="submit" class="btn btn-primary btn-sm">
					<i class="fas fa-paper-plane"></i>
				</button>
			</div>
		</div>
	</form>
</div>