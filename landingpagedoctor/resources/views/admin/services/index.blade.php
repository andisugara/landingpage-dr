@extends('layouts.admin', ['title' => 'CRUD Layanan'])

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">CRUD Layanan</h2>
        <a href="{{ route('admin.services.create') }}" class="bg-gray-900 text-white px-4 py-2 rounded-lg">Tambah Layanan</a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Slug</th>
                    <th class="px-4 py-3 text-left">Urutan</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr class="border-t">
                        <td class="px-4 py-3">{{ $service->name }}</td>
                        <td class="px-4 py-3">{{ $service->slug }}</td>
                        <td class="px-4 py-3">{{ $service->sort_order }}</td>
                        <td class="px-4 py-3">{{ $service->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.services.edit', $service) }}"
                                class="text-blue-600 font-semibold mr-3">Edit</a>
                            <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="inline"
                                onsubmit="return confirm('Hapus layanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 font-semibold">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
