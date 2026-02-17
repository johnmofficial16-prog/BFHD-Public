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
        Schema::create('search_logs', function (Blueprint $table) {
            $table->id();
            $table->string('vertical'); // "flights", "hotels", "cars"
            $table->string('origin')->nullable(); // For flights/cars
            $table->string('destination')->nullable(); // For flights/hotels/cars
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('passengers')->nullable(); // For flights
            $table->integer('guests')->nullable(); // For hotels
            $table->string('user_ip', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_logs');
    }
};
