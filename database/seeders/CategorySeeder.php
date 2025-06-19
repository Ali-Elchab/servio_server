<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $categories = [
            [
                'name_en' => 'Beauty & Care',
                'name_ar' => 'الجمال والعناية',
                'slug' => Str::slug('Beauty & Care'),
                'priority' => 1,
                'is_active' => true,
                'image' => 'category_images/01JY1SA1VG7342MP05FHKTDCHA.jpg',
            ],
            [
                'name_en' => 'Home Services',
                'name_ar' => 'خدمات المنازل',
                'slug' => Str::slug('Home Services'),
                'priority' => 2,
                'is_active' => true,
                'image' => 'category_images/01JY1TKDH8RH34NY2ZKGFRJ04J.png',
            ],
            [
                'name_en' => 'Education',
                'name_ar' => 'التعليم',
                'slug' => Str::slug('Education'),
                'priority' => 3,
                'is_active' => true,
                'image' => null,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
