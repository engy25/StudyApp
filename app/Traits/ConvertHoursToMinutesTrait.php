<?php

namespace App\Traits;
use App\Models\FocusSession;


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





  public function calculateSessionTimes($sessionId)
  {
      $focusSession = FocusSession::with('events')->findOrFail($sessionId);

      $events = $focusSession->events->sortBy('event_time');
      $lastEventTime = null;
      $focusTime = 0;
      $multitaskingTime = 0;
      $breakTime = 0;
      $currentState = 'focus';

      foreach ($events as $event) {
          if ($lastEventTime) {
              $timeSpent = $event->event_time->diffInMinutes($lastEventTime);

              switch ($currentState) {
                  case 'focus':
                      $focusTime += $timeSpent;
                      break;
                  case 'multitasking':
                      $multitaskingTime += $timeSpent;
                      break;
                  case 'break':
                      $breakTime += $timeSpent;
                      break;
              }
          }

          $lastEventTime = $event->event_time;

          switch ($event->event_type) {
              case 'multitasking':
                  $currentState = 'multitasking';
                  break;
              case 'break':
                  $currentState = 'break';
                  break;
              case 'pause':
              case 'resume':
                  $currentState = 'focus';
                  break;
              case 'finish':
                  $currentState = 'focus';
                  break;
          }
      }

      return [
          'focus_time' => $focusTime,
          'multitasking_time' => $multitaskingTime,
          'break_time' => $breakTime,
      ];
  }

















}
