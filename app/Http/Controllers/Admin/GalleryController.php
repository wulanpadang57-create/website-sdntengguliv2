<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('user')->withCount('photos')->latest()->paginate(10);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($validated['name']);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('galleries', 'public');
            $validated['cover_image'] = $path;
        }

        Gallery::create($validated);

        return redirect()->route('admin.galleries.index')->with('success', 'Album galeri berhasil dibuat');
    }

    public function edit(Gallery $gallery)
    {
        $photos = $gallery->photos()->orderBy('order')->get();
        return view('admin.galleries.edit', compact('gallery', 'photos'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        if ($request->hasFile('cover_image')) {
            if ($gallery->cover_image) {
                \Storage::disk('public')->delete($gallery->cover_image);
            }
            $path = $request->file('cover_image')->store('galleries', 'public');
            $validated['cover_image'] = $path;
        }

        $gallery->update($validated);

        return redirect()->route('admin.galleries.index')->with('success', 'Album galeri berhasil diperbarui');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->cover_image) {
            \Storage::disk('public')->delete($gallery->cover_image);
        }
        
        foreach ($gallery->photos as $photo) {
            \Storage::disk('public')->delete($photo->photo);
        }

        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Album galeri berhasil dihapus');
    }

    public function addPhotos(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'photos.*' => 'required|image|max:2048',
            'captions.*' => 'nullable|string',
        ]);

        if ($request->hasFile('photos')) {
            $maxOrder = $gallery->photos()->max('order') ?? 0;

            foreach ($request->file('photos') as $index => $photo) {
                $path = $photo->store('gallery-photos', 'public');
                
                GalleryPhoto::create([
                    'gallery_id' => $gallery->id,
                    'photo' => $path,
                    'caption' => $validated['captions'][$index] ?? null,
                    'order' => $maxOrder + $index + 1,
                ]);
            }
        }

        return redirect()->route('admin.galleries.edit', $gallery)->with('success', 'Foto berhasil ditambahkan');
    }

    public function deletePhoto(GalleryPhoto $photo)
    {
        $gallery_id = $photo->gallery_id;
        \Storage::disk('public')->delete($photo->photo);
        $photo->delete();

        return redirect()->route('admin.galleries.edit', $gallery_id)->with('success', 'Foto berhasil dihapus');
    }
}
