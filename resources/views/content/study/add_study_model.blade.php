<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form action="" method="POST" id="addStudyForm">
    @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addModalLabel">Add Study</h1>
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
            <label for="image">Image</label>
            <input type="file" name="image" id="image" accept="image/*">
            <span class="text-danger error-message" id="error_image"></span>
          </div>
          <br>

          <div class="form-group">
            <img src="" id="image-preview" style="max-width: 90%; height: 50%; display: block;">
          </div>


          <!-- Model Section -->
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#modelsContainer" aria-expanded="true"
                  aria-controls="modelsContainer">
                  Model
                </button>
              </h5>
            </div>

            <div id="modelsContainer" class="collapse show">
              <div class="card-body">
                <!-- Existing store sizes (if any) will be added here dynamically -->
                <button type="button" class="btn btn-success" onclick="addModel()">Add Model</button>
              </div>
            </div>
          </div>



          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary add_study">Save changes</button>
          </div>
        </div>
      </div>
  </form>
</div>
