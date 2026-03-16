@extends('layouts.site', ['pageTitle' => $service->name . ' - Klinik Dokter Gigi Intan', 'simpleFooter' => true])

@section('content')
    <main class="fade-in pt-24">
        <section class="py-16 bg-gray-50">
            <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <h1 class="text-4xl font-bold mb-4">{{ $service->hero_title ?: $service->name }}</h1>
                    <p class="text-gray-600 text-lg">{{ $service->hero_description ?: $service->short_description }}</p>
                    <div class="mt-6 flex gap-4">
                        <a href="https://wa.me/{{ $globalContent->get('wa_number', '6282228986161') }}?text={{ urlencode($service->hero_wa_message ?: 'Halo Dokter Intan, saya ingin konsultasi ' . $service->name) }}"
                            class="bg-primary text-white px-6 py-3 rounded-full font-bold">Konsultasi WA</a>
                        <a href="{{ route('promotions.index') }}"
                            class="bg-white border border-gray-200 px-6 py-3 rounded-full font-bold">Lihat Promo</a>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <img class="rounded-2xl h-48 w-full object-cover"
                        src="{{ \App\Models\Service::resolveImageUrl($service->hero_image_1) }}"
                        alt="{{ $service->name }} 1">
                    <img class="rounded-2xl h-48 w-full object-cover"
                        src="{{ \App\Models\Service::resolveImageUrl($service->hero_image_2) }}"
                        alt="{{ $service->name }} 2">
                </div>
            </div>
        </section>

        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-6">
                <h2 class="text-3xl font-bold mb-8">Kenapa {{ $service->name }} di Klinik Kami?</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    @for ($i = 1; $i <= 3; $i++)
                        @php
                            $title = $service->{'feature_' . $i . '_title'};
                            $description = $service->{'feature_' . $i . '_description'};
                        @endphp
                        @if ($title || $description)
                            <div class="bg-gray-50 p-6 rounded-2xl">
                                <h3 class="font-bold mb-2">{{ $title }}</h3>
                                <p class="text-gray-600 text-sm">{{ $description }}</p>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </section>

        <section class="py-16 bg-gray-50">
            <div class="max-w-6xl mx-auto px-6">
                <h2 class="text-3xl font-bold mb-8">Layanan {{ $service->name }}</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ($packages as $package)
                        @php
                            $pkgName = $package->name;
                            $pkgDesc = $package->description;
                            $pkgPrice = $package->price;
                            $pkgImage = $package->image;
                            $pkgWa = $package->wa_message;
                        @endphp
                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                            <img src="{{ \App\Models\Service::resolveImageUrl($pkgImage) }}" alt="{{ $pkgName }}"
                                class="h-40 w-full object-cover">
                            <div class="p-6">
                                <h3 class="font-bold">{{ $pkgName }}</h3>
                                <p class="text-gray-600 text-sm">{{ $pkgDesc }}</p>
                                <div class="mt-4 text-primary font-bold">{{ $pkgPrice }}</div>
                                <a href="https://wa.me/{{ $globalContent->get('wa_number', '6282228986161') }}?text={{ urlencode($pkgWa ?: 'Halo Dokter Intan, saya ingin tanya ' . $pkgName) }}"
                                    class="mt-3 inline-block text-sm font-bold text-white bg-gray-900 px-4 py-2 rounded-full">Tanya
                                    via WA</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-6">
                <h2 class="text-3xl font-bold mb-8">FAQ {{ $service->name }}</h2>
                <div class="space-y-4">
                    @for ($i = 1; $i <= 3; $i++)
                        @php
                            $question = $service->{'faq_' . $i . '_question'};
                            $answer = $service->{'faq_' . $i . '_answer'};
                        @endphp
                        @if ($question || $answer)
                            <details class="bg-gray-50 p-5 rounded-2xl">
                                <summary class="font-bold cursor-pointer">{{ $question }}</summary>
                                <p class="text-gray-600 mt-2">{{ $answer }}</p>
                            </details>
                        @endif
                    @endfor
                </div>
            </div>
        </section>
    </main>
@endsection
