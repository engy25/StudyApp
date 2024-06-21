<?php

namespace App\Http\Controllers\dashboard\DataEntry;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\dash\DE\{StoreCategoryRequest,UpdateCategoryRequest};

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   */
  public function searchCategory(Request $request)
  {
    $searchString = '%' . $request->search_string . '%';

    $categories = Category::where('name', 'like', $searchString)->latest()
      ->paginate(PAGINATION_COUNT);

    if ($categories->count() > 0) {
      // Return the search results as HTML
      return view("content.categories.pagination_index", compact("categories"))->render();
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

    $categories = Category::latest()->paginate(PAGINATION_COUNT);

    return view("content.categories.index", compact("categories"));
  }


  /****pagination city */


  public function paginationService(Request $request)
  {

    $categories = Category::latest()->paginate(PAGINATION_COUNT);

    return view("content.categories.pagination_index", compact("categories"))->render();

  }



  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreCategoryRequest $request)
  {
    $category = Category::create(["name" => $request->name, "description"=>$request->description,"icon" => $request->icon]);

    if ($category) {
      return response()->json([
        "status" => true,
        "message" => "Category Added Successfully"
      ]);

    } else {
      return response()->json([
        "status" => false,
        "message" => "Failed to add Category"
      ], 500); // Internal Server Error status code
    }

  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category  $category
   */
  public function edit(Category $category)
  {

    return view("content.categories.edit", compact("category"));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Category  $category
   */
  public function update(UpdateCategoryRequest $request, Category $category)
  {
    $category->update($request->validated());

     return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    try {
      $category->delete();
      return response()->json(['status' => true, 'msg' => "category Deleted Successfully"]);
    } catch (\Exception $e) {
      return response()->json(['status' => false, 'msg' => $e->getMessage()], 403);
    }
  }
}
