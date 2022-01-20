<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Crimereport;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Crimereport::create([
            'casetype' => 'kejahatan',
            'description' => 'Kasus Pencurian di tanah Abang',
        ]);
        Crimereport::create([
            'casetype' => 'kejahatan',
            'description' => 'Kasus Begal di Senayan',
        ]);
        Crimereport::create([
            'casetype' => 'kejahatan',
            'description' => 'Kasus Anak Hilang di Bekasi',
        ]);
        Crimereport::create([
            'casetype' => 'kejahatan',
            'description' => 'Kasus Balapan Liar di Monas',
        ]);
    }
}
