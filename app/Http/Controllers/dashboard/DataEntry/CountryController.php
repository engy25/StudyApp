<?php

namespace App\Http\Controllers\dashboard\DataEntry;

use App\Http\Controllers\Controller;
use App\Http\Requests\dash\DE\CountryRequest;
use Illuminate\Http\Request;
use App\Models\{Country, Currency, CountryTranslation};
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CountryController extends Controller
{
  /**
   * Display a listing of the resource.

   */

  public function index()
  {
    $locale = LaravelLocalization::getCurrentLocale();

    $countries = Country::latest()->paginate(PAGINATION_COUNT);

    return view("content.country.index", compact("countries"));

  }

  public function paginationCountry(Request $request)
  {
    $locale = LaravelLocalization::getCurrentLocale();

    $countries = Country::latest()->paginate(PAGINATION_COUNT);


    return view("content.country.pagination_index", compact("countries"))->render();


  }

  /****search  */
  public function searchCountry(Request $request)
  {

    $searchString = '%' . $request->search_string . '%';
    $locale = LaravelLocalization::getCurrentLocale();


    $countries = Country::where("country_code", $request->search_string)->
      OrWhereHas('translations', function ($query) use ($searchString) {
        $query->where('name', 'like', $searchString);
      })
      ->latest()
      ->paginate(PAGINATION_COUNT);



    if ($countries->count() > 0) {
      // Return the search results as HTML
      return view("content.country.pagination_index", compact("countries"))->render();
    } else {
      return response()->json([
        "status" => 'nothing_found',
      ]);
    }







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
  public function store(CountryRequest $request)
  {

    $country = Country::create([
      'country_code' => $request->country_code,
      "flag" => $request->image

    ]);

    $countryAr = CountryTranslation::create(['name' => $request->name_en, "country_id" => $country->id, "locale" => "en"]);
    $countryEn = CountryTranslation::create(['name' => $request->name_ar, "locale" => "ar", "country_id" => $country->id]);



    if ($country && $countryAr && $countryEn) {
      return response()->json([
        "status" => true,
        "message" => "Country Added Successfully"
      ]);
    } else {
      return response()->json([
        "status" => false,
        "message" => "Failed to add Country"
      ], 500);

    }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id

   */
  public function edit(Country $country)
  {

    //
    return view("content.country.update", compact("country"));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id

   */
  public function update(Request $request, Country $country)
  {


    $country->country_code = $request->country_code;

    if ($request->hasFile('image')) {
      $country->flag = $request->image;
    }

    $country->save();

    CountryTranslation::where(['country_id' => $country->id, "locale" => "en"])->update(['name' => $request->name_en]);
    CountryTranslation::where(['country_id' => $country->id, "locale" => "ar"])->update(['name' => $request->name_ar]);


    return redirect()->route('countries.index')->with('success', 'Country has been updated successfully.');


  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Country $country)
  {
    try {
      $country->delete();
      return response()->json(['status' => true, 'msg' => "country Deleted Successfully"]);
    } catch (\Exception $e) {
      return response()->json(['status' => false, 'msg' => $e->getMessage()], 403);
    }

  }


  public function countryIndex()
  {
    $locale = LaravelLocalization::getCurrentLocale();
    $countries = Country::with([
      "translations" => function ($query) use ($locale) {
        $query->select("country_id", "name")->where("locale", $locale);
      }
    ])->select('id')->get();
    return response()->json($countries);

  }
}
