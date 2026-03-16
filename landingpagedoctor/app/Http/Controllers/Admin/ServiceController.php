<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServicePackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()->orderBy('sort_order')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create', [
            'servicePackages' => collect(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:services,slug'],
            'short_description' => ['required', 'string'],
            'hero_title' => ['nullable', 'string', 'max:255'],
            'hero_description' => ['nullable', 'string'],
            'hero_wa_message' => ['nullable', 'string'],
            'hero_image_1' => ['nullable', 'image', 'max:4096'],
            'hero_image_2' => ['nullable', 'image', 'max:4096'],
            'feature_1_title' => ['nullable', 'string', 'max:255'],
            'feature_1_description' => ['nullable', 'string'],
            'feature_2_title' => ['nullable', 'string', 'max:255'],
            'feature_2_description' => ['nullable', 'string'],
            'feature_3_title' => ['nullable', 'string', 'max:255'],
            'feature_3_description' => ['nullable', 'string'],
            'package_id' => ['nullable', 'array'],
            'package_id.*' => ['nullable', 'integer'],
            'package_name' => ['nullable', 'array'],
            'package_name.*' => ['nullable', 'string', 'max:255'],
            'package_description' => ['nullable', 'array'],
            'package_description.*' => ['nullable', 'string'],
            'package_price' => ['nullable', 'array'],
            'package_price.*' => ['nullable', 'string', 'max:255'],
            'package_wa_message' => ['nullable', 'array'],
            'package_wa_message.*' => ['nullable', 'string'],
            'package_old_image' => ['nullable', 'array'],
            'package_old_image.*' => ['nullable', 'string'],
            'package_image' => ['nullable', 'array'],
            'package_image.*' => ['nullable', 'image', 'max:4096'],
            'faq_1_question' => ['nullable', 'string', 'max:255'],
            'faq_1_answer' => ['nullable', 'string'],
            'faq_2_question' => ['nullable', 'string', 'max:255'],
            'faq_2_answer' => ['nullable', 'string'],
            'faq_3_question' => ['nullable', 'string', 'max:255'],
            'faq_3_answer' => ['nullable', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        unset(
            $validated['hero_image_1'],
            $validated['hero_image_2'],
            $validated['package_id'],
            $validated['package_name'],
            $validated['package_description'],
            $validated['package_price'],
            $validated['package_wa_message'],
            $validated['package_old_image'],
            $validated['package_image']
        );

        $validated = $this->handleImages($request, $validated);

        $service = Service::create($validated);
        $this->syncPackages($request, $service);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', [
            'service' => $service,
            'servicePackages' => $service->packages,
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('services', 'slug')->ignore($service->id)],
            'short_description' => ['required', 'string'],
            'hero_title' => ['nullable', 'string', 'max:255'],
            'hero_description' => ['nullable', 'string'],
            'hero_wa_message' => ['nullable', 'string'],
            'hero_image_1' => ['nullable', 'image', 'max:4096'],
            'hero_image_2' => ['nullable', 'image', 'max:4096'],
            'feature_1_title' => ['nullable', 'string', 'max:255'],
            'feature_1_description' => ['nullable', 'string'],
            'feature_2_title' => ['nullable', 'string', 'max:255'],
            'feature_2_description' => ['nullable', 'string'],
            'feature_3_title' => ['nullable', 'string', 'max:255'],
            'feature_3_description' => ['nullable', 'string'],
            'package_id' => ['nullable', 'array'],
            'package_id.*' => ['nullable', 'integer'],
            'package_name' => ['nullable', 'array'],
            'package_name.*' => ['nullable', 'string', 'max:255'],
            'package_description' => ['nullable', 'array'],
            'package_description.*' => ['nullable', 'string'],
            'package_price' => ['nullable', 'array'],
            'package_price.*' => ['nullable', 'string', 'max:255'],
            'package_wa_message' => ['nullable', 'array'],
            'package_wa_message.*' => ['nullable', 'string'],
            'package_old_image' => ['nullable', 'array'],
            'package_old_image.*' => ['nullable', 'string'],
            'package_image' => ['nullable', 'array'],
            'package_image.*' => ['nullable', 'image', 'max:4096'],
            'faq_1_question' => ['nullable', 'string', 'max:255'],
            'faq_1_answer' => ['nullable', 'string'],
            'faq_2_question' => ['nullable', 'string', 'max:255'],
            'faq_2_answer' => ['nullable', 'string'],
            'faq_3_question' => ['nullable', 'string', 'max:255'],
            'faq_3_answer' => ['nullable', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        unset(
            $validated['hero_image_1'],
            $validated['hero_image_2'],
            $validated['package_id'],
            $validated['package_name'],
            $validated['package_description'],
            $validated['package_price'],
            $validated['package_wa_message'],
            $validated['package_old_image'],
            $validated['package_image']
        );

        $validated = $this->handleImages($request, $validated, $service);

        $service->update($validated);
        $this->syncPackages($request, $service);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        foreach (['hero_image_1', 'hero_image_2'] as $field) {
            $this->deleteLocalImage($service->{$field});
        }

        foreach ($service->packages as $package) {
            $this->deleteLocalImage($package->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus.');
    }

    private function handleImages(Request $request, array $validated, ?Service $service = null): array
    {
        $imageFields = ['hero_image_1', 'hero_image_2'];

        foreach ($imageFields as $field) {
            if (! $request->hasFile($field)) {
                continue;
            }

            if ($service) {
                $this->deleteLocalImage($service->{$field});
            }

            $validated[$field] = $request->file($field)->store('services', 'public');
        }

        return $validated;
    }

    private function syncPackages(Request $request, Service $service): void
    {
        $rows = [];
        $names = $request->input('package_name', []);
        $descriptions = $request->input('package_description', []);
        $prices = $request->input('package_price', []);
        $waMessages = $request->input('package_wa_message', []);
        $oldImages = $request->input('package_old_image', []);
        $ids = $request->input('package_id', []);
        $images = $request->file('package_image', []);

        foreach ($names as $index => $name) {
            if (blank($name) && blank($descriptions[$index] ?? null) && blank($prices[$index] ?? null)) {
                continue;
            }

            $currentImage = $oldImages[$index] ?? null;

            if (isset($images[$index])) {
                $this->deleteLocalImage($currentImage);
                $currentImage = $images[$index]->store('services/packages', 'public');
            }

            $rows[] = [
                'id' => $ids[$index] ?? null,
                'name' => $name,
                'description' => $descriptions[$index] ?? null,
                'price' => $prices[$index] ?? null,
                'wa_message' => $waMessages[$index] ?? null,
                'image' => $currentImage,
                'sort_order' => count($rows) + 1,
            ];
        }

        $existingPackages = $service->packages()->get()->keyBy('id');
        $keptIds = collect($rows)->pluck('id')->filter()->map(fn($id) => (int) $id)->values();

        foreach ($existingPackages as $existingId => $package) {
            if ($keptIds->contains((int) $existingId)) {
                continue;
            }

            $this->deleteLocalImage($package->image);
            $package->delete();
        }

        foreach ($rows as $row) {
            if (! empty($row['id']) && $existingPackages->has((int) $row['id'])) {
                $existingPackages[(int) $row['id']]->update([
                    'name' => $row['name'],
                    'description' => $row['description'],
                    'price' => $row['price'],
                    'wa_message' => $row['wa_message'],
                    'image' => $row['image'],
                    'sort_order' => $row['sort_order'],
                ]);

                continue;
            }

            ServicePackage::create([
                'service_id' => $service->id,
                'name' => $row['name'],
                'description' => $row['description'],
                'price' => $row['price'],
                'wa_message' => $row['wa_message'],
                'image' => $row['image'],
                'sort_order' => $row['sort_order'],
            ]);
        }
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
