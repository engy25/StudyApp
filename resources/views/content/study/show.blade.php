@extends('layouts/layoutMaster')

@section('title', 'Studies')

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
        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0 "
          id="item_list">
          <div class="mb-xl-0 mb-4">

            <h4 class="mb-2">{{ $study->name }}</h4>
          </div>

          <div class="mb-xl-0 mb-4">

            <h4 class="mb-2"><img src="{{ $study->icon }}" style="width: 200px;height:150px"></h4>
          </div>



          <div style="max-width:20"><br></div>
        </div>
      </div>

      <hr class="my-0" />


      <h5 class="my-3 text-center" style="color: black"> Details </h5>
      <!-- Add button to create a new Vechile Brand Model -->
      <div class="alert alert-success" style="display: none;" id="brandmodeladd">

        Details Added Successfully
      </div>
      <div class="alert alert-danger" style="display: none;" id="brandmodeldelete">
        Details Deleted Successfully
      </div>

      {{-- <div class="text-center mb-3">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <a href="{{ route("brandmodels.store") }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDetailsModal">Add New Detail </a>
      </div> --}}

      <div class="text-center mb-3">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDetailsModal">Add New Detail </a>
      </div>

      <div class="table-responsive border-top" id="brandmodel-table">
        <table class="table m-0">
          <thead>
            <tr>
              <th>Branch Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($study->branches()->get() as $branch)
              <tr>
                <td>{{ $branch->name }}</td>

                <td class="center align-middle">
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger delete-detailModel" data-id="{{ $branch->id }}"
                      style="width: 100px; height: 40px;">
                      <i class="bi bi-trash-fill"></i> {{ trans('words.delete') }}
                    </button>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center">No Details found for this Model.</td>
              </tr>
            @endforelse
          </tbody>
        </table>

      </div>





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

 {{-- @include('content.study.details_js') --}}
@endsection
