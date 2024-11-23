<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_communes')->insert([
            ['libellecommune'=> 'Marie adjame',],
            ['libellecommune'=> 'Mairie PLATEAU'],
            ['libellecommune'=> 'Mairie TREICHVILLE'],
            ['libellecommune'=> 'Mairie YOPOUGON'],
            ['libellecommune'=> 'Mairie PORT BOUET'],
            ['libellecommune'=> 'Mairie KOUMASSI'],
            ['libellecommune'=> 'Mairie MARCORY'],
            ['libellecommune'=> 'Mairie COCODY'],
        ]);
    }
}
