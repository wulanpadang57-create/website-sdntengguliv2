<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->paginate(10);
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:teachers',
            'phone' => 'nullable|string|max:20',
            'nip' => 'nullable|string|unique:teachers',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'position' => 'required|in:Guru,Kepala Sekolah,Wakil Kepala',
            'subjects' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('teachers', 'public');
            $validated['photo'] = $path;
        }

        Teacher::create($validated);

        return redirect()->route('admin.teachers.index')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'nullable|string|max:20',
            'nip' => 'nullable|string|unique:teachers,nip,' . $teacher->id,
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'position' => 'required|in:Guru,Kepala Sekolah,Wakil Kepala',
            'subjects' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            if ($teacher->photo) {
                \Storage::disk('public')->delete($teacher->photo);
            }
            $path = $request->file('photo')->store('teachers', 'public');
            $validated['photo'] = $path;
        }

        $teacher->update($validated);

        return redirect()->route('admin.teachers.index')->with('success', 'Data guru berhasil diperbarui');
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->photo) {
            \Storage::disk('public')->delete($teacher->photo);
        }
        $teacher->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'Data guru berhasil dihapus');
    }
}
