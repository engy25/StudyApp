<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Modal -->
<div class="modal fade" id="addDetailsModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form action="" method="POST" id="addColorForm">
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



          <input type="hidden"  name="brand_id" id="brand_id" value="{{ $brand->id }}">
          <?php

          $colors=App\Models\Color::get();
          ?>

          <div class="form-group"></div>
          <label for="colors">Colors </label>

          <select name="colors" class="form-control" id="colors" multiple>
            @foreach($colors as $color)
            <option value={{ $color->id }}>{{ $color->name }}</option>
            @endforeach
          </select>

          <span class="text-danger error-message" id="error_colors"></span>
          <br>




          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary add_color">Save changes</button>
          </div>
        </div>
      </div>
  </form>
</div>
