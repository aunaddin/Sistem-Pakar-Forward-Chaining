<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::latest()->get();

        return view('admin.gejala.index', compact('gejala'));
    }

    public function create()
    {
        return view('admin.gejala.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_gejala' => 'required|unique:gejala',
            'nama_gejala' => 'required',
        ]);

        Gejala::create($data);

        return redirect()
            ->route('gejala.index')
            ->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $gejala = Gejala::findOrFail($id);

        return view('admin.gejala.edit', compact('gejala'));
    }

    public function update(Request $request, $id)
    {
        $gejala = Gejala::findOrFail($id);

        $data = $request->validate([
            'kode_gejala' => 'required|unique:gejala,kode_gejala,' . $id,
            'nama_gejala' => 'required',
        ]);

        $gejala->update($data);

        return redirect()
            ->route('gejala.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $gejala = Gejala::findOrFail($id);

        $gejala->delete();

        return redirect()
            ->route('gejala.index')
            ->with('success', 'Data berhasil dihapus');
    }
}