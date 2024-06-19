<div class="table-responsive border-top" id="table-service">
  <table class="table m-0">
    <thead>
      <tr>
        <th>Feed</th>
        <th>Likes Counts</th>
        <th>Comment Counts</th>
        <th>Share Counts</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($feeds as $feed)
      <tr>
        <td class="sorting_1">
          <div class="d-flex align-items-center user-name">
            <div class="avatar-wrapper">
              <div class="avatar avatar-sm me-3">
                @php
                    $media = $feed->media()->where("type", "image")->first();
                @endphp

                @if($media)
                    <img src="{{ $media->media }}" alt="Image" class="rounded-circle">
                @else
                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-light" style="width: 34px; height: 35px;">
                        <span class="fw-semibold text-wrap">No</span>
                    </div>
                @endif
            </div>
            </div>
            <div class="d-flex flex-column">
              @if($feed->content!=null)
              <span class="fw-semibold text-wrap">{{ $feed->content }}</span>
              @else
              <span class="fw-semibold text-wrap">{{ "There is no content"}}</span>
              @endif
            </div>
          </div>
        </td>
        <td>
          <span class="text-dark fs-13 fw-semibold">{{ $feed->likes_count }}</span>
        </td>
        <td>
          <span class="text-dark fs-13 fw-semibold">{{ $feed->comments_count }}</span>
        </td>
        <td>
          <span class="text-dark fs-13 fw-semibold">{{ $feed->shares_count }}</span>
        </td>
        <td class="center align-middle">
          <div class="btn-group">
            <a href="{{ route('feeds.show', $feed->id) }}" class="btn btn-success show-feed"
              style="width: 100px; height: 40px;">
              <i class="bi bi-eye"></i> {{ trans('words.show') }}
            </a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="mt-4 d-flex justify-content-center">
    {{ $feeds->links('pagination.simple-bootstrap-4') }}
  </div>
</div>

<hr>
