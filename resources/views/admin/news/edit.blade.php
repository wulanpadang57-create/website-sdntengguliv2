@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="max-w-3xl">
    @csrf @method('PUT')
    
    <div class="bg-white rounded-lg shadow p-6 space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Judul</label>
            <input type="text" name="title" value="{{ $news->title }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Kategori</label>
            <select name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $news->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Konten</label>
            <textarea name="content" rows="10" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" required>{{ $news->content }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Gambar Unggulan</label>
            @if($news->featured_image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $news->featured_image) }}" alt="{{ $news->title }}" class="w-32 h-32 object-cover rounded">
                </div>
            @endif
            <input type="file" name="featured_image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Status</label>
                <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    <option value="draft" {{ $news->status === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $news->status === 'published' ? 'selected' : '' }}>Publish</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Tanggal Publikasi</label>
                <input type="date" name="published_at" value="{{ $news->published_at?->format('Y-m-d') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
            </div>
        </div>

        <div class="pt-4 space-x-3">
            <button type="submit" class="btn-primary">Update Berita</button>
            <a href="{{ route('admin.news.index') }}" class="btn-secondary inline-block">Batal</a>
        </div>
    </div>
</form>
@endsection
