@extends('layouts.admin')

@section('title', 'Edit Pengumuman')

@section('content')
<form action="{{ route('admin.announcements.update', $announcement) }}" method="POST" class="max-w-3xl">
    @csrf @method('PUT')
    
    <div class="bg-white rounded-lg shadow p-6 space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Judul</label>
            <input type="text" name="title" value="{{ $announcement->title }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Konten</label>
            <textarea name="content" rows="8" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>{{ $announcement->content }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Prioritas</label>
                <select name="priority" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="normal" {{ $announcement->priority === 'normal' ? 'selected' : '' }}>Normal</option>
                    <option value="urgent" {{ $announcement->priority === 'urgent' ? 'selected' : '' }}>Urgent</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Aktif</label>
                <input type="checkbox" name="is_active" value="1" {{ $announcement->is_active ? 'checked' : '' }} class="w-6 h-6">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Tanggal Publikasi</label>
            <input type="date" name="published_at" value="{{ $announcement->published_at?->format('Y-m-d') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="pt-4 space-x-3">
            <button type="submit" class="btn-primary">Update Pengumuman</button>
            <a href="{{ route('admin.announcements.index') }}" class="btn-secondary inline-block">Batal</a>
        </div>
    </div>
</form>
@endsection
