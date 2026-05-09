<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;

class PublicController extends Controller
{
    public function home()
    {
        $penyakit = Penyakit::latest()
            ->take(4)
            ->get();

        return view('public.home', compact('penyakit'));
    }

    public function penyakit()
    {
        $penyakit = Penyakit::latest()->get();

        return view('public.penyakit', compact('penyakit'));
    }

    public function detailPenyakit($id)
    {
        $penyakit = Penyakit::with('gejala')
            ->findOrFail($id);

        return view('public.detail', compact('penyakit'));
    }
}