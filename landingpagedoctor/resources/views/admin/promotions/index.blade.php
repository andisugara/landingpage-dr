@extends('layouts.admin', ['title' => 'CRUD Promo'])

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">CRUD Promo</h2>
        <a href="{{ route('admin.promotions.create') }}" class="bg-gray-900 text-white px-4 py-2 rounded-lg">Tambah Promo</a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left">Judul</th>
                    <th class="px-4 py-3 text-left">Harga</th>
                    <th class="px-4 py-3 text-left">Urutan</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($promotions as $promotion)
                    <tr class="border-t">
                        <td class="px-4 py-3">{{ $promotion->title }}</td>
                        <td class="px-4 py-3">{{ $promotion->final_price }}</td>
                        <td class="px-4 py-3">{{ $promotion->sort_order }}</td>
                        <td class="px-4 py-3">{{ $promotion->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.promotions.edit', $promotion) }}"
                                class="text-blue-600 font-semibold mr-3">Edit</a>
                            <form method="POST" action="{{ route('admin.promotions.destroy', $promotion) }}" class="inline"
                                onsubmit="return confirm('Hapus promo ini?')">
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
