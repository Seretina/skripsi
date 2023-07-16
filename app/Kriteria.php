<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kriteria extends Model
{
    use SoftDeletes;

    protected $table = 'kriterias';
    protected $fillable = [
        'name',
        'weight'
    ];

    public function nilai()
    {
        return $this->hasMany('App\Penilaian', 'kriteria_id');
    }
    }
