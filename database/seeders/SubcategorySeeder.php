<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Maintenance & Utilities' => [
                ['en' => 'Electricity', 'ar' => 'كهرباء'],
                ['en' => 'Plumbing', 'ar' => 'سباكة'],
                ['en' => 'Gas Delivery', 'ar' => 'توصيل الغاز'],
                ['en' => 'Cleaning', 'ar' => 'تنظيف'],
                ['en' => 'Carpentry', 'ar' => 'نجارة'],
                ['en' => 'AC Repair', 'ar' => 'تصليح المكيفات'],
                ['en' => 'Painter', 'ar' => 'دهان'],
                ['en' => 'Aluminum', 'ar' => 'ألمنيوم'],
                ['en' => 'Tile Installation', 'ar' => 'تركيب بلاط'],
                ['en' => 'Curtain/TV Installation', 'ar' => 'تركيب ستائر / تلفاز'],
            ],
            'Personal Care & Wellness' => [
                ['en' => 'Barbers', 'ar' => 'حلاقين'],
                ['en' => 'Hair & Makeup', 'ar' => 'شعر ومكياج'],
                ['en' => 'Nails & Skincare', 'ar' => 'عناية بالأظافر والبشرة'],
                ['en' => 'Massage', 'ar' => 'مساج'],
            ],
            'Tech Services' => [
                ['en' => 'Mobile Repair', 'ar' => 'تصليح موبايلات'],
                ['en' => 'Laptop Repair', 'ar' => 'تصليح لابتوب'],
                ['en' => 'Internet Setup', 'ar' => 'تركيب الإنترنت'],
                ['en' => 'Software Installations', 'ar' => 'تنصيب برامج'],
                ['en' => 'Network & Systems', 'ar' => 'شبكات وأنظمة'],
            ],
            'Transport & Delivery' => [
                ['en' => 'Toktok Drivers', 'ar' => 'سائقي توك توك'],
                ['en' => 'Movers', 'ar' => 'نقل عفش'],
                ['en' => 'Personal Drivers', 'ar' => 'سائقين خصوصيين'],
                ['en' => 'Grocery Delivery', 'ar' => 'توصيل حاجيات'],
                ['en' => 'Courier', 'ar' => 'خدمات توصيل'],
            ],
        ];

        foreach ($categories as $catName => $subcats) {
            $category = Category::where('name_en', $catName)->first();

            if (!$category) {
                $this->command->warn("Category '$catName' not found. Skipping.");
                continue;
            }

            foreach ($subcats as $index => $subcat) {
                Subcategory::create([
                    'name_en' => $subcat['en'],
                    'name_ar' => $subcat['ar'],
                    'slug' => Str::slug($subcat['en']),
                    'category_id' => $category->id,
                    'image' => '/category_images/' . Str::slug($subcat['en']) . '.png',
                    'priority' => $index + 1,
                    'is_active' => true,
                ]);
            }
        }
    }
}
