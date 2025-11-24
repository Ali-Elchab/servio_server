<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name_en' => 'Maintenance & Utilities',
                'name_ar' => 'OU,O�USOU+Oc U^OU,OrO_U.OO� OU,O1OU.Oc',
                'slug' => Str::slug('Maintenance & Utilities'),
                'priority' => 1,
                'is_active' => true,
                'image' => 'category_images/01JYBJ3A11TCC99D2ENDFSGZ9D.webp',
                'children' => [
                    ['en' => 'Electricity', 'ar' => 'U�U�O�O"OO�'],
                    ['en' => 'Plumbing', 'ar' => 'O3O"OU�Oc'],
                    ['en' => 'Gas Delivery', 'ar' => 'O�U^O�USU, OU,O�OO�'],
                    ['en' => 'Cleaning', 'ar' => 'O�U+O,USU?'],
                    ['en' => 'Carpentry', 'ar' => 'U+O�OO�Oc'],
                    ['en' => 'AC Repair', 'ar' => 'O�O�U,USO- OU,U.U�USU?OO�'],
                    ['en' => 'Painter', 'ar' => 'O_U�OU+'],
                    ['en' => 'Aluminum', 'ar' => 'O�U,U.U+USU^U.'],
                    ['en' => 'Tile Installation', 'ar' => 'O�O�U�USO" O"U,OO�'],
                    ['en' => 'Curtain/TV Installation', 'ar' => 'O�O�U�USO" O3O�OO�O� / O�U,U?OO�'],
                ],
            ],
            [
                'name_en' => 'Personal Care & Wellness',
                'name_ar' => 'OU,O1U+OUSOc OU,O\'OrO�USOc',
                'slug' => Str::slug('Personal Care & Wellness'),
                'priority' => 2,
                'is_active' => true,
                'image' => 'category_images/01JYBJ3XKMY4TQ6R0BA1DM6S5G.webp',
                'children' => [
                    ['en' => 'Barbers', 'ar' => 'O-U,OU,USU+'],
                    ['en' => 'Hair & Makeup', 'ar' => 'O\'O1O� U^U.U�USOO�'],
                    ['en' => 'Nails & Skincare', 'ar' => 'O1U+OUSOc O"OU,O�O,OU?O� U^OU,O"O\'O�Oc'],
                    ['en' => 'Massage', 'ar' => 'U.O3OO�'],
                ],
            ],
            [
                'name_en' => 'Transport & Delivery',
                'name_ar' => 'OU,U+U,U, U^OU,O�U^O�USU,',
                'slug' => Str::slug('Transport & Delivery'),
                'priority' => 3,
                'is_active' => true,
                'image' => 'category_images/01JYBJ4BPXSV3MN10W14VB4MC6.webp',
                'children' => [
                    ['en' => 'Toktok Drivers', 'ar' => 'O3OO�U,US O�U^U� O�U^U�'],
                    ['en' => 'Movers', 'ar' => 'U+U,U, O1U?O\'\''],
                    ['en' => 'Personal Drivers', 'ar' => 'O3OO�U,USU+ OrO�U^O�USUSU+'],
                    ['en' => 'Grocery Delivery', 'ar' => 'O�U^O�USU, O-OO�USOO�'],
                    ['en' => 'Courier', 'ar' => 'OrO_U.OO� O�U^O�USU,'],
                ],
            ],
            [
                'name_en' => 'Tech Services',
                'name_ar' => 'OU,OrO_U.OO� OU,O�U,U+USOc',
                'slug' => Str::slug('Tech Services'),
                'priority' => 4,
                'is_active' => true,
                'image' => 'category_images/01JYBJ4Q7W2KNHM34V0YZ18XFM.webp',
                'children' => [
                    ['en' => 'Mobile Repair', 'ar' => 'O�O�U,USO- U.U^O"OUSU,OO�'],
                    ['en' => 'Laptop Repair', 'ar' => 'O�O�U,USO- U,OO"O�U^O"'],
                    ['en' => 'Internet Setup', 'ar' => 'O�O�U�USO" OU,O�U+O�O�U+O�'],
                    ['en' => 'Software Installations', 'ar' => 'O�U+O�USO" O"O�OU.O�'],
                    ['en' => 'Network & Systems', 'ar' => 'O\'O"U�OO� U^O�U+O,U.Oc'],
                ],
            ],
        ];

        foreach ($categories as $category) {
            $children = $category['children'] ?? [];
            unset($category['children']);

            $parent = Category::create($category);

            foreach ($children as $index => $child) {
                Category::create([
                    'parent_id' => $parent->id,
                    'name_en' => $child['en'],
                    'name_ar' => $child['ar'],
                    'slug' => $child['slug'] ?? Str::slug($child['en']),
                    'image' => $child['image'] ?? '/category_images/' . Str::slug($child['en']) . '.png',
                    'priority' => $child['priority'] ?? $index + 1,
                    'is_active' => $child['is_active'] ?? true,
                ]);
            }
        }
    }
}
