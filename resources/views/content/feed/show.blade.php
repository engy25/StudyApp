@extends('layouts/layoutMaster')

@section('title', 'User')
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
    width: 40px; /* Adjust the size as needed */
    height: 40px; /* Adjust the size as needed */
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
{{-- <script src="{{ asset('assets/js/offcanvas-send-invoice.js') }}"></script> --}}
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
@endsection

@section('content')
<div class="card invoice-preview-card">
  <div class="card-body">
    <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
      <div class="mb-xl-0 mb-4">
        <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
          <img src="{{ asset($user->image) }}" alt="Delivery Image" style="max-width: 200px; max-height: 300px"
            class="img-fluid">
          <span class="app-brand-text fw-bold fs-4">{{ $user->fname }}</span>
        </div>
      </div>
      <div style="max-width: 20px;">
        <br>
      </div>
    </div>
  </div>
  <hr class="my-0" />
  <div class="card-body">
    <div class="row p-sm-3 p-0">
      <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
        <h4 class="mb-1">First Name:</h4>
        <h6 class="mb-3">{{ $user->fullname }}</h6>
        <h4 class="mb-1">Phone:</h4>
        <h6 class="mb-3">{{ $user->country_code }} {{ $user->phone }}</h6>
        <h4 class="mb-1">Email:</h4>
        <h6 class="mb-3">{{ $user->email }}</h6>
      </div>
    </div>
  </div>
  <h5 class="my-3 text-center" style="color: black">Feeds</h5>
  <div class="table-responsive border-top" id="table-service">
    <table class="table m-0">
      <thead>
        <tr>
          <th>Feed</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($feeds as $feed)

        <td class="sorting_1">
          <div class="d-flex align-items-center user-name">
            <div class="avatar-wrapper">
              <div class="avatar avatar-sm me-3">
                @if($feed->media()->count() > 0)
                  <img src="{{ $feed->media()->first()->media }}" alt="Image" class="rounded-circle">
                @endif
              </div>
            </div>
            <div class="d-flex flex-column">
              <span class="fw-semibold text-wrap">{{ $feed->content }}</span>
            </div>
          </div>
        </td>

          <td class="center align-middle">
            <div class="btn-group">

              {{-- <button type="button" class="btn btn-danger delete-service" data-id="{{ $feed->id }}"
                style="width: 100px; height: 40px;">
                <i class="bi bi-trash-fill"></i> {{ trans('words.delete') }}
              </button> --}}


              <a href="{{ route('feeds.show', $feed->id) }}" class="btn btn-success show-feed"
                style="width: 100px; height: 40px;">
                <i class="bi bi-eye"></i> {{ trans('words.show') }}
              </a>


            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="2" class="text-center">No Feeds found for this User.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    <div class="mt-4 d-flex justify-content-center">
      @if ($feeds->lastPage() > 1)
      {{ $feeds->links('pagination.simple-bootstrap-4') }}
      @endif
    </div>
  </div>
</div>
@endsection
