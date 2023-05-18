<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::unguard();
        $cityPath = 'public/sql/city.sql';
        ini_set('memory_limit', '-1');
        DB::unprepared(file_get_contents($cityPath));
    }
}
