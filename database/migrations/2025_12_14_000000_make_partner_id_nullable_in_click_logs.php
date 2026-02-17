<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Use raw SQL to make partner_id nullable (works without doctrine/dbal)
        DB::statement('ALTER TABLE click_logs MODIFY partner_id BIGINT UNSIGNED NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE click_logs MODIFY partner_id BIGINT UNSIGNED NOT NULL');
    }
};
