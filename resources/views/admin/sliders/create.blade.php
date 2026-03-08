@extends('layouts.admin')
@section('title','Tambah Slider Baru')
@section('breadcrumb')<a href="{{ route('admin.sliders.index') }}">Slider</a> / Tambah Baru@endsection

@section('content')
<div style="max-width:720px">
<form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display:flex;flex-direction:column;gap:1.25rem">
        <div class="card">
            <div class="card-header"><h3><i class="fas fa-images" style="color:#2aad8c;margin-right:.5rem"></i>Data Slider</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Judul <span style="color:#ef4444">*</span></label>
                    <input type="text" name="title" class="form-input" value="{{ old('title') }}" placeholder="Slide Selamat Datang..." required>
                </div>
                <div class="form-group">
                    <label class="form-label">Caption</label>
                    <input type="text" name="caption" class="form-input" value="{{ old('caption') }}" placeholder="Teks sub-judul...">
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                    <div class="form-group">
                        <label class="form-label">Teks Tombol</label>
                        <input type="text" name="button_text" class="form-input" value="{{ old('button_text') }}" placeholder="Lihat Selengkapnya">
                    </div>
                    <div class="form-group">
                        <label class="form-label">URL Tombol</label>
                        <input type="url" name="button_url" class="form-input" value="{{ old('button_url') }}" placeholder="https://...">
                    </div>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                    <div class="form-group">
                        <label class="form-label">Urutan</label>
                        <input type="number" name="order" class="form-input" value="{{ old('order', 0) }}" min="0">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select name="is_active" class="form-select">
                            <option value="1" selected>Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Gambar Slider <span style="color:#ef4444">*</span></label>
                    <input type="file" name="image" accept="image/*" class="form-input" onchange="previewImg(this)" required>
                    <p style="font-size:.75rem;color:#9ca3af;margin-top:.3rem">Ukuran ideal: 1920×700 px</p>
                    <div id="imgPreviewBox" style="display:none;margin-top:.75rem">
                        <img id="imgPreview" style="width:100%;max-height:220px;object-fit:cover;border-radius:8px">
                    </div>
                </div>
            </div>
        </div>
        <div style="display:flex;gap:.75rem">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Slider</button>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</form>
</div>
@endsection
@push('scripts')
<script>function previewImg(i){if(i.files&&i.files[0]){const r=new FileReader();r.onload=e=>{document.getElementById('imgPreview').src=e.target.result;document.getElementById('imgPreviewBox').style.display='block'};r.readAsDataURL(i.files[0])}}</script>
@endpush
