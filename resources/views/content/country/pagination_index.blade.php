<?php
$i=0;
?>
  <table id="data-table2" class="table border p-0 text-nowrap mb-0">
    <thead class="tabel-row-heading text-dark">
      <tr style="background:#f4f5f7">
        <th class="fw-semibold border-bottom">ID</th>
        <th class="fw-semibold border-bottom">{{ trans('words.name') }}</th>
        <th class="fw-semibold border-bottom">{{ trans('words.Code') }}</th>
        <th class="fw-semibold border-bottom">{{ trans('words.flag') }}</th>
        <th class="fw-semibold border-bottom">{{ trans('words.CurrencyName') }}</th>
        <th class="bg-transparent fw-semibold border-bottom">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($countries as $country)
      <tr>

        <td>{{ $i++ }}</td>
        <td>{{ $country->name }}</td>

        <td class="text-truncate">{{ $country->country_code }}</td>
        <td><img src="{{ $country->flag }}" alt="flag" style="width:60px; height:60px"></td>
        <td>{{ $country->currency->name  }}</td>

        <td class="cell-fit">
          <div class="d-flex justify-content-center">



            <a href="{{ LaravelLocalization::localizeURL(route('countries.edit', $country->id)) }}"
              class="btn btn-info btn-icon py-1 me-2"
               title="Edit" style="width: 100px; height: 40px;">
              {{ trans('words.edit') }} <i class="bi bi-pencil-square fs-16"></i>
            </a>


            <button type="button" class="btn btn-danger delete-country" data-id="{{ $country->id }}">
              <span class="bi bi-trash me-1">{{ trans('words.delete') }}</span>
            </button>

            </a>

          </div>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="mt-4">
    @if ($countries->lastPage() > 1)
    {{ $countries->links('pagination.simple-bootstrap-4') }}
    @endif
  </div>
</div>
</div>
