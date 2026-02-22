<?php

namespace App\Http\Controllers;

use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('position')->get();

        $kepala_sekolah = $teachers->where('position', 'Kepala Sekolah')->first();
        $wakil_kepala = $teachers->where('position', 'Wakil Kepala');
        $guru = $teachers->where('position', 'Guru');

        return view('frontend.teachers.index', compact('kepala_sekolah', 'wakil_kepala', 'guru'));
    }
}
