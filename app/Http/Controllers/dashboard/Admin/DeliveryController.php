<?php

namespace App\Http\Controllers\dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\{User, Country, Service, Category, ServiceCategory};
use App\Models\Driverdetails;
use Illuminate\Http\Request;
use Spatie\Permission\Models\{Role, Permission};
use App\Http\Requests\dash\DE\StoreServiceToDeliveryRequest;

class DeliveryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   */
  public function index()
  {

    $userRole = Role::where("name", "Delivery")->first();

    $statuses = [
      [
        "id" => 10,
        "name" => "InActive",
      ],
      [
        "id" => 1,
        "name" => "Active",
      ],
      [
        "id" => 2,
        "name" => "Completed",
      ],


    ];


    $deliveries = User::role("Delivery", "api")->latest()->paginate(PAGINATION_COUNT);

    return view("content.deliveries.index", compact("deliveries", "statuses"));
  }

  /**paginate the users */
  public function paginationDelivery(Request $request)
  {
    $userRole = Role::where("name", "Delivery")->first();


    $deliveries = User::role("Delivery", "api")->latest()->paginate(PAGINATION_COUNT);

    return view("content.deliveries.pagination_index", compact("deliveries"))->render();

  }


  /**
   * search for DELIVERY
   */

  public function searchDelivery(Request $request)
  {
    $searchString = '%' . $request->search_string . '%';
    $status = $request->status;

    $deliveries = User::role("Delivery", "api")
      ->when($request->search_string, function ($q) use ($searchString) {
        $q->where(function ($query) use ($searchString) {
          $query->where("fname", 'like', $searchString)
            ->orWhere('email', 'like', $searchString)
            ->orWhere('phone', 'like', $searchString);
        });
      })
      ->when($request->status, function ($q) use ($status) {
        if ($status == 10) {
          $q->where("is_active", 0);
        } else {
          $q->where("is_active", $status);
        }

      })
      ->latest()
      ->paginate(PAGINATION_COUNT);

    if ($deliveries->count() > 0) {
      return view("content.deliveries.pagination_index", compact("deliveries"))->render();
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
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $user
   */
  public function show(User $delivery)
  {
    //
    $delivery = User::with("driverDetails")->where("id", $delivery->id)->first();
    $services = Service::all();
    $categories = Category::all();

    return view("content.deliveries.show", compact("delivery", "services", "categories"));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   */
  public function edit(User $alluser)
  {
    $countries = Country::all();
    return view("content.Alluser.update", compact("alluser", "countries"));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   */
  public function update(Request $request, User $alluser)
  {
    try {
      $alluser->update([
        'fname' => $request->fname,
        'lname' => $request->lname,
        'email' => $request->email,
        'country_code' => $request->country,
        'phone' => $request->phone,

      ]);
      if ($request->password != null) {

        $alluser->update(['password' => $request->password]);
      }


      // Handle image upload
      if ($request->hasFile('upimage')) {
        $alluser->update(['image' => $request->upimage]);

      }

      // Redirect back or to a specific route after the update
      return redirect()->route('allusers.index')->with('successUpdate', 'User updated successfully');
    } catch (\Exception $e) {
      \DB::rollBack();
      return redirect()->back()->with('error', 'Failed to create user. ' . $e->getMessage());
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    //
  }
  public function ChangDeliveryStatusToActive($delivery_id)
  {
    try {
      $delivery = User::whereId($delivery_id)->first();
      $delivery->update(["is_active" => 1]);
      return response()->json(['status' => true, 'msg' => "Status Changes Successflly"]);
    } catch (\Exception $e) {
      return response()->json(['status' => false, 'msg' => $e->getMessage()], 403);
    }

  }
  public function ChangDeliveryStatusToInActive($delivery_id)
  {
    try {
      $delivery = User::whereId($delivery_id)->first();
      $delivery->update(["is_active" => 0]);
      return response()->json(['status' => true, 'msg' => "Status Changes Successflly"]);
    } catch (\Exception $e) {
      return response()->json(['status' => false, 'msg' => $e->getMessage()], 403);
    }

  }

  public function addServiceToDelivery(StoreServiceToDeliveryRequest $request, $delivery_id)
  {
    try {

      $delivery = Driverdetails::updateOrCreate(["user_id" => $delivery_id], $request->validated());
      return response()->json(['status' => true, 'msg' => "Delivery Updated Successflly"]);
    } catch (\Exception $e) {
      return response()->json(['status' => false, 'msg' => $e->getMessage()], 403);
    }



  }

  public function fetchCategories($serviceId)
  {
    $categoryIds = ServiceCategory::where("service_id", $serviceId)->pluck("category_id");
    $categories = Category::whereIn("Id", $categoryIds)->get();
    return response()->json($categories);


  }
}
