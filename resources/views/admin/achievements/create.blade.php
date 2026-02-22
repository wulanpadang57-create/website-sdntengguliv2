@extends('layouts.admin')

@section('title', 'Buat Prestasi Baru')

@section('content')
<form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl">
    @csrf
    
    <div class="bg-white rounded-lg shadow p-6 space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Judul Prestasi</label>
            <input type="text" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Kategori</label>
            <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                <option value="">Pilih Kategori</option>
                <option value="akademik">Akademik</option>
                <option value="olahraga">Olahraga</option>
                <option value="seni">Seni</option>
                <option value="lainnya">Lainnya</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Nama Siswa</label>
            <input type="text" name="student_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Gambar Prestasi</label>
            <input type="file" name="achievement_image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Tahun</label>
                <input type="number" name="year" value="{{ date('Y') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Tanggal Pencapaian</label>
                <input type="date" name="achievement_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
        </div>

        <div class="pt-4 space-x-3">
            <button type="submit" class="btn-primary">Simpan Prestasi</button>
            <a href="{{ route('admin.achievements.index') }}" class="btn-secondary inline-block">Batal</a>
        </div>
    </div>
</form>
@endsection
