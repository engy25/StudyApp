<?php

namespace App\Http\Controllers\dashboard\DataEntry;

use App\Http\Controllers\Controller;
use App\Models\BranchStudy;
use Illuminate\Http\Request;
use App\Models\Study;
use App\Http\Requests\dash\DE\{StudyRequest, StoreDetailsRequest,UpdateStudiesRequest};

class StudyController extends Controller
{
  public function searchStudy(Request $request)
  {
    $searchString = '%' . $request->search_string . '%';

    $studies = Study::where('name', 'like', $searchString)->latest()
      ->paginate(PAGINATION_COUNT);

    if ($studies->count() > 0) {
      // Return the search results as HTML
      return view("content.study.pagination_index", compact("studies"))->render();
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
      foreach (($branches) as $branch) {
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
    // \DB::beginTransaction();

    // try {
    $study = Study::create([
      "name" => $request->name,
      "icon" => $request->image

    ]);
    $branches = json_decode($request->branches, true); // Decode JSON string to array
    $this->storeBranches($study->id, $branches);

    \DB::commit();

    return response()->json([
      "status" => true,
      "message" => "Study Added Successfully"
    ]);

    // } catch (\Exception $e) {
    //   \DB::rollBack();
    //   return response()->json([
    //     "status" => false,
    //     "message" => "Error Occurs When  Added Study, Try Again"
    //   ]);
    // }

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
   */
  public function edit(Study $study)
  {
    return view("content.study.update", compact("study"));
  }






  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Study  $study
   */
  public function update(UpdateStudiesRequest $request, Study $study)
  {

    $study->update($request->validated());

     return redirect()->route('studies.index')->with('success', 'Study updated successfully.');

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

  public function storeDetails(StoreDetailsRequest $request)
  {
    if (isset($request->branch)) {
      /**
       * create the models
       */
      $branch = BranchStudy::create([
        "name" => $request->branch,
        "study_id" => $request->study_id
      ]);
    }

    return response()->json([
      "status" => true,
      "message" => "Branch Added Successfully"
    ]);

  }


  /**delete the details of the brand */

  public function deleteDetail(BranchStudy $detail_id)
  {

    try {
      $detail_id->delete();
      return response()->json(['status' => true, 'msg' => "Branch Deleted Successfully"]);
    } catch (\Exception $e) {
      return response()->json(['status' => false, 'msg' => $e->getMessage()], 403);
    }
  }

}
