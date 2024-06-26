<?php
$i=0;
?>
<table id="data-table2" class="table border p-0 text-nowrap mb-0">
  <thead class="tabel-row-heading text-dark">
    <tr style="background:#f4f5f7">
      <th class="fw-semibold border-bottom">ID</th>
      <th class="fw-semibold border-bottom">{{ trans('words.name') }}</th>
      <th class="fw-semibold border-bottom">{{ trans('words.icon') }}</th>
      <th class="bg-transparent fw-semibold border-bottom">Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach($studies as $study)
    <tr>
      <td>
        <span class="text-dark fs-13 fw-semibold">{{ $i++ }}</span>
      </td>
      <td>
        <span class="text-dark fs-13 fw-semibold">
          {{ $study->name }}

        </span>
      </td>

      <td>
        <span class="text-dark fs-13 fw-semibold">
          <img src="{{ $study->icon }}" alt="Study Icon" style="width: 110px; height:110px">
        </span>
      </td>


      <td class="center align-middle">
        <div class="btn-group">


          <a href="{{ route('studies.edit', $study->id) }}"
            class="btn bg-info-transparent d-flex align-items-center justify-content-center">
            <i style="font-size: 20px;" class="fe fe-edit text-info "></i></a>&nbsp;
          <a href="{{ LaravelLocalization::localizeURL(route('studies.edit', $study->id)) }}"
            class="btn btn-info btn-icon py-1 me-2 " title="Edit"
            style="width: 100px; height: 40px;">
            {{ trans('words.edit') }} <i class="bi bi-pencil-square fs-16"></i>
          </a> </i></a>&nbsp;

          <a href="{{ route('studies.show', $study->id) }}" class="btn btn-success show-brand"
            style="width: 100px; height: 40px;">
            <i class="bi bi-eye"></i> {{ trans('words.show') }}
          </a></i></a>&nbsp;</i></a>&nbsp;
          <button type="button" class="btn btn-danger delete-study" data-id="{{ $study->id }}">
            <span class="bi bi-trash me-1">{{ trans('words.delete') }}</span>
          </button>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="mt-4 d-flex justify-content-center">
  @if ($studies->lastPage() > 1)
  {{ $studies->links('pagination.simple-bootstrap-4') }}
  @endif
</div>
