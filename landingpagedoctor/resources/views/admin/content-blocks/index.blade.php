@extends('layouts.admin', ['title' => 'CRUD Konten'])

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">CRUD Konten Dinamis</h2>
        <a href="{{ route('admin.content-blocks.create') }}" class="bg-gray-900 text-white px-4 py-2 rounded-lg">Tambah
            Konten</a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left">Key</th>
                    <th class="px-4 py-3 text-left">Label</th>
                    <th class="px-4 py-3 text-left">Type</th>
                    <th class="px-4 py-3 text-left">Value</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blocks as $block)
                    <tr class="border-t align-top">
                        <td class="px-4 py-3">{{ $block->key }}</td>
                        <td class="px-4 py-3">{{ $block->label }}</td>
                        <td class="px-4 py-3">{{ $block->type }}</td>
                        <td class="px-4 py-3 max-w-md truncate">{{ $block->value }}</td>
                        <td class="px-4 py-3 text-right whitespace-nowrap">
                            <a href="{{ route('admin.content-blocks.edit', $block) }}"
                                class="text-blue-600 font-semibold mr-3">Edit</a>
                            <form method="POST" action="{{ route('admin.content-blocks.destroy', $block) }}" class="inline"
                                onsubmit="return confirm('Hapus konten ini?')">
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
