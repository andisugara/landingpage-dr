<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentBlock;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContentBlockController extends Controller
{
    public function index()
    {
        $blocks = ContentBlock::query()->orderBy('key')->get();

        return view('admin.content-blocks.index', compact('blocks'));
    }

    public function create()
    {
        return view('admin.content-blocks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:content_blocks,key'],
            'label' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', Rule::in(['text', 'textarea', 'json'])],
            'value' => ['nullable', 'string'],
        ]);

        ContentBlock::create($validated);

        return redirect()->route('admin.content-blocks.index')->with('success', 'Konten berhasil ditambahkan.');
    }

    public function edit(ContentBlock $contentBlock)
    {
        return view('admin.content-blocks.edit', compact('contentBlock'));
    }

    public function update(Request $request, ContentBlock $contentBlock)
    {
        $validated = $request->validate([
            'key' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('content_blocks', 'key')->ignore($contentBlock->id)],
            'label' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', Rule::in(['text', 'textarea', 'json'])],
            'value' => ['nullable', 'string'],
        ]);

        $contentBlock->update($validated);

        return redirect()->route('admin.content-blocks.index')->with('success', 'Konten berhasil diperbarui.');
    }

    public function destroy(ContentBlock $contentBlock)
    {
        $contentBlock->delete();

        return redirect()->route('admin.content-blocks.index')->with('success', 'Konten berhasil dihapus.');
    }
}
