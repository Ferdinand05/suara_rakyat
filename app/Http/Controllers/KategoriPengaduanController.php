<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriPengaduan;
use App\Http\Resources\KategoriPengaduanResources;

class KategoriPengaduanController extends Controller
{
    public function index()
    {
        return Inertia::render('KategoriPengaduan/KategoriPengaduanView', [
            'kategoriPengaduan' => KategoriPengaduanResources::collection(KategoriPengaduan::all())
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => ['required', 'unique:kategori_pengaduan,nama_kategori']
        ]);

        KategoriPengaduan::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        return redirect()->back();
    }
}
