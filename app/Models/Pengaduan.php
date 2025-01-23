<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasUlids;

    protected $table = 'pengaduan';
    protected $fillable = ['deskripsi', 'status', 'user_id', 'kategori_id', 'longitude', 'latitude'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriPengaduan::class, 'kategori_id');
    }

    public function buktiPengaduan()
    {
        return $this->hasMany(BuktiPengaduan::class, 'pengaduan_id');
    }

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'pengaduan_id');
    }
}
