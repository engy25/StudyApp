<?php

namespace App\Http\Requests\dash\DE;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
      $category_id=$this->route('category')->id;

      return [

        'name'=>'required|string|min:3|max:50|unique:categories,name,'.$category_id,
        'icon'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000',
      ];
    }
}
