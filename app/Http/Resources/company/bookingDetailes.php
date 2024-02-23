<?php

namespace App\Http\Resources\company;

use Illuminate\Http\Resources\Json\JsonResource;

class bookingDetailes extends JsonResource
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
            'date' => $this->regiment->date,
        ];
    }
}
