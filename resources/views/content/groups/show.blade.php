@extends('layouts/layoutMaster')

@section('title', 'Group')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />

<style>
  .user-name {
    max-width: 100%;
  }

  .avatar-wrapper {
    flex-shrink: 0;
  }

  .avatar img {
    width: 40px;
    height: 40px;
    object-fit: cover;
  }

  .text-wrap {
    word-break: break-word;
    white-space: normal;
  }
</style>
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-invoice.css') }}" />
@endsection

@section('page-script')
<script src="{{ asset('assets/js/offcanvas-add-payment.js') }}"></script>
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
@endsection

@section('content')
<div class="card invoice-preview-card">
  <hr class="my-0" />
  <div class="card-body">
    <div class="row p-sm-3 p-0">
      <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-4">
        <div class="mb-3">
          <h4 class="mb-1">Group Name:</h4>
          <h6>{{ $group->name }}</h6>
        </div>
        <div class="mb-3">
          <h4 class="mb-1">Owner:</h4>
          <a href="{{ route('users.show', $group->owner->id) }}">{{ $group->owner->fullname }}</a>
        </div>
        <div class="mb-3">
          <h4 class="mb-1">Category:</h4>
          <h6>{{ $group->category->name }}</h6>
        </div>
        <div class="mb-3">
          <h4 class="mb-1">Feature:</h4>
          <h6>{{ $group->feature->name }}</h6>
        </div>
        <div class="mb-3">
          <h4 class="mb-1">Code:</h4>
          <h6>{{ $group->code }}</h6>
        </div>
        <div class="mb-3">
          <h4 class="mb-1">Bio:</h4>
          <h6>{{ $group->bio }}</h6>
        </div>
        <div class="mb-3">
          <h4 class="mb-1">Is Private:</h4>
          <h6>{{ $group->is_private }}</h6>
        </div>
        <div class="mb-3">
          <h4 class="mb-1">Weekly Time Goal:</h4>
          <h6>{{ $weeklyTimeGoalHours }} {{ $weeklyTimeGoalMinutes }}</h6>
        </div>
        <div class="mb-3">
          <h4 class="mb-1">Duration:</h4>
          <h6>{{ $durationHours }} {{ $durationMinutes }}</h6>
        </div>
        <div class="mb-3">
          <h4 class="mb-1">Goal:</h4>
          <h6>{{ $group->goal ? $group->goal->name : 'No Weekly Goal' }}</h6>
        </div>
        <div class="mb-3">
          <h4 class="mb-1">Interests:</h4>
          @foreach($group->interests as $interest)
            <h6>{{ $interest->branch->name }}</h6>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@if($group->users()->count() >0)
<h5 class="my-3 text-center" style="color: black">Users</h5>
@include('content.user.pagination_index',["users"=>$group->users()->paginate(15)])
@endif
@endsection
