<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form action="" method="POST" id="addCategoryForm">
    @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addModalLabel">Add Category</h1>
          <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="errMsgContainer mb-3">
          </div>

          <div class="form-group"></div>
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name">
          <span class="text-danger error-message" id="error_name"></span>
          <br>

          <div class="form-group">
            <label for="image">Icon</label>
            <input type="file" name="icon" id="icon" accept="image/*">
            <span class="text-danger error-message" id="error_image"></span>
          </div>
          <br>



          <div class="form-group">
          <img src="" id="image-preview" style="max-width: 90%; height: 50%; display: block;">
        </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary add_category">Save changes</button>
          </div>
        </div>
      </div>
  </form>
</div>
