@extends('layouts.site', ['pageTitle' => 'Promo - Klinik Dokter Gigi Intan'])

@section('content')
    <main class="fade-in pt-24">
        <section class="pt-12 pb-24 bg-white min-h-screen">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h1 class="text-4xl font-bold mb-4 text-primary">{{ $content->get('promo_page_title') }}</h1>
                <p class="text-gray-500 mb-16">{{ $content->get('promo_page_subtitle') }}</p>

                <div class="grid md:grid-cols-3 gap-8 text-left">
                    @forelse($promotions as $promo)
                        <div class="bg-gray-50 rounded-[2.5rem] overflow-hidden border border-gray-100 relative group">
                            <img src="{{ $promo->image_url }}" alt="{{ $promo->title }}" class="h-44 w-full object-cover">
                            <div class="p-8">
                                <div
                                    class="absolute -right-8 -top-8 w-24 h-24 {{ $promo->badge_color }} rounded-full flex items-center justify-center pt-8 pr-8 text-white font-bold rotate-12 group-hover:scale-110 transition">
                                    {{ $promo->badge }}</div>
                                <h3 class="text-2xl font-bold mb-4">{{ $promo->title }}</h3>
                                <p class="text-gray-500 mb-10">{{ $promo->description }}</p>
                                <div class="mt-auto">
                                    @if ($promo->original_price)
                                        <div class="text-gray-400 line-through text-sm">{{ $promo->original_price }}</div>
                                    @endif
                                    <div class="text-3xl font-bold text-primary mb-6">{{ $promo->final_price }}</div>
                                    <a href="https://wa.me/{{ $content->get('wa_number', '6282228986161') }}?text={{ urlencode($promo->wa_message) }}"
                                        class="block text-center bg-gray-900 text-white py-4 rounded-2xl font-bold hover:bg-primary transition shadow-md">{{ $promo->wa_button_text }}</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="md:col-span-3">
                            <div class="bg-yellow-50 border-2 border-yellow-200 rounded-2xl p-12 text-center">
                                <div class="text-6xl mb-4"><i class="fas fa-calendar-alt text-yellow-500"></i></div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">Belum Ada Promo</h3>
                                <p class="text-gray-600 mb-6">Saat ini belum ada promo tersedia. Silakan kembali lagi nanti
                                    atau hubungi kami melalui WhatsApp untuk penawaran terbaru.</p>
                                <a href="https://wa.me/{{ $content->get('wa_number', '6282228986161') }}"
                                    class="inline-flex items-center bg-primary text-white px-8 py-3 rounded-full font-bold hover:opacity-90 transition">
                                    <i class="fas fa-whatsapp mr-2"></i> Chat via WhatsApp
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection
