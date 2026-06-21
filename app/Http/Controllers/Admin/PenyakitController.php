<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakit = Penyakit::latest()->get();

        return view('admin.penyakit.index', compact('penyakit'));
    }

    public function create()
    {
        return view('admin.penyakit.create');
    }

    public function show($id)
    {
        $penyakit = Penyakit::findOrFail($id);

        return view('admin.penyakit.show', compact('penyakit'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_penyakit' => 'required|unique:penyakit',
            'nama_penyakit' => 'required',
            'deskripsi' => 'nullable',
            'penanganan' => 'nullable',
            'gambar' => 'nullable|image',
        ]);

        if ($request->hasFile('gambar')) {

            $data['gambar'] = $request->file('gambar')
                ->store('penyakit', 'public');
        }

        Penyakit::create($data);

        return redirect()
            ->route('penyakit.index')
            ->with('success', 'Data berhasil ditambah');
    }
    
    public function edit($id)
    {
        $penyakit = Penyakit::findOrFail($id);

        return view('admin.penyakit.edit', compact('penyakit'));
    }

    public function update(Request $request, $id)
    {
        $penyakit = Penyakit::findOrFail($id);

        $request->validate([
            'kode_penyakit' => 'required',
            'nama_penyakit' => 'required',
            'deskripsi' => 'required',
            'penanganan' => 'required',
        ]);

        $data = [
            'kode_penyakit' => $request->kode_penyakit,
            'nama_penyakit' => $request->nama_penyakit,
            'deskripsi' => $request->deskripsi,
            'penanganan' => $request->penanganan,
        ];

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar')
                            ->store('penyakit', 'public');

            $data['gambar'] = $gambar;
        }

        $penyakit->update($data);

        return redirect('/admin/penyakit')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $penyakit = Penyakit::findOrFail($id);

        $penyakit->delete();

        return redirect('/admin/penyakit')
            ->with('success', 'Data berhasil dihapus');
    }
}
