<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PromotionSeeder extends Seeder
{
    public function run(): void
    {
        $path = base_path('../promo-data.json');

        if (! File::exists($path)) {
            return;
        }

        $payload = json_decode(File::get($path), true);

        if (! is_array($payload) || ! isset($payload['promos']) || ! is_array($payload['promos'])) {
            return;
        }

        foreach ($payload['promos'] as $index => $promo) {
            Promotion::query()->updateOrCreate(
                ['title' => $promo['title']],
                [
                    'description' => $promo['description'] ?? '',
                    'image' => $promo['image'] ?? '',
                    'badge' => $promo['badge'] ?? null,
                    'badge_color' => $promo['badgeColor'] ?? 'bg-primary',
                    'original_price' => $promo['originalPrice'] ?? null,
                    'final_price' => $promo['finalPrice'] ?? null,
                    'wa_message' => urldecode($promo['waMessage'] ?? ''),
                    'wa_button_text' => $promo['waButtonText'] ?? 'Hubungi via WA',
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }
    }
}
