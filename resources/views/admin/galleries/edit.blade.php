@extends('layouts.admin')
@section('title','Edit Album Galeri')
@section('breadcrumb')<a href="{{ route('admin.galleries.index') }}">Galeri</a> / Edit Album@endsection

@section('content')
<div style="display:grid;grid-template-columns:1fr 380px;gap:1.25rem;align-items:start">

    {{-- Kiri: form edit album --}}
    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div style="display:flex;flex-direction:column;gap:1.25rem">
            <div class="card">
                <div class="card-header"><h3><i class="fas fa-images" style="color:#2aad8c;margin-right:.5rem"></i>Informasi Album</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Nama Album <span style="color:#ef4444">*</span></label>
                        <input type="text" name="name" class="form-input" value="{{ old('name', $gallery->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" rows="4" class="form-textarea">{{ old('description', $gallery->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Urutan</label>
                        <input type="number" name="order" class="form-input" value="{{ old('order', $gallery->order ?? 0) }}" min="0">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Cover Album</label>
                        @if($gallery->cover_image)
                        <div style="margin-bottom:.75rem">
                            <img src="{{ asset('storage/'.$gallery->cover_image) }}" style="width:100%;max-height:150px;object-fit:cover;border-radius:8px">
                            <p style="font-size:.72rem;color:#9ca3af;margin-top:.3rem">Cover saat ini. Upload baru untuk mengganti.</p>
                        </div>
                        @endif
                        <input type="file" name="cover_image" accept="image/*" class="form-input" onchange="previewImg(this)">
                        <div id="imgPreviewBox" style="display:none;margin-top:.75rem">
                            <img id="imgPreview" style="width:100%;max-height:150px;object-fit:cover;border-radius:8px">
                        </div>
                    </div>
                </div>
            </div>
            <div style="display:flex;gap:.75rem">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Album</button>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </form>

    {{-- Kanan: tambah foto --}}
    <div style="display:flex;flex-direction:column;gap:1.25rem">
        <div class="card">
            <div class="card-header"><h3><i class="fas fa-upload" style="color:#2aad8c;margin-right:.5rem"></i>Tambah Foto</h3></div>
            <div class="card-body">
                <form action="{{ route('admin.galleries.add-photos', $gallery) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Pilih Foto (bisa banyak)</label>
                        <input type="file" name="photos[]" multiple accept="image/*" class="form-input" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center"><i class="fas fa-upload"></i> Upload Foto</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header"><h3><i class="fas fa-photo-film" style="color:#2aad8c;margin-right:.5rem"></i>Foto Album ({{ $photos->count() }})</h3></div>
            <div class="card-body" style="max-height:400px;overflow-y:auto;padding:0">
                @forelse($photos as $photo)
                <div style="display:flex;align-items:center;gap:.75rem;padding:.75rem 1rem;border-bottom:1px solid #f3f4f6">
                    <img src="{{ asset('storage/'.$photo->photo) }}" style="width:56px;height:42px;object-fit:cover;border-radius:6px;flex-shrink:0">
                    <span style="flex:1;font-size:.8rem;color:#6b7280;word-break:break-all">{{ basename($photo->photo) }}</span>
                    <form method="POST" action="{{ route('admin.gallery-photos.delete', $photo) }}" style="flex-shrink:0">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus foto ini?')" class="action-btn delete" style="width:32px;height:32px"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
                @empty
                <div style="padding:2rem;text-align:center;color:#9ca3af;font-size:.85rem"><i class="fas fa-images" style="font-size:2rem;margin-bottom:.5rem;display:block"></i>Belum ada foto</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>function previewImg(i){if(i.files&&i.files[0]){const r=new FileReader();r.onload=e=>{document.getElementById('imgPreview').src=e.target.result;document.getElementById('imgPreviewBox').style.display='block'};r.readAsDataURL(i.files[0])}}</script>
@endpush
