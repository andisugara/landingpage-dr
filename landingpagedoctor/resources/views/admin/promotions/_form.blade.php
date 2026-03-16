@php
    $item = $promotion ?? null;
@endphp

<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Judul Promo</label>
        <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Upload Gambar</label>
        <input type="file" name="image_file" accept="image/*" class="w-full border border-gray-300 rounded-lg px-3 py-2"
            {{ isset($item) ? '' : 'required' }}>
        @if (!empty($item?->image_url))
            <img src="{{ $item->image_url }}" class="h-20 mt-2 rounded-lg border" alt="promo">
        @endif
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1">Deskripsi</label>
        <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>{{ old('description', $item->description ?? '') }}</textarea>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Badge</label>
        <input type="text" name="badge" value="{{ old('badge', $item->badge ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2">
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Badge Color Class</label>
        <input type="text" name="badge_color" value="{{ old('badge_color', $item->badge_color ?? 'bg-primary') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Harga Coret</label>
        <input type="text" name="original_price" value="{{ old('original_price', $item->original_price ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2">
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Harga Akhir</label>
        <input type="text" name="final_price" value="{{ old('final_price', $item->final_price ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2">
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1">Pesan WA (tanpa encode)</label>
        <textarea name="wa_message" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ old('wa_message', $item->wa_message ?? '') }}</textarea>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Text Tombol WA</label>
        <input type="text" name="wa_button_text"
            value="{{ old('wa_button_text', $item->wa_button_text ?? 'Hubungi via WA') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Urutan</label>
        <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $item->sort_order ?? 0) }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
    </div>
    <div class="md:col-span-2 flex items-center gap-2 mt-1">
        <input type="checkbox" name="is_active" value="1"
            {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
        <label class="text-sm">Aktif</label>
    </div>
</div>
