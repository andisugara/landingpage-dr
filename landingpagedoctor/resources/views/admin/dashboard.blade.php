@extends('layouts.admin', ['title' => 'Dashboard Admin'])

@section('content')
    <h2 class="text-2xl font-bold mb-6">Dashboard</h2>

    <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-sm p-6 border">
            <p class="text-gray-500">Total Layanan</p>
            <p class="text-3xl font-bold mt-2">{{ $serviceCount }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6 border">
            <p class="text-gray-500">Total Promo</p>
            <p class="text-3xl font-bold mt-2">{{ $promotionCount }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6 border">
            <p class="text-gray-500">Total Konten Dinamis</p>
            <p class="text-3xl font-bold mt-2">{{ $contentBlockCount }}</p>
        </div>
    </div>
@endsection
