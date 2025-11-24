<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Ensure categories can be nested
        if (!Schema::hasColumn('categories', 'parent_id')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->foreignId('parent_id')->nullable()->after('id')->constrained('categories')->cascadeOnDelete();
            });
        }

        // Add category_id to providers for the new relationship
        if (!Schema::hasColumn('providers', 'category_id')) {
            Schema::table('providers', function (Blueprint $table) {
                $table->foreignId('category_id')->nullable()->after('business_name')->constrained('categories')->nullOnDelete();
            });
        }

        $subcategoryMap = [];

        // Move subcategories into categories as children
        if (Schema::hasTable('subcategories')) {
            DB::table('subcategories')
                ->orderBy('id')
                ->chunkById(200, function ($subcategories) use (&$subcategoryMap) {
                    foreach ($subcategories as $sub) {
                        $newId = DB::table('categories')->insertGetId([
                            'parent_id'  => $sub->category_id,
                            'name_en'    => $sub->name_en,
                            'name_ar'    => $sub->name_ar,
                            'slug'       => $sub->slug,
                            'image'      => $sub->image,
                            'priority'   => $sub->priority,
                            'is_active'  => $sub->is_active,
                            'created_at' => $sub->created_at,
                            'updated_at' => $sub->updated_at,
                        ]);

                        $subcategoryMap[$sub->id] = $newId;
                    }
                });
        }

        // Point providers to the new category records
        if (Schema::hasColumn('providers', 'subcategory_id')) {
            DB::table('providers')
                ->select(['id', 'subcategory_id'])
                ->orderBy('id')
                ->chunkById(200, function ($providers) use ($subcategoryMap) {
                    foreach ($providers as $provider) {
                        $newCategoryId = $subcategoryMap[$provider->subcategory_id] ?? null;

                        // Fallback: if a matching migrated subcategory was not found, try the same id
                        $newCategoryId ??= DB::table('categories')
                            ->where('id', $provider->subcategory_id)
                            ->value('id');

                        DB::table('providers')
                            ->where('id', $provider->id)
                            ->update(['category_id' => $newCategoryId]);
                    }
                });
        }

        // Drop old FK/column if it still exists
        if (Schema::hasColumn('providers', 'subcategory_id')) {
            Schema::table('providers', function (Blueprint $table) {
                $table->dropConstrainedForeignId('subcategory_id');
            });
        }

        // Remove the obsolete table
        Schema::dropIfExists('subcategories');
    }

    public function down(): void
    {
        // Recreate subcategories table
        if (!Schema::hasTable('subcategories')) {
            Schema::create('subcategories', function (Blueprint $table) {
                $table->id();
                $table->string('name_en');
                $table->string('name_ar');
                $table->string('slug')->nullable()->index();
                $table->string('image')->nullable();
                $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
                $table->unsignedInteger('priority')->default(0)->index();
                $table->boolean('is_active')->default(true)->index();
                $table->timestamps();
            });
        }

        // Restore subcategory_id on providers
        if (!Schema::hasColumn('providers', 'subcategory_id')) {
            Schema::table('providers', function (Blueprint $table) {
                $table->foreignId('subcategory_id')->nullable()->after('business_name')->constrained('subcategories')->nullOnDelete();
            });
        }

        // Move child categories back into subcategories
        $childCategories = collect();
        if (Schema::hasColumn('categories', 'parent_id')) {
            $childCategories = DB::table('categories')->whereNotNull('parent_id')->orderBy('id')->get();

            foreach ($childCategories as $child) {
                $subId = DB::table('subcategories')->insertGetId([
                    'name_en'    => $child->name_en,
                    'name_ar'    => $child->name_ar,
                    'slug'       => $child->slug,
                    'image'      => $child->image,
                    'category_id'=> $child->parent_id,
                    'priority'   => $child->priority,
                    'is_active'  => $child->is_active,
                    'created_at' => $child->created_at,
                    'updated_at' => $child->updated_at,
                ]);

                DB::table('providers')
                    ->where('category_id', $child->id)
                    ->update(['subcategory_id' => $subId]);
            }
        }

        // Remove provider category_id column
        if (Schema::hasColumn('providers', 'category_id')) {
            Schema::table('providers', function (Blueprint $table) {
                $table->dropConstrainedForeignId('category_id');
            });
        }

        // Delete migrated child categories
        if ($childCategories->isNotEmpty()) {
            DB::table('categories')->whereIn('id', $childCategories->pluck('id'))->delete();
        }

        // Drop parent_id from categories
        if (Schema::hasColumn('categories', 'parent_id')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('parent_id');
            });
        }
    }
};
