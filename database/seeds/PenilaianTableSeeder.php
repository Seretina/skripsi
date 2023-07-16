<?php

use App\Penilaian;
use Illuminate\Database\Seeder;

class PenilaianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penilaians = [
            // karyawan 1
            [
                'nilai' => 2500000,
                'nilai_inisial' => 3,
                'karyawan_id' => 1,
                'kriteria_id' => 1,
            ],
            [
                'nilai' => 6,
                'nilai_inisial' => 5,
                'karyawan_id' => 1,
                'kriteria_id' => 2,
            ],
            [
                'nilai' => 3,
                'nilai_inisial' => 3,
                'karyawan_id' => 1,
                'kriteria_id' => 3,
            ],
            [
                'nilai' => 96,
                'nilai_inisial' => 5,
                'karyawan_id' => 1,
                'kriteria_id' => 4,
            ],

            // karyawan 2
            [
                'nilai' => 800000,
                'nilai_inisial' => 5,
                'karyawan_id' => 2,
                'kriteria_id' => 1,
            ],
            [
                'nilai' => 3,
                'nilai_inisial' => 3,
                'karyawan_id' => 2,
                'kriteria_id' => 2,
            ],
            [
                'nilai' => 5,
                'nilai_inisial' => 5,
                'karyawan_id' => 2,
                'kriteria_id' => 3,
            ],
            [
                'nilai' => 95,
                'nilai_inisial' => 5,
                'karyawan_id' => 2,
                'kriteria_id' => 4,
            ],

            // karyawan 3
            [
                'nilai' => 1300000,
                'nilai_inisial' => 4,
                'karyawan_id' => 3,
                'kriteria_id' => 1,
            ],
            [
                'nilai' => 2,
                'nilai_inisial' => 2,
                'karyawan_id' => 3,
                'kriteria_id' => 2,
            ],
            [
                'nilai' => 3,
                'nilai_inisial' => 3,
                'karyawan_id' => 3,
                'kriteria_id' => 3,
            ],
            [
                'nilai' => 80,
                'nilai_inisial' => 4,
                'karyawan_id' => 3,
                'kriteria_id' => 4,
            ],

            // karyawan 4
            [
                'nilai' => 5000000,
                'nilai_inisial' => 1,
                'karyawan_id' => 4,
                'kriteria_id' => 1,
            ],
            [
                'nilai' => 1,
                'nilai_inisial' => 2,
                'karyawan_id' => 4,
                'kriteria_id' => 2,
            ],
            [
                'nilai' => 2,
                'nilai_inisial' => 2,
                'karyawan_id' => 4,
                'kriteria_id' => 3,
            ],
            [
                'nilai' => 85,
                'nilai_inisial' => 5,
                'karyawan_id' => 4,
                'kriteria_id' => 4,
            ],

            // karyawan 5
            [
                'nilai' => 1000000,
                'nilai_inisial' => 4,
                'karyawan_id' => 5,
                'kriteria_id' => 1,
            ],
            [
                'nilai' => 2,
                'nilai_inisial' => 2,
                'karyawan_id' => 5,
                'kriteria_id' => 2,
            ],
            [
                'nilai' => 3,
                'nilai_inisial' => 3,
                'karyawan_id' => 5,
                'kriteria_id' => 3,
            ],
            [
                'nilai' => 90,
                'nilai_inisial' => 5,
                'karyawan_id' => 5,
                'kriteria_id' => 4,
            ],

        ];
        foreach ($penilaians as $penilaian) {
            Penilaian::create($penilaian);
        }
    }
}
