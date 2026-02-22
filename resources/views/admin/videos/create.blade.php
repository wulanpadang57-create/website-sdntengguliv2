@extends('layouts.admin')

@section('title', 'Tambah Video')

@section('content')
<form action="{{ route('admin.videos.store') }}" method="POST" class="max-w-3xl">
    @csrf
    
    <div class="bg-white rounded-lg shadow p-6 space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Judul Video</label>
            <input type="text" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">YouTube Video ID</label>
            <input type="text" name="youtube_id" placeholder="dQw4w9WgXcQ" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            <p class="text-xs text-gray-500 mt-1">Ambil ID dari URL: youtube.com/watch?v=<strong>dQw4w9WgXcQ</strong></p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
        </div>

        <div class="pt-4 space-x-3">
            <button type="submit" class="btn-primary">Simpan Video</button>
            <a href="{{ route('admin.videos.index') }}" class="btn-secondary inline-block">Batal</a>
        </div>
    </div>
</form>
@endsection
