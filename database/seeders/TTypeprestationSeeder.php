<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TTypeprestationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB9::table('roles')->insert([
            ['nom'=> 'Cash'],
            ['nom'=> 'A la livraison'],
            ['nom'=> 'En ligne'],
            ['nom'=> 'Mobile Money'],
        ]);
    }
}
