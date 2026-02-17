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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "KAYAK", "TripAdvisor"
            $table->string('slug')->unique(); // e.g., "kayak", "tripadvisor"
            $table->enum('type', ['affiliate', 'whitelabel']); // Partner type
            $table->string('vertical'); // e.g., "flights", "hotels", "cars", "multivertical"
            $table->string('tracking_id')->nullable(); // Affiliate tracking ID (can be placeholder initially)
            $table->text('base_url'); // Base URL for deep linking
            $table->integer('priority')->default(5); // 1=highest, 10=lowest (for routing logic)
            $table->string('region')->default('global'); // e.g., "global", "us", "eu"
            $table->boolean('is_active')->default(true);
            $table->json('config')->nullable(); // Extra config (API keys, white-label settings, etc.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
