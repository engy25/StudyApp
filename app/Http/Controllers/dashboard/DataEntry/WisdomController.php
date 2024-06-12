<?php

namespace App\Http\Controllers\dashboard\DataEntry;

use App\Http\Controllers\Controller;
use App\Http\Requests\dash\DE\StoreWisdomRequest;
use App\Models\Wisdom;
use Illuminate\Http\Request;

class WisdomController extends Controller
{

    public function searchWisdom(Request $request)
    {
      $searchString = '%' . $request->search_string . '%';

      $wisdoms = Wisdom::where('title', 'like', $searchString)->orWhere("owner",'like',$searchString)->
      latest()
        ->paginate(PAGINATION_COUNT);

      if ($wisdoms->count() > 0) {
        // Return the search results as HTML
        return view("content.wisdoms.pagination_index", compact("wisdoms"))->render();
      } else {
        return response()->json([
          "status" => 'nothing_found',
        ]);
      }
    }

    /**
     * Display a listing of the resource.
     *
     */

    public function index()
    {

      $wisdoms = Wisdom::latest()->paginate(PAGINATION_COUNT);

      return view("content.wisdoms.index", compact("wisdoms"));
    }


    /****pagination Wisdom */


    public function paginationWisdom(Request $request)
    {

      $wisdoms = Wisdom::latest()->paginate(PAGINATION_COUNT);

      return view("content.wisdoms.pagination_index", compact("wisdoms"))->render();

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
    public function store(StoreWisdomRequest $request)
    {
      $wisdom = Wisdom::create(["title" => $request->title, "owner" => $request->owner]);

      if ($wisdom) {
        return response()->json([
          "status" => true,
          "message" => "wisdom Added Successfully"
        ]);

      } else {
        return response()->json([
          "status" => false,
          "message" => "Failed to add wisdom"
        ], 500); // Internal Server Error status code
      }

    }


    /**
     * Display the specified resource.
     */
    public function show(Wisdom $wisdom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wisdom $wisdom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wisdom $wisdom)
    {
      $rules = [
        'up_title' => [
          'required',
          'string',
          'max:300',
          'min:10',
        ],
        "up_owner" => [
          "required",
          'string',
          'max:30',
        ]
      ];

      $validator = \Validator::make($request->all(), $rules);

      if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
      }
      $wisdom->title = $request->up_title;
      $wisdom->owner = $request->up_owner;

      $wisdom->save();

      return response()->json([
        "status" => true,
        "message" => "Wisdom updated successfully"
      ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wisdom $wisdom)
    {
      try {
        $wisdom->delete();
        return response()->json(['status' => true, 'msg' => "wisdom Deleted Successfully"]);
      } catch (\Exception $e) {
        return response()->json(['status' => false, 'msg' => $e->getMessage()], 403);
      }
    }
}
