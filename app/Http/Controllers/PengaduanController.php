<?php

namespace App\Http\Controllers;

use App\Http\Resources\PengaduanResources;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Pengaduan/PengaduanView', [
            'pengaduan' => PengaduanResources::collection(Pengaduan::all())
        ]);
    }

    public function updateStatus(Request $request)
    {

        $request->validate([
            'status' => 'in:pending,diproses,ditolak,selesai'
        ]);

        Pengaduan::where('id', $request->id)->update([
            'status' => $request->status
        ]);
    }
}
