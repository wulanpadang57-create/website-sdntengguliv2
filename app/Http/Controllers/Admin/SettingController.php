<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'school_name' => 'required|string|max:255',
            'school_address' => 'required|string',
            'school_phone' => 'required|string|max:20',
            'school_email' => 'required|email',
            'school_logo' => 'nullable|image|max:2048',
            'principal_name' => 'nullable|string|max:255',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
        ]);

        foreach ($validated as $key => $value) {
            if ($key !== 'school_logo') {
                Setting::put($key, $value);
            }
        }

        if ($request->hasFile('school_logo')) {
            $oldLogo = Setting::get('school_logo');
            if ($oldLogo) {
                \Storage::disk('public')->delete($oldLogo);
            }
            $path = $request->file('school_logo')->store('logo', 'public');
            Setting::put('school_logo', $path);
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui');
    }
}
