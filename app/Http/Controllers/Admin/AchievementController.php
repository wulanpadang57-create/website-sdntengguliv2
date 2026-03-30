<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::with('user')->latest()->paginate(10);
        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:akademik,non-akademik,olahraga,seni,lainnya',
            'student_name' => 'nullable|string',
            'achievement_image' => 'nullable|image|max:2048',
            'year' => 'required|integer|min:2000',
            'achievement_date' => 'required|date',
        ]);

        $validated['user_id'] = auth()->id();

        if ($request->hasFile('achievement_image')) {
            $path = $request->file('achievement_image')->store('achievements', 'public');
            $validated['achievement_image'] = $path;
        }

        Achievement::create($validated);

        return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil dibuat');
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:akademik,non-akademik,olahraga,seni,lainnya',
            'student_name' => 'nullable|string',
            'achievement_image' => 'nullable|image|max:2048',
            'year' => 'required|integer|min:2000',
            'achievement_date' => 'required|date',
        ]);

        if ($request->hasFile('achievement_image')) {
            if ($achievement->achievement_image) {
                \Storage::disk('public')->delete($achievement->achievement_image);
            }
            $path = $request->file('achievement_image')->store('achievements', 'public');
            $validated['achievement_image'] = $path;
        }

        $achievement->update($validated);

        return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function destroy(Achievement $achievement)
    {
        if ($achievement->achievement_image) {
            \Storage::disk('public')->delete($achievement->achievement_image);
        }
        $achievement->delete();
        return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil dihapus');
    }
}
