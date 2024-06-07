<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Modal -->
<div class="modal fade" id="addModalColor" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form action="" method="POST" id="addBrandcolorForm">
    @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addModalLabel">Add Brand</h1>
          <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="errMsgContainer mb-3">
          </div>


          <div class="form-group"></div>
          <label for="brandname">Name</label>
          <input type="text" name="brandname" class="form-control" id="brandname">
          <span class="text-danger error-message" id="error_brandname"></span>
          <br>


           <!-- Model Section -->
      <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#modelscolorContainer" aria-expanded="true"
              aria-controls="modelscolorContainer">
              Model
            </button>
          </h5>
        </div>

        <div id="modelscolorContainer" class="collapse show">
          <div class="card-body">
            <!-- Existing store sizes (if any) will be added here dynamically -->
            <button type="button" class="btn btn-success" onclick="addcolor()">Add Model</button>
          </div>
        </div>
      </div>



          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary add_brandcolor">Save changes</button>
          </div>
        </div>
      </div>
  </form>



</div>
