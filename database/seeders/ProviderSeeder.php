<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Provider;
use App\Models\ProviderMedia;
use App\Models\ProviderProfile;
use App\Models\ProviderStat;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProviderSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('en_US');

        $categories = Category::whereNotNull('parent_id')->get();
        $users = User::where('role_id', 3)->take(15)->get();

        if ($categories->isEmpty()) {
            $this->command->error('No child categories found. Seed categories first.');
            return;
        }

        if ($users->isEmpty()) {
            $this->command->error('No provider-role users found. Seed them first.');
            return;
        }

        foreach ($users as $index => $user) {
            $category = $categories->get($index) ?? $categories->random();

            $provider = Provider::create([
                'user_id' => $user->id,
                'category_id' => $category->id,
                'business_name' => $faker->company,
                'is_active' => true,
                'is_verified' => $faker->boolean(50),
                'is_featured' => $faker->boolean(30),
                'approval_status' => 'approved',
            ]);

            ProviderProfile::create([
                'provider_id' => $provider->id,
                'phone' => '03-' . rand(100000, 999999),
                'bio' => $faker->sentence,
                'city_id' => 1,
                'area_id' => 2,
                'latitude' => 33.8938 + $index * 0.001,
                'longitude' => 35.5018 + $index * 0.001,
                'location' => $faker->address,
            ]);

            ProviderMedia::create([
                'provider_id' => $provider->id,
                'profile_image' => '/images/providers/default.png',
                'work_images' => json_encode([
                    '/images/providers/work1.png',
                    '/images/providers/work2.png',
                ]),
                'portfolio_file' => null,
            ]);

            ProviderStat::create([
                'provider_id' => $provider->id,
                'average_rating' => rand(35, 50) / 10,
                'reviews_count' => rand(5, 50),
                'bookings_count' => rand(50, 300),
            ]);
        }
    }
}
