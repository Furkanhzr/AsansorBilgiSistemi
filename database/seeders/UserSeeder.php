<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Walter',
            'surname' => 'White',
            'phone' => '5555555555',
            'email' => 'walter@gmail.com',
            'address' => 'elazığ',
            'subscription' => 1,
            'password' => Hash::make("123456"),
        ]);
    }
}
