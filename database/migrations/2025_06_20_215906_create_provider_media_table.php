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
    Schema::create('provider_media', function (Blueprint $table) {
        $table->id();
        $table->foreignId('provider_id')->constrained()->onDelete('cascade');

        $table->string('profile_image')->nullable();
        $table->json('work_images')->nullable();
        $table->string('portfolio_file')->nullable();

        $table->timestamps();
        $table->softDeletes();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_media');
    }
};
