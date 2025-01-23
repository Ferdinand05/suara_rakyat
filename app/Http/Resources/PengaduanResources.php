<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PengaduanResources extends JsonResource
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
            'status' => $this->status,
            'deskripsi' => $this->deskripsi,
            'user' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
                'no_telp' => $this->user->no_telp
            ],
            'kategori' => $this->kategori->nama_kategori,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'created_at' => $this->created_at->toFormattedDateString()
        ];
    }
}
