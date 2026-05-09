<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalPenyakit = \App\Models\Penyakit::count();

        $totalGejala = \App\Models\Gejala::count();

        $totalDiagnosa = \App\Models\Diagnosa::count();

        return view('dashboard', compact(
            'totalPenyakit',
            'totalGejala',
            'totalDiagnosa'
        ));
    }
}
