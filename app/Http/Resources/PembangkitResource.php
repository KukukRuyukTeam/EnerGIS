<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PembangkitResource extends JsonResource
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
            'nama' => $this->nama,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'deskripsi' => $this->deskripsi,
            'lokasi' => $this->lokasi,
            'kapasitas' => $this->kapasitas,
            'gambar' => $this-> gambar,
        ];
    }
}
