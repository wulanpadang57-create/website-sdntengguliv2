<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $extracurriculars = Extracurricular::where('status', 'published')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('frontend.extracurriculars.index', compact('extracurriculars'));
    }

    public function show($slug)
    {
        $extracurricular = Extracurricular::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $extracurricular->increment('views');

        $related = Extracurricular::where('id', '!=', $extracurricular->id)
            ->where('status', 'published')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('frontend.extracurriculars.show', compact('extracurricular', 'related'));
    }
}
