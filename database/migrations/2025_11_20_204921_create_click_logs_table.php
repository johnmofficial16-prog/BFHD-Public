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
        Schema::create('click_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_id')->nullable(); // Made nullable for flexibility
            $table->string('vertical'); // "flights", "hotels", "cars"
            $table->string('user_ip', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('referer')->nullable();
            $table->text('redirect_url'); // The full URL the user was sent to
            $table->json('search_params')->nullable(); // e.g., {from: "NYC", to: "LON", date: "2025-02-01"}
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('click_logs');
    }
};
