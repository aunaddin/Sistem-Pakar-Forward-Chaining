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
            ->latest()
            ->get();

        $penyakit = Penyakit::all();

        $gejala = Gejala::all();

        return view('admin.rules.index', compact(
            'rules',
            'penyakit',
            'gejala'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penyakit_id' => 'required',
            'gejala_id' => 'required',
        ]);

        Rule::create([
            'penyakit_id' => $request->penyakit_id,
            'gejala_id' => $request->gejala_id,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Rule berhasil ditambah');
    }

    public function destroy($id)
    {
        $rule = Rule::findOrFail($id);

        $rule->delete();

        return redirect()
            ->back()
            ->with('success', 'Rule berhasil dihapus');
    }
}