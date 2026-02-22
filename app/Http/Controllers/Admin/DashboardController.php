<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Announcement;
use App\Models\Achievement;
use App\Models\Visitor;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $total_news = News::count();
        $total_announcements = Announcement::count();
        $total_achievements = Achievement::count();
        $total_visitors = Visitor::count();

        $visitors_today = Visitor::whereDate('created_at', today())->count();
        $news_this_month = News::whereMonth('created_at', now()->month)->count();

        $recent_news = News::latest()->limit(5)->get();
        $recent_announcements = Announcement::latest()->limit(5)->get();

        return view('admin.dashboard', compact(
            'total_news',
            'total_announcements',
            'total_achievements',
            'total_visitors',
            'visitors_today',
            'news_this_month',
            'recent_news',
            'recent_announcements'
        ));
    }
}
