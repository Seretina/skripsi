<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $users = [
        //     [
        //         'name' => 'Admin',
        //         'email' => 'admin@mail.com',
        //         'status' => 'admin',
        //         'password' => bcrypt('admin123'),
        //         'first_name' => 'admin',
        //         'last_name' => 'one',
        //     ]
        // ];
        // foreach ($users as $key => $value) {
        //     User::create($value);
        // }
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'first_name' => 'HRD',
            'last_name' => 'Sanidi',
            'status' => 'admin',
        ]);
    }
}
