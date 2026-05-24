<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([

            'name' => 'Admin',
            'username' => 'admin',

            'email' => 'admin@ehb.be',

            'password' => Hash::make('Password!321'),

            'is_admin' => true,
        ]);
    }
}
