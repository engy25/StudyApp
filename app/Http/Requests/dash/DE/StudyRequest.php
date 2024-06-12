<?php

namespace App\Http\Requests\dash\DE;

use Illuminate\Foundation\Http\FormRequest;

class StudyRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {

    return [
      'name' => 'required|min:3|max:30|unique:studies,name',
      'branches.*.name' => 'required|string|max:50|unique:branch_studies,name',
      'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000',
     // 'branches' => 'required|array',







    ];
  }
}
