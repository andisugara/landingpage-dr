<?php

namespace App\Http\Controllers;

use App\Models\ContentBlock;
use App\Models\Promotion;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;

class FrontendController extends Controller
{
    public function home()
    {
        $services = Schema::hasTable('services')
            ? Service::query()->where('is_active', true)->orderBy('sort_order')->get()
            : collect();

        $promotions = Schema::hasTable('promotions')
            ? Promotion::query()->where('is_active', true)->orderBy('sort_order')->take(3)->get()
            : collect();

        $blocks = Schema::hasTable('content_blocks')
            ? ContentBlock::query()->pluck('value', 'key')
            : collect();

        return view('frontend.home', [
            'services' => $services,
            'promotions' => $promotions,
            'content' => $blocks,
            'whyChooseItems' => $this->decodeJson($blocks->get('home_why_choose_items', '[]')),
            'galleryItems' => $this->decodeJson($blocks->get('home_gallery_items', '[]')),
            'faqItems' => $this->decodeJson($blocks->get('home_faq_items', '[]')),
            'testimonial' => $this->decodeJson($blocks->get('home_testimonial', '{}')),
            'profileStats' => $this->decodeJson($blocks->get('home_profile_stats', '[]')),
        ]);
    }

    public function promotions()
    {
        $promotions = Schema::hasTable('promotions')
            ? Promotion::query()->where('is_active', true)->orderBy('sort_order')->get()
            : collect();

        $blocks = Schema::hasTable('content_blocks')
            ? ContentBlock::query()->pluck('value', 'key')
            : collect();

        return view('frontend.promotions', [
            'promotions' => $promotions,
            'content' => $blocks,
        ]);
    }

    public function services()
    {
        $services = Schema::hasTable('services')
            ? Service::query()->where('is_active', true)->orderBy('sort_order')->get()
            : collect();

        $blocks = Schema::hasTable('content_blocks')
            ? ContentBlock::query()->pluck('value', 'key')
            : collect();

        return view('frontend.services', [
            'services' => $services,
            'content' => $blocks,
        ]);
    }

    public function serviceDetail(string $slug)
    {
        abort_unless(Schema::hasTable('services'), 404);

        $blocks = Schema::hasTable('content_blocks')
            ? ContentBlock::query()->pluck('value', 'key')
            : collect();

        $service = Service::query()
            ->with('packages')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $packages = $service->packages;

        if ($packages->isEmpty()) {
            $packages = collect(range(1, 3))
                ->map(function (int $index) use ($service) {
                    $name = $service->{'package_' . $index . '_name'};
                    $description = $service->{'package_' . $index . '_description'};
                    $price = $service->{'package_' . $index . '_price'};

                    if (blank($name) && blank($description) && blank($price)) {
                        return null;
                    }

                    return (object) [
                        'name' => $name,
                        'description' => $description,
                        'price' => $price,
                        'image' => $service->{'package_' . $index . '_image'},
                        'wa_message' => $service->{'package_' . $index . '_wa_message'},
                    ];
                })
                ->filter()
                ->values();
        }

        return view('frontend.service-detail', [
            'service' => $service,
            'packages' => $packages,
            'globalContent' => $blocks,
        ]);
    }

    private function decodeJson(?string $value): mixed
    {
        if (blank($value)) {
            return [];
        }

        $decoded = json_decode($value, true);

        return json_last_error() === JSON_ERROR_NONE ? $decoded : [];
    }
}
