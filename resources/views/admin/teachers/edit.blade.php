@extends('layouts.admin')
@section('title','Edit Data Guru')
@section('breadcrumb')<a href="{{ route('admin.teachers.index') }}">Guru & Staff</a> / Edit@endsection

@section('content')
<div style="max-width:720px">
<form action="{{ route('admin.teachers.update', $teacher) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div style="display:flex;flex-direction:column;gap:1.25rem">
        <div class="card">
            <div class="card-header"><h3><i class="fas fa-chalkboard-teacher" style="color:#2aad8c;margin-right:.5rem"></i>Data Guru / Staff</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap <span style="color:#ef4444">*</span></label>
                    <input type="text" name="name" class="form-input" value="{{ old('name', $teacher->name) }}" required>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                    <div class="form-group">
                        <label class="form-label">NIP</label>
                        <input type="text" name="nip" class="form-input" value="{{ old('nip', $teacher->nip) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jabatan / Posisi</label>
                        <input type="text" name="position" class="form-input" value="{{ old('position', $teacher->position) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Mata Pelajaran</label>
                    <input type="text" name="subjects" class="form-input" value="{{ old('subjects', $teacher->subjects) }}" placeholder="Pisahkan dengan koma">
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-input" value="{{ old('email', $teacher->email) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" name="phone" class="form-input" value="{{ old('phone', $teacher->phone) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Bio / Tentang</label>
                    <textarea name="bio" rows="4" class="form-textarea">{{ old('bio', $teacher->bio) }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Foto</label>
                    @if($teacher->photo)
                    <div style="margin-bottom:.75rem;display:flex;align-items:center;gap:1rem">
                        <img src="{{ asset('storage/'.$teacher->photo) }}" style="width:80px;height:80px;object-fit:cover;border-radius:50%;border:3px solid #2aad8c">
                        <div>
                            <p style="font-size:.8rem;font-weight:600;color:#374151">Foto saat ini</p>
                            <p style="font-size:.72rem;color:#9ca3af">Upload baru untuk mengganti</p>
                        </div>
                    </div>
                    @endif
                    <input type="file" name="photo" accept="image/*" class="form-input" onchange="previewImg(this)">
                    <div id="imgPreviewBox" style="display:none;margin-top:.75rem">
                        <img id="imgPreview" style="width:80px;height:80px;object-fit:cover;border-radius:50%;border:3px solid #2aad8c">
                    </div>
                </div>
            </div>
        </div>
        <div style="display:flex;gap:.75rem">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Data Guru</button>
            <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</form>
</div>
@endsection
@push('scripts')
<script>function previewImg(i){if(i.files&&i.files[0]){const r=new FileReader();r.onload=e=>{document.getElementById('imgPreview').src=e.target.result;document.getElementById('imgPreviewBox').style.display='block'};r.readAsDataURL(i.files[0])}}</script>
@endpush
