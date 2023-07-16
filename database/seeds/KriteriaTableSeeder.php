<?php

use App\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriterias = [
            [
                'name' => 'Pendapatan Orang Tua',
                'weight' => 40,
            ],
            [
                'name' => 'Tanggungan Orang Tua',
                'weight' => 30,
            ],
            [
                'name' => 'Kepemilikan Kendaraan',
                'weight' => 20,
            ],
            [
                'name' => 'Kehadiran',
                'weight' => 10,
            ],
        ];

        foreach ($kriterias as $kriteria) {
            Kriteria::create($kriteria);
        }
    }
}
