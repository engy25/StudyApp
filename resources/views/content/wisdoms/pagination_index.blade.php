<?php
$i=0;
?>
<table id="data-table2" class="table border p-0 text-nowrap mb-0">
  <thead class="tabel-row-heading text-dark">
    <tr style="background:#f4f5f7">
      <th class="fw-semibold border-bottom">ID</th>
      <th class="fw-semibold border-bottom">{{ trans('words.title') }}</th>
      <th class="fw-semibold border-bottom">{{ trans('words.owner') }}</th>

      <th class="bg-transparent fw-semibold border-bottom">Edit</th>

      <th class="bg-transparent fw-semibold border-bottom">Delete</th>
    </tr>
  </thead>
  <tbody>

    @foreach($wisdoms as $wisdom)
    <tr>
      <td>
        <span class="text-dark fs-13 fw-semibold">{{ $i++ }}</span>
      </td>
      <td>
        <span class="text-dark fs-13 fw-semibold">
          {{ $wisdom->title }}

        </span>
      </td>
      <td>
        <span class="text-dark fs-13 fw-semibold">
          {{ $wisdom->owner }}

        </span>
      </td>

      <td class="center align-middle">
          <a href="{{ route('wisdoms.edit', $wisdom->id) }}"
            class="btn bg-info-transparent d-flex align-items-center justify-content-center">
            <i style="font-size: 20px;" class="fe fe-edit text-info "></i></a>&nbsp;
          <a href="{{ LaravelLocalization::localizeURL(route('wisdoms.edit', $wisdom->id)) }}"
            class="btn btn-info btn-icon py-1 me-2 update_wisdom_form" data-bs-toggle="modal"
            data-bs-target="#updateModal" data-id="{{ $wisdom->id }}"
            data-title="{{ $wisdom->title }}"
            data-owner="{{ $wisdom->owner }}"
           title="Edit"
            style="width: 100px; height: 40px;">
            {{ trans('words.edit') }} <i class="bi bi-pencil-square fs-16"></i>
          </a>
        </td>

        <td>
          <button type="button" class="btn btn-danger delete-wisdom" data-id="{{ $wisdom->id }}">
            <span class="bi bi-trash me-1">{{ trans('words.delete') }}</span>
          </button>
      </td>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="mt-4 d-flex justify-content-center">
  @if ($wisdoms->lastPage() > 1)
  {{ $wisdoms->links('pagination.simple-bootstrap-4') }}
  @endif
</div>
