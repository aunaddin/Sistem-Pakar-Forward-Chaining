<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $table = 'diagnosa';

    protected $fillable = [
        'nama_pasien',
        'alamat',
        'penyakit_id',
    ];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }
}