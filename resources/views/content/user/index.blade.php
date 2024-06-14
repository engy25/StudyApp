@extends('layouts.layoutMaster')

@section('title', 'User List - Pages')

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
  <p>
    {{ $message }}
  </p>

</div>
@endif
@if($message= Session::get('success'))
<div class="alert alert-success">
  <p>
    {{ $message }}
  </p>

</div>
@endif
@if($message= Session::get('successUpdate'))
<div class="alert alert-primary">
  <p>
    {{ $message }}
  </p>

</div>
@endif
<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Admin Counts</span>
            <div class="d-flex align-items-center my-1">
              <h4 class="mb-0 me-2"> @php
                echo App\Models\User::role(1)->count();
                @endphp</h4>

            </div>

          </div>
          <span class="badge bg-label-primary rounded p-2">
            <i class="ti ti-user ti-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>





  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Data Entry Counts</span>
            <div class="d-flex align-items-center my-1">
              <h4 class="mb-0 me-2"> @php
                echo App\Models\User::role(3)->count();
                @endphp</h4>

            </div>

          </div>
          <span class="badge bg-label-primary rounded p-2">
            <i class="ti ti-user ti-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>





  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Users Counts</span>
            <div class="d-flex align-items-center my-1">
              <h4 class="mb-0 me-2"> @php
                echo App\Models\User::role(2,"api")->count();
                @endphp</h4>

            </div>

          </div>
          <span class="badge bg-label-primary rounded p-2">
            <i class="ti ti-user ti-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>



  <div class="col-xl-4 col-lg-5 col-md-3">
    <div class="card h-60 w-60">
      <div class="row h-70">
        <div class="col-sm-5">
          <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
            <img src="{{ asset('assets/img/illustrations/add-new-roles.png') }}" class="img-fluid mt-sm-4 mt-md-0"
              alt="add-new-roles" width="70">
          </div>
        </div>
        <div class="col-sm-7">
          <meta name="csrf-token" content="{{ csrf_token() }}">
          <div class="card-body text-sm-end text-center ps-sm-0">
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-2 text-nowrap ">{{ trans('words.add_user')
              }}</a>

          </div>
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
        <!-- Role Select -->
        <div class="mb-3">
          <label for="role" class="form-label">{{ trans('words.role') }}</label>
          <select class="form-control" id="role" name="role">
            <option>Select Role</option>
            @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-md-6">
        <!-- Status Select -->
        <div class="mb-3">
          <label for="status" class="form-label">{{ trans('words.status') }}</label>
          <select class="form-control" id="status" name="status">

            @foreach($statuses as $status)
            <option value="{{ $status["id"] }}">{{ $status["name"] }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-md-12">


        <form class="d-flex" id="searchForm">
          <input class="form-control me-2" type="search" id="search" name="search"
            placeholder="{{ trans('words.search') }}" aria-label="Search" style="width: 950px;">

        </form>

      </div>
    </div>
  </div>
  <div class="alert alert-success" style="display: none;" id="successUpdate">
    User Updated Successfully
  </div>
  <div class="alert alert-danger" style="display: none;" id="success3">
    User Deleted Successfully
  </div>

  @include('content.user.pagination_index')

</div>
</div>

@include('content.user.user_js')

{!! Toastr::message() !!}



@endsection
