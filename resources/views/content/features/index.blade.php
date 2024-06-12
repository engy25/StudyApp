@extends('layouts.layoutMaster')

@section('title', 'Feature List - Pages')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">

@endsection

@section('vendor-script')

@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Feature /</span> List
    <br>
  </h4>
  <div class="d-flex align-items-center">
    <meta name="csrf-token" content="{{ csrf_token() }}">





  </div>
</div>



<div class="alert alert-success" style="display: none;" id="success1">

  Feature Added Successfully
</div>



<div class="alert alert-success" style="display: none;" id="success2">
  Feature Updated Successfully
</div>

<div class="alert alert-danger" style="display: none;" id="success3">
  Feature Deleted Successfully
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<?php
$i=0;
?>
<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <?php
      $i=0;
      ?>
      <table id="data-table2" class="table border p-0 text-nowrap mb-0">
        <thead class="tabel-row-heading text-dark">
          <tr style="background:#f4f5f7">
            <th class="fw-semibold border-bottom">ID</th>
            <th class="fw-semibold border-bottom">{{ trans('words.name') }}</th>
            <th class="fw-semibold border-bottom">{{ trans('words.description') }}</th>
            <th class="fw-semibold border-bottom">{{ trans('words.image') }}</th>

            <th class="bg-transparent fw-semibold border-bottom">Edit</th>

          </tr>
        </thead>
        <tbody>

          @foreach($features as $feature)
          <tr>
            <td>
              <span class="text-dark fs-13 fw-semibold">{{ $i++ }}</span>
            </td>
            <td>
              <span class="text-dark fs-13 fw-semibold">
                {{ $feature->name }}

              </span>
            </td>
            <td>
              <span class="text-dark fs-13 fw-semibold">
                {{ $feature->desciption }}

              </span>

            <td>
              <span class="text-dark fs-13 fw-semibold">
                <img src="{{ $feature->icon }}" alt="Icon-Image" style="width: 60px; height:60px">
              </span>
            </td>


            <td class="center align-middle">


                <a href="{{ route('features.edit', $feature->id) }}"
                  class="btn bg-info-transparent d-flex align-items-center justify-content-center">
                  <i style="font-size: 20px;" class="fe fe-edit text-info "></i></a>&nbsp;
                <a href="{{ LaravelLocalization::localizeURL(route('features.edit', $feature->id)) }}"
                  class="btn btn-info btn-icon py-1 me-2 "
                 title="Edit"
                  style="width: 100px; height: 40px;">
                  {{ trans('words.edit') }} <i class="bi bi-pencil-square fs-16"></i>
                </a>
            </td>


              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div class="mt-4 d-flex justify-content-center">
        @if ($features->lastPage() > 1)
        {{ $features->links('pagination.simple-bootstrap-4') }}
        @endif
      </div>



    </div>
  </div>
</div>


@include('content.features.update')


{!! Toastr::message() !!}



@endsection
