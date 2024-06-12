<?php

namespace App\Http\Resources\Api\User;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\User\FeedMediaResource;

class SimplePostResource extends JsonResource
{

  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {


    // Ensure nested properties are accessed safely
    $user = $this->user ?? null;

    return [
      "id" => $this->id,
      "content" => $this->content ?? null,
      "created_at" => $this->created_at->diffForHumans(),
      "user_name" => $user->fullname ?? null,
      "user_image" => $user->image ?? null,
      'shares_count' => $this->shares_count,
      'likes_count' => $this->likes_count,
      'comments_count' => $this->comments_count,
      "media" => FeedMediaResource::collection($this->media ?? []),
     

    ];
  }
}
