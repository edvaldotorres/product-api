<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => (int)$this->id,
            'name'       => (string)$this->first_name,
            'email'      => (string)$this->email,
            'created_at' => (string)$this->created_at,
        ];
    }
}
