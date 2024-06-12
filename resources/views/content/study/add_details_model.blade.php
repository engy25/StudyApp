<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Modal -->
<div class="modal fade" id="addDetailsModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form action="" method="POST" id="addDetailForm">
    @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addModalLabel">Add Detail</h1>
          <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="errMsgContainer mb-3">
          </div>

          <input type="hidden"  name="study_id" id="study_id" value="{{ $study->id }}">

          <div class="form-group"></div>
          <label for="model">Branch Name</label>
          <input type="text" name="branch" class="form-control" id="branch">
          <span class="text-danger error-message" id="error_branch"></span>
          <br>



          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary add_detail">Save changes</button>
          </div>
        </div>
      </div>
  </form>
</div>
