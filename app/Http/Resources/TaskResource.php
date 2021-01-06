<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_date' => $this->created_at ? (string) $this->created_at->toDateString() : null,
            'items' => ItemResource::collection($this->whenLoaded('items')),
        ];
    }
}
