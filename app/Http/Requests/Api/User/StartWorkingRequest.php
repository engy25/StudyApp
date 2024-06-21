<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\ApiMasterRequest;
use Illuminate\Foundation\Http\FormRequest;

class StartWorkingRequest extends ApiMasterRequest
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
        $rules = [
            "feature_id" => "required|in:1,2",
            "goal_id" => "required|exists:goals,id",


        ];

        // Conditional validation for duration fields
        if ($this->input('feature_id') == 2) {
            $rules['duration_hours'] = 'required|integer|min:1|max:20';
            $rules['duration_minutes'] = 'required|integer|min:0|max:59';
            $rules['pomodoro_mode'] =  "nullable|in:beginer,standard,advanced'|required_with:is_pomodoro,1";
            $rules['"is_pomodoro'] =  "nullable|in:1,0";
        }


        return $rules;
    }
}
