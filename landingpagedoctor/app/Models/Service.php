<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'hero_title',
        'hero_description',
        'hero_wa_message',
        'hero_image_1',
        'hero_image_2',
        'feature_1_title',
        'feature_1_description',
        'feature_2_title',
        'feature_2_description',
        'feature_3_title',
        'feature_3_description',
        'package_1_name',
        'package_1_description',
        'package_1_price',
        'package_1_image',
        'package_1_wa_message',
        'package_2_name',
        'package_2_description',
        'package_2_price',
        'package_2_image',
        'package_2_wa_message',
        'package_3_name',
        'package_3_description',
        'package_3_price',
        'package_3_image',
        'package_3_wa_message',
        'faq_1_question',
        'faq_1_answer',
        'faq_2_question',
        'faq_2_answer',
        'faq_3_question',
        'faq_3_answer',
        'detail_html',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function packages()
    {
        return $this->hasMany(ServicePackage::class)->orderBy('sort_order');
    }

    public static function resolveImageUrl(?string $path): string
    {
        if (blank($path)) {
            return '';
        }

        if (Str::startsWith($path, ['http://', 'https://', '/'])) {
            return $path;
        }

        return Storage::url($path);
    }
}
