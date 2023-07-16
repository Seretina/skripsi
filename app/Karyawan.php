<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use SoftDeletes;

    protected $table = 'karyawans';
    protected $fillable = [
        'nisn',
        'name',
        'gender',
        'pob',
        'dob',
        'religion',
        'name_parent',
        'address',
    ];

    public function nilai()
    {
        return $this->hasMany('App\Penilaian', 'karyawan_id');
    }
}
