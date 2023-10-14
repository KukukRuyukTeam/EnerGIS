<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PLTBmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "id_pl" => $this->id_pl,
            "sumber_energi" => $this->sumber_energi,
            'pembangkit' => $this->pembangkit,
        ];
    }
}
