<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        $categories = Category::where('type', 'news')->get();
        $news = News::where('status', 'published')
            ->where('published_at', '<=', now());

        if(request('category')) {
            $category = Category::where('slug', request('category'))->first();
            if($category) {
                $news = $news->where('category_id', $category->id);
            }
        }

        if(request('search')) {
            $news = $news->where(function($q) {
                $q->where('title', 'like', '%'.request('search').'%')
                  ->orWhere('content', 'like', '%'.request('search').'%');
            });
        }

        $news = $news->orderBy('published_at', 'desc')->paginate(9);

        return view('frontend.news.index', compact('news', 'categories'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $news->increment('views');

        $related = News::where('category_id', $news->category_id)
            ->where('id', '!=', $news->id)
            ->where('status', 'published')
            ->limit(3)
            ->get();

        return view('frontend.news.show', compact('news', 'related'));
    }
}
