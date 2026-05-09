<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'gejala';

    protected $fillable = [
        'kode_gejala',
        'nama_gejala',
    ];
    public function penyakit()
    {
        return $this->belongsToMany(
            Penyakit::class,
            'rules',
            'gejala_id',
            'penyakit_id'
        );
    }
}