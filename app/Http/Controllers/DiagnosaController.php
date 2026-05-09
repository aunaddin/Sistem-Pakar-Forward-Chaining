<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Diagnosa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DiagnosaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();

        return view('deteksi.index', compact('gejala'));
    }

    public function proses(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'gejala' => 'required|array',
        ]);

        $gejalaDipilih = $request->gejala;

        $penyakitList = Penyakit::with('gejala')->get();

        $hasilPenyakit = null;

        $persentaseTertinggi = 0;

        foreach ($penyakitList as $penyakit) {

            $totalGejalaPenyakit = $penyakit->gejala->count();

            $totalCocok = 0;

            foreach ($penyakit->gejala as $gejala) {

                if (in_array($gejala->id, $gejalaDipilih)) {

                    $totalCocok++;

                }
            }

            if ($totalGejalaPenyakit > 0) {

                $persentase =
                    ($totalCocok / $totalGejalaPenyakit) * 100;

            } else {

                $persentase = 0;
            }

            if ($persentase > $persentaseTertinggi) {

                $persentaseTertinggi = $persentase;

                $hasilPenyakit = $penyakit;
            }
        }

        $diagnosa = Diagnosa::create([
            'nama_pasien' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'penyakit_id' => $hasilPenyakit?->id,
        ]);

        $gejalaUser = Gejala::whereIn('id', $gejalaDipilih)->get();

        return view('deteksi.hasil', compact(
            'hasilPenyakit',
            'diagnosa',
            'persentaseTertinggi',
            'gejalaUser'
        ));
    }
    
    public function pdf($id)
    {
        $diagnosa = Diagnosa::with('penyakit')
            ->findOrFail($id);

        $pdf = Pdf::loadView('deteksi.pdf', compact('diagnosa'));

        return $pdf->download('hasil-diagnosa.pdf');
    }
}