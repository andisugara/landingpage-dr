<?php

namespace Database\Seeders;

use App\Models\ContentBlock;
use Illuminate\Database\Seeder;

class ContentBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            ['key' => 'clinic_name', 'label' => 'Nama Klinik', 'type' => 'text', 'value' => 'Klinik Dokter Gigi Intan - Cimahi'],
            ['key' => 'wa_number', 'label' => 'Nomor WhatsApp', 'type' => 'text', 'value' => '6282228986161'],
            ['key' => 'hero_badge', 'label' => 'Hero Badge', 'type' => 'text', 'value' => 'Klinik Gigi Terpercaya di Cimahi'],
            ['key' => 'hero_title', 'label' => 'Hero Title', 'type' => 'textarea', 'value' => "Wujudkan Gigi Sehat & Senyum Terbaikmu\nBersama drg. Intan Rianita"],
            ['key' => 'hero_quote', 'label' => 'Hero Quote', 'type' => 'textarea', 'value' => '"Jangan biarkan rasa malu menyembunyikan senyummu, karena dunia berhak melihat kebahagiaanmu."'],
            ['key' => 'profile_kicker', 'label' => 'Profil Kicker', 'type' => 'text', 'value' => 'Profil Klinik'],
            ['key' => 'profile_title', 'label' => 'Profil Title', 'type' => 'textarea', 'value' => 'Pengalaman Lebih dari 10 Tahun Merawat Senyum Pasien'],
            ['key' => 'profile_paragraph_1', 'label' => 'Profil Paragraf 1', 'type' => 'textarea', 'value' => 'Sedang mencari klinik gigi di Cimahi yang terjangkau dan terpercaya? Klinik Dokter Gigi Intan hadir sebagai solusi untuk memudahkan kamu mendapatkan perawatan gigi terbaik.'],
            ['key' => 'profile_paragraph_2', 'label' => 'Profil Paragraf 2', 'type' => 'textarea', 'value' => 'Seluruh perawatan ditangani langsung oleh Dokter Gigi Intan yang telah berpengalaman menangani ribuan kasus. Kami mengedepankan pendekatan yang ramah, sabar, dan sangat detail dalam setiap tindakan.'],
            ['key' => 'home_profile_stats', 'label' => 'Statistik Profil (JSON)', 'type' => 'json', 'value' => json_encode([
                ['value' => '1k+', 'label' => 'Pasien Behel'],
                ['value' => '10th+', 'label' => 'Pengalaman Medis'],
                ['value' => '3k+', 'label' => 'Pasien Scaling'],
                ['value' => '800+', 'label' => 'Kasus Estetik'],
            ], JSON_PRETTY_PRINT)],
            ['key' => 'home_why_choose_title', 'label' => 'Why Choose Title', 'type' => 'text', 'value' => 'Fokus pada Kenyamanan & Hasil Jangka Panjang'],
            ['key' => 'home_why_choose_items', 'label' => 'Why Choose Items (JSON)', 'type' => 'json', 'value' => json_encode([
                ['icon' => 'fas fa-check-circle', 'title' => 'Rencana Perawatan Jelas', 'description' => 'Setiap pasien mendapatkan rencana perawatan yang transparan, lengkap dengan estimasi waktu dan biaya.'],
                ['icon' => 'fas fa-syringe', 'title' => 'Prioritas pada Kenyamanan', 'description' => 'Ditangani dengan penuh perhatian untuk menjaga kenyamanan selama perawatan.'],
                ['icon' => 'fas fa-star', 'title' => 'Hasil Estetik Natural', 'description' => 'Kami fokus pada hasil yang rapi, proporsional, dan sesuai karakter senyum Anda.'],
            ], JSON_PRETTY_PRINT)],
            ['key' => 'home_quote_text', 'label' => 'Quote Tengah', 'type' => 'text', 'value' => '"Kesehatan Gigi Anda Adalah Investasi Masa Depan."'],
            ['key' => 'home_gallery_title', 'label' => 'Judul Galeri', 'type' => 'text', 'value' => 'Suasana Klinik yang Nyaman'],
            ['key' => 'home_gallery_items', 'label' => 'Galeri (JSON)', 'type' => 'json', 'value' => json_encode([
                ['src' => '/images/gallery/1.png', 'alt' => 'Klinik'],
                ['src' => '/images/gallery/2.png', 'alt' => 'Peralatan'],
                ['src' => '/images/gallery/3.png', 'alt' => 'Perawatan'],
                ['src' => '/images/gallery/4.png', 'alt' => 'Lobi'],
                ['src' => '/images/gallery/5.png', 'alt' => 'Ruang Tindakan'],
                ['src' => '/images/gallery/6.png', 'alt' => 'Konsultasi'],
                ['src' => '/images/gallery/7.png', 'alt' => 'Sterilisasi'],
                ['src' => '/images/gallery/8.png', 'alt' => 'Ruang Tunggu'],
            ], JSON_PRETTY_PRINT)],
            ['key' => 'home_testimonial', 'label' => 'Testimoni Utama (JSON)', 'type' => 'json', 'value' => json_encode([
                'content' => '"Dokter Intan sangat sabar menjelaskan kondisi gigi saya. Pemasangan behelnya rapi dan harganya sangat transparan dibandingkan klinik lain di Cimahi. Sangat puas!"',
                'author' => 'Sarah, Pasien Behel',
            ], JSON_PRETTY_PRINT)],
            ['key' => 'home_faq_items', 'label' => 'FAQ Home (JSON)', 'type' => 'json', 'value' => json_encode([
                ['question' => 'Apakah harus buat janji dulu?', 'answer' => 'Disarankan membuat janji agar waktu konsultasi lebih nyaman dan tidak menunggu lama.'],
                ['question' => 'Berapa lama proses behel gigi?', 'answer' => 'Rata-rata 12–24 bulan tergantung tingkat kerapihan gigi dan kepatuhan kontrol.'],
                ['question' => 'Apakah scaling membuat gigi ngilu?', 'answer' => 'Rasa ngilu ringan bisa terjadi namun akan hilang dalam 1–2 hari dengan perawatan yang tepat.'],
                ['question' => 'Metode pembayaran apa saja yang tersedia?', 'answer' => 'Kami menerima tunai, transfer bank, dan beberapa dompet digital.'],
            ], JSON_PRETTY_PRINT)],
            ['key' => 'services_hero_title', 'label' => 'Layanan Hero Title', 'type' => 'textarea', 'value' => "Perawatan Gigi Dimulai\nDengan Rasa Nyaman"],
            ['key' => 'services_hero_description', 'label' => 'Layanan Hero Description', 'type' => 'textarea', 'value' => 'Mulai dari perawatan dasar hingga estetik, semua ditangani langsung oleh drg. Intan Rianita yang berpengalaman lebih dari 10 tahun.'],
            ['key' => 'services_cta_title', 'label' => 'Layanan CTA Title', 'type' => 'text', 'value' => 'Butuh konsultasi cepat?'],
            ['key' => 'services_cta_description', 'label' => 'Layanan CTA Description', 'type' => 'textarea', 'value' => 'Admin kami siap membantu memilih layanan terbaik untuk kebutuhan Anda.'],
            ['key' => 'promo_page_title', 'label' => 'Promo Page Title', 'type' => 'text', 'value' => 'Katalog Promo Pasien'],
            ['key' => 'promo_page_subtitle', 'label' => 'Promo Page Subtitle', 'type' => 'textarea', 'value' => 'Berlaku khusus untuk pendaftaran melalui WhatsApp.'],
            ['key' => 'footer_address', 'label' => 'Alamat Footer', 'type' => 'textarea', 'value' => 'Komplek Pemda, Jl. Sangkuriang Mukti No.102 Blok Y, Padasuka, Kec. Cimahi Tengah, Kota Cimahi, Jawa Barat 40526'],
            ['key' => 'footer_phone', 'label' => 'Telepon Footer', 'type' => 'text', 'value' => '0812-3456-7890'],
            ['key' => 'footer_hours', 'label' => 'Jam Operasional', 'type' => 'text', 'value' => '10.00 - 20.00 (Senin - Sabtu)'],
            ['key' => 'footer_maps_link', 'label' => 'Link Maps', 'type' => 'text', 'value' => 'https://maps.app.goo.gl/examplelink'],
            ['key' => 'footer_maps_embed', 'label' => 'Embed Maps', 'type' => 'textarea', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1!2d107.54!3d-6.87!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTInMTIuMCJTIDEwN8KwMzInMjQuMCJF!5e0!3m2!1sen!2sid!4v1700000000000'],
            ['key' => 'footer_copyright', 'label' => 'Copyright Footer', 'type' => 'text', 'value' => '© 2024 Klinik Dokter Gigi Intan Cimahi. Kesehatan Anda, Prioritas Kami.'],
        ];

        foreach ($blocks as $block) {
            ContentBlock::query()->updateOrCreate(
                ['key' => $block['key']],
                [
                    'label' => $block['label'],
                    'value' => $block['value'],
                    'type' => $block['type'],
                ]
            );
        }
    }
}
