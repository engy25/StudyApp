<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\User\StudyResource;
use App\Models\Study;
use Illuminate\Http\Request;
use App\Helpers\Helpers;

class StudyController extends Controller
{
  public $helper;
  public function __construct()
  {
    $this->helper = new Helpers();
  }
  public function index()
  {
    $studies = Study::with("branches")->get();
    return $this->helper->responseJson(
      'success',
      trans('api.auth_data_retreive_success'),
      200,
      ['studies' => StudyResource::collection($studies)]
    );

  }
}
