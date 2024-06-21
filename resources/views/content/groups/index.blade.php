@extends('layouts.layoutMaster')

@section('title', 'Group List - Pages')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

<style>
  .checked {
    color: orange;
  }
</style>

@section('content')

@if($message= Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
@if($message= Session::get('successUpdate'))
<div class="alert alert-primary">
  <p>{{ $message }}</p>
</div>
@endif

<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Groups Count</span>
            <div class="d-flex align-items-center my-1">
              <h4 class="mb-0 me-2">@php echo App\Models\Group::count(); @endphp</h4>
            </div>
          </div>
          <span class="badge bg-label-primary rounded p-2">
            <i class="ti ti-user ti-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header border-bottom">
    <h5 class="card-title mb-3">Search Filter</h5>
    <div class="row">
      <div class="col-md-6">
        <!-- Private Select -->
        <div class="mb-3">
          <label for="private" class="form-label">{{ trans('words.role') }}</label>
          <select class="form-control" id="private" name="private">

            <option>{{ ('isPrivate') }}</option>
            @foreach($Isprivates as $Isprivate)
            <option value="{{ $Isprivate['id'] }}">{{ $Isprivate['name'] }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-md-6">
        <!-- Category Select -->
        <div class="mb-3">
          <label for="category" class="form-label">{{ trans('words.categories') }}</label>
          <select class="form-control" id="category" name="category">
            <option>{{ trans('words.categories') }}</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-md-6">
        <!-- Feature Select -->
        <div class="mb-3">
          <label for="features" class="form-label">{{ trans('words.features') }}</label>
          <select class="form-control" id="feature" name="feature">
            <option>{{ trans('words.features') }}</option>
            @foreach($features as $feature)
            <option value="{{ $feature->id }}">{{ $feature->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-md-6">
        <!-- User Select -->
        <div class="mb-3">
          <label for="user" class="form-label">{{ trans('words.users') }}</label>
          <select class="form-control" id="user" name="user">
            <option>{{ trans('words.users') }}</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->fullname }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-md-12">
        <form class="d-flex" id="searchForm">
          <input class="form-control me-2" type="search" id="search" name="search" placeholder="{{ trans('words.search') }}" aria-label="Search" style="width: 950px;">
        </form>
      </div>
    </div>
  </div>

  <div class="alert alert-success" style="display: none;" id="successUpdate">Group Updated Successfully</div>
  <div class="alert alert-danger" style="display: none;" id="success3">Group Deleted Successfully</div>

  @include('content.groups.pagination_index')
</div>

@include('content.groups.group_js')

{!! Toastr::message() !!}

@endsection
