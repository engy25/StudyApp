<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FeedMerger;
use App\Http\Resources\Api\User\{PostResource,SimplePostResource};
use App\Helpers\Helpers;
use App\Http\Requests\Api\User\{MakeLikeRequest};



class FavouritesController extends Controller
{
  use FeedMerger;
  public $helper;
  public function __construct()
  {
    $this->helper = new Helpers();
  }
  public function AddToFavourite(MakeLikeRequest $request)
  {
    $userId = auth('api')->user()->id;

    $modelId = $request->id;
    $type = ucfirst($request->type);
    $modelType = "App\\Models\\" . $type;

    $model = $modelType::find($modelId);


    if ($model->favourites()->where('user_id', $userId)->count() > 0) {
      // If the feed or the share is already the user add to favourite , remove it
      $model->favourites()->whereUserId($userId)->delete();
      $message = __('api.favourite_delete_success');
    } else {
      // If the Feed is not in likeby this user, add it
      $model->favourites()->create([
        'user_id' => $userId,
      ]);


      $message = __('api.favourite_added_success');
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

  public function showFavourite($sort)
  {
    $userId = auth('api')->user()->id;

    $user = auth('api')->user()->load(["feedFavourites", "shareFavourites"]);


    if ($sort == 'feed') {
      $feedFavourites = $user->feedFavourites;

      return $this->helper->responseJson(
        'success',
        trans('api.auth_data_retreive_success'),
        200,
        ['feeds' => SimplePostResource::collection($feedFavourites)->response()->getData(true),]
      );
    }

    if ($sort == 'share') {
      $shareFavourites = $user->shareFavourites;


      return $this->helper->responseJson(
        'success',
        trans('api.auth_data_retreive_success'),
        200,
        ['feeds' => SimplePostResource::collection($shareFavourites)->response()->getData(true),]
      );
    }






  }

}
