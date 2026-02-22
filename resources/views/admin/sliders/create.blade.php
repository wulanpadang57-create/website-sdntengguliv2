@extends('layouts.admin')

@section('title', 'Tambah Banner')

@section('content')
<form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl">
    @csrf
    
    <div class="bg-white rounded-lg shadow p-6 space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Judul (Opsional)</label>
            <input type="text" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Gambar Banner <span class="text-red-600">*</span></label>
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Caption (Opsional)</label>
            <textarea name="caption" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Teks Tombol (Opsional)</label>
                <input type="text" name="button_text" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">URL Tombol (Opsional)</label>
                <input type="url" name="button_url" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Aktif</label>
            <input type="checkbox" name="is_active" value="1" checked> Tampilkan banner ini
        </div>

        <div class="pt-4 space-x-3">
            <button type="submit" class="btn-primary">Simpan Banner</button>
            <a href="{{ route('admin.sliders.index') }}" class="btn-secondary inline-block">Batal</a>
        </div>
    </div>
</form>
@endsection
