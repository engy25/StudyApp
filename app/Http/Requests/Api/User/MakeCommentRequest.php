<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\ApiMasterRequest;
use Illuminate\Foundation\Http\FormRequest;

class MakeCommentRequest extends ApiMasterRequest
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
        'type' => 'required|in:share,feed',
        'comment'=>"required|min:2|max:400",
        'id' => [
          'required',
          function ($attribute, $value, $fail) {
            $type = $this->input('type');
            if ($type === 'feed') {
              $exists = \DB::table('feeds')->where('id', $value)->exists();
              if (!$exists) {

                $fail('The selected id is invalid for the feed type.');
              }
            } elseif ($type === 'share') {
              $exists = \DB::table('shares')->where('id', $value)->exists();
              if (!$exists) {
                $fail(trans('api.Selected_id_invalid_to_share'));
                $fail('The selected id is invalid for the share type.');
              }
            }
          },
        ],
      ];
    }
}
