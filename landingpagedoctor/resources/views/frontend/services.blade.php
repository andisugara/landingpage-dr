@extends('layouts.site', ['pageTitle' => 'Layanan - Klinik Dokter Gigi Intan'])

@section('content')
    <main class="fade-in pt-24">
        <section class="relative h-[60vh] flex items-center overflow-hidden">
            <div class="absolute inset-0 z-0 parallax-bg"
                style="background-image: url('https://images.unsplash.com/photo-1606811971618-4486d14f3f99?auto=format&fit=crop&w=2000&q=80');">
                <div class="absolute inset-0 bg-white/50"></div>
            </div>
            <div class="container mx-auto px-6 relative z-10">
                <div class="max-w-2xl">
                    <h2 class="text-primary font-bold tracking-widest mb-2 uppercase text-sm">Layanan Klinik</h2>
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{!! nl2br(e($content->get('services_hero_title'))) !!}</h1>
                    <p class="text-gray-700 text-lg leading-relaxed">{{ $content->get('services_hero_description') }}</p>
                </div>
            </div>
        </section>

        <section class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold">Menu Layanan Lengkap</h2>
                    <p class="text-gray-500 mt-3">Setiap layanan memiliki halaman khusus berisi penjelasan, contoh hasil,
                        katalog, CTA promo, dan FAQ.</p>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    @foreach ($services as $service)
                        <a href="{{ route('services.show', $service->slug) }}"
                            class="bg-white rounded-3xl p-8 shadow-md hover:shadow-lg transition block">
                            <h3 class="text-2xl font-bold mb-3">{{ $service->name }}</h3>
                            <p class="text-gray-600 mb-5">{{ $service->short_description }}</p>
                            <span class="inline-flex items-center text-primary font-bold">Lihat Detail <i
                                    class="fas fa-arrow-right ml-2"></i></span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
            <div class="max-w-6xl mx-auto px-6">
                <div
                    class="bg-gray-900 text-white rounded-[2.5rem] p-10 md:p-14 flex flex-col md:flex-row items-center justify-between gap-8">
                    <div>
                        <h2 class="text-3xl font-bold mb-2">{{ $content->get('services_cta_title') }}</h2>
                        <p class="text-gray-300">{{ $content->get('services_cta_description') }}</p>
                    </div>
                    <a href="https://wa.me/{{ $content->get('wa_number', '6282228986161') }}"
                        class="bg-primary text-white px-8 py-4 rounded-full font-bold shadow-lg hover:opacity-90 transition">Chat
                        WhatsApp</a>
                </div>
            </div>
        </section>
    </main>
@endsection
