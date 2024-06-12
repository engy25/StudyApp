<?php

namespace App\Http\Resources\Api\User;

use App\Traits\FavouriteTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SimpleShareResource extends JsonResource
{
  use FavouriteTrait;
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {

    $sharingUser = $this->sharingUser;
    $user = $this->user;
    $feed = $this->feed;

    return [
      "share_id" => $this->id,
      "shareContent" => $this->content,
      "sharedAt" => $this->created_at->diffForHumans(),
      "shared_user_name" => $sharingUser->fullname,
      "shared_user_image" => $sharingUser->image,
      "sharedLikes_count" => $this->likes_count,
      'sharedComments_count' => $this->comments_count,
      "feed_id" => $feed->id,
      "feed_content" => $feed->content ?? null,
      "feed_created_at" => $feed->created_at->diffForHumans(),
      "feed_user_name" => $feed->$user->fullname ?? null,
      "feed_user_image" => $feed->$user->image ?? null,
      'feed_shares_count' => $feed->shares_count,
      'feed_likes_count' => $feed->likes_count,
      'feed_comments_count' => $feed->comments_count,
      "feed_media" => FeedMediaResource::collection($this->feed->media ?? []),
      "favourite" => $this->IsFavourite(true, $this->id, $feed->id)

    ];
  }
}
