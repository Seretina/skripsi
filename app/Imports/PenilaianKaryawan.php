<?php

namespace App\Imports;

use App\Penilaian;
use Maatwebsite\Excel\Concerns\ToModel;

class PenilaianKaryawan implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penilaian([
            'karyawan_id' => $row[1],
            'kriteria_id' => $row[2],
            'nilai' => $row[3],
        ]);
    }
}
