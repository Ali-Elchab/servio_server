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
        Schema::create('provider_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_id')->constrained()->onDelete('cascade');

            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('bookings_count')->default(0);
            $table->unsignedInteger('reviews_count')->default(0);
            $table->decimal('average_rating', 3, 2)->default(0.00);

            $table->timestamps();
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_stats');
    }
};
