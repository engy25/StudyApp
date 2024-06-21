<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\{MakeCommentRequest, MakeLikeRequest};
use App\Http\Resources\Api\User\{PostResource,CommentsResource};
use App\Helpers\Helpers;
use App\Traits\FeedMerger;


class CommentController extends Controller
{
  use FeedMerger;
  public $helper;
  public function __construct()
  {
    $this->helper = new Helpers();
  }


  public function makeComment(MakeCommentRequest $request)
  {

    $userId = auth('api')->user()->id;

    $modelId = $request->id;
    $type = ucfirst($request->type);
    $modelType = "App\\Models\\" . $type;

    $model = $modelType::find($modelId);

    $model->comments()->create([
      'user_id' => $userId,
      'comment' => $request->comment,
      'parent_comment_id' => $request->parent_comment_id
    ]);
    $model->increment('comments_count');

    $message = __('api.comment_added_success');


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

  public function showComments(MakeLikeRequest $request)
  {
    $userId = auth('api')->user()->id;

    $modelId = $request->id;
    $type = ucfirst($request->type);
    $modelType = "App\\Models\\" . $type;

    $model = $modelType::find($modelId);

    $comments=$model->comments()->whereNull('parent_comment_id')->paginate(PAGINATION_COUNT);

    return $this->helper->responseJson(
      'success',
      trans('api.auth_data_retreive_success'),
      200,
      [
        'comments' => CommentsResource::collection($comments)->response()->getData(true),
      ]
    );

  }


















}



