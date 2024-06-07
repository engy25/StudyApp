<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\User\{SimpleUserResource,todayTargetResource};
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Goal;
use App\Helpers\Helpers;

class HomeController extends Controller
{

  public $helper;
  public function __construct()
  {
    $this->helper = new Helpers();
  }
  public function index()
  {
    $user = auth("api")->user();

    $todayDate = Carbon::today()->toDateString();
    $userTodayTarget = Goal::where("user_id", $user->id)->DailyGoals()->first() ;

    return $this->helper->responseJson(
      'success',
      trans('api.auth_data_retreive_success'),
      200,
      [
        'user' => new SimpleUserResource($user),
        'todayDate' => $todayDate,
        'today_target'=> new todayTargetResource($userTodayTarget)
      ]
    );

  }
}
