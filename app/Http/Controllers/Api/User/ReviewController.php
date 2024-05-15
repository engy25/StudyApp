<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\AddToReviewRequest;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Models\{Review, Order, User};
use App\Http\Resources\Api\User\ReviewResource;
use App\Services\StatusService;

class ReviewController extends Controller
{


  public $helper;
  public $statusService;
  public function __construct()
  {
    $this->helper = new Helpers();
    $this->statusService = new StatusService();
  }


  public function add(AddToReviewRequest $request)
  {
    $from = auth('api')->user();
    $orderId = $request->order_id;
    $statusFinish = $this->statusService->getStatusIdByName("YourTripHasBeenCompletedSuccessfully!");
    $statusDriverCancell = $this->statusService->getStatusIdByName("DriverCancelled!");
    $statusOrderExpired = $this->statusService->getStatusIdByName("OrderExpired");


    $order = Order::whereId($orderId)->first();

    if ($order->driver_id == null) {
      return $this->helper->responseJson(
        'failed',
        trans('api.driver_not_assigned'),
        404,
        null
      );
    }


    if ($order->status_id == $statusFinish || $order->status_id == $statusDriverCancell || $order->status_id == $statusOrderExpired ) {

      $rate = Review::updateOrCreate([
        'from' => $from->id,
        'to' => $order->driver_id,
        'reviewable_id' => $orderId,
        'reviewable_type' => "App\Models\Order"
      ], [
        'rating' => $request->rating,
        'comment' => $request->comment,
        'title'=>$request->title
      ]);
      $average = round(Review::where('reviewable_type', "App\Models\Order")->where('reviewable_id', $orderId)->avg('rating'), 2);


      $reviews = Review::with(['fromUser', 'toUser'])->where('to',$order->driver_id)->where('reviewable_type', 'App\Models\Order')->latest('updated_at')->paginate(15);

      $reviews_count = Review::with(['fromUser', 'toUser'])
      ->where('reviewable_type', 'App\Models\Order')
      ->where('to', $order->driver_id)
      ->count();


      return $this->helper->responseJson('success', trans('api.auth_data_retreive_success'), 200,
      [
        "data" => [
          "userReviews" => ReviewResource::collection($reviews)->response()->getData(true),
          "reviews_count" => $reviews_count,
          'rate_avg' => $this->rate_avg($order->driver_id),

        ]
      ]

    );


    } else {
      return $this->helper->responseJson(
        'failed',
        trans('api.you_cannnot_rate'),
        404,
        null
      );
    }
  }


  public function show(Request $request)
  {
    $toId = $request->driver_id;


    $driver = User::where("id", $toId)->first();
    if (!$driver) {
      return $this->helper->responseJson(
        'failed',
        trans('api.not_found'),
        404,
        null
      );
    }
    // dd($driver);


    $reviews = Review::with(['fromUser', 'toUser'])->where('reviewable_type', "App\Models\Order")
      ->where('to', $toId)->latest('updated_at')->paginate(PAGINATION_COUNT);
    // dd($reviews);

    $reviews_count = Review::with(['fromUser', 'toUser'])->where('reviewable_type', "App\Models\Order")
      ->where('to', $toId)->count();

    //  dd($reviews_count);
    $statusFinishId = $this->statusService->getStatusIdByName("YourTripHasBeenCompletedSuccessfully");



    $trips_count = Order::where('driver_id', $driver->id)
      ->where('status_id', $statusFinishId)->count();

    return $this->helper->responseJson(
      'success',
      trans('api.auth_data_retreive_success'),
      200,
      [
        "data" => [
          "reviews" => ReviewResource::collection($reviews)->response()->getData(true),
          "reviews_count" => $reviews_count,
          'rate_avg' => $this->rate_avg($toId),
          'trips_count' => $trips_count

        ]
      ]
    );
  }


  protected function rate_avg($id)
  {
    $reviewableType = 'App\Models\Order';
    $avg = round(Review::where('reviewable_type', $reviewableType)->where('to', $id)->avg('rating'), 2);
    return $avg;
  }


}
