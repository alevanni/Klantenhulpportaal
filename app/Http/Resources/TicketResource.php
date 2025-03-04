<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'created_by' => $this->created_by,
            'category' => $this->category,
            'status' => $this->status,
            'assigned_to' => $this->assigned_to,
            'created_on' => $this->created_at,
            'updated_on' => $this->updated_at,
        ];
    }
}
