<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diagnosa;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = Diagnosa::with('penyakit')
            ->latest()
            ->get();

        return view('admin.riwayat.index', compact('riwayat'));
    }

    public function destroy($id)
    {
        $riwayat = Diagnosa::findOrFail($id);

        $riwayat->delete();

        return redirect()
            ->back()
            ->with('success', 'Riwayat berhasil dihapus');
    }
}