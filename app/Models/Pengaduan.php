<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasUlids;

    protected $table = 'pengaduan';
    protected $fillable = ['deskripsi', 'status', 'user_id', 'kategori_id', 'longtitude', 'latitude'];
}
