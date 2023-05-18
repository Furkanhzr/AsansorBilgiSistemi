<?php

namespace Database\Seeders;

use App\Models\Town;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Town::unguard();
        $townPath = 'public/sql/town.sql';
        ini_set('memory_limit', '-1');
        DB::unprepared(file_get_contents($townPath));
    }
}
