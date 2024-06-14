
<div class="table-responsive border-top" id="table-service">
  <table class="table m-0">
    <thead>
      <tr>
        <th>Feed</th>
        <th>Likes Count</th>
        <th>Comment Count</th>
        <th>Share Count</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($feeds as $feed)
        <tr>
          <td class="sorting_1">
            <div class="d-flex align-items-center user-name">
              <div class="avatar-wrapper">
                <div class="avatar avatar-sm me-3">
                  @if($feed->media()->count() > 0)
                    <img src="{{ $feed->media()->first()->media }}" alt="Image" class="rounded-circle">
                  @endif
                </div>
              </div>
              <div class="d-flex flex-column">
                <span class="fw-semibold text-wrap">{{ $feed->content }}</span>
              </div>
            </div>
          </td>
          <td>
            <span class="text-dark fs-13 fw-semibold">
              {{ $feed->likes_count }}
            </span>
          </td>
          <td>
            <span class="text-dark fs-13 fw-semibold">
              {{ $feed->comments_count }}
            </span>
          </td>
          <td>
            <span class="text-dark fs-13 fw-semibold">
              {{ $feed->shares_count }}
            </span>
          </td>
          <td class="center align-middle">
            <div class="btn-group">
              <a href="{{ route('feeds.show', $feed->id) }}" class="btn btn-success show-feed" style="width: 100px; height: 40px;">
                <i class="bi bi-eye"></i> {{ trans('words.show') }}
              </a>
            </div>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="text-center">No Feeds found for this User.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  <div class="mt-4 d-flex justify-content-center">
    @if ($feeds->lastPage() > 1)
      {{ $feeds->links('pagination.simple-bootstrap-4') }}
    @endif
  </div>
</div>
