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
                'name_en' => 'Maintenance & Utilities',
                'name_ar' => 'الصيانة والخدمات العامة',
                'slug' => Str::slug('Maintenance & Utilities'),
                'priority' => 1,
                'is_active' => true,
                'image' => 'category_images/01JYBJ3A11TCC99D2ENDFSGZ9D.webp',
            ],
            [
                'name_en' => 'Personal Care & Wellness',
                'name_ar' => 'العناية الشخصية',
                'slug' => Str::slug('Personal Care & Wellness'),
                'priority' => 2,
                'is_active' => true,
                'image' => 'category_images/01JYBJ3XKMY4TQ6R0BA1DM6S5G.webp',
            ],
            [
                'name_en' => 'Transport & Delivery',
                'name_ar' => 'النقل والتوصيل',
                'slug' => Str::slug('Transport & Delivery'),
                'priority' => 3,
                'is_active' => true,
                'image' =>  'category_images/01JYBJ4BPXSV3MN10W14VB4MC6.webp',
                
            ],
            [
                'name_en' => 'Tech Services',
                'name_ar' => 'الخدمات التقنية',
                'slug' => Str::slug('Tech Services'),
                'priority' => 4,
                'is_active' => true,
                'image' => 'category_images/01JYBJ4Q7W2KNHM34V0YZ18XFM.webp',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
