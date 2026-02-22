<?php

namespace App\Http\Controllers;

use App\Models\Achievement;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::orderBy('achievement_date', 'desc')
            ->paginate(12);

        $achievements_by_category = Achievement::all()
            ->groupBy('category');

        return view('frontend.achievements.index', compact('achievements', 'achievements_by_category'));
    }

    public function filter($category)
    {
        $achievements = Achievement::where('category', $category)
            ->orderBy('achievement_date', 'desc')
            ->paginate(12);

        $achievements_by_category = Achievement::all()
            ->groupBy('category');

        return view('frontend.achievements.index', compact('achievements', 'achievements_by_category'));
    }
}
