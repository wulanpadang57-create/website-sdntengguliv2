@extends('layouts.admin')
@section('title','Edit Prestasi')
@section('breadcrumb')<a href="{{ route('admin.achievements.index') }}">Prestasi</a> / Edit@endsection

@section('content')
<div style="max-width:720px">
<form action="{{ route('admin.achievements.update', $achievement) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div style="display:flex;flex-direction:column;gap:1.25rem">
        <div class="card">
            <div class="card-header"><h3><i class="fas fa-trophy" style="color:#2aad8c;margin-right:.5rem"></i>Edit Data Prestasi</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Judul Prestasi <span style="color:#ef4444">*</span></label>
                    <input type="text" name="title" class="form-input" value="{{ old('title', $achievement->title) }}" required>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                    <div class="form-group">
                        <label class="form-label">Kategori</label>
                        <select name="category" class="form-select" required>
                            <option value="akademik" {{ old('category', $achievement->category) === 'akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="non-akademik" {{ old('category', $achievement->category) === 'non-akademik' ? 'selected' : '' }}>Non-Akademik</option>
                            <option value="olahraga" {{ old('category', $achievement->category) === 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                            <option value="seni" {{ old('category', $achievement->category) === 'seni' ? 'selected' : '' }}>Seni & Budaya</option>
                            <option value="lainnya" {{ old('category', $achievement->category) === 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tahun</label>
                        <input type="number" name="year" class="form-input" value="{{ old('year', $achievement->year) }}" min="2000" max="{{ date('Y')+1 }}">
                    </div>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                    <div class="form-group">
                        <label class="form-label">Nama Siswa</label>
                        <input type="text" name="student_name" class="form-input" value="{{ old('student_name', $achievement->student_name) }}" placeholder="Nama siswa berprestasi">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Pencapaian</label>
                        <input type="date" name="achievement_date" class="form-input" value="{{ old('achievement_date', $achievement->achievement_date?->format('Y-m-d')) }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" rows="5" class="form-textarea" placeholder="Keterangan tambahan...">{{ old('description', $achievement->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Foto Prestasi</label>
                    @if($achievement->achievement_image)
                    <div style="margin-bottom:.75rem">
                        <img src="{{ asset('storage/'.$achievement->achievement_image) }}" alt="{{ $achievement->title }}" style="width:100%;max-height:180px;object-fit:cover;border-radius:8px">
                        <p style="font-size:.72rem;color:#9ca3af;margin-top:.3rem">Foto saat ini. Upload baru untuk mengganti.</p>
                    </div>
                    @endif
                    <input type="file" name="achievement_image" accept="image/*" class="form-input" data-crop="true" data-crop-ratio="4/3" data-preview-img="imgPreview" data-preview-box="imgPreviewBox">
                    <div id="imgPreviewBox" style="display:none;margin-top:.75rem">
                        <img id="imgPreview" style="width:100%;max-height:180px;object-fit:cover;border-radius:8px">
                    </div>
                </div>
            </div>
        </div>

        <div style="display:flex;gap:.75rem">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Prestasi</button>
            <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</form>
</div>
@endsection
