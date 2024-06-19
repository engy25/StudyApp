<div class="table-responsive border-top" id="table-service">
  <table class="table m-0">
    <thead>
      <tr>
        <th>Feed</th>
        <th>Sharing User</th>
        <th>Likes Counts</th>
        <th>Comment Counts</th>
        <th>Share Counts</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($shares as $share)
      <tr>
        <td>
          @php
          $feedContent= $share->content;
          @endphp
          @if($feedContent!=null)
          <span class="text-dark fs-13 fw-semibold">{{ $feedContent }}</span>
          @else
          <span class="fw-semibold text-wrap">{{"There Is No Content"}}</span>
          @endif
        </td>

        <td>
          <a href="{{ route('users.show', $share->sharingUser->id) }}">
            {{ $share->sharingUser->fullname }}
          </a>
        </td>


        <td>
          <span class="text-dark fs-13 fw-semibold">{{ $share->likes_count }}</span>
        </td>
        <td>
          <span class="text-dark fs-13 fw-semibold">{{ $share->comments_count }}</span>
        </td>
        <td>
          <span class="text-dark fs-13 fw-semibold">{{ $share->shares_count }}</span>
        </td>
        <td class="center align-middle">
          <div class="btn-group">
            <a href="{{ route('shares.show', $share->id) }}" class="btn btn-success show-feed"
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
    {{ $shares->links('pagination.simple-bootstrap-4') }}
  </div>
</div>
