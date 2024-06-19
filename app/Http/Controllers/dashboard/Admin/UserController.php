<?php

namespace App\Http\Controllers\dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\dash\Admin\StoreUserRequest;
use App\Traits\FeedMerger;
use Illuminate\Http\Request;
use Spatie\Permission\Models\{Permission, Role};
use App\Models\{User, Country};
use App\Helpers\Helpers;

class UserController extends Controller
{
  use FeedMerger;
  public $helper;
  public function __construct()
  {
    $this->helper = new Helpers();
  }


  /**
   * Display a listing of the resource.
   *
   */
  public function index()
  {


    $roles = Role::all();
    $statuses = [
      [
        "id" => 1,
        "name" => "Active",
      ],
      [
        "id" => 2,
        "name" => "Inactive",
      ]
    ];



    $users = User::latest()->paginate(PAGINATION_COUNT);


    return view("content.user.index", compact("users", "statuses", "roles"));
  }
  /**
   * Pagination for user
   */

  public function paginationUser(Request $request)
  {
    $users = User::latest()->paginate(PAGINATION_COUNT);
    return view("content.user.pagination_index", compact("users"))->render();

  }


  /**
   * search for user
   */
  public function searchUser(Request $request)
  {
    $searchString = '%' . $request->search_string . '%';
    $role = $request->role;
    $status = $request->status;

    $users = User::when($request->search_string, function ($q) use ($searchString) {
      $q->where("fullname", 'like', $searchString)
        ->orWhere('email', 'like', $searchString)
        ->orWhere('phone', 'like', $searchString);
    })->when($request->role, function ($q) use ($role) {
      $q->where("role_id", $role);
    })->when($request->status, function ($q) use ($status) {
      $q->where("is_active", $status);
    })->latest()->paginate(PAGINATION_COUNT);

    if ($users->count() > 0) {
      return view("content.user.pagination_index", compact("users"))->render();
    } else {
      return response()->json([
        "status" => 'nothing_found',
      ]);
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   *
   */
  public function create()
  {
    $roles = Role::whereNot("name", "user")->get();
    $countries = Country::all();

    return view("content.user.create", compact("roles", "countries"));
  }

  /**
   * Store a newly created resource in storage.
   *
   *
   */
  public function store(StoreUserRequest $request)
  {


    try {
      $role = Role::whereId($request->role)->first();


      if (!$role) {
        return redirect()->back()->with('error', 'Role not found.');
      }
      $country_code = $request->country;

      $country = Country::where("country_code", $country_code)->first();

      $user = new User;
      $user->fullname = $request->fullname;
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->country_code = $country_code;
      $user->password = $request->password;
      $user->is_active = 1;
      $user->country_id = $country->id;
      $user->role_id = $request->role;

      // Handle image upload
      if ($request->hasFile('image')) {
        $user->image = $request->image;
      }

      $user->save();
      $user->assignRole($role->name);
      \DB::commit();
      return redirect()->route('users.index')->with('success', 'User created successfully.');
    } catch (\Exception $e) {
      \DB::rollBack();
      return redirect()->back()->with('error', 'Failed to create user. ' . $e->getMessage());
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   */
  public function edit(User $user)
  {
    $countries = Country::all();
    $roles = Role::whereNot("name", "user")->get();
    return view("content.user.update", compact("user", "countries", "roles"));
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   */
  public function update(Request $request, User $user)
  {
    try {
      $user->update([
        'fullname' => $request->fullname,
        'email' => $request->email,
        'country_code' => $request->country,
        'phone' => $request->phone,

      ]);
      if ($request->password != null) {

        $user->update(['password' => $request->password]);
      }


      // Handle image upload
      if ($request->hasFile('upimage')) {
        $user->update(['image' => $request->upimage]);

      }

      // Redirect back or to a specific route after the update
      return redirect()->route('users.index')->with('successUpdate', 'User updated successfully');
    } catch (\Exception $e) {
      \DB::rollBack();
      return redirect()->back()->with('error', 'Failed to create user. ' . $e->getMessage());
    }
  }




  public function show(User $user)
  {
    $userId = $user->id;

    $feeds = $this->showFeedsToTheDashboard($userId);

    $shares = $this->showSharesToTheDashboard($userId);


  return view("content.user.show", compact("user", "feeds","shares"));

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    try {
      $user->delete();
      return response()->json(['status' => true, 'msg' => "user Deleted Successfully"]);
    } catch (\Exception $e) {
      return response()->json(['status' => false, 'msg' => $e->getMessage()], 403);
    }

  }



}
