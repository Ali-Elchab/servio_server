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
        Schema::create('provider_payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('provider_id')->constrained()->onDelete('cascade');

            $table->date('payment_date');
            $table->decimal('amount', 10, 2);
            $table->string('method')->default('cash'); 
            $table->string('reference')->nullable(); 

            $table->string('period')->nullable();    
            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_payments');
    }
};
