@extends('layouts.admin')
@section('title','Tambah Prestasi Baru')
@section('breadcrumb')<a href="{{ route('admin.achievements.index') }}">Prestasi</a> / Tambah Baru@endsection

@section('content')
<div style="max-width:720px">
<form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display:flex;flex-direction:column;gap:1.25rem">
        <div class="card">
            <div class="card-header"><h3><i class="fas fa-trophy" style="color:#2aad8c;margin-right:.5rem"></i>Data Prestasi</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Judul Prestasi <span style="color:#ef4444">*</span></label>
                    <input type="text" name="title" class="form-input" value="{{ old('title') }}" placeholder="Juara 1 Olimpiade Sains..." required>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                    <div class="form-group">
                        <label class="form-label">Kategori</label>
                        <select name="category" class="form-select">
                            <option value="akademik" {{ old('category')==='akademik'?'selected':'' }}>Akademik</option>
                            <option value="non-akademik" {{ old('category')==='non-akademik'?'selected':'' }}>Non-Akademik</option>
                            <option value="olahraga" {{ old('category')==='olahraga'?'selected':'' }}>Olahraga</option>
                            <option value="seni" {{ old('category')==='seni'?'selected':'' }}>Seni &amp; Budaya</option>
                            <option value="lainnya" {{ old('category')==='lainnya'?'selected':'' }}>Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tahun</label>
                        <input type="number" name="year" class="form-input" value="{{ old('year', date('Y')) }}" min="2000" max="{{ date('Y')+1 }}">
                    </div>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                    <div class="form-group">
                        <label class="form-label">Nama Siswa</label>
                        <input type="text" name="student_name" class="form-input" value="{{ old('student_name') }}" placeholder="Nama siswa berprestasi">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Prestasi</label>
                        <input type="date" name="achievement_date" class="form-input" value="{{ old('achievement_date') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" rows="5" class="form-textarea" placeholder="Keterangan tambahan...">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Foto Prestasi</label>
                    <input type="file" name="achievement_image" accept="image/*" class="form-input" onchange="previewImg(this)">
                    <div id="imgPreviewBox" style="display:none;margin-top:.75rem">
                        <img id="imgPreview" style="width:100%;max-height:180px;object-fit:cover;border-radius:8px">
                    </div>
                </div>
            </div>
        </div>
        <div style="display:flex;gap:.75rem">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Prestasi</button>
            <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</form>
</div>
@endsection
@push('scripts')
<script>function previewImg(i){if(i.files&&i.files[0]){const r=new FileReader();r.onload=e=>{document.getElementById('imgPreview').src=e.target.result;document.getElementById('imgPreviewBox').style.display='block'};r.readAsDataURL(i.files[0])}}</script>
@endpush
@push('scripts')
<script>function previewImg(i){if(i.files&&i.files[0]){const r=new FileReader();r.onload=e=>{document.getElementById('imgPreview').src=e.target.result;document.getElementById('imgPreviewBox').style.display='block'};r.readAsDataURL(i.files[0])}}</script>
@endpush
