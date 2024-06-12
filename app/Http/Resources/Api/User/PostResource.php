<?php

namespace App\Http\Resources\Api\User;

use App\Traits\FavouriteTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\User\FeedMediaResource;
use App\Models\Favourite;

class PostResource extends JsonResource
{
  use FavouriteTrait;
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    // Handle different data structures
    $feed = $this->resource['feed'] ?? $this->resource;
    $isShared = $this->resource['isShared'] ?? false;
    $sharedAt = $this->resource['sharedAt'] ?? null;
    $shareContent = $this->resource['shareContent'] ?? null;
    $sharedLikes_count = $this->resource['sharedLikes_count'] ?? null;

    $sharedComments_count = $this->resource['sharedComments_count'] ?? null;
    $shareId = $this->resource['share_id'];

    // Ensure nested properties are accessed safely
    $user = $feed->user ?? null;
    $media = $feed->media ?? [];



    return [
      "id" => $feed->id ?? null,
      "content" => $feed->content ?? null,
      "created_at" => $feed->created_at ? $feed->created_at->diffForHumans() : null,
      "user_name" => $user->fullname ?? null,
      "user_image" => $user->image ?? null,
      'shares_count' => $feed->shares_count,
      'likes_count' => $feed->likes_count,
      'comments_count' => $feed->comments_count,
      "media" => FeedMediaResource::collection($media),
      "sharedAt" => $sharedAt ? $sharedAt->diffForHumans() : null,
      'isShared' => $isShared,
      "shareContent" => $shareContent,
      // 'sharedShares_count'=>$shareContent->shares_count ??0,
      'sharedLikes_count' => $sharedLikes_count,
      'sharedComments_count' => $sharedComments_count,
      'share_id' => $shareId,
      "favourite"=>$this->IsFavourite($isShared,$shareId,$feed->id)

    ];
  }
}
