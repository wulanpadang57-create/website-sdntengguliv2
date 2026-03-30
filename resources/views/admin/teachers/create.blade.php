@extends('layouts.admin')
@section('title','Tambah Guru Baru')
@section('breadcrumb')<a href="{{ route('admin.teachers.index') }}">Guru & Staff</a> / Tambah Baru@endsection

@section('content')
<div style="max-width:720px">
<form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display:flex;flex-direction:column;gap:1.25rem">
        <div class="card">
            <div class="card-header"><h3><i class="fas fa-chalkboard-teacher" style="color:#2aad8c;margin-right:.5rem"></i>Data Guru / Staff</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap <span style="color:#ef4444">*</span></label>
                    <input type="text" name="name" class="form-input" value="{{ old('name') }}" placeholder="Nama lengkap..." required>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                    <div class="form-group">
                        <label class="form-label">NIP</label>
                        <input type="text" name="nip" class="form-input" value="{{ old('nip') }}" placeholder="NIP (opsional)">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jabatan / Posisi</label>
                        <input type="text" name="position" class="form-input" value="{{ old('position') }}" placeholder="Guru Matematika, Kepala Sekolah...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Mata Pelajaran</label>
                    <input type="text" name="subjects" class="form-input" value="{{ old('subjects') }}" placeholder="Matematika, IPA (pisahkan dengan koma)">
                    <p style="font-size:.75rem;color:#9ca3af;margin-top:.3rem">Pisahkan dengan koma jika lebih dari satu</p>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-input" value="{{ old('email') }}" placeholder="email@sdntengguli.sch.id">
                    </div>
                    <div class="form-group">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" name="phone" class="form-input" value="{{ old('phone') }}" placeholder="08xx-xxxx-xxxx">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Bio / Tentang</label>
                    <textarea name="bio" rows="4" class="form-textarea" placeholder="Deskripsi singkat tentang guru...">{{ old('bio') }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Foto</label>
                    <input type="file" name="photo" accept="image/*" class="form-input" data-crop="true" data-crop-ratio="1/1" data-preview-img="imgPreview" data-preview-box="imgPreviewBox">
                    <div id="imgPreviewBox" style="display:none;margin-top:.75rem">
                        <img id="imgPreview" style="width:120px;height:120px;object-fit:cover;border-radius:50%;border:3px solid #2aad8c">
                    </div>
                </div>
            </div>
        </div>
        <div style="display:flex;gap:.75rem">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Data Guru</button>
            <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</form>
</div>
@endsection
