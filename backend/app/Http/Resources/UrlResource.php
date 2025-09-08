<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UrlResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'original_url' => $this->original_url,
            'short_url' => url($this->code),
            'created_at' => $this->created_at->toDateTimeString(),
            'expires_at' => $this->expires_at ? $this->expires_at->toDateTimeString() : null,
        ];
    }
}
