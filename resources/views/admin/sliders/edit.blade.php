@extends('layouts.admin')

@section('title', 'Edit Banner')

@section('content')
<form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data" class="max-w-3xl">
    @csrf @method('PUT')
    
    <div class="bg-white rounded-lg shadow p-6 space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Judul (Opsional)</label>
            <input type="text" name="title" value="{{ $slider->title }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Gambar Banner</label>
            @if($slider->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" class="w-full h-64 object-cover rounded">
                </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Caption (Opsional)</label>
            <textarea name="caption" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ $slider->caption }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Teks Tombol (Opsional)</label>
                <input type="text" name="button_text" value="{{ $slider->button_text }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">URL Tombol (Opsional)</label>
                <input type="url" name="button_url" value="{{ $slider->button_url }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Aktif</label>
            <input type="checkbox" name="is_active" value="1" {{ $slider->is_active ? 'checked' : '' }}> Tampilkan banner ini
        </div>

        <div class="pt-4 space-x-3">
            <button type="submit" class="btn-primary">Update Banner</button>
            <a href="{{ route('admin.sliders.index') }}" class="btn-secondary inline-block">Batal</a>
        </div>
    </div>
</form>
@endsection
