<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengaduan;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {

        $counts = KategoriPengaduan::withCount('pengaduans')->orderBy('created_at')->get();
        return Inertia::render('Dashboard/Index', [
            'jumlahUser' => User::count(),
            'jumlahPengaduan' => Pengaduan::count(),
            'jumlahPengaduanPending' => Pengaduan::where('status', 'pending')->count(),
            'kategoriPengaduanCount' => $counts
        ]);
    }
}
