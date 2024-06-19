@extends('layouts/layoutMaster')

@section('title', 'Share')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
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
        <h4 class="mb-2">{{ $share->content }}</h4>
      </div>
    </div>
  </div>
  <hr class="my-0" />
  <div class="card-body">
    <div class="row p-sm-3 p-0">
      <div class="col-md-6 mb-md-4 mb-sm-0 mb-4">
        <h5 class="mb-1">Likes Count:</h5>
        <p class="mb-3">{{ $share->likes_count }}</p>

        <h5 class="mb-1">Comments Count:</h5>
        <p class="mb-3">{{ $share->comments_count }}</p>

        <h5 class="mb-1">Shares Count:</h5>
        <p class="mb-3">{{ $share->shares_count }}</p>

        <h5 class="mb-1">Sharing User:</h5>
        <p class="mb-3">
          <a href="{{ route('users.show', $share->sharingUser->id) }}">
            {{ $share->sharingUser->fullname }}
          </a>
        </p>
      </div>
    </div>
  </div>
  <div class="card-footer text-center">

  </div>
</div>
@endsection
