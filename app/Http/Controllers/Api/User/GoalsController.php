<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\User\SetGoalRequest;
use Carbon\Carbon;
use App\Models\Goal;
use App\Helpers\Helpers;
class GoalsController extends Controller
{

  public $helper;
  public function __construct()
  {
    $this->helper = new Helpers();
  }

  public function setGoal(SetGoalRequest $request)
  {
    $user_id = auth("api")->user()->id;

    $ConvertyDurationInHoursToMinutes = (int) $request->hours * 60; // Convert duration hours to minutes
    $durationInMinutes = (int) $request->minutes;
    $totalDuration = $ConvertyDurationInHoursToMinutes + $durationInMinutes;

    $today = Carbon::today(); // Get today's date

    // Update or create the goal
    $dailygoal = Goal::updateOrCreate(
      [
        'user_id' => $user_id,
        'type' => $request->type,
        'name' => $request->name,
        'created_at' => $today,
      ],
      [
        'duration' => $totalDuration,
      ]
    );


    return $this->helper->responseJson(
      'success',
      trans('api.data_saved_success'), 200, null);

  }
}
