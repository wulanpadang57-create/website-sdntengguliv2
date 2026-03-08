@extends('layouts.admin')
@section('title','Tambah Video Baru')
@section('breadcrumb')<a href="{{ route('admin.videos.index') }}">Video</a> / Tambah Baru@endsection

@section('content')
<div style="max-width:720px">
<form action="{{ route('admin.videos.store') }}" method="POST">
    @csrf
    <div style="display:flex;flex-direction:column;gap:1.25rem">
        <div class="card">
            <div class="card-header"><h3><i class="fab fa-youtube" style="color:#2aad8c;margin-right:.5rem"></i>Data Video YouTube</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Judul Video <span style="color:#ef4444">*</span></label>
                    <input type="text" name="title" class="form-input" value="{{ old('title') }}" placeholder="Judul video..." required>
                </div>
                <div class="form-group">
                    <label class="form-label">YouTube ID <span style="color:#ef4444">*</span></label>
                    <input type="text" name="youtube_id" class="form-input" value="{{ old('youtube_id') }}" placeholder="dQw4w9WgXcQ" required oninput="updatePreview(this.value)">
                    <p style="font-size:.75rem;color:#9ca3af;margin-top:.3rem">Ambil ID dari URL: youtube.com/watch?v=<strong>dQw4w9WgXcQ</strong></p>
                    <div id="ytPreview" style="display:none;margin-top:.75rem;border-radius:10px;overflow:hidden">
                        <img id="ytThumb" style="width:100%;height:200px;object-fit:cover">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" rows="4" class="form-textarea" placeholder="Deskripsi video...">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Urutan</label>
                    <input type="number" name="order" class="form-input" value="{{ old('order', 0) }}" min="0">
                </div>
            </div>
        </div>
        <div style="display:flex;gap:.75rem">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Video</button>
            <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</form>
</div>
@endsection
@push('scripts')
<script>
function updatePreview(id){
    id=id.trim();
    if(id.length>5){
        document.getElementById('ytPreview').style.display='block';
        document.getElementById('ytThumb').src='https://img.youtube.com/vi/'+id+'/hqdefault.jpg';
    } else {
        document.getElementById('ytPreview').style.display='none';
    }
}
</script>
@endpush
