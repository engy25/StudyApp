<?php

namespace App\Http\Resources\Api\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      $user=$this->user;
      $replies = CommentsResource::collection($this->replies);
        return [
          "id"=>$this->id,
          "user_name"=>$user->fullname,
          "user_image"=>$user->image,
          "comment"=>$this->comment,
          'created_at' => $this->created_at->format('Y-m-d H:i:s'), // Optional: Format timestamp
          'replies' => $replies, // Include nested replies
        ];
    }
}
