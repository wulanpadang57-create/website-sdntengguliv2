@extends('layouts.admin')
@section('title','Buat Ekstrakurikuler Baru')
@section('breadcrumb')<a href="{{ route('admin.extracurriculars.index') }}">Ekstrakurikuler</a> / Buat Baru@endsection

@section('content')
<form action="{{ route('admin.extracurriculars.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display:grid;grid-template-columns:1fr 320px;gap:1.25rem;align-items:start">
        <div style="display:flex;flex-direction:column;gap:1.25rem">
            <div class="card">
                <div class="card-header"><h3><i class="fas fa-pen" style="color:#2aad8c;margin-right:.5rem"></i>Konten Ekstrakurikuler</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Judul Kegiatan <span style="color:#ef4444">*</span></label>
                        <input type="text" name="title" class="form-input" placeholder="Masukkan judul dokumentasi..." value="{{ old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Konten / Deskripsi <span style="color:#ef4444">*</span></label>
                        <textarea name="content" rows="14" class="form-textarea" required>{{ old('content') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div style="display:flex;flex-direction:column;gap:1.25rem">
            <div class="card">
                <div class="card-header"><h3><i class="fas fa-cog" style="color:#2aad8c;margin-right:.5rem"></i>Pengaturan</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="draft" {{ old('status')=='draft'?'selected':'' }}>Draft</option>
                            <option value="published" {{ old('status')=='published'?'selected':'' }}>Publish</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Publikasi</label>
                        <input type="date" name="published_at" class="form-input" value="{{ old('published_at', date('Y-m-d')) }}">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h3><i class="fas fa-image" style="color:#2aad8c;margin-right:.5rem"></i>Gambar Dokumentasi</h3></div>
                <div class="card-body">
                    <div id="imgPreviewBox" style="display:none;margin-bottom:1rem">
                        <img id="imgPreview" style="width:100%;border-radius:8px;object-fit:cover;max-height:160px">
                    </div>
                    <input type="file" name="featured_image" accept="image/*" class="form-input" data-crop="true" data-crop-ratio="16/9" data-preview-img="imgPreview" data-preview-box="imgPreviewBox">
                    <p style="font-size:.75rem;color:#9ca3af;margin-top:.5rem">JPG, PNG, WebP. Maks 2MB</p>
                </div>
            </div>

            <div style="display:flex;gap:.75rem">
                <button type="submit" class="btn btn-primary" style="flex:1;justify-content:center"><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('admin.extracurriculars.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>
@endsection
