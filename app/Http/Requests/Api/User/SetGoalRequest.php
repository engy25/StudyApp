<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\ApiMasterRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SetGoalRequest extends ApiMasterRequest
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
    $user_id = auth("api")->user()->id;
    return [

      'hours' => 'required|integer|min:1|max:20',
      'minutes' => 'required|integer|min:0|max:59',
      'type' => 'required|in:general,daily',
      // 'name'=>"required_if:type,general",
      'name' => [
        "required_if:type,general",
        Rule::unique("goals")->where(function ($query) use ($user_id) {
          return $query->where('user_id', $user_id);
        }),
      ],
    ];
  }
}
