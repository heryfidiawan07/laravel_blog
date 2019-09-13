<!-- Modal -->
<div class="modal fade" id="user_img" tabindex="-1" role="dialog" aria-labelledby="user_img" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="user_img">Upload Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form action="{{ route('user.img', $user->slug) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
					    @include('partials.upload')
					</div>
					<button type="submit" class="btn btn-primary btn-sm">
						<i class="fas fa-paper-plane"></i>
					</button>
				</form>

            </div>
        </div>
    </div>
</div>
