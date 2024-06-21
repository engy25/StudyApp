<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\ApiMasterRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateGroupRequest extends ApiMasterRequest
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
        return [
          "name"=>"required|unique:groups,name|min:3|max:50",
          "bio"=>"required|min:5|max:300",
          "feature_id"=>"required|in:1,2",
          "weeklytimegoal_minutes"=>'nullable|integer|min:0|max:59',
          "weeklytimegoal_hours"=>'nullable|integer|min:1|max:20',
          "goal_id"=>"required|exists:goals,id",

          'hours' => 'required_with:feature,2,|integer|min:1|max:20',  // in case the type is timeblock
          'minutes' => 'required_with:feature,2|integer|min:0|max:59',   // in case the type is timeblock

          "interests"=>"required|array",
          "interests.*"=>"required|exists:branch_studies,id",

          "category_id"=>"required|exists:categories,id",
          "is_no_weekly_goal"=>"nullable|in:1,0",
          "is_private"=>"nullable|in:1,0"
        ];
    }
    public function messages(): array{

       return [
            "interests.*.exists" => "One or more selected interests are invalid.",
        ];
    }


}
