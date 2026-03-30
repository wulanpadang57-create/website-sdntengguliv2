<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Announcement;
use App\Models\Achievement;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\Teacher;
use App\Models\Visitor;
use App\Models\Extracurricular;

class HomeController extends Controller
{
    public function index()
    {
        // Log visitor
        Visitor::create([
            'ip_address' => request()->ip(),
            'page' => '/',
            'user_agent' => request()->header('User-Agent'),
            'referrer' => request()->header('Referer'),
        ]);

        $sliders = Slider::where('is_active', true)->orderBy('order')->get();
        $announcements = Announcement::where('is_active', true)
            ->where('published_at', '<=', now())
            ->where(function($q) {
                $q->whereNull('expired_at')->orWhere('expired_at', '>=', now());
            })
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();
        $recentNews = News::where('status', 'published')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->limit(6)
            ->get();
        $achievements = Achievement::orderBy('achievement_date', 'desc')
            ->limit(6)
            ->get();
        $teachers = Teacher::limit(3)->get();
        $extracurriculars = Extracurricular::where('status', 'published')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->limit(6)
            ->get();

        $heroStats = [
            'teachers'     => Teacher::count(),
            'achievements' => Achievement::count(),
            'news'         => News::where('status','published')->count(),
            'galleries'    => Gallery::count(),
        ];

        return view('frontend.index', compact('sliders', 'announcements', 'recentNews', 'achievements', 'teachers', 'heroStats', 'extracurriculars'));
    }
}
