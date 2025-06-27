<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('en_US');

        $adminRole = Role::where('name', 'admin')->first();
        $providerRole = Role::where('name', 'provider')->first();

        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'alielchab01@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
        ]);

        // Create 15 provider users
        for ($i = 1; $i <= 15; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => "provider{$i}@example.com",
                'password' => Hash::make('password'),
                'role_id' => $providerRole->id,
            ]);
        }
    }
}
