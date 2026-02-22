@extends('layouts.admin')

@section('title', 'Edit Prestasi')

@section('content')
<form action="{{ route('admin.achievements.update', $achievement) }}" method="POST" enctype="multipart/form-data" class="max-w-3xl">
    @csrf @method('PUT')
    
    <div class="bg-white rounded-lg shadow p-6 space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Judul Prestasi</label>
            <input type="text" name="title" value="{{ $achievement->title }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Kategori</label>
            <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                <option value="akademik" {{ $achievement->category === 'akademik' ? 'selected' : '' }}>Akademik</option>
                <option value="olahraga" {{ $achievement->category === 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                <option value="seni" {{ $achievement->category === 'seni' ? 'selected' : '' }}>Seni</option>
                <option value="lainnya" {{ $achievement->category === 'lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Nama Siswa</label>
            <input type="text" name="student_name" value="{{ $achievement->student_name }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ $achievement->description }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Gambar Prestasi</label>
            @if($achievement->achievement_image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $achievement->achievement_image) }}" alt="{{ $achievement->title }}" class="w-32 h-32 object-cover rounded">
                </div>
            @endif
            <input type="file" name="achievement_image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Tahun</label>
                <input type="number" name="year" value="{{ $achievement->year }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Tanggal Pencapaian</label>
                <input type="date" name="achievement_date" value="{{ $achievement->achievement_date->format('Y-m-d') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
        </div>

        <div class="pt-4 space-x-3">
            <button type="submit" class="btn-primary">Update Prestasi</button>
            <a href="{{ route('admin.achievements.index') }}" class="btn-secondary inline-block">Batal</a>
        </div>
    </div>
</form>
@endsection
