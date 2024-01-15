<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('filieres')->insert([
            ['nom'=> 'BTS Hygiène et Sécurité au Travail',
            ],

            ['nom'=> 'BTS Electrotechnique ',
           ],

           ['nom'=> 'BTS Systèmes Electroniques et Informatiques',
           ],

           ['nom'=> 'BTS Urbanisme',
           ],

           ['nom'=> 'BTS Génie Civil Option Bâtiment',
           ],

           ['nom'=> 'BTS Communication Visuelle',
           ],

           ['nom'=> 'BTS Logistique ',
           ],

           ['nom'=> 'BTS Réseau Informatique et Télécommunication',
           ],

           ['nom'=> 'BTS Agriculture Tropicale Option Production Animale',
           ],

           ['nom'=> 'Informatique et Développement d\'Applications'
           ],
        ]);
    }
}
