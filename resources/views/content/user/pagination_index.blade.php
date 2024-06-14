<div class="table-responsive">
  <table id="data-table2" class="table border p-0 text-nowrap mb-0">
    <thead class="table-row-heading text-dark">
      <tr style="background:#f4f5f7">
        <th class="fw-semibold border-bottom">{{ trans('words.user') }}</th>
        <th class="fw-semibold border-bottom">{{ trans('words.role') }}</th>
        <th class="fw-semibold border-bottom">{{ trans('words.phone') }}</th>
        <th class="fw-semibold border-bottom">{{ trans('words.active') }}</th>
        <th class="bg-transparent fw-semibold border-bottom">{{ ('action') }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <?php
      $role=$user->roles->first();
      ?>

      <tr>
        <td class="sorting_1">
          <div class="d-flex align-items-center user-name">
            <div class="avatar-wrapper">
              <div class="avatar avatar-sm me-3">
                <img src="{{ $user->image }}" alt="Image" class="rounded-circle">
              </div>
            </div>
            <div class="d-flex flex-column">
              <span class="fw-semibold">{{ $user->fullname }}</span>
              <small class="text-muted">{{ $user->email }}</small>
            </div>
          </div>
        </td>
        <td>
          @if($user->roles->isNotEmpty())
          @foreach($user->roles as $role)
          <span class="badge bg-primary">{{ $role->name }}</span>
          @endforeach
          @else
          <span class="text-muted">{{ trans('words.no_roles_assigned') }}</span>
          @endif
        </td>
        <td>
          @if($user->phone !=null)
          <span class="text-dark fs-13 fw-semibold">{{ $user->country_code }} {{ $user->phone }}</span>
          @else
          <span class="text-muted">{{ trans('words.no_phone_assigned') }}</span>
          @endif
        </td>
        <td>
          @if($user->is_active)
          <span class="badge text-white bg-success fw-semibold fs-11">{{ trans('words.active') }}</span>
          @else
          <span class="badge text-white bg-danger fw-semibold fs-11">{{ trans('words.not_active') }}</span>
          @endif
        </td>
        <td class="center align-middle">
          <div class="btn-group">
            <a href="{{ route('users.edit', $user->id) }}" class="btn bg-info-transparent">
              <i class="fe fe-edit text-info"></i>
            </a>
            @if($role->name!=="User")
            <a href="{{ LaravelLocalization::localizeURL(route('users.edit', $user->id)) }}"
              class="btn btn-info btn-icon py-1 me-2" data-id="{{ $user->id }}" title="Edit"
              style="width: 100px; height: 40px;">
              {{ trans('words.edit') }} <i class="bi bi-pencil-square fs-16"></i>
            </a>
            @endif
            <a href="{{ route('users.show', $user->id) }}" class="btn btn-success show-delivery"
              style="width: 100px; height: 40px;">
              <i class="bi bi-eye"></i> {{ trans('words.show') }}
            </a>
            &nbsp;&nbsp;
            @if($role->name==="DataEntry")
            <button type="button" class="btn btn-danger delete-user" data-id="{{ $user->id }}">
              <span class="bi bi-trash me-1">{{ trans('words.delete') }}</span>
            </button>
            @endif
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="mt-4 d-flex justify-content-center">
    @if ($users->lastPage() > 1)
    {{ $users->links('pagination.simple-bootstrap-4') }}
    @endif
  </div>
</div>
