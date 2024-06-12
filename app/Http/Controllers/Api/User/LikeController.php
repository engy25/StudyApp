<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\User\{MakeLikeRequest};
use App\Models\User;
use App\Http\Resources\Api\User\{PostResource,SimpleUserResource};
use App\Helpers\Helpers;
use App\Traits\FeedMerger;


class LikeController extends Controller
{

  use FeedMerger;
  public $helper;
  public function __construct()
  {
    $this->helper = new Helpers();
  }

  public function makeLike(MakeLikeRequest $request)
  {
    $userId = auth('api')->user()->id;

    $modelId = $request->id;
    $type = ucfirst($request->type);
    $modelType = "App\\Models\\" . $type;

    $model = $modelType::find($modelId);


    if ($model->likes()->where('user_id', $userId)->count() > 0) {
      // If the feed or the share is already the user like , remove it
      $model->likes()->whereUserId($userId)->delete();
      $model->decrement('likes_count');
      $message = __('api.like_delete_success');
    } else {
      // If the Feed is not in likeby this user, add it
      $model->likes()->create([
        'user_id' => $userId,
      ]);
      $model->increment('likes_count');

      $message = __('api.like_added_success');
    }

    // Reload the feeds
    $allFeeds = $this->ShowFeeds("paginate");

    return $this->helper->responseJson(
      'success',
      $message,
      200,
      [
        'feeds' => PostResource::collection($allFeeds)->response()->getData(true),
      ]
    );



  }


  public function UserMakeLike(MakeLikeRequest $request)
  {


    $modelId = $request->id;
    $type = ucfirst($request->type);
    $modelType = "App\\Models\\" . $type;

    $model = $modelType::find($modelId);

    $userIds=$model->likes()->pluck("user_id");
    $users=User::whereIn("id",$userIds)->get();

    return $this->helper->responseJson(
      'success',
      trans('api.auth_data_retreive_success'),
      200,
      [
        'users' => SimpleUserResource::collection($users),
      ]
    );









  }
}
