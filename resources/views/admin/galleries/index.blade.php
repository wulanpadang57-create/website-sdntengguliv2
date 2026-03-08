@extends('layouts.admin')
@section('title','Manajemen Galeri')
@section('breadcrumb')Galeri@endsection

@section('content')
<div class="page-header">
    <div class="page-header-info"><h1>Galeri Foto</h1><p>Kelola album dan koleksi foto sekolah</p></div>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Album</a>
</div>
<div class="card card-table">
    <table>
        <thead><tr><th>Nama Album</th><th>Deskripsi</th><th>Jumlah Foto</th><th>Aksi</th></tr></thead>
        <tbody>
            @forelse($galleries as $gallery)
            <tr>
                <td style="font-weight:600;color:#111827">{{ $gallery->name }}</td>
                <td style="color:#6b7280">{{ Str::limit($gallery->description ?? '-', 50) }}</td>
                <td><span class="badge badge-teal">{{ $gallery->photos_count }} foto</span></td>
                <td style="white-space:nowrap">
                    <a href="{{ route('admin.galleries.edit', $gallery) }}" class="action-btn action-edit"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{ route('admin.galleries.destroy', $gallery) }}" class="inline" onsubmit="return confirm('Hapus album ini?')">@csrf @method('DELETE')
                        <button type="submit" class="action-btn action-delete"><i class="fas fa-trash"></i></button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align:center;color:#9ca3af;padding:3rem">Belum ada album galeri</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div style="margin-top:1rem">{{ $galleries->links() }}</div>
@endsection
