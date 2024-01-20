<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NationaliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nationnalites')->insert([
            ['nom'=> 'Ivoiriennne'],
            ['nom'=> 'Mali'],
            ['nom'=> 'Senegalaise'],
            ['nom'=> 'Burkinabe'],
            ['nom'=> 'Autre'],
        ]);
    }
}
