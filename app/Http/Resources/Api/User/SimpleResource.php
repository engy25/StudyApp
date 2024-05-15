<?php

namespace App\Http\Resources\Api\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\{
    Country,
    Currency
};
use Carbon\Carbon;
use App\Http\Resources\TierResource;

class SimpleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'fullname' => $this->fullname,
            'dob'=>optional($this->dob)->format('d F Y'),
            'is_active' => (boolean) ($this->is_active),
            'image' => $this->image,
            'email' => $this->email,
            'token' => $this->when($this->token, $this->token),


        ];
    }
}
