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

    $countries = Country::with([
      "currency"
    ])->latest()->paginate(PAGINATION_COUNT);

    return view("content.country.index", compact("countries"));

  }

  public function paginationCountry(Request $request)
  {
    $locale = LaravelLocalization::getCurrentLocale();

    $countries = Country::with([
      "currency"
    ])->latest()->paginate(PAGINATION_COUNT);


    return view("content.country.pagination_index", compact("countries"))->render();


  }

  /****search  */
  public function searchCountry(Request $request)
  {
    $locale = LaravelLocalization::getCurrentLocale();

    $searchString = '%' . $request->search_string . '%';

    $countries = Country::with([
      "currency" => function ($query) use ($locale) {
        $query->select("id", "name_" . $locale . " as name", "isocode");
      }
    ])
      ->where("name_" . $locale, 'like', $searchString)
      ->orWhere("name_" . $locale, 'like', $searchString)
      ->orWhere("region_" . $locale, 'like', $searchString)
      ->orWhere("localName_" . $locale, 'like', $searchString)
      ->orWhere("governmentForm_" . $locale, 'like', $searchString)
      ->orWhere("capital", 'like', $searchString)
      ->orWhere("HeadOfState", 'like', $searchString)
      ->orWhere("IndepYear", 'like', $searchString)
      ->orWhere("lifeExpectancy", 'like', $searchString)
      ->orWhere("continent", 'like', $searchString)
      ->orWhere("GNP", 'like', $searchString)
      ->orWhere("GNPOld", 'like', $searchString)
      ->orWhere("code", 'like', $searchString)
      ->orWhere("code2", 'like', $searchString)
      ->select([
        "name_" . $locale . " as name",
        "id",
        "region_" . $locale . " as region",
        "code",
        "code2",
        "name_en",
        "name_ar",
        "region_en",
        "region_ar",
        "localName_en",
        "localName_ar",
        "governmentForm_en",
        "governmentForm_ar",
        "capital",
        "HeadOfState",
        "capital",
        "IndepYear",
        "surfaceArea",
        "lifeExpectancy",
        "GNP",
        "GNPOld",
        "currency_id",
        "localName_" . $locale . " as localName",
        "population",
        "continent"
      ])
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
    //default currency
    $currency = Currency::where("default", 1)->first();

    $country = Country::create([
      'country_code' => $request->country_code,
      "currency_id" => $currency->id,
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

    $rules = [
      'country_code' => 'required|string|max:5|min:2|unique:countries,country_code,' . $country->id,
      'name_en' => [
        'required',
        'string',
        'max:30',
        'min:3',
        Rule::unique('country_translations', 'name')->ignore($country->id, 'country_id')->where(function ($query) use ($request, $country) {
          // Check if the English name is different
          return $request->name_en !== $country->nameTranslation('en');
        }),
      ],
      'name_ar' => [
        'required',
        'string',
        'max:30',
        'min:3',
        Rule::unique('country_translations', 'name')->ignore($country->id, 'country_id')->where(function ($query) use ($request, $country) {
          // Check if the Arabic name is different
          return $request->name_ar !== $country->nameTranslation('ar');
        }),
      ],
      'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ];


    $validator = \Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return response()->json(['errors' => $validator->errors()], 422);
    }


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
