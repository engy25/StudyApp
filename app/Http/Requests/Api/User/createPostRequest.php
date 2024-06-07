<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\ApiMasterRequest;
use Illuminate\Foundation\Http\FormRequest;

class createPostRequest extends ApiMasterRequest
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
      'images.*' => 'nullable|image|mimes:jpeg,bmp,png|max:2048',
      'text' => 'nullable|string|max:5000|required_without_all:images.*,video,document',
      'video' => 'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm',
      'document' => 'nullable|file|mimes:docx,doc,txt,wpd,pages,pdf|max:5120',
    ];
  }
}
