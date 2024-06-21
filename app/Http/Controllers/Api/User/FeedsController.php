<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\{createPostRequest, MakeLikeRequest, MakeShareRequest};
use App\Models\{Feed, FeedMedia, User, Share};
use App\Http\Resources\Api\User\{PostResource, SimpleUserResource, CommentsResource,SimplePostResourceWithFav, SimpleShareResource};
use App\Helpers\Helpers;
use App\Traits\FeedMerger;
use Spatie\Permission\Models\{Role};

class FeedsController extends Controller
{
  use FeedMerger;
  public $helper;
  public function __construct()
  {
    $this->helper = new Helpers();
  }

  public function createPost(createPostRequest $request)
  {

    \DB::beginTransaction();
    try {
      $userId = auth('api')->user()->id; // Get the authenticated user id

      $feed = Feed::create(["user_id" => $userId, "content" => $request->content]);

      /**Store images */
      $this->SaveAttachments($feed->id, $request["images"], "image");
      /**Store video */
      $this->SaveAttachment($feed->id, $request["video"], "video");
      /**Store document */
      $this->SaveAttachment($feed->id, $request["document"], "document");
      \DB::commit();

      $allFeeds = $this->ShowFeeds("notPaginate");


      return $this->helper->responseJson(
        'success',
        trans('api.auth_data_retreive_success'),
        200,
        ['feeds' => PostResource::collection($allFeeds)]
      );

    } catch (\Exception $e) {
      \DB::rollBack();
      return $this->helper->responseJson('failed', trans('api.auth_something_went_wrong'), 422, null);
    }

  }

  /**show the feed or the share */
  public function showFeed(MakeLikeRequest $request)
  {

    $userId = auth('api')->user()->id;

    $modelId = $request->id;
    $type = ucfirst($request->type);
    $modelType = "App\\Models\\" . $type;

    $model = $modelType::find($modelId);

    if ($type === "Feed") {
      $resource = SimplePostResourceWithFav::make($model);

    } else {
      $resource = SimpleShareResource::make($model);
    }

    $comments=$model->comments()->whereNull('parent_comment_id')->get();

    return $this->helper->responseJson(
      'success',
      trans('api.auth_data_retreive_success'),
      200,
      [
        $type => $resource,
        "comments"=>CommentsResource::collection($comments),
       
      ]
    );

  }


  public function ShowPostsOfTheUser()
  {
    $allFeeds = $this->ShowFeedsOfTheUser("paginate");

    return $this->helper->responseJson(
      'success',
      trans('api.auth_data_retreive_success'),
      200,
      ['feeds' => PostResource::collection($allFeeds)]
    );

  }








  private function SaveAttachments($feed_id, $attachments, $type)
  {
    if ($attachments) {
      foreach ($attachments as $attachment) {
        $this->SaveAttachment($feed_id, $attachment, $type);

      }
    }

  }

  private function SaveAttachment($feed_id, $media, $type)
  {

    if ($media) {
      $images_attachment = new FeedMedia(["feed_id" => $feed_id]);
      $images_attachment->media = $media;
      $images_attachment->feed_id = $feed_id;
      $images_attachment->type = $type;
      $images_attachment->save();
    }

  }


  public function indexPosts()
  {
    //  $allFeeds=Feed::paginate(PAGINATION_COUNT);
    $allFeeds = $this->ShowFeeds("paginate");


    return $this->helper->responseJson(
      'success',
      trans('api.auth_data_retreive_success'),
      200,
      [
        'feeds' => PostResource::collection($allFeeds)->response()->getData(true),
      ]
    );

  }

  public function searchUser($keyword)
  {
    $roleUser = Role::where("name", "User")->where("guard_name", "api")->first();
    $users = User::where('role_id', $roleUser->id)
      ->where(function ($query) use ($keyword) {
        $query->where('fullname', 'LIKE', "%{$keyword}%")
          ->orWhere('email', 'LIKE', "%{$keyword}%")
          ->orWhere('nickname', 'LIKE', "%{$keyword}%");
      })
      ->paginate(PAGINATION_COUNT);

    return $this->helper->responseJson(
      'success',
      trans('api.auth_data_retreive_success'),
      200,
      [
        'users' => SimpleUserResource::collection($users)->response()->getData(true),
      ]
    );
  }






  public function makeShare(MakeShareRequest $request)
  {
    $userId = auth('api')->user()->id;
    $feedId = $request->id;
    $feed = Feed::find($feedId);

    Share::create(["sharing_user_id" => $userId, "content" => $request->content, "shared_feed_id" => $feed->id]);
    $feed->increment("shares_count");
    // Reload the feeds
    $allFeeds = $this->ShowFeeds("paginate");
    $message = __('api.share_added_success');

    return $this->helper->responseJson(
      'success',
      $message,
      200,
      [
        'feeds' => PostResource::collection($allFeeds)->response()->getData(true),
      ]
    );
  }








}
