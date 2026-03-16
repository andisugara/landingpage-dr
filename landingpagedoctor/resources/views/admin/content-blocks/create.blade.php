@extends('layouts.admin', ['title' => 'Tambah Konten'])

@section('content')
    <h2 class="text-2xl font-bold mb-6">Tambah Konten Dinamis</h2>

    <form method="POST" action="{{ route('admin.content-blocks.store') }}"
        class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
        @csrf
        @include('admin.content-blocks._form')
        <div class="pt-2">
            <button class="bg-gray-900 text-white px-5 py-2.5 rounded-lg">Simpan</button>
            <a href="{{ route('admin.content-blocks.index') }}" class="ml-3 text-gray-600">Batal</a>
        </div>
    </form>
@endsection
