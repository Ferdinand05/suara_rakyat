<?php

namespace App\Http\Controllers;

use App\Http\Resources\KategoriPengaduanResources;
use App\Models\KategoriPengaduan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Home');
    }

    public function pengaduanView()
    {
        return Inertia::render('Home/PengaduanView', [
            'kategoriPengaduan' => KategoriPengaduanResources::collection(KategoriPengaduan::all())
        ]);
    }
}
