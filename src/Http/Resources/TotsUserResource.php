<?php

namespace Tots\User\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TotsUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'role' => $this->resource->role,
            'firstname' => $this->resource->firstname,
            'lastname' => $this->resource->lastname,
            'photo' => $this->resource->photo,
            'phone' => $this->resource->phone,
            'email' => $this->resource->email,
            'status' => $this->resource->status,
            'created_at' => $this->resource->created_at,
        ];
    }
}