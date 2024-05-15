<?php
$i=0;
?>
<table id="data-table2" class="table border p-0 text-nowrap mb-0">
  <thead class="tabel-row-heading text-dark">
    <tr style="background:#f4f5f7">
      <th class="fw-semibold border-bottom">ID</th>
      <th class="fw-semibold border-bottom">{{ trans('words.name') }}</th>
      <th class="fw-semibold border-bottom">{{ trans('words.code') }}</th>
      <th class="fw-semibold border-bottom">{{ trans('words.color') }}</th>

      <th class="bg-transparent fw-semibold border-bottom">Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach($colors as $color)
    <tr>
      <td>
        <span class="text-dark fs-13 fw-semibold">{{ $i++ }}</span>
      </td>
      <td>
        <span class="text-dark fs-13 fw-semibold">
          {{ $color->name }}

        </span>
      </td>
      <td>
        <span class="text-dark fs-13 fw-semibold">
          {{ $color->code }}

        </span>
      </td>

      <td>
        <span class="text-dark fs-13 fw-semibold" style="display: inline-block; width: 30px; height: 30px; border-radius: 55%; background-color: {{ $color->code }}">

        </span>
    </td>


      <td class="center align-middle">
        <div class="btn-group">
          <a href="{{ route('colors.edit', $color->id) }}"
            class="btn bg-info-transparent d-flex align-items-center justify-content-center">
            <i style="font-size: 20px;" class="fe fe-edit text-info "></i></a>&nbsp;
          <a href="{{ LaravelLocalization::localizeURL(route('colors.edit', $color->id)) }}"
            class="btn btn-info btn-icon py-1 me-2 update_color_form" data-bs-toggle="modal"
            data-bs-target="#updateModal" data-id="{{ $color->id }}"
            data-name="{{ $color->name }}"
            data-code="{{ $color->code }}"
           title="Edit"
            style="width: 100px; height: 40px;">
            {{ trans('words.edit') }} <i class="bi bi-pencil-square fs-16"></i>
          </a>
          <button type="button" class="btn btn-danger delete-color" data-id="{{ $color->id }}">
            <span class="bi bi-trash me-1">{{ trans('words.delete') }}</span>
          </button>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="mt-4 d-flex justify-content-center">
  @if ($colors->lastPage() > 1)
  {{ $colors->links('pagination.simple-bootstrap-4') }}
  @endif
</div>
