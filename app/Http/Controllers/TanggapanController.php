<?php

namespace App\Http\Controllers;

use App\Http\Resources\TanggapanResources;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TanggapanController extends Controller
{
    public function index(Request $request)
    {

        $keyword = $request->keyword;
        if ($keyword) {
            $tanggapan = Tanggapan::where('text', 'like', "%$keyword%")->paginate(6);
        } else {
            $tanggapan = Tanggapan::paginate(5);
        }


        return Inertia::render('Tanggapan/TanggapanView', [
            'tanggapan' => TanggapanResources::collection($tanggapan)
        ]);
    }

    public function createTanggapan(Request $request)
    {
        $request->validate([
            'tanggapan' => ['required', 'string']
        ]);

        Tanggapan::create([
            'user_id' => $request->user_id,
            'pengaduan_id' => $request->pengaduan_id,
            'text' => $request->tanggapan
        ]);

        return to_route('detail.pengaduan', $request->pengaduan_id);
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'text' => ['required']
            ]
        );

        $tanggapan = Tanggapan::whereId($id)->update([
            'text' => $request->text
        ]);
    }

    public function destroy($id)
    {
        $tanggapan = Tanggapan::find($id);

        if ($tanggapan) {
            $tanggapan->delete();
        }
    }
}
