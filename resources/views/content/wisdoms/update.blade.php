<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <form action="" method="POST" id="updateWisdomForm">
    @csrf
    <input type="hidden" id="up_id">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="updateModalLabel">Update Wisdom</h1>
          <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="errMsgContainer mb-3">
          </div>

          <div class="mb-3">
            <label for="name" class="form-label">Owner</label>
            <input type="text"  class="form-control" id="up_owner" name="up_owner" required>
            <span class="text-danger error-message" id="error_up_owner"></span>
          </div>

        <div class="mb-3">
          <label for="v" class="form-label">Title</label>
          <textarea class="form-control" id="up_title" name="up_title" required></textarea>
          <span class="text-danger error-message" id="error_up_title"></span>
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary update_wisdom">Update changes</button>
        </div>
      </div>
    </div>
  </form>
</div>
