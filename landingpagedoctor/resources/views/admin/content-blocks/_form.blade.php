@php
    $item = $contentBlock ?? null;
@endphp

<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Key</label>
        <input type="text" name="key" value="{{ old('key', $item->key ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Label</label>
        <input type="text" name="label" value="{{ old('label', $item->label ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1">Type</label>
        <select name="type" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
            @php $selectedType = old('type', $item->type ?? 'text'); @endphp
            <option value="text" {{ $selectedType === 'text' ? 'selected' : '' }}>text</option>
            <option value="textarea" {{ $selectedType === 'textarea' ? 'selected' : '' }}>textarea</option>
            <option value="json" {{ $selectedType === 'json' ? 'selected' : '' }}>json</option>
        </select>
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1">Value</label>
        <textarea name="value" rows="18" class="w-full border border-gray-300 rounded-lg px-3 py-2 font-mono text-sm">{{ old('value', $item->value ?? '') }}</textarea>
    </div>
</div>
