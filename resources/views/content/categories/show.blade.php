@extends('layouts/layoutMaster')

@section('title', 'Service')

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
        <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
          <img src="{{ asset($service->image) }}" alt="store Image" style="height: 60px; width:60px" class="img-fluid">
          <span class="app-brand-text fw-bold fs-4">
            {{ $service->name }}
          </span>
        </div>

      </div>


      <hr class="my-0" />
      <div class="card-body">
        <div class="row p-sm-3 p-0">
          <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">

            <h4>Categories</h4>
            @if($service->categories()->count() > 0)
                @foreach($service->categories()->get() as $category)
                    <h6 class="mb-3">{{ $category->name }}</h6>
                    <img src="{{ $category->image }}" alt="{{ $category->name }}" style="width: 60px; height:60px">
                @endforeach
            @else
                <h6 class="mb-3">No Categories Assigned for this service go to Edit To Assign Categories </h6>
            @endif










      <div class="card-body mx-3">
        <div class="row">
          <div class="col-12">

          </div>
        </div>
      </div>


      <div class="card-footer">
        <div class="text-center">


        </div>
      </div>
    </div>
  </div>

</div>

@endsection
