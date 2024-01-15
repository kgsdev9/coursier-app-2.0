<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeCandidature extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_candidatures')->insert([
            ['nom'=> 'Libre',
            ],
            ['nom'=> 'Officielle',
        ],
        ]);
    }
}
