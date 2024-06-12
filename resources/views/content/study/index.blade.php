@extends('layouts.layoutMaster')

@section('title', 'Study List - Pages')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">

@endsection

@section('vendor-script')
{{-- @include('content.brand.add_brandcolor_model') --}}
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Study /</span> List
    <br>
  </h4>
  <div class="d-flex align-items-center">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <a href="#" class="btn btn-primary me-2" data-bs-toggle="modal"
      data-bs-target="#addModal" title="{{ trans('words.add') }}">
      {{ trans('words.add') }}
    </a>


    {{-- <a href="{{ route('brands.create') }}" class="btn btn-primary me-2" data-bs-toggle="modal"
    data-bs-target="#addModalColor" title="{{ trans('api.addcolor') }}">
    {{ trans('api.addcolor') }} --}}
  </a>

    <form class="d-flex" id="searchForm">
      <input class="form-control me-2" type="search" id="search" name="search" placeholder="{{ trans('words.search') }}"
        aria-label="Search" style="width: 950px;">

    </form>

  </div>
</div>





<div class="alert alert-success" style="display: none;" id="success1">

  Study Added Successfully
</div>


@if($message= Session::get('success'))
<div class="alert alert-success">
  <p>
    {{ $message }}
  </p>

</div>
@endif

<div class="alert alert-success" style="display: none;" id="success2">
  Study Updated Successfully
</div>

<div class="alert alert-danger" style="display: none;" id="success3">
  Study Deleted Successfully
</div>

<?php
$i=0;
?>
<div class="card">
  <div class="card-body">
    <div class="table-responsive">
   @include("content.study.pagination_index")


    </div>
  </div>
</div>
{{-- @include('content.brand.brandcolor_js') --}}
@include('content.study.study_js')

@include('content.study.add_study_model')

{!! Toastr::message() !!}



@endsection
