@extends('layouts.admin')

@section('title', 'Edit Guru')

@section('content')
<form action="{{ route('admin.teachers.update', $teacher) }}" method="POST" enctype="multipart/form-data" class="max-w-3xl">
    @csrf @method('PUT')
    
    <div class="bg-white rounded-lg shadow p-6 space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Nama</label>
            <input type="text" name="name" value="{{ $teacher->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Email</label>
                <input type="email" name="email" value="{{ $teacher->email }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Telepon</label>
                <input type="text" name="phone" value="{{ $teacher->phone }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">NIP</label>
                <input type="text" name="nip" value="{{ $teacher->nip }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Posisi</label>
                <select name="position" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    <option value="Guru" {{ $teacher->position === 'Guru' ? 'selected' : '' }}>Guru</option>
                    <option value="Kepala Sekolah" {{ $teacher->position === 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                    <option value="Wakil Kepala" {{ $teacher->position === 'Wakil Kepala' ? 'selected' : '' }}>Wakil Kepala</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Mata Pelajaran (pisahkan dengan koma)</label>
            <input type="text" name="subjects" value="{{ $teacher->subjects }}" placeholder="Matematika, IPA, IPS" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Biografi</label>
            <textarea name="bio" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ $teacher->bio }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Foto</label>
            @if($teacher->photo)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}" class="w-32 h-32 object-cover rounded">
                </div>
            @endif
            <input type="file" name="photo" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="pt-4 space-x-3">
            <button type="submit" class="btn-primary">Update Guru</button>
            <a href="{{ route('admin.teachers.index') }}" class="btn-secondary inline-block">Batal</a>
        </div>
    </div>
</form>
@endsection
