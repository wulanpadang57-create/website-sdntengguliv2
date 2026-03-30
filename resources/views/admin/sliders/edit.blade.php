@extends('layouts.admin')
@section('title','Edit Slider')
@section('breadcrumb')<a href="{{ route('admin.sliders.index') }}">Slider</a> / Edit@endsection

@section('content')
<div style="max-width:720px">
<form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div style="display:flex;flex-direction:column;gap:1.25rem">
        <div class="card">
            <div class="card-header"><h3><i class="fas fa-images" style="color:#2aad8c;margin-right:.5rem"></i>Data Slider</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Judul <span style="color:#ef4444">*</span></label>
                    <input type="text" name="title" class="form-input" value="{{ old('title', $slider->title) }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Caption</label>
                    <input type="text" name="caption" class="form-input" value="{{ old('caption', $slider->caption) }}">
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                    <div class="form-group">
                        <label class="form-label">Teks Tombol</label>
                        <input type="text" name="button_text" class="form-input" value="{{ old('button_text', $slider->button_text) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">URL Tombol</label>
                        <input type="url" name="button_url" class="form-input" value="{{ old('button_url', $slider->button_url) }}">
                    </div>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                    <div class="form-group">
                        <label class="form-label">Urutan</label>
                        <input type="number" name="order" class="form-input" value="{{ old('order', $slider->order ?? 0) }}" min="0">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select name="is_active" class="form-select">
                            <option value="1" {{ $slider->is_active?'selected':'' }}>Aktif</option>
                            <option value="0" {{ !$slider->is_active?'selected':'' }}>Nonaktif</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Gambar Slider</label>
                    @if($slider->image)
                    <div style="margin-bottom:.75rem">
                        <img src="{{ asset('storage/'.$slider->image) }}" style="width:100%;max-height:180px;object-fit:cover;border-radius:8px">
                        <p style="font-size:.72rem;color:#9ca3af;margin-top:.3rem">Gambar saat ini. Upload baru untuk mengganti.</p>
                    </div>
                    @endif
                    <input type="file" name="image" accept="image/*" class="form-input" data-crop="true" data-crop-ratio="1920/700" data-preview-img="imgPreview" data-preview-box="imgPreviewBox">
                    <p style="font-size:.75rem;color:#9ca3af;margin-top:.3rem">Ukuran ideal: 1920×700 px</p>
                    <div id="imgPreviewBox" style="display:none;margin-top:.75rem">
                        <img id="imgPreview" style="width:100%;max-height:180px;object-fit:cover;border-radius:8px">
                    </div>
                </div>
            </div>
        </div>
        <div style="display:flex;gap:.75rem">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Slider</button>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</form>
</div>
@endsection
