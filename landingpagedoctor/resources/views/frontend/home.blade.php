@extends('layouts.site', ['pageTitle' => $content->get('clinic_name')])

@section('content')
    <main class="fade-in pt-20">
        <section class="relative h-[90vh] flex items-center overflow-hidden">
            <div class="absolute inset-0 z-0 parallax-bg" style="background-image: url('{{ asset('images/bg.jpg') }}');">
                <div class="absolute inset-0 bg-white/40"></div>
            </div>
            <div class="container mx-auto px-6 relative z-10 h-full">
                <div class="grid md:grid-cols-2 gap-10 items-center h-full">
                    <div class="max-w-2xl">
                        <h2 class="text-primary font-bold tracking-widest mb-2 uppercase text-sm">
                            {{ $content->get('hero_badge') }}</h2>
                        <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">{!! nl2br(e($content->get('hero_title'))) !!}
                        </h1>
                        <p
                            class="text-gray-700 text-lg md:text-xl mb-10 leading-relaxed italic border-l-4 border-primary pl-4">
                            {{ $content->get('hero_quote') }}</p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="https://wa.me/{{ $content->get('wa_number', '6282228986161') }}"
                                class="bg-primary text-white text-center px-10 py-4 rounded-full font-bold shadow-xl hover:scale-105 transition-transform">Reservasi
                                Sekarang</a>
                            <a href="{{ route('services.index') }}"
                                class="bg-white text-gray-800 text-center px-10 py-4 rounded-full font-bold shadow-md hover:bg-gray-50 transition border border-gray-100">Lihat
                                Layanan</a>
                        </div>
                    </div>
                    <div class="hidden md:flex justify-end items-end self-end h-full">
                        <div class="relative w-fit ml-auto">
                            <span
                                class="absolute left-0 top-1/2 -translate-x-[50%] -translate-y-1/2 bg-primary text-white px-6 py-3 rounded-2xl font-bold shadow-xl whitespace-nowrap">drg.
                                Intan Rianita</span>
                            <img src="{{ asset('images/dokter.png') }}" alt="drg. Intan Rianita"
                                class="w-[580px] lg:w-[580px] max-w-none h-auto object-contain object-bottom drop-shadow-2xl">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col md:grid md:grid-cols-2 gap-8 md:gap-16 items-center">
                    <div class="w-full flex justify-center md:justify-start">
                        <img src="{{ asset('images/logo.png') }}" alt="drg Intan"
                            class="rounded-[2rem] hidden md:block w-full max-w-sm">
                        <div class="md:hidden w-full flex justify-center">
                            <div class="relative w-fit">
                                <img src="{{ asset('images/dokter.png') }}" alt="drg. Intan Rianita"
                                    class="rounded-[2rem] w-full max-w-xs">
                                <span
                                    class="absolute bottom-4 left-1/2 -translate-x-1/2 bg-primary text-white px-4 py-2 rounded-full font-bold shadow-lg text-sm whitespace-nowrap">drg.
                                    Intan Rianita</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-primary font-bold uppercase tracking-widest mb-4">
                            {{ $content->get('profile_kicker') }}</h4>
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">{{ $content->get('profile_title') }}</h2>
                        <p class="text-gray-600 text-lg leading-relaxed mb-6">{!! e($content->get('profile_paragraph_1')) !!}</p>
                        <p class="text-gray-600 text-lg leading-relaxed mb-8">{!! e($content->get('profile_paragraph_2')) !!}</p>
                        <div class="grid grid-cols-2 gap-6">
                            @foreach ($profileStats as $stat)
                                <div class="border-t-2 border-primary pt-4">
                                    <span class="block text-3xl font-bold">{{ $stat['value'] ?? '' }}</span>
                                    <span
                                        class="text-sm text-gray-500 uppercase font-semibold">{{ $stat['label'] ?? '' }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h4 class="text-primary font-bold uppercase tracking-widest mb-4">Mengapa Pilih Kami</h4>
                    <h2 class="text-3xl md:text-4xl font-bold">{{ $content->get('home_why_choose_title') }}</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach ($whyChooseItems as $item)
                        <div class="bg-white p-8 rounded-3xl shadow-sm">
                            <i class="{{ $item['icon'] ?? 'fas fa-star' }} text-primary text-3xl mb-4"></i>
                            <h3 class="text-xl font-bold mb-3">{{ $item['title'] ?? '' }}</h3>
                            <p class="text-gray-600">{{ $item['description'] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="h-80 flex items-center justify-center parallax-bg relative"
            style="background-image: url('{{ asset('images/bg-quote.png') }}');">
            <div class="absolute inset-0 bg-primary/40 backdrop-blur-[2px]"></div>
            <div class="relative z-10 text-center text-white px-6">
                <h2 class="text-2xl md:text-4xl font-bold italic tracking-wide">{{ $content->get('home_quote_text') }}</h2>
            </div>
        </section>

        <section class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h4 class="text-primary font-bold uppercase tracking-widest mb-4">Galeri Kami</h4>
                <h2 class="text-3xl md:text-4xl font-bold mb-12">{{ $content->get('home_gallery_title') }}</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach ($galleryItems as $image)
                        <div class="gallery-item overflow-hidden rounded-2xl h-64 shadow-md bg-white p-2">
                            <img src="{{ $image['src'] ?? '' }}" class="w-full h-full object-cover rounded-xl"
                                alt="{{ $image['alt'] ?? 'Galeri' }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h4 class="text-primary font-bold uppercase tracking-widest mb-4">Promo Terbaru</h4>
                <h2 class="text-3xl md:text-4xl font-bold mb-12">Penawaran Spesial untuk Pasien Baru</h2>
                <div class="grid md:grid-cols-3 gap-8 text-left">
                    @foreach ($promotions as $promo)
                        <div class="bg-gray-50 rounded-[2.5rem] p-8 border border-gray-100 relative overflow-hidden group">
                            <div
                                class="absolute -right-8 -top-8 w-24 h-24 {{ $promo->badge_color }} rounded-full flex items-center justify-center pt-8 pr-8 text-white font-bold rotate-12 group-hover:scale-110 transition">
                                {{ $promo->badge }}</div>
                            <h3 class="text-2xl font-bold mb-4">{{ $promo->title }}</h3>
                            <p class="text-gray-500 mb-8">{{ $promo->description }}</p>
                            <a href="{{ route('promotions.index') }}"
                                class="inline-flex items-center font-bold text-primary">Lihat Detail <i
                                    class="fas fa-arrow-right ml-2"></i></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h4 class="text-primary font-bold uppercase tracking-widest mb-4">Layanan Kami</h4>
                <h2 class="text-3xl md:text-4xl font-bold mb-12">Pilihan Perawatan Lengkap</h2>
                <div class="grid md:grid-cols-4 gap-6 text-left">
                    @foreach ($services as $service)
                        <a href="{{ route('services.show', $service->slug) }}"
                            class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                            <h3 class="font-bold mb-2">{{ $service->name }}</h3>
                            <p class="text-gray-600 text-sm">{{ $service->short_description }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-24 bg-white">
            <div class="max-w-4xl mx-auto px-6 text-center">
                <h4 class="text-primary font-bold mb-4 uppercase tracking-widest">Apa Kata Mereka</h4>
                <h2 class="text-3xl font-bold mb-12">Cerita Pasien Klinik drg. Intan</h2>
                <div class="p-10 bg-gray-50 rounded-[3rem] shadow-sm relative italic">
                    <i class="fas fa-quote-left text-primary/20 text-6xl absolute top-6 left-6"></i>
                    <p class="text-lg text-gray-600 mb-6 relative z-10">{{ $testimonial['content'] ?? '' }}</p>
                    <h5 class="font-bold text-gray-900">— {{ $testimonial['author'] ?? '' }}</h5>
                </div>
            </div>
        </section>

        <section class="py-24 bg-gray-50">
            <div class="max-w-5xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h4 class="text-primary font-bold uppercase tracking-widest mb-4">FAQ</h4>
                    <h2 class="text-3xl font-bold">Pertanyaan yang Sering Ditanyakan</h2>
                </div>
                <div class="space-y-4">
                    @foreach ($faqItems as $faq)
                        <details class="bg-white p-6 rounded-2xl shadow-sm">
                            <summary class="font-bold cursor-pointer">{{ $faq['question'] ?? '' }}</summary>
                            <p class="text-gray-600 mt-3">{{ $faq['answer'] ?? '' }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
