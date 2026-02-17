<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Seed partners with placeholder tracking IDs
     * Will be replaced with real IDs after affiliate approval
     */
    public function run(): void
    {
        $partners = [
            [
                'name' => 'KAYAK',
                'slug' => 'kayak',
                'type' => 'affiliate',
                'vertical' => 'multivertical',
                'tracking_id' => 'KAYAK_PLACEHOLDER', // Replace after approval
                'base_url' => 'https://www.kayak.com/flights',
                'priority' => 1, // Highest priority (CPC partner)
                'region' => 'global',
                'is_active' => true,
                'config' => [
                    'commission_type' => 'CPC',
                    'commission_rate' => '50% revenue share',
                ],
            ],
            [
                'name' => 'TripAdvisor',
                'slug' => 'tripadvisor',
                'type' => 'affiliate',
                'vertical' => 'hotels',
                'tracking_id' => 'TRIPADVISOR_PLACEHOLDER', // Replace after approval
                'base_url' => 'https://www.tripadvisor.com/Hotels',
                'priority' => 2, // Second priority (CPC partner)
                'region' => 'global',
                'is_active' => true,
                'config' => [
                    'commission_type' => 'CPC',
                    'commission_rate' => '50-80%',
                ],
            ],
        ];

        foreach ($partners as $partner) {
            Partner::updateOrCreate(
                ['slug' => $partner['slug']],
                $partner
            );
        }
    }
}
