<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PLTAResource extends JsonResource
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
            'id_pl' => $this->id_pl,
            'jenis_generator' => $this->jenis_generator,
            'unit_generator' => $this->unit_generator,
            'pembangkit' => $this->pembangkit,
        ];
    }
}
