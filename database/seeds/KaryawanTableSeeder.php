<?php

use App\Karyawan;
use Illuminate\Database\Seeder;

class KaryawanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $karyawans = [
            [
                'nisn' => '0109083731',
                'name' => 'Areta Fredelin Suryapati 1',
                'gender' => 'P',
                'pob' => 'Jakarta',
                'dob' => '2010-04-03',
                'religion' => 'Islam',
                'name_parent' => 'Akhlis Suryapati',
                'address' => 'TBI 1, Blok W440 RT07/RW014',
            ],
            [
                'nisn' => '0109083732',
                'name' => 'Areta Fredelin Suryapati 2',
                'gender' => 'P',
                'pob' => 'Jakarta',
                'dob' => '2010-04-03',
                'religion' => 'Islam',
                'name_parent' => 'Akhlis Suryapati',
                'address' => 'TBI 1, Blok W440 RT07/RW014',
            ],
            [
                'nisn' => '0109083733',
                'name' => 'Areta Fredelin Suryapati 3',
                'gender' => 'P',
                'pob' => 'Jakarta',
                'dob' => '2010-04-03',
                'religion' => 'Islam',
                'name_parent' => 'Akhlis Suryapati',
                'address' => 'TBI 1, Blok W440 RT07/RW014',
            ],
            [
                'nisn' => '0109083734',
                'name' => 'Areta Fredelin Suryapati 4',
                'gender' => 'P',
                'pob' => 'Jakarta',
                'dob' => '2010-04-03',
                'religion' => 'Islam',
                'name_parent' => 'Akhlis Suryapati',
                'address' => 'TBI 1, Blok W440 RT07/RW014',
            ],
            [
                'nisn' => '0109083735',
                'name' => 'Areta Fredelin Suryapati 5',
                'gender' => 'P',
                'pob' => 'Jakarta',
                'dob' => '2010-04-03',
                'religion' => 'Islam',
                'name_parent' => 'Akhlis Suryapati',
                'address' => 'TBI 1, Blok W440 RT07/RW014',
            ],
        ];

        foreach($karyawans as $karyawan){
            Karyawan::create($karyawan);
        }
    }
}
