<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{

    protected $table = 'penilaians';
    protected $fillable = [
        'nilai',
        'nilai_inisial',
        'karyawan_id',
        'kriteria_id'
    ];

    public function karyawan()
    {
        $this->belongsTo(Karyawan::class, 'karyawan_id');
    }

    public function kriteria()
    {
        $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
