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
         Schema::create('providers', function (Blueprint $table) {
            $table->id();

            // BASIC INFO
            $table->string('name_en');
            $table->string('name_ar');
            $table->text('bio_en')->nullable();
            $table->text('bio_ar')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('location_en')->nullable();
            $table->string('location_ar')->nullable();

            // GEOLOCATION
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // RELATIONS
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // for future provider login

            // MEDIA
            $table->string('profile_image')->nullable();
            $table->json('work_images')->nullable();     
            $table->string('portfolio_file')->nullable(); 

            // FLAGS
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
