<?php
$continents=['Asia', 'North America', 'South America', 'Antarctica', 'Europe', 'Australia', 'Africa'];
?>

<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form action="" method="POST" id="addCountryForm">
    @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addModalLabel">{{ trans('words.Add_Country') }}</h1>
          <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="errMsgContainer mb-3">
          </div>



          <div class="form-group"></div>
          <label class="required" for="country_code"> Country Code</label>
          <input type="text" name="country_code" class="form-control" id="country_code">
          <br>

          <div class="form-group"></div>
          <label class="required" for="name">Name(English)</label>
          <input type="text" name="name_en" class="form-control" id="name_en">
          <br>

          <div class="form-group"></div>
          <label class="required" for="name">Name(Arabic)</label>
          <input type="text" name="name_ar" class="form-control" id="name_ar">
          <br>



          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" accept="image/*">
            <span class="text-danger error-message" id="error_image"></span>
          </div>
          <br>


          <!-- Preview the selected image -->
          <div class="form-group">
            <img src="" id="image-preview" style="max-width: 90%; height: 50%; display: block;">
          </div>




          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary add_country">Save changes</button>
          </div>
        </div>
      </div>
  </form>
</div>
