<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = StaticPage::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.show', compact('page'));
    }
}
