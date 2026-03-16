<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Behel Gigi',
                'slug' => 'behel',
                'folder' => 'behel_gigi',
                'short_description' => 'Rapi & estetik dengan kontrol rutin.',
                'sort_order' => 1,
            ],
            [
                'name' => 'Scaling Gigi',
                'slug' => 'scaling',
                'folder' => 'scaling',
                'short_description' => 'Bersihkan karang gigi & plak.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Tambal Gigi',
                'slug' => 'tambal',
                'folder' => 'tambal',
                'short_description' => 'Tambalan estetik dan kuat.',
                'sort_order' => 3,
            ],
            [
                'name' => 'Veneer Gigi',
                'slug' => 'veneer',
                'folder' => 'veneer',
                'short_description' => 'Perbaiki warna & bentuk gigi.',
                'sort_order' => 4,
            ],
            [
                'name' => 'Cabut Gigi',
                'slug' => 'cabut',
                'folder' => 'cabut',
                'short_description' => 'Minim nyeri & aman.',
                'sort_order' => 5,
            ],
            [
                'name' => 'Gigi Palsu',
                'slug' => 'gigi-palsu',
                'folder' => 'palsu',
                'short_description' => 'Kenyamanan dan fungsi kunyah.',
                'sort_order' => 6,
            ],
            [
                'name' => 'Implan Gigi',
                'slug' => 'implan',
                'folder' => 'implan',
                'short_description' => 'Solusi jangka panjang.',
                'sort_order' => 7,
            ],
            [
                'name' => 'Perawatan Saluran Akar',
                'slug' => 'psa',
                'folder' => 'psa',
                'short_description' => 'Atasi infeksi saraf gigi.',
                'sort_order' => 8,
            ],
        ];

        foreach ($services as $item) {
            $service = Service::query()->updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'name' => $item['name'],
                    'short_description' => $item['short_description'],
                    'hero_title' => $item['name'],
                    'hero_description' => $item['short_description'],
                    'hero_wa_message' => 'Halo Dokter Intan, saya ingin konsultasi ' . $item['name'],
                    'hero_image_1' => '/images/' . $item['folder'] . '/1.jpeg',
                    'hero_image_2' => '/images/' . $item['folder'] . '/2.jpeg',
                    'feature_1_title' => 'Rencana Perawatan Jelas',
                    'feature_1_description' => 'Dapatkan rencana tindakan yang terukur sesuai kondisi gigi Anda.',
                    'feature_2_title' => 'Ditangani Dokter Berpengalaman',
                    'feature_2_description' => 'Seluruh tindakan dilakukan langsung oleh drg. Intan secara teliti.',
                    'feature_3_title' => 'Kenyamanan Pasien Prioritas',
                    'feature_3_description' => 'Pendekatan ramah dan minim nyeri untuk pengalaman perawatan nyaman.',
                    'faq_1_question' => 'Apakah perawatan ' . $item['name'] . ' sakit?',
                    'faq_1_answer' => 'Rasa tidak nyaman ringan bisa terjadi, namun dokter akan meminimalkan nyeri selama tindakan.',
                    'faq_2_question' => 'Berapa lama proses ' . $item['name'] . '?',
                    'faq_2_answer' => 'Durasi tindakan tergantung kondisi gigi, umumnya sekitar 30-90 menit per sesi.',
                    'faq_3_question' => 'Apakah perlu kontrol ulang?',
                    'faq_3_answer' => 'Ya, kontrol berkala disarankan untuk memastikan hasil perawatan tetap optimal.',
                    'sort_order' => $item['sort_order'],
                    'is_active' => true,
                ]
            );

            $service->packages()->delete();

            $service->packages()->createMany([
                [
                    'name' => $item['name'] . ' Basic',
                    'description' => 'Pilihan layanan awal untuk kebutuhan perawatan standar.',
                    'price' => 'Mulai Dari Rp 200.000',
                    'image' => '/images/' . $item['folder'] . '/3.jpeg',
                    'wa_message' => 'Halo Dokter Intan, saya ingin tanya ' . $item['name'] . ' Basic',
                    'sort_order' => 1,
                ],
                [
                    'name' => $item['name'] . ' Premium',
                    'description' => 'Perawatan lanjutan dengan pendekatan yang lebih komprehensif.',
                    'price' => 'Mulai Dari Rp 450.000',
                    'image' => '/images/' . $item['folder'] . '/4.jpeg',
                    'wa_message' => 'Halo Dokter Intan, saya ingin tanya ' . $item['name'] . ' Premium',
                    'sort_order' => 2,
                ],
                [
                    'name' => $item['name'] . ' Advanced',
                    'description' => 'Pilihan layanan optimal untuk hasil jangka panjang.',
                    'price' => 'Mulai Dari Rp 700.000',
                    'image' => '/images/' . $item['folder'] . '/5.jpeg',
                    'wa_message' => 'Halo Dokter Intan, saya ingin tanya ' . $item['name'] . ' Advanced',
                    'sort_order' => 3,
                ],
            ]);
        }
    }
}
