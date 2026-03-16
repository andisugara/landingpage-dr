<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <h1 class="text-2xl font-bold mb-2">Login Admin</h1>
        <p class="text-gray-500 mb-6">Masuk untuk mengelola konten website.</p>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 border border-red-200 px-4 py-3 rounded mb-4">{{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                    required>
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="remember" id="remember" class="rounded">
                <label for="remember" class="text-sm">Ingat saya</label>
            </div>
            <button class="w-full bg-gray-900 text-white font-semibold py-2.5 rounded-lg hover:bg-black">Masuk</button>
        </form>
    </div>
</body>

</html>
