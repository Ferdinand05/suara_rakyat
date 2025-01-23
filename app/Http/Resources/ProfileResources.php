<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResources extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'no_telp' => $this->no_telp,
            'role' => $this->roles->nama_role,
            'created_at' => $this->created_at->toFormattedDateString(),
            'pengaduan' => collect($this->pengaduan)->map(function ($item) {
                return [
                    'id' => $item->id,
                    'status' => $item->status,
                    'deskripsi' => $item->deskripsi,
                    'kategori' => $item->kategori->nama_kategori,
                    'created_at' => $item->created_at->diffForHumans(),
                    'tanggapan' => $item->tanggapan
                ];
            })

        ];
    }
}
