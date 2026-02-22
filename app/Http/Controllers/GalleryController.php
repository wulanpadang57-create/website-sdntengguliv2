<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('order')->paginate(12);
        return view('frontend.gallery.index', compact('galleries'));
    }

    public function show($slug)
    {
        $gallery = Gallery::where('slug', $slug)->firstOrFail();
        $photos = $gallery->photos()->orderBy('order')->get();

        return view('frontend.gallery.show', compact('gallery', 'photos'));
    }
}
