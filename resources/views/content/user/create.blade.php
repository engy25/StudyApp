<!-- create.blade.php -->
@extends('layouts.layoutMaster')

@section('title', 'Create User')

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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('page-script')

<style>
  [required]:invalid+label::after {
    content: ' *';
    color: red;
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


@endsection

<div class="alert alert-success" style="display: none;" id="success">

  User Added Successfully
</div>
@section('content')

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Add New User</h4>
  </div>
  <div class="card-body">
    @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <select class="form-control" id="role" name="role" required>
          <option value="" disabled selected>Select Role:</option>
          @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="fullname" class="form-label">Full Name </label>
        <input type="text" class="form-control required" id="fullname" name="fullname" required>
      </div>



      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control required" name="email" required>
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <div class="input-group">
          <select class="form-control" id="country" name="country" style="max-width: 70px;">
            @foreach($countries as $country)
            <option value="{{ $country->country_code }}">{{ $country->country_code }}</option>
            @endforeach
          </select>
          <input type="text" class="form-control required" id="phone" name="phone" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
          <input type="password" class="form-control required" name="password" required>
          <button class="btn btn-outline-secondary" type="button" id="toggle-password"></button>
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-md-2 form-label mb-4">Main Image:</label>
        <div class="col-md-10">
          <input name="image" id="demo" type="file" accept=".jpg, .png, image/jpeg, image/png" placeholder="Image"
            onchange="previewImage(event)">
          <br><br><br>
          <img id="preview" style="display:none">
          @error('image')
          <div>{{ $message }}</div>
          @enderror
        </div>
      </div>


      <button type="submit" class="btn btn-primary">Add User</button>
    </form>
  </div>
</div>
</div>
</div>
@include("content.user.user_js")
@endsection
