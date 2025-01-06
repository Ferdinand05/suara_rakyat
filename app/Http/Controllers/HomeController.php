<?php

namespace App\Http\Controllers;

use App\Http\Resources\KategoriPengaduanResources;
use App\Models\KategoriPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function createPengaduan(Request $request) {}
}
