@extends('layouts.admin')
@section('title','Buat Album Baru')
@section('breadcrumb')<a href="{{ route('admin.galleries.index') }}">Galeri</a> / Buat Album@endsection

@section('content')
<div style="max-width:720px">
<form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display:flex;flex-direction:column;gap:1.25rem">
        <div class="card">
            <div class="card-header"><h3><i class="fas fa-images" style="color:#2aad8c;margin-right:.5rem"></i>Informasi Album</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Nama Album <span style="color:#ef4444">*</span></label>
                    <input type="text" name="name" class="form-input" value="{{ old('name') }}" placeholder="Kegiatan Upacara, Pesta Perpisahan..." required>
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" rows="4" class="form-textarea" placeholder="Deskripsi singkat album...">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Urutan (Tampilkan)</label>
                    <input type="number" name="order" class="form-input" value="{{ old('order', 0) }}" min="0">
                    <p style="font-size:.75rem;color:#9ca3af;margin-top:.3rem">Angka lebih kecil tampil lebih awal</p>
                </div>
                <div class="form-group">
                    <label class="form-label">Cover Album</label>
                    <input type="file" name="cover_image" accept="image/*" class="form-input" data-crop="true" data-crop-ratio="4/3" data-preview-img="imgPreview" data-preview-box="imgPreviewBox">
                    <div id="imgPreviewBox" style="display:none;margin-top:.75rem">
                        <img id="imgPreview" style="width:100%;max-height:200px;object-fit:cover;border-radius:8px">
                    </div>
                </div>
            </div>
        </div>
        <div style="display:flex;gap:.75rem">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Buat Album</button>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</form>
</div>
@endsection
