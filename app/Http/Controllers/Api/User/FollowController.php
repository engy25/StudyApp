<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\{MakeFollowRequest, FollowTypeRequest};
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Http\Resources\Api\User\{SimpleUserResource};

class FollowController extends Controller
{
  public $helper;
  public function __construct()
  {
    $this->helper = new Helpers();
  }

  public function makeFollow(MakeFollowRequest $request)
  {
    $user = auth("api")->user();

    if ($user->id == $request->user_id) {     //chek if the user follow itself

      return $this->helper->responseJson(
        'failed',
        trans('api.errYoucannotfollowyourself'),
        404,
        null
      );
    }
    // Check if user is already following
    if ($user->followings()->where('following_id', $request->user_id)->count() > 0) {

      $user->followings()->detach($request->user_id);
      $message = __('api.follower_delete_success');

    } else {
      // Create a new follow relationship
      $user->followings()->attach($request->user_id);
      $message = __('api.follower_add_success');
    }

    return $this->helper->responseJson(
      'success',
      $message,
      200,
      null
    );


  }

  public function ShowFollow(FollowTypeRequest $request)
  {
    $type = $request->type;
    $user = auth('api')->user()->load(["followers", "followings"]);

    if ($type === 'following') {
      $users = $user->followings()->paginate(PAGINATION_COUNT);
    } else {
      $users = $user->followers()->paginate(PAGINATION_COUNT);
    }
    return $this->helper->responseJson(
      'success',
      trans('api.auth_data_retreive_success'),
      200,
      [
        'users' => SimpleUserResource::collection($users)->response()->getData(true),
      ]
    );


  }




















}
