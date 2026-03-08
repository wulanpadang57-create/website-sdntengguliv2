@extends('layouts.admin')
@section('title','Edit Pengumuman')
@section('breadcrumb')<a href="{{ route('admin.announcements.index') }}">Pengumuman</a> / Edit@endsection

@section('content')
<div style="max-width:720px">
<form action="{{ route('admin.announcements.update', $announcement) }}" method="POST">
    @csrf @method('PUT')
    <div style="display:flex;flex-direction:column;gap:1.25rem">
        <div class="card">
            <div class="card-header"><h3><i class="fas fa-bullhorn" style="color:#2aad8c;margin-right:.5rem"></i>Isi Pengumuman</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Judul <span style="color:#ef4444">*</span></label>
                    <input type="text" name="title" class="form-input" value="{{ old('title', $announcement->title) }}" placeholder="Judul pengumuman..." required>
                </div>
                <div class="form-group">
                    <label class="form-label">Konten <span style="color:#ef4444">*</span></label>
                    <textarea name="content" rows="8" class="form-textarea" placeholder="Isi pengumuman..." required>{{ old('content', $announcement->content) }}</textarea>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                    <div class="form-group">
                        <label class="form-label">Prioritas</label>
                        <select name="priority" class="form-select">
                            <option value="normal" {{ $announcement->priority==='normal'?'selected':'' }}>Normal</option>
                            <option value="urgent" {{ $announcement->priority==='urgent'?'selected':'' }}>Urgent</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Publikasi</label>
                        <input type="date" name="published_at" class="form-input" value="{{ old('published_at', $announcement->published_at?->format('Y-m-d')) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label style="display:flex;align-items:center;gap:.6rem;cursor:pointer;font-size:.85rem;font-weight:600;color:#374151">
                        <input type="checkbox" name="is_active" value="1" {{ $announcement->is_active?'checked':'' }} style="width:18px;height:18px;accent-color:#2aad8c">
                        Aktifkan pengumuman ini
                    </label>
                </div>
            </div>
        </div>
        <div style="display:flex;gap:.75rem">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Pengumuman</button>
            <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</form>
</div>
@endsection
