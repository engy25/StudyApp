<?php

namespace App\Http\Resources\Api\User;

use App\Traits\ConvertHoursToMinutesTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
  use ConvertHoursToMinutesTrait;
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    $durationArray = $this->convertToHoursAndMinutes($this->duration);
    $hours = $durationArray[0] ?? 0;
    $minutes = $durationArray[1] ?? 0;

    $weeklyTimeGoalArray = $this->convertToHoursAndMinutes($this->weeklytimegoal);
    $weeklyTimeGoalArrayHours = $durationArray[0] ?? 0;
    $weeklyTimeGoalArrayMinutes = $durationArray[1] ?? 0;

    return [
      "id" => $this->id,
      "name" => $this->name,
      "code" => $this->code,
      "bio" => $this->bio,
      "duration_in_hours" => $hours . 'h',
      "duration_in_minutes" => $minutes . 'm',
      "weeklytimegoal_in_hours" => $weeklyTimeGoalArrayHours . 'h',
      "weeklytimegoal_in_minutes" => $weeklyTimeGoalArrayMinutes . 'm',
      "category_id" => $this->category_id,
      "feature" => $this->feature->name,
      "goal_id" => $this->goal_id,
      "category_name" => $this->category->name,
      "category_icon" => $this->category->icon,
      "usersCount" => $this->users_count ?? 0,
      "group_owner" => $this->fullname,
      "live_now_count"=>$this->live


    ];
  }
}
