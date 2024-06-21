<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\StartWorkingRequest;
use App\Models\FocusSession;
use App\Models\FocusSessionEvent;
use App\Traits\ConvertHoursToMinutesTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\Helpers;

class SessionController extends Controller
{
  use ConvertHoursToMinutesTrait;
  public $helper;
  public function __construct()
  {
    $this->helper = new Helpers();
  }

  public function startWorking(StartWorkingRequest $request)
  {
    \DB::beginTransaction();
    try {


      $userId = auth("api")->user()->id;
      if ($request->duration_hours && $request->duration_minutes) {
        $totalDuration = $this->convertToMinutes($request->duration_hours, $request->duration_minutes);

      }

      $startWorking = FocusSession::create([
        "duration" => $totalDuration ?? null,
        "user_id" => $userId,
        "feature_id" => $request->feature_id,
        "goal_id" => $request->goal_id,
        "is_pomodoro" => $request->is_pomodoro ?? 0,
        "pomodoro_mode" => $request->pomodoro_mode,
        "start_time" => Carbon::now(),
        "multitasking_events_mode" => 0,
        "is_online" => 1,
        "is_reminder" => 0
      ]);


      // create a start event for the focus session
      $startWorking->events()->create([
        'event_type' => 'start',
        'details' => 'Focus session started',
      ]);
      \DB::commit();

      return $this->helper->responseJson(
        'success',
        trans('api.auth_data_stored_success'),
        200,
        null
      );

    } catch (\Exception $e) {
      \DB::rollBack();
      return $this->helper->responseJson('failed', trans('api.auth_something_went_wrong'), 422, null);

    }

  }

    private function logEvent($sessionId, $eventType, $details)
    {
        \DB::beginTransaction();
        try {
            $focusSession = FocusSession::findOrFail($sessionId);

            $focusSession->events()->create([
                'event_type' => $eventType,
                'details' => $details,
                'event_time' => Carbon::now(),
            ]);

            \DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => "Focus session {$eventType} event logged successfully",
            ], 200);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json([
                'status' => 'failed',
                'message' => trans('api.auth_something_went_wrong'),
            ], 422);
        }
    }

}
