<?php

namespace App\Http\Controllers;

use App\Http\Resources\PengaduanResources;
use App\Models\KategoriPengaduan;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {

        $keyword = $request->keyword;
        $slug = $request->slug;

        if ($slug && $slug !== 'semua') {
            $kategori = KategoriPengaduan::where('slug', $request->slug)->first();
            $pengaduan = Pengaduan::where('kategori_id', $kategori->id)->paginate(5)->withQueryString();
        } else if ($keyword) {
            $pengaduan = Pengaduan::where('status', 'like', "%$keyword%")->paginate(5)->withQueryString();
        } else {
            $pengaduan = Pengaduan::paginate(5)->withQueryString();
        }



        return Inertia::render('Pengaduan/PengaduanView', [
            'pengaduan' => PengaduanResources::collection($pengaduan),
            'kategoriPengaduan' => KategoriPengaduan::all()
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

    public function cancelPengaduan(Request $request, $id)
    {

        $pengaduan = Pengaduan::find($id);
        if ($pengaduan) {
            $tanggapan = Tanggapan::where('pengaduan_id', $pengaduan->id)->delete();
            $pengaduan->delete();
        }
    }


    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);

        if ($pengaduan) {
            $pengaduan->delete();
        }
    }
}
