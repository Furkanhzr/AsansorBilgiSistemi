<?php

namespace Database\Seeders;

use App\Models\Neighbourhood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NeighbourhoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Neighbourhood::unguard();
        $neighbourhoodPath = 'public/sql/neighbourhood.sql';
        ini_set('memory_limit', '-1');
        DB::unprepared(file_get_contents($neighbourhoodPath));
    }
}
