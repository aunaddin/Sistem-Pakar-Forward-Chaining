<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rule;
use App\Models\Penyakit;
use App\Models\Gejala;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Rule::with(['penyakit', 'gejala'])
            ->get()
            ->sortBy('penyakit.nama_penyakit');

        // Key by penyakit_id agar mudah ambil id di view
        $groupedRules = $rules->groupBy('penyakit_id');

        return view('admin.rules.index', compact('groupedRules'));
    }

    public function create()
    {
        $penyakit = Penyakit::orderBy('nama_penyakit')->get();
        $gejala   = Gejala::orderBy('nama_gejala')->get();

        return view('admin.rules.create', compact('penyakit', 'gejala'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penyakit_id' => 'required',
            'gejala_id'   => 'required|array|min:1',
        ]);

        foreach ($request->gejala_id as $gejalaId) {
            $exists = Rule::where('penyakit_id', $request->penyakit_id)
                ->where('gejala_id', $gejalaId)
                ->exists();

            if (!$exists) {
                Rule::create([
                    'penyakit_id' => $request->penyakit_id,
                    'gejala_id'   => $gejalaId,
                ]);
            }
        }

        return redirect()
            ->route('rules.index')
            ->with('success', 'Rule berhasil disimpan.');
    }

    public function edit($penyakitId)
    {
        $penyakit = Penyakit::findOrFail($penyakitId);
        $gejala   = Gejala::orderBy('nama_gejala')->get();

        // ID gejala yang sudah dipilih untuk penyakit ini
        $selectedGejalaIds = Rule::where('penyakit_id', $penyakitId)
            ->pluck('gejala_id')
            ->toArray();

        return view('admin.rules.edit', compact('penyakit', 'gejala', 'selectedGejalaIds'));
    }

    public function update(Request $request, $penyakitId)
    {
        $request->validate([
            'gejala_id' => 'required|array|min:1',
        ]);

        $penyakit = Penyakit::findOrFail($penyakitId);

        // Hapus semua rule lama penyakit ini, lalu simpan ulang yang dipilih
        Rule::where('penyakit_id', $penyakitId)->delete();

        foreach ($request->gejala_id as $gejalaId) {
            Rule::create([
                'penyakit_id' => $penyakitId,
                'gejala_id'   => $gejalaId,
            ]);
        }

        return redirect()
            ->route('rules.index')
            ->with('success', 'Rule untuk penyakit ' . $penyakit->nama_penyakit . ' berhasil diperbarui.');
    }

    public function destroyByPenyakit($penyakitId)
    {
        $penyakit = Penyakit::findOrFail($penyakitId);

        Rule::where('penyakit_id', $penyakitId)->delete();

        return redirect()
            ->route('rules.index')
            ->with('success', 'Semua rule untuk penyakit ' . $penyakit->nama_penyakit . ' berhasil dihapus.');
    }
}