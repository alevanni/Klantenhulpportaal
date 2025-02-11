<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
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
            'created_by' => $this->created_by,
            'ticket_id' => $this->ticket_id,
            'body' => $this->body,
            'created_on' => $this->created_at,
            'updated_on' => $this->updated_at
        ];
    }
}
