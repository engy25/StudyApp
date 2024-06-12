<?php

namespace App\Traits;



trait ConvertHoursToMinutesTrait
{

  public function convertToMinutes(int $hours = 0, int $minutes = 0): int
  {
      return ($hours * 60) + $minutes;
  }

  public function convertToHoursAndMinutes($duration)
  {
      $durationInMinutes = (int) $duration;
      $hours = intdiv($durationInMinutes, 60);
      $minutes = $durationInMinutes % 60;
      return [$hours, $minutes];
  }


}
