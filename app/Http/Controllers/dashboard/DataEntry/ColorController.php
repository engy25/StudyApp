<?php

namespace App\Http\Controllers\dashboard\DataEntry;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Requests\dash\DE\ColorRequest;

class ColorController extends Controller
{

  public function searchColor(Request $request)
  {
    $searchString = '%' . $request->search_string . '%';

      $colors = Color::where('name', 'like', $searchString)
      ->orWhere('code', $searchString)
      ->latest()
      ->paginate(PAGINATION_COUNT);



    if ($colors->count() > 0) {
      // Return the search results as HTML
      return view("content.color.pagination_index", compact("colors"))->render();
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
    $colors = Color::latest()->paginate(PAGINATION_COUNT);

    return view("content.color.index", compact("colors"));
  }


  public function paginationColor(Request $request)
  {

    $colors = Color::latest()->paginate(PAGINATION_COUNT);
    return view("content.color.pagination_index", compact("colors"))->render();

  }







  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   */
  public function store(ColorRequest $request)
  {
    $color = Color::create([
      "name" => $request->name,
      "code" => $request->code

    ]);

    if ($color) {
      return response()->json([
        "status" => true,
        "message" => "Color Added Successfully"
      ]);

    } else {
      return response()->json([
        "status" => false,
        "message" => "Failed to add Color"
      ], 500); // Internal Server Error status code
    }

  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Color  $color

   */
  public function show(Color $color)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Color  $color
   */
  public function edit(Color $color)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Color  $color
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Color $color)
  {
    $rules = [
      'up_name' => [
        'required',
        'string',
        'max:30',
        'min:3',
        'unique:colors,name,' . $color->id,

      ],
      "up_code" => [
        "required",
        'string',
        'max:30',
        'unique:colors,code,' . $color->id
      ]







    ];

    $validator = \Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return response()->json(['errors' => $validator->errors()], 422);
    }
    $color->name = $request->up_name;
    $color->code = $request->up_code;

    $color->save();

    return response()->json([
      "status" => true,
      "message" => "Color updated successfully"
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Color  $color
   */


  public function destroy(Color $color)
  {
    try {
      $color->delete();
      return response()->json(['status' => true, 'msg' => "Color Deleted Successfully"]);
    } catch (\Exception $e) {
      return response()->json(['status' => false, 'msg' => $e->getMessage()], 403);
    }
  }

}
