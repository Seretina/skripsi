<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatrixNormalisasi extends Model
{
    protected $table = 'matrix_1_normalisasi';
    protected $fillable = [
        'nilai',
        'karyawan_id',
        'kriteria_id',
        'penilaian_id'
    ];
}
