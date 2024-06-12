<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\ApiMasterRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupRequest extends ApiMasterRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    $group = $this->route('group_id');

    return [
      "name" => 'required|min:3|max:50|unique:groups,name,' . $group,
      "bio" => "required|min:5|max:300",
      "feature_id" => "required|in:1,2",
      "weeklytimegoal_minutes" => 'required|integer|min:0|max:59',
      "weeklytimegoal_hours" => 'required|integer|min:1|max:20',
      "goal_id" => "required|exists:goals,id",
      'hours' => 'required_if:feature_id,2|integer|min:1|max:20',
      'minutes' => 'required_if:feature_id,2|integer|min:0|max:59',
      "category_id" => "required|exists:categories,id"
    ];
  }
}
