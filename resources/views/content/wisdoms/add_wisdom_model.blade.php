<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form action="" method="POST" id="addWisdomForm">
    @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addModalLabel">Add Wisdom</h1>
          <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="errMsgContainer mb-3">
          </div>

          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <textarea class="form-control" id="title" name="title" required></textarea>
            @error('title')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

          <div class="form-group"></div>
          <label for="title">Owner</label>
          <input type="text" name="owner" class="form-control" id="owner">
          <span class="text-danger error-message" id="error_owner"></span>
          <br>




          <div class="form-group">
          <img src="" id="image-preview" style="max-width: 90%; height: 50%; display: block;">
        </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary add_wisdom">Save changes</button>
          </div>
        </div>
      </div>
  </form>
</div>
