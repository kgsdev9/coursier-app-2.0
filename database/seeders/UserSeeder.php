<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $role = Role::first();

        User::create([
            'name' => 'kgs dev',
            'telephone' => '070789978',
            'role_id' => $role ? $role->id : null,
            'email' => 'kgsdev8@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),

        ]);

        User::create([
            'name' => 'John Doe',
            'telephone' => '070789978',
            'role_id' => $role ? $role->id : null,
            'email' => 'kgsdev8@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),

        ]);


    }
}
