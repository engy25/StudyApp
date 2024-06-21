<div class="table-responsive">
  <table id="data-table2" class="table border p-0 text-nowrap mb-0">
    <thead class="table-row-heading text-dark">
      <tr style="background:#f4f5f7">
        <th class="fw-semibold border-bottom">{{ trans('words.name') }}</th>
        <th class="fw-semibold border-bottom">{{ trans('words.code') }}</th>
        <th class="fw-semibold border-bottom">{{ trans('words.owner') }}</th>
        <th class="fw-semibold border-bottom">{{ trans('words.private') }}</th>
        <th class="fw-semibold border-bottom">{{ trans('words.category') }}</th>
        <th class="fw-semibold border-bottom">{{ trans('words.feature') }}</th>
        <th class="bg-transparent fw-semibold border-bottom">{{ ('action') }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($groups as $group)
      <tr>
        <td>
          <span class="text-dark fs-13 fw-semibold">{{ $group->name }} </span>
        </td>
        <td>
          <span class="text-dark fs-13 fw-semibold">{{ $group->code }} </span>
        </td>
            <td>
          <span class="text-dark fs-13 fw-semibold">{{ $group->owner->fullname }} </span>
        </td>
        <td>
          @if($group->is_private===1)
          <span class="badge text-white bg-danger fw-semibold fs-11">{{ trans('words.private') }}</span>
          @else
          <span class="badge text-white bg-success fw-semibold fs-11">{{ trans('words.public') }}</span>
          @endif
        </td>
        <td>
          <span class="text-dark fs-13 fw-semibold">{{ $group->category->name }} </span>
        </td>
        <td>
          <span class="text-dark fs-13 fw-semibold">{{ $group->feature->name }} </span>
        </td>

        <td class="center align-middle">
          <div class="btn-group">
            {{-- <a href="{{ route('groups.edit', $group->id) }}" class="btn bg-info-transparent">
              <i class="fe fe-edit text-info"></i>
            </a>

            <a href="{{ LaravelLocalization::localizeURL(route('groups.edit', $group->id)) }}"
              class="btn btn-info btn-icon py-1 me-2" data-id="{{ $group->id }}" title="Edit"
              style="width: 100px; height: 40px;">
              {{ trans('words.edit') }} <i class="bi bi-pencil-square fs-16"></i>
            </a> --}}

            <a href="{{ route('groups.show', $group->id) }}" class="btn btn-success show-delivery"
              style="width: 100px; height: 40px;">
              <i class="bi bi-eye"></i> {{ trans('words.show') }}
            </a>
            {{-- &nbsp;&nbsp;
            <button type="button" class="btn btn-danger delete-group" data-id="{{ $group->id }}">
              <span class="bi bi-trash me-1">{{ trans('words.delete') }}</span>
            </button> --}}

          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="mt-4 d-flex justify-content-center">
    @if ($groups->lastPage() > 1)
    {{ $groups->links('pagination.simple-bootstrap-4') }}
    @endif
  </div>
</div>
