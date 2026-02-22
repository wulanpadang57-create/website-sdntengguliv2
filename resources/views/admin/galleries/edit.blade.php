@extends('layouts.admin')

@section('title', 'Edit Album Galeri')

@section('content')
<div class="grid grid-cols-2 gap-8">
    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        
        <div class="bg-white rounded-lg shadow p-6 space-y-6">
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Nama Album</label>
                <input type="text" name="name" value="{{ $gallery->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ $gallery->description }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Cover Gambar</label>
                @if($gallery->cover_image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $gallery->cover_image) }}" alt="{{ $gallery->name }}" class="w-32 h-32 object-cover rounded">
                    </div>
                @endif
                <input type="file" name="cover_image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div class="pt-4 space-x-3">
                <button type="submit" class="btn-primary">Update Album</button>
                <a href="{{ route('admin.galleries.index') }}" class="btn-secondary inline-block">Batal</a>
            </div>
        </div>
    </form>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Tambah Foto</h3>
        <form action="{{ route('admin.galleries.add-photos', $gallery) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Pilih Foto</label>
                <input type="file" name="photos[]" multiple accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>

            <button type="submit" class="btn-primary w-full">Tambah Foto</button>
        </form>

        <div class="mt-6">
            <h4 class="font-semibold text-gray-900 mb-4">Foto ({{ $photos->count() }})</h4>
            <div class="space-y-2 max-h-96 overflow-y-auto">
                @foreach($photos as $photo)
                    <div class="flex items-center justify-between bg-gray-50 p-3 rounded">
                        <span class="text-sm text-gray-600">{{ basename($photo->photo) }}</span>
                        <form method="POST" action="{{ route('admin.gallery-photos.delete', $photo) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus?')" class="text-red-600 text-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
