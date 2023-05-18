<?php

namespace Database\Seeders;

use App\Models\Street;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Street::unguard();
        $streetPath = 'public/sql/street.sql';
        ini_set('memory_limit', '-1');
        DB::unprepared(file_get_contents($streetPath));
    }
}
