<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'U10001@mail.com',
            'password' => bcrypt('12345'),
            'dob' => 'U10001',
            'username' => 'Erik Darmawan',
            'gender' => 'pria',
            'phone_number' => '0852222221',
        ]);
        User::create([
            'email' => 'U10002@mail.com',
            'password' => bcrypt('12345'),
            'dob' => 'U10002',
            'username' => 'Janoko',
            'gender' => 'pria',
            'phone_number' => '0852222222',
        ]);
        User::create([
            'email' => 'U10003@mail.com',
            'password' => bcrypt('12345'),
            'dob' => 'U10003',
            'username' => 'Naufal',
            'gender' => 'pria',
            'phone_number' => '0852222223',
        ]);
    }
}
