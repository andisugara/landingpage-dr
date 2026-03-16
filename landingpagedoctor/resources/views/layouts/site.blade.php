<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? ($globalContent->get('clinic_name') ?? 'Klinik Dokter Gigi Intan - Cimahi') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
        }

        .text-primary {
            color: #c81c80;
        }

        .bg-primary {
            background-color: #c81c80;
        }

        .bg-secondary {
            background-color: #e280b3;
        }

        .hover-primary:hover {
            color: #c81c80;
        }

        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .gallery-item img {
            transition: transform 0.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }
    </style>
</head>

<body class="text-gray-800">
    @php
        $waNumber = $globalContent->get('wa_number', '6282228986161');
        $footerAddress = $globalContent->get('footer_address', '');
        $footerPhone = $globalContent->get('footer_phone', '');
        $footerHours = $globalContent->get('footer_hours', '');
        $footerMapsLink = $globalContent->get('footer_maps_link', '#');
        $footerMapsEmbed = $globalContent->get('footer_maps_embed', '');
        $footerCopyright = $globalContent->get('footer_copyright', '');
        $simpleFooter = $simpleFooter ?? false;
    @endphp

    <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-sm shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12">
                </a>

                <div class="hidden md:flex space-x-8 items-center font-medium">
                    <a href="{{ route('home') }}" class="hover-primary transition">Beranda</a>
                    <div class="relative dropdown">
                        <button class="hover-primary transition flex items-center">
                            Layanan <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div
                            class="dropdown-menu absolute hidden bg-white shadow-xl rounded-xl py-4 w-56 mt-0 border border-gray-50">
                            <a href="{{ route('services.index') }}"
                                class="block px-6 py-2 hover:bg-gray-50 hover:text-primary">Semua Layanan</a>
                            <hr class="my-2 border-gray-100">
                            @foreach ($navServices ?? collect() as $service)
                                <a href="{{ route('services.show', $service->slug) }}"
                                    class="block px-6 py-2 hover:bg-gray-50 text-sm">{{ $service->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ route('promotions.index') }}" class="hover-primary transition">Promo</a>
                    <a href="https://wa.me/{{ $waNumber }}" target="_blank"
                        class="bg-primary text-white px-6 py-2.5 rounded-full hover:opacity-90 transition shadow-md">Reservasi</a>
                </div>

                <div class="md:hidden flex items-center">
                    <button class="text-gray-600 focus:outline-none" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t px-4 py-4 space-y-4 shadow-xl">
            <a href="{{ route('home') }}" onclick="toggleMobileMenu()" class="block font-medium py-2">Beranda</a>
            <a href="{{ route('services.index') }}" onclick="toggleMobileMenu()"
                class="block font-medium py-2">Layanan</a>
            <a href="{{ route('promotions.index') }}" onclick="toggleMobileMenu()"
                class="block font-medium py-2">Promo</a>
            <a href="https://wa.me/{{ $waNumber }}"
                class="block bg-primary text-white text-center py-3 rounded-xl font-bold">Reservasi</a>
        </div>
    </nav>

    @yield('content')

    @if ($simpleFooter)
        <footer class="bg-gray-900 text-white pt-16 pb-10">
            <div class="max-w-7xl mx-auto px-6 text-center text-gray-400 text-sm">
                {{ $footerCopyright }}
            </div>
        </footer>
    @else
        <footer class="bg-gray-900 text-white pt-24 pb-12">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid md:grid-cols-2 gap-16 mb-16">
                    <div>
                        <h2 class="text-3xl font-bold mb-6 text-primary">Lokasi Klinik</h2>
                        <p class="text-gray-400 mb-6 max-w-md">{{ $footerAddress }}</p>
                        <div class="space-y-4">
                            <p class="flex items-center"><i class="fas fa-phone-alt mr-3 text-primary"></i>
                                {{ $footerPhone }}</p>
                            <p class="flex items-center"><i class="fas fa-clock mr-3 text-primary"></i>
                                {{ $footerHours }}</p>
                        </div>
                        <a href="{{ $footerMapsLink }}" target="_blank"
                            class="inline-flex items-center bg-white text-gray-900 px-8 py-3 rounded-full font-bold mt-8 hover:bg-primary hover:text-white transition">
                            Petunjuk Jalan (Maps) <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                    <div class="rounded-[2rem] overflow-hidden border-4 border-gray-800 h-80 shadow-2xl">
                        <iframe src="{{ $footerMapsEmbed }}" width="100%" height="100%" style="border:0;"
                            allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="text-center pt-12 border-t border-gray-800 text-gray-500 text-sm italic">
                    {{ $footerCopyright }}</div>
            </div>
        </footer>
    @endif

    <script>
        function toggleMobileMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }
    </script>
</body>

</html>
