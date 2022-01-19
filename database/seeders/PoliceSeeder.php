<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Police;

class PoliceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Police::create([
            'email' => 'P10001@mail.com',
            'password' => bcrypt('12345'),
            'dob' => 'P10001',
            'policename' => 'Agus Setiawan',
            'gender' => 'pria',
            'area' => 'Jakarta Pusat',
        ]);
        Police::create([
            'email' => 'P10002@mail.com',
            'password' => bcrypt('12345'),
            'dob' => 'P10002',
            'policename' => 'Budi Raharjo',
            'gender' => 'pria',
            'area' => 'Jakarta Pusat',
        ]);
        Police::create([
            'email' => 'P10003@mail.com',
            'password' => bcrypt('12345'),
            'dob' => 'P10003',
            'policename' => 'Randi Dwi',
            'gender' => 'pria',
            'area' => 'Jakarta Pusat',
        ]);
    }
}
