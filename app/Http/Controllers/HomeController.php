<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriPengaduan;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\KategoriPengaduanResources;
use App\Http\Resources\TanggapanResources;
use App\Models\BuktiPengaduan;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;

use function Termwind\render;

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

    // upload image pengaduan
    public function upload(Request $request)
    {

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 's3');


            $url = Storage::disk('s3')->url($path); // Ambil URL file
            return response()->json([
                'uploaded' => true,
                'url' => $url, // URL gambar yang akan dimasukkan ke editor
            ]);
        }
        return response()->json(['error' => 'No file uploaded.'], 400);
    }

    public function createPengaduan(Request $request)
    {
        $request->validate([
            'kategori' => ['required', 'exists:kategori_pengaduan,id'],
            'deskripsi' => ['required', 'string'],
            'files' => ['nullable', 'array'],
            'files.*' => ['image', 'mimes:png,jpg,jpeg'],
            'lat' => ['required'],
            'lng' => ['required'],
        ]);


        $pengaduan = Pengaduan::create([
            'deskripsi' => $request->deskripsi,
            'status' => 'pending',
            'user_id' => Auth::user()->id,
            'kategori_id' => $request->kategori,
            'latitude' => $request->lat,
            'longitude' => $request->lng,
        ]);


        $files = $request->file('files');
        if ($files) {
            foreach ($files as $key => $value) {
                $fileExt = $value->getClientOriginalExtension();
                $fileName = Str::random(16);
                $fileFullName = $fileName . '.' . $fileExt;
                $path = $files[$key]->storeAs('bukti_pengaduan', $fileFullName, 's3');

                $url = Storage::disk('s3')->url($path);

                BuktiPengaduan::create([
                    'pengaduan_id' => $pengaduan->id,
                    'file' => $url
                ]);
            }
        }


        return to_route('detail.pengaduan', $pengaduan->id);
    }

    public function detailPengaduan(Request $request, $id)
    {

        $pengaduan = Pengaduan::with(['user', 'kategori', 'buktiPengaduan'])->where('id', $id)->first();

        return Inertia::render('Home/DetailPengaduanView', [
            'pengaduan' => $pengaduan,
            'tanggapan' => TanggapanResources::collection(Tanggapan::where('pengaduan_id', $id)->get())
        ]);
    }
}
