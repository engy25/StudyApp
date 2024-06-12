<?php

namespace App\Http\Requests\dash\DE;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
        'country_code' => 'required|string|max:5|unique:countries,country_code|min:2',
        'name_en' => 'required|string|max:50|unique:country_translations,name',
        'name_ar' => 'required|string|max:50|unique:country_translations,name',
        'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

      ];
    }
}
