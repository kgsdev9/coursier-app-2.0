<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CommuneSeeder::class);
        $this->call(TypeParametreSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

    }
}
