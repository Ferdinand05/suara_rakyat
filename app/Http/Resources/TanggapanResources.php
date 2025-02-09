<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TanggapanResources extends JsonResource
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
            'text' => $this->text,
            'user' => $this->user,
            'pengaduan' => [
                'id' => $this->pengaduan->id,
                'deskripsi' => $this->pengaduan->deskripsi,
                'status' => $this->pengaduan->status,
                'kategori_id' => $this->pengaduan->kategori_id,
                'kategori' => $this->pengaduan->kategori->nama_kategori
            ],
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
