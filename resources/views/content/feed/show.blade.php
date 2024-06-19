@extends('layouts/layoutMaster')

@section('title', 'Feed')

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
        <h4 class="mb-2">{{ $feed->content }}</h4>
      </div>
      <div style="max-width: 20px;"><br></div>
    </div>
  </div>
  <hr class="my-0" />
  <div class="card-body">
    <div class="row p-sm-3 p-0">
      <div class="col-md-6 mb-md-4 mb-sm-0 mb-4">
        <h5 class="mb-1">Likes Count:</h5>
        <h5 class="mb-3">{{ $feed->likes_count }}</h5>
        <h5 class="mb-1">Comments Count:</h5>
        <h5 class="mb-3">{{ $feed->comments_count }}</h5>
        <h5 class="mb-1">Shares Count:</h5>
        <h5 class="mb-3">{{ $feed->shares_count }}</h5>
      </div>
    </div>
  </div>

  @php
    $images = $feed->media()->where("type", "image")->get();
    $documents = $feed->media()->where("type", "document")->get();
    $videos = $feed->media()->where("type", "video")->get();
  @endphp

  <div class="card-body mx-3">
    @if($images->count() > 0)
      <div class="mb-4">
        <h5>Images</h5>
        <div class="row">
          @foreach($images as $image)
            <div class="col-md-3 mb-3">
              <img src="{{ $image->media }}" alt="Image" class="img-fluid rounded" style="max-width:120px; max-height:300px">
            </div>
          @endforeach
        </div>
      </div>
    @endif

    @if($documents->count() > 0)
      <div class="mb-4">
        <h5>Documents</h5>
        <ul class="list-group">
          @foreach($documents as $document)
            <li class="list-group-item">
              <a href="{{ $document->media }}" target="_blank">{{ basename($document->media) }}</a>
            </li>
          @endforeach
        </ul>
      </div>
    @endif

    @if($videos->count() > 0)
      <div class="mb-4">
        <h5>Videos</h5>
        <div class="row">
          @foreach($videos as $video)
            <div class="col-md-6 mb-3">
              <video controls class="w-100">
                <source src="{{ $video->media }}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          @endforeach
        </div>
      </div>
    @endif
  </div>

  <div class="card-footer">
    <div class="text-center">
      <!-- Additional footer content if needed -->
    </div>
  </div>
</div>
@endsection
