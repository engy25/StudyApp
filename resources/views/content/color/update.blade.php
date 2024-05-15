<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <form action="" method="POST" id="updateColorForm">
    @csrf
    <input type="hidden" id="up_id">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="updateModalLabel">Update Color</h1>
          <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="errMsgContainer mb-3"></div>

          <div class="form-group">
            <label for="up_Name">Name</label>
            <input type="text" name="up_Name" class="form-control" id="up_Name">
            <span class="text-danger error-message" id="error_up_name"></span>
          </div>

          <div class="form-group">
            <label for="up_code">Color</label>
            <input type="color" name="up_code" class="form-control" id="up_code">
            <span class="text-danger error-message" id="error_up_code"></span>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary update_color">Update changes</button>
        </div>
      </div>
    </div>
  </form>
</div>
