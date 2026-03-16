<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::query()->orderBy('sort_order')->get();

        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('admin.promotions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image_file' => ['required', 'image', 'max:4096'],
            'badge' => ['nullable', 'string', 'max:50'],
            'badge_color' => ['required', 'string', 'max:50'],
            'original_price' => ['nullable', 'string', 'max:255'],
            'final_price' => ['nullable', 'string', 'max:255'],
            'wa_message' => ['nullable', 'string'],
            'wa_button_text' => ['required', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['image'] = $request->file('image_file')->store('promotions', 'public');
        unset($validated['image_file']);

        Promotion::create($validated);

        return redirect()->route('admin.promotions.index')->with('success', 'Promo berhasil ditambahkan.');
    }

    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image_file' => ['nullable', 'image', 'max:4096'],
            'badge' => ['nullable', 'string', 'max:50'],
            'badge_color' => ['required', 'string', 'max:50'],
            'original_price' => ['nullable', 'string', 'max:255'],
            'final_price' => ['nullable', 'string', 'max:255'],
            'wa_message' => ['nullable', 'string'],
            'wa_button_text' => ['required', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image_file')) {
            $this->deleteLocalImage($promotion->image);
            $validated['image'] = $request->file('image_file')->store('promotions', 'public');
        }

        unset($validated['image_file']);

        $promotion->update($validated);

        return redirect()->route('admin.promotions.index')->with('success', 'Promo berhasil diperbarui.');
    }

    public function destroy(Promotion $promotion)
    {
        $this->deleteLocalImage($promotion->image);

        $promotion->delete();

        return redirect()->route('admin.promotions.index')->with('success', 'Promo berhasil dihapus.');
    }

    private function deleteLocalImage(?string $path): void
    {
        if (blank($path) || Str::startsWith($path, ['http://', 'https://', '/'])) {
            return;
        }

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
