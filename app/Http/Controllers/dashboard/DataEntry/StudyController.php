<?php

namespace App\Http\Controllers\dashboard\DataEntry;

use App\Http\Controllers\Controller;
use App\Models\BranchStudy;
use Illuminate\Http\Request;
use App\Models\Study;
use App\Http\Requests\dash\DE\StudyRequest;
class StudyController extends Controller
{
  public function searchStudy(Request $request)
  {
    $searchString = '%' . $request->search_string . '%';

    $studies = Study::where('name', 'like', $searchString)->latest()
      ->paginate(PAGINATION_COUNT);

    if ($studies->count() > 0) {
      // Return the search results as HTML
      return view("content.stydy.pagination_index", compact("studies"))->render();
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
    $studies = Study::latest()->paginate(PAGINATION_COUNT);

    return view("content.study.index", compact("studies"));
  }


  public function paginationStudy(Request $request)
  {
    $studies = Study::latest()->paginate(PAGINATION_COUNT);
    return view("content.study.pagination_index", compact("studies"))->render();

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
   * Store brand with colors and models
   */

  private function storeBranches($studyId, $branches)
  {
    if ($branches) {
      /**create the models */
      foreach ($branches as $branch) {
        $theBranch = BranchStudy::create([
          'name' => $branch["name"],
          'study_id' => $studyId
        ]);
      }
    }
  }




  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   */
  public function store(StudyRequest $request)
  {
    \DB::beginTransaction();

    try {
      $study = Study::create([
        "name" => $request->name,
        "icon"=>$request->image

      ]);
      $this->storeBranches($study->id, $request->branches);


      \DB::commit();

      return response()->json([
        "status" => true,
        "message" => "Study Added Successfully"
      ]);

    } catch (\Exception $e) {
      \DB::rollBack();
      return response()->json([
        "status" => false,
        "message" => "Error Occurs When  Added Study, Try Again"
      ]);
    }

  }



  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Study  $study
   */
  public function show(Study $study)
  {

    return view("content.study.show", compact("study"));

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Study  $study
   * @return \Illuminate\Http\Response
   */
  public function edit(Study $study)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Study $study)
  {
    $rules = [
      'up_name' => [
        'required',
        'string',
        'max:30',
        'min:3',
        'unique:studies,name,' . $study->id,

      ],

    ];

    $validator = \Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return response()->json(['errors' => $validator->errors()], 422);
    }
    $study->name = $request->up_name;

    $study->save();

    return response()->json([
      "status" => true,
      "message" => "Study updated successfully"
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Study  $study
   * @return \Illuminate\Http\Response
   */


  public function destroy(Study $study)
  {
    try {
      $study->delete();
      return response()->json(['status' => true, 'msg' => "Study Deleted Successfully"]);
    } catch (\Exception $e) {
      return response()->json(['status' => false, 'msg' => $e->getMessage()], 403);
    }
  }

  /**store details (model and color of brand in show ) */

  // public function storeDetails(StoreDetailsRequest $request)
  // {
  //   if (isset ($request->model)) {
  //     /**
  //      * create the models
  //      */
  //     $model = Models::create([
  //       "name" => $request->model,
  //       "brand_id" => $request->brand_id
  //     ]);
  //   }

  //   if (isset ($request->colors))
  //     foreach ($request->colors as $colorId) {
  //       VechileBrandColor::create([
  //         "models_id" => isset ($request->model) ? $model->id : null,
  //         "color_id" => $colorId,
  //         "brand_id" => $request->brand_id
  //       ]);

  //     }


  //   return response()->json([
  //     "status" => true,
  //     "message" => "Brand Added Successfully"
  //   ]);

  // }

  // public function storeBrandColors(StoreBrandColorInShowRequest $request)
  // {

  //   if (isset ($request->colors))
  //     foreach ($request->colors as $colorId) {
  //       VechileBrandColor::create([

  //         "color_id" => $colorId,
  //         "brand_id" => $request->brand_id
  //       ]);

  //     }


  //   return response()->json([
  //     "status" => true,
  //     "message" => "Brand Added Successfully"
  //   ]);

  // }


  /**delete the details of the brand */

  // public function deleteDetail(VechileBrandColor $detail_id)
  // {

  //   try {
  //     $detail_id->delete();
  //     return response()->json(['status' => true, 'msg' => "Detail Deleted Successfully"]);
  //   } catch (\Exception $e) {
  //     return response()->json(['status' => false, 'msg' => $e->getMessage()], 403);
  //   }
  // }

}
