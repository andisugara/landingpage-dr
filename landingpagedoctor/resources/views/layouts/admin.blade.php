<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex">
        <aside class="w-64 bg-gray-900 text-white p-6 space-y-4">
            <h1 class="text-xl font-bold">Admin Dr Intan</h1>
            <nav class="space-y-2 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-800">Dashboard</a>
                <a href="{{ route('admin.services.index') }}" class="block px-3 py-2 rounded hover:bg-gray-800">CRUD
                    Layanan</a>
                <a href="{{ route('admin.promotions.index') }}" class="block px-3 py-2 rounded hover:bg-gray-800">CRUD
                    Promo</a>
                <a href="{{ route('admin.content-blocks.index') }}"
                    class="block px-3 py-2 rounded hover:bg-gray-800">CRUD Konten</a>
                <a href="{{ route('home') }}" target="_blank" class="block px-3 py-2 rounded hover:bg-gray-800">Lihat
                    Website</a>
            </nav>
            <form method="POST" action="{{ route('admin.logout') }}" class="pt-6">
                @csrf
                <button class="w-full bg-red-500 hover:bg-red-600 px-3 py-2 rounded font-semibold">Logout</button>
            </form>
        </aside>
        <main class="flex-1 p-8">
            @if (session('success'))
                <div class="bg-green-100 text-green-700 border border-green-200 px-4 py-3 rounded mb-6">
                    {{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 border border-red-200 px-4 py-3 rounded mb-6">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>

</html>
