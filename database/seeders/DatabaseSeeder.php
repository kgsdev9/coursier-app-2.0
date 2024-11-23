<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TModeLivraison;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CommuneSeeder::class);
        // $this->call(TypeParametreSeeder::class);
        //  $this->call(RoleSeeder::class);
        //  $this->call(TModeLivraison::class);
        //  $this->call(TTypeprestationSeeder::class);
        //  \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
