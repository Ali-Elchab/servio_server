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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // Nesting support
            $table->foreignId('parent_id')->nullable()->constrained('categories')->cascadeOnDelete();

            // Translatable fields
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('slug')->nullable()->index();

            // Media
            $table->string('image')->nullable();

            // Flags
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
        Schema::dropIfExists('categories');
    }
};
