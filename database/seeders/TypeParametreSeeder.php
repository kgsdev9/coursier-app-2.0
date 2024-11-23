<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeParametreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_parametre_stauts')->insert([
            [
                'typestatut' => 'documents',
                'codeintparametre' => 1,
                'libellestatut' => 'encours',
            ],

            [
                'typestatut' => 'documents',
                'codeintparametre' => 2,
                'libellestatut' => 'validée',
            ],

            [
                'typestatut' => 'documents',
                'codeintparametre' => 3,
                'libellestatut' => 'echec',
            ],


        ]);
    }
}
