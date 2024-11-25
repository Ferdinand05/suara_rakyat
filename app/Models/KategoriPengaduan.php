<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPengaduan extends Model
{
    protected $table = 'kategori_pengaduan';
    protected $fillable = ['nama_kategori', 'slug'];

    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class, 'kategori_id', 'id');
    }
}
