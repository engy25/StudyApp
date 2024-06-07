<?php

namespace App\Http\Resources\Api\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class todayTargetResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {

    if ($this->resource) {
      $durationInMinutes = (int) $this->duration;
      $hours = intdiv($durationInMinutes, 60);
      $minutes = $durationInMinutes % 60;

      return [
        'id' => $this->id,
        'durationHour' => $hours . 'h',
        'durationMinute' => $minutes . 'm',
      ];
    }

    // Handle the case when the resource is null
    return [
      'id' => null,
      'durationHour' => '0h',
      'durationMinute' => '0m',
    ];
  }
}
