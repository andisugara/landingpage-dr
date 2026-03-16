@php
    $item = $service ?? null;
@endphp

<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Nama Layanan</label>
        <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1">Deskripsi Singkat</label>
        <textarea name="short_description" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>{{ old('short_description', $item->short_description ?? '') }}</textarea>
    </div>

    <div class="md:col-span-2 border-t pt-4 mt-2">
        <h3 class="font-bold text-lg mb-3">Section Hero</h3>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Judul Hero</label>
        <input type="text" name="hero_title" value="{{ old('hero_title', $item->hero_title ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2">
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Pesan WA Hero</label>
        <input type="text" name="hero_wa_message" value="{{ old('hero_wa_message', $item->hero_wa_message ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2"
            placeholder="Halo Dokter, saya ingin konsultasi...">
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1">Deskripsi Hero</label>
        <textarea name="hero_description" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ old('hero_description', $item->hero_description ?? '') }}</textarea>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Gambar Hero 1</label>
        <input type="file" name="hero_image_1" accept="image/*"
            class="w-full border border-gray-300 rounded-lg px-3 py-2">
        @if (!empty($item?->hero_image_1))
            <img src="{{ \App\Models\Service::resolveImageUrl($item->hero_image_1) }}"
                class="h-20 mt-2 rounded-lg border" alt="hero 1">
        @endif
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Gambar Hero 2</label>
        <input type="file" name="hero_image_2" accept="image/*"
            class="w-full border border-gray-300 rounded-lg px-3 py-2">
        @if (!empty($item?->hero_image_2))
            <img src="{{ \App\Models\Service::resolveImageUrl($item->hero_image_2) }}"
                class="h-20 mt-2 rounded-lg border" alt="hero 2">
        @endif
    </div>

    <div class="md:col-span-2 border-t pt-4 mt-2">
        <h3 class="font-bold text-lg mb-3">Section Keunggulan (3 Box)</h3>
    </div>
    @for ($i = 1; $i <= 3; $i++)
        <div>
            <label class="block text-sm font-medium mb-1">Keunggulan {{ $i }} - Judul</label>
            <input type="text" name="feature_{{ $i }}_title"
                value="{{ old('feature_' . $i . '_title', $item->{'feature_' . $i . '_title'} ?? '') }}"
                class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Keunggulan {{ $i }} - Deskripsi</label>
            <textarea name="feature_{{ $i }}_description" rows="2"
                class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ old('feature_' . $i . '_description', $item->{'feature_' . $i . '_description'} ?? '') }}</textarea>
        </div>
    @endfor

    <div class="md:col-span-2 border-t pt-4 mt-2">
        <div class="flex items-center justify-between mb-3">
            <h3 class="font-bold text-lg">Section Paket/Layanan</h3>
            <button type="button" id="add-package-btn" class="bg-gray-900 text-white px-3 py-2 rounded-lg text-sm">+
                Tambah Paket</button>
        </div>
    </div>
    <div class="md:col-span-2 space-y-4" id="package-list">
        @php
            $legacyPackages = collect(range(1, 3))
                ->map(function ($i) use ($item) {
                    if (!$item) {
                        return null;
                    }

                    $name = $item->{'package_' . $i . '_name'} ?? null;
                    $description = $item->{'package_' . $i . '_description'} ?? null;
                    $price = $item->{'package_' . $i . '_price'} ?? null;

                    if (blank($name) && blank($description) && blank($price)) {
                        return null;
                    }

                    return (object) [
                        'id' => null,
                        'name' => $name,
                        'description' => $description,
                        'price' => $price,
                        'image' => $item->{'package_' . $i . '_image'} ?? null,
                        'wa_message' => $item->{'package_' . $i . '_wa_message'} ?? null,
                    ];
                })
                ->filter()
                ->values();

            $initialPackages = old('package_name')
                ? collect(old('package_name'))
                    ->map(function ($name, $index) {
                        return (object) [
                            'id' => old('package_id.' . $index),
                            'name' => $name,
                            'description' => old('package_description.' . $index),
                            'price' => old('package_price.' . $index),
                            'image' => old('package_old_image.' . $index),
                            'wa_message' => old('package_wa_message.' . $index),
                        ];
                    })
                    ->values()
                : (($servicePackages ?? collect())->isNotEmpty()
                    ? $servicePackages
                    : $legacyPackages);
        @endphp

        @forelse($initialPackages as $package)
            <div class="package-item border border-gray-200 rounded-xl p-4 bg-gray-50">
                <div class="flex justify-between items-center mb-3">
                    <h4 class="font-semibold">Item Paket</h4>
                    <button type="button" class="remove-package text-red-600 text-sm font-semibold">Hapus</button>
                </div>
                <input type="hidden" name="package_id[]" value="{{ $package->id }}">
                <input type="hidden" name="package_old_image[]" value="{{ $package->image }}">
                <div class="grid md:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-medium mb-1">Nama Paket</label>
                        <input type="text" name="package_name[]" value="{{ $package->name }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Harga</label>
                        <input type="text" name="package_price[]" value="{{ $package->price }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1">Deskripsi</label>
                        <textarea name="package_description[]" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ $package->description }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Gambar</label>
                        <input type="file" name="package_image[]" accept="image/*"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        @if (!empty($package->image))
                            <img src="{{ \App\Models\Service::resolveImageUrl($package->image) }}"
                                class="h-20 mt-2 rounded-lg border" alt="paket">
                        @endif
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Pesan WA</label>
                        <input type="text" name="package_wa_message[]" value="{{ $package->wa_message }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>
                </div>
            </div>
        @empty
            <div class="package-item border border-gray-200 rounded-xl p-4 bg-gray-50">
                <div class="flex justify-between items-center mb-3">
                    <h4 class="font-semibold">Item Paket</h4>
                    <button type="button" class="remove-package text-red-600 text-sm font-semibold">Hapus</button>
                </div>
                <input type="hidden" name="package_id[]" value="">
                <input type="hidden" name="package_old_image[]" value="">
                <div class="grid md:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-medium mb-1">Nama Paket</label>
                        <input type="text" name="package_name[]"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Harga</label>
                        <input type="text" name="package_price[]"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1">Deskripsi</label>
                        <textarea name="package_description[]" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Gambar</label>
                        <input type="file" name="package_image[]" accept="image/*"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Pesan WA</label>
                        <input type="text" name="package_wa_message[]"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <template id="package-template">
        <div class="package-item border border-gray-200 rounded-xl p-4 bg-gray-50">
            <div class="flex justify-between items-center mb-3">
                <h4 class="font-semibold">Item Paket</h4>
                <button type="button" class="remove-package text-red-600 text-sm font-semibold">Hapus</button>
            </div>
            <input type="hidden" name="package_id[]" value="">
            <input type="hidden" name="package_old_image[]" value="">
            <div class="grid md:grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-medium mb-1">Nama Paket</label>
                    <input type="text" name="package_name[]"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Harga</label>
                    <input type="text" name="package_price[]"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-1">Deskripsi</label>
                    <textarea name="package_description[]" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Gambar</label>
                    <input type="file" name="package_image[]" accept="image/*"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Pesan WA</label>
                    <input type="text" name="package_wa_message[]"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
            </div>
        </div>
    </template>

    <div class="md:col-span-2 border-t pt-4 mt-2">
        <h3 class="font-bold text-lg mb-3">Section FAQ (3 Pertanyaan)</h3>
    </div>
    @for ($i = 1; $i <= 3; $i++)
        <div>
            <label class="block text-sm font-medium mb-1">FAQ {{ $i }} - Pertanyaan</label>
            <input type="text" name="faq_{{ $i }}_question"
                value="{{ old('faq_' . $i . '_question', $item->{'faq_' . $i . '_question'} ?? '') }}"
                class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">FAQ {{ $i }} - Jawaban</label>
            <textarea name="faq_{{ $i }}_answer" rows="2"
                class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ old('faq_' . $i . '_answer', $item->{'faq_' . $i . '_answer'} ?? '') }}</textarea>
        </div>
    @endfor

    <div>
        <label class="block text-sm font-medium mb-1">Urutan</label>
        <input type="number" name="sort_order" min="0"
            value="{{ old('sort_order', $item->sort_order ?? 0) }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
    </div>
    <div class="flex items-center gap-2 mt-7">
        <input type="checkbox" name="is_active" value="1"
            {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
        <label class="text-sm">Aktif</label>
    </div>
</div>

<script>
    (function() {
        const list = document.getElementById('package-list');
        const addBtn = document.getElementById('add-package-btn');
        const template = document.getElementById('package-template');

        if (!list || !addBtn || !template) {
            return;
        }

        const bindRemoveButtons = () => {
            list.querySelectorAll('.remove-package').forEach((button) => {
                button.onclick = () => {
                    const items = list.querySelectorAll('.package-item');
                    if (items.length <= 1) {
                        const inputs = items[0].querySelectorAll(
                            'input[type="text"], textarea, input[type="hidden"]');
                        inputs.forEach((input) => {
                            if (input.name === 'package_id[]' || input.name ===
                                'package_old_image[]') {
                                input.value = '';
                            } else {
                                input.value = '';
                            }
                        });

                        const fileInput = items[0].querySelector('input[type="file"]');
                        if (fileInput) {
                            fileInput.value = '';
                        }

                        const preview = items[0].querySelector('img');
                        if (preview) {
                            preview.remove();
                        }

                        return;
                    }

                    button.closest('.package-item')?.remove();
                };
            });
        };

        addBtn.addEventListener('click', () => {
            const clone = template.content.cloneNode(true);
            list.appendChild(clone);
            bindRemoveButtons();
        });

        bindRemoveButtons();
    })();
</script>
