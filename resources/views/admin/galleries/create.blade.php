@extends('layouts.admin')

@section('title', 'Buat Album Baru')

@section('content')
<form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl">
    @csrf
    
    <div class="bg-white rounded-lg shadow p-6 space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Nama Album</label>
            <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Cover Gambar</label>
            <input type="file" name="cover_image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="pt-4 space-x-3">
            <button type="submit" class="btn-primary">Buat Album</button>
            <a href="{{ route('admin.galleries.index') }}" class="btn-secondary inline-block">Batal</a>
        </div>
    </div>
</form>
@endsection
