@extends('layouts.admin')
@section('title','Edit Berita')
@section('breadcrumb')<a href="{{ route('admin.news.index') }}">Berita</a> / Edit@endsection

@section('content')
<form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div style="display:grid;grid-template-columns:1fr 320px;gap:1.25rem;align-items:start">

        <div style="display:flex;flex-direction:column;gap:1.25rem">
            <div class="card">
                <div class="card-header"><h3><i class="fas fa-pen" style="color:#2aad8c;margin-right:.5rem"></i>Konten Berita</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Judul Berita <span style="color:#ef4444">*</span></label>
                        <input type="text" name="title" class="form-input" value="{{ old('title', $news->title) }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Konten / Isi Berita <span style="color:#ef4444">*</span></label>
                        <textarea name="content" rows="14" class="form-textarea" required>{{ old('content', $news->content) }}</textarea>
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
                            <option value="draft" {{ $news->status==='draft'?'selected':'' }}>Draft</option>
                            <option value="published" {{ $news->status==='published'?'selected':'' }}>Publish</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Publikasi</label>
                        <input type="date" name="published_at" class="form-input" value="{{ old('published_at', $news->published_at?->format('Y-m-d')) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kategori</label>
                        <select name="category_id" class="form-select">
                            <option value="">-- Tanpa Kategori --</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $news->category_id==$cat->id?'selected':'' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><h3><i class="fas fa-image" style="color:#2aad8c;margin-right:.5rem"></i>Gambar Unggulan</h3></div>
                <div class="card-body">
                    @if($news->featured_image)
                    <div style="margin-bottom:1rem">
                        <img src="{{ asset('storage/'.$news->featured_image) }}" style="width:100%;border-radius:8px;object-fit:cover;max-height:160px">
                        <p style="font-size:.72rem;color:#9ca3af;margin-top:.35rem">Gambar saat ini. Upload baru untuk mengganti.</p>
                    </div>
                    @endif
                    <input type="file" name="featured_image" accept="image/*" class="form-input" data-crop="true" data-crop-ratio="16/9" data-preview-img="imgPreview" data-preview-box="imgPreviewBox">
                    <div id="imgPreviewBox" style="display:none;margin-top:.75rem">
                        <img id="imgPreview" style="width:100%;border-radius:8px;object-fit:cover;max-height:120px">
                    </div>
                </div>
            </div>
            <div style="display:flex;gap:.75rem">
                <button type="submit" class="btn btn-primary" style="flex:1;justify-content:center"><i class="fas fa-save"></i> Update</button>
                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>
@endsection
        <div>
