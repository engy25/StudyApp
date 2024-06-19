<?php

namespace App\Http\Resources\Api\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          "id"=>$this->id,
          "name"=>$this->name,
          "icon"=>$this->icon,
          "branches"=>BranchResource::collection($this->branches)
        ];
    }
}
