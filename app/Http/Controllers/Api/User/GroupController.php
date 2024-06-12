<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\{CreateGroupRequest, IndexGroupRequest, UpdateGroupRequest};
use App\Http\Resources\Api\User\CategoryResource;
use App\Models\Category;
use App\Traits\ConvertHoursToMinutesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{Group, GroupUser};
use App\Helpers\Helpers;
use App\Http\Resources\Api\User\GroupResource;

class GroupController extends Controller
{
  use ConvertHoursToMinutesTrait;
  public $helper;
  public function __construct()
  {
    $this->helper = new Helpers();
  }


  public function index(IndexGroupRequest $request)
  {
    $type = $request->type ?? "discover";
    $categoryId = $request->category_id ?? "all";
    $userId = auth("api")->user()->id;


    $query = Group::query(); //get the query groups

    if ($type === "discover") {

      // Get groups that the user does not belong to
      $query->whereDoesntHave('users', function ($q) use ($userId) {
        $q->where('user_id', $userId);
      });


    } elseif ($type === 'yourgroups') {
      // Get groups that the user  belong to
      $query->whereHas("users", function ($q) use ($userId) {
        $q->where('user_id', $userId);
      });
    }

    /// if the user send the category_id
    if ($categoryId != "all") {
      $query->where("category_id", $categoryId);
    }

    $groups = $query->paginate(PAGINATION_COUNT);

    return $this->helper->responseJson(
      'success',
      trans('api.auth_data_retreive_success'),
      200,
      [
        'categories' => CategoryResource::collection(Category::all()),
        'groups' => GroupResource::collection($groups)->response()->getData(true),
      ]
    );

  }

  public function show($group_id)
  {
    $group = Group::find($group_id);

    if (!$group) {
      return $this->helper->responseJson(
        'failed',
        trans('api.not_found'),
        404,
        null
      );
    }

    return $this->helper->responseJson(
      'success',
      trans('api.auth_data_retreive_success'),
      200,
      [
        'groups' => GroupResource::make($group),
      ]
    );
  }

  public function exitGroup($group_id)
  {
    $group = Group::find($group_id);
    $userId = auth("api")->user()->id;

    if (!$group) {
      return $this->helper->responseJson(
        'failed',
        trans('api.not_found'),
        404,
        null
      );
    }

    // Remove user from the group
    $group->users()->detach($userId);
    //check if the user is the owner and this is the only user in this group remove the group
    if ($group->owner_id === $userId && $group->users()->count === 0) {
      $group->delete();
      return $this->helper->responseJson(
        'success',
        trans('api.group_deleted'),
        200,
        null
      );

    }
    //cha
    $group->users()->first();
    return $this->helper->responseJson(
      'success',
      trans('api.left_group'),
      200,
      null
    );
  }

  public function deleteGroup($group_id)
  {
    $group = Group::find($group_id);


    if (!$group) {
      return $this->helper->responseJson(
        'failed',
        trans('api.not_found'),
        404,
        null
      );
    }
    $group->users()->detach();
    $group->delete();

    return $this->helper->responseJson(
      'success',
      trans('api.group_deleted_successfully'),
      200,
      null
    );
  }


  //craete group
  public function createGroup(CreateGroupRequest $request)
  {
    \DB::beginTransaction();
    try {


      $userId = auth("api")->user()->id;

      $totalWeeklytimeGoal = $this->convertToMinutes($request->weeklytimegoal_hours, $request->weeklytimegoal_minutes);
      $totalDuration = $this->convertToMinutes($request->hours, $request->minutes);


      $group = Group::create([  //create Group
        "name" => $request->name,
        "category_id" => $request->category_id,
        "owner_id" => $userId,
        "duration" => $totalDuration,
        "weeklytimegoal" => $totalWeeklytimeGoal,
        "goal_id" => $request->goal_id,
        "bio" => $request->bio,
        "feature_id" => $request->feature_id,
        "code" => Str::random(7)
      ]);

      //Assign The Admin User In His Group
      GroupUser::create(["user_id" => $userId, "group_id" => $group->id]);

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

  /**show the groups */



  //search group by the name or the code
  public function SearchGroup($keyword)
  {
    $groups = Group::where(function ($query) use ($keyword) {
      $query->where('code', 'LIKE', "%{$keyword}%")
        ->orWhere('name', 'LIKE', "%{$keyword}%")
        ->orWhere('bio', 'LIKE', "%{$keyword}%");
    })
      ->paginate(PAGINATION_COUNT);

    return $this->helper->responseJson(
      'success',
      trans('api.auth_data_retreive_success'),
      200,
      [
        'groups' => GroupResource::collection($groups)->response()->getData(true),
      ]
    );
  }


  public function UpdateGroup($group_id, UpdateGroupRequest $request)
  {

    $group = Group::findOrFail($group_id);

    $totalWeeklytimeGoal = $this->convertToMinutes($request->weeklytimegoal_hours, $request->weeklytimegoal_minutes);
    $totalDuration = $this->convertToMinutes($request->hours, $request->minutes);

    $group->update([  //update Group
      "name" => $request->name,
      "category_id" => $request->category_id,
      "duration" => $totalDuration,
      "weeklytimegoal" => $totalWeeklytimeGoal,
      "goal_id" => $request->goal_id,
      "bio" => $request->bio,
      "feature_id" => $request->feature_id,
    ]);


    return $this->helper->responseJson(
      'success',
      trans('api.you_updated_Success'),
      200,
      [
        'groups' => GroupResource::make($group),
      ]
    );







  }


}
