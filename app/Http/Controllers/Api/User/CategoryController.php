<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\User\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\Helpers;

class CategoryController extends Controller
{
  public $helper;
  public function __construct()
  {
    $this->helper = new Helpers();
  }
  public function index()
  {
    $categories = Category::get();
    return $this->helper->responseJson(
      'success',
      trans('api.auth_data_retreive_success'),
      200,
      ['categories' => CategoryResource::collection($categories)]
    );

  }
}
