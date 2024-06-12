@extends('layouts.layoutMaster')

@section('title', 'Update Feature')

@section('vendor-style')
<!-- Include your vendor styles here -->
@endsection

@section('page-style')
<!-- Include your page-specific styles here -->
@endsection

@section('vendor-script')
<!-- Include your vendor scripts here -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection

@section('page-script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Update Feature</h4>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('features.update', $feature->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="{{ $feature->name }}" class="form-control" id="name" name="name" required>
                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
              <label for="desciption" class="form-label">Description</label>
              <textarea class="form-control" id="desciption" name="desciption" required>{{ $feature->desciption }}</textarea>
              @error('desciption')
              <div class="alert alert-danger" role="alert">
                  {{ $message }}
              </div>
              @enderror
          </div>


            <div class="row mb-3">
              <label class="col-md-2 form-label mb-4"> Icon:</label>
              <div class="col-md-10">
                <input name="icon" id="demo" type="file" accept=".jpg, .png, image/jpeg, image/png" placeholder="Image">
                @error('image')
                <div>{{ $message }}</div>
                @enderror
                <br><br><br>
                @if($feature->icon)
                <div>
                  <img id="image-preview" src="{{ asset($feature->icon) }}" alt="Store Icon" style="max-width: 200px;">
                </div>
                @else
                <div>
                  <img id="image-preview" alt="Store Icon" style="display: none; max-width: 200px;">
                </div>
                @endif
              </div>
            </div>



            <div class="text-center my-3">
                <button type="submit" class="btn btn-primary">Update Feature</button>
            </div>
        </form>
    </div>
</div>
<script>
  const input = document.getElementById('demo');
const preview = document.getElementById('image-preview');

input.addEventListener('change', () => {
const file = input.files[0];
if (file) {
  const reader = new FileReader();
  reader.addEventListener('load', () => {
      preview.src = reader.result;
      preview.style.display = 'block';
      preview.style.maxWidth = '200px'; // Set a maximum width of 200 pixels for the image
      preview.style.height = '200px'; // Set a maximum width of 200 pixels for the image
  });
  reader.readAsDataURL(file);
} else {
  preview.src = '';
  preview.style.display = 'none';
}
});

</script>

@endsection