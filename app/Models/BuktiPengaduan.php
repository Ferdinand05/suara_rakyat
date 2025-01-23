<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuktiPengaduan extends Model
{
    protected $table = 'bukti_pengaduan';
    protected $fillable = ['pengaduan_id', 'file'];
}
