<?php

namespace App\Http\Controllers\dashboard\DataEntry;

use App\Http\Controllers\Controller;
use App\Models\{Group, Category, Feature, User};
use App\Traits\ConvertHoursToMinutesTrait;
use Illuminate\Http\Request;

class GroupController extends Controller
{
  use ConvertHoursToMinutesTrait;
  public function searchGroup(Request $request)
  {
    $searchString = '%' . $request->search_string . '%';

    $filters = [
      'category_id' => $request->category === 'Categories' ? null : $request->category,
      'owner_id' => $request->user === 'Users' ? null : $request->user,
      'feature_id' => $request->feature === 'features' ? null : $request->feature,
      'is_private' => $request->private === 'isPrivate' ? null : $request->private,
    ];


    $groups = Group::when($request->search_string, function ($q) use ($searchString) {
      $q->where("name", 'like', $searchString)
        ->orWhere('code', 'like', $searchString)
        ->orWhere('bio', 'like', $searchString);

    })
      ->when(array_filter($filters), function ($q) use ($filters) {
        // Apply filtering for non-null values in the $filters array
        foreach ($filters as $field => $value) {
          if ($value !== null) {
            if ($field === 'is_private') {
              if ($value == 2) {
                $q->where("is_private", 0);
              } else {
                $q->where("is_private", 1);
              }

            } else {
              $q->where($field, $value);
            }
          }
        }
      })
      ->latest()
      ->paginate(PAGINATION_COUNT);

    if ($groups->count() > 0) {
      return view("content.groups.pagination_index", compact("groups"))->render();
    } else {
      return response()->json([
        "status" => 'nothing_found',
      ]);
    }
  }

  public function paginationGroup(Request $request)
  {
    $groups = Group::latest()->paginate(PAGINATION_COUNT);
    return view("content.groups.pagination_index", compact("groups"))->render();

  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $Isprivates = [
      [
        "id" => 1,
        "name" => "Private",
      ],
      [
        "id" => 2,
        "name" => "Public",
      ]
    ];
    $categories = Category::get();
    $features = Feature::get();
    $users = User::whereHas("groups")->get();

    $groups = Group::latest()->paginate(PAGINATION_COUNT);
    return view("content.groups.index", compact("users", "Isprivates", "groups", "categories", "features"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Group $group)
  {
    $group = Group::with("users","interests")->whereId($group->id)->first();

    $weeklyTimeGoal = $group->weeklytimegoal !== null ? $this->convertToHoursAndMinutes($group->weeklytimegoal) : null;
    $weeklyTimeGoalHours = $group->weeklytimegoal !== null ? $weeklyTimeGoal[0]." H" : "No Hours ";
    $weeklyTimeGoalMinutes = $group->weeklytimegoal !== null ? $weeklyTimeGoal[1]. " M" : "No Minutes";

    $duration = $group->duration !== null ? $this->convertToHoursAndMinutes($group->duration) : null;
    $durationHours = $group->duration !== null ? $duration[0]." H" : "No Hours ";
    $durationMinutes = $group->duration !== null ? $duration[1]. " M" : "No Minutes";



    return view("content.groups.show", compact("group", "weeklyTimeGoalHours", "weeklyTimeGoalMinutes","durationHours","durationMinutes"));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Group $group)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Group $group)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Group $group)
  {
    //
  }
}
