<?php

namespace App\Http\Requests\dash\DE;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCountryRequest extends FormRequest
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
        $country_id = $this->route("country")->id;
        $request = $this;

        return [
            'country_code' => 'required|string|max:5|min:2|unique:countries,country_code,' . $country_id,
            'name_en' => [
                'required',
                'string',
                'max:30',
                'min:3',
                Rule::unique('country_translations', 'name')->ignore($country_id, 'country_id')->where(function ($query) use ($request) {
                    return $query->where('locale', 'en')->where('name', '<>', $request->name_en);
                }),
            ],
            'name_ar' => [
                'required',
                'string',
                'max:30',
                'min:3',
                Rule::unique('country_translations', 'name')->ignore($country_id, 'country_id')->where(function ($query) use ($request) {
                    return $query->where('locale', 'ar')->where('name', '<>', $request->name_ar);
                }),
            ],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
