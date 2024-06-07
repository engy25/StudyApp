<?php

namespace App\Traits;

use App\Models\{Feed, Follower, Share};

use illuminate\Support\Collection;

trait FeedMerger
{

  public function ShowFeeds($keyword)
  {
    $userId = auth('api')->user()->id;

    // Get the IDs of the users that the authenticated user follows
    $followingThatUserFollow = Follower::where('follower_id', $userId)->pluck('following_id');

    // Fetch the user's feeds and the feeds of the users they follow
    $feedsQuery = Feed::whereIn('user_id', $followingThatUserFollow)
      ->orWhere('user_id', $userId)
      ->with(['media', 'user']);
    //  ->orderBy('created_at', 'desc');

    // Fetch the shared feeds by users the authenticated user follows
    $sharedFeedsQuery = Share::whereIn('sharing_user_id', $followingThatUserFollow)
      ->orWhere('sharing_user_id', $userId)
      ->with(['feed.media', 'feed.user', 'sharingUser']);
      //->orderBy('created_at', 'desc');


    $transformedSharedFeeds = $sharedFeedsQuery->get()->map(function ($share) {
      return [
        'feed' => $share->feed,
        'sharingUser' => $share->sharingUser,
        'shareContent' => $share->content,
        'sharedAt' => $share->created_at,
        'isShared' => true,
       // 'shares_count'=>$share->shares_count,
        'sharedLikes_count'=>$share->likes_count,
        'sharedComments_count'=>$share->comments_count,
        'share_id'=>$share->id,
      ];
    });

    // Transform the original feeds to include the isShared flag
    $originalFeeds = $feedsQuery->get()->map(function ($feed) {
      return [
        'feed' => $feed,
        'sharingUser' => null,
        'shareContent' => null,
        'isShared' => false,
        'sharedAt' => null,
      //  'shares_count'=>0,
        'sharedLikes_count'=>0,
        'sharedComments_count'=>0,
        'share_id'=>null,
      ];
    });


    if ($keyword == "paginate") {

      $combinedFeeds = $originalFeeds->concat($transformedSharedFeeds)->sortByDesc(function ($item) {
        // dd($item['isShared'] &&$item['sharedAt'] > $item['feed']->created_at);
        if ($item['isShared'] && $item['sharedAt'] > $item['feed']->created_at) {
          // If it's a shared feed, prioritize the sharedAt timestamp
          return $item['sharedAt'];

        } else {
          // If it's not a shared feed, prioritize the feed's created_at timestamp

          return $item['feed']->created_at;

        }
      });

      return $combinedFeeds->values();


    } else {
      // Transform the shared feeds to include the feed and sharingUser

      $combinedFeeds = $originalFeeds->concat($transformedSharedFeeds)->sortByDesc(function ($item) {
        // dd($item['isShared'] &&$item['sharedAt'] > $item['feed']->created_at);
        if ($item['isShared'] && $item['sharedAt'] > $item['feed']->created_at) {
          // If it's a shared feed, prioritize the sharedAt timestamp
          return $item['sharedAt'];

        } else {
          // If it's not a shared feed, prioritize the feed's created_at timestamp

          return $item['feed']->created_at;

        }
      });

      return $combinedFeeds->take(10);
    }
  }


}
