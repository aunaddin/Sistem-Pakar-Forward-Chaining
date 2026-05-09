<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $table = 'penyakit';

    protected $fillable = [
        'kode_penyakit',
        'nama_penyakit',
        'deskripsi',
        'penanganan',
        'gambar',
    ];
    public function gejala()
    {
        return $this->belongsToMany(
            Gejala::class,
            'rules',
            'penyakit_id',
            'gejala_id'
        );
    }
}