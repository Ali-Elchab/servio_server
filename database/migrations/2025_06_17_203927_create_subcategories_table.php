<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();

            // Translatable fields
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('slug')->nullable()->index();

            // Media
            $table->string('image')->nullable();

            // Category relation
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');


            // Optional priority/display toggle
            $table->unsignedInteger('priority')->default(0)->index();
            $table->boolean('is_active')->default(true)->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
