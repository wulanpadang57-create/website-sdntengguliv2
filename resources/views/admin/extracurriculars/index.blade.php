@extends('layouts.admin')
@section('title','Manajemen Ekstrakurikuler')
@section('breadcrumb')Ekstrakurikuler@endsection

@section('content')
<div class="page-header">
    <div class="page-header-info">
        <h1>Ekstrakurikuler</h1>
        <p>Kelola dokumentasi kegiatan ekstrakurikuler siswa</p>
    </div>
    <a href="{{ route('admin.extracurriculars.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Ekstrakurikuler</a>
</div>

<div class="card card-table">
    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($extracurriculars as $item)
            <tr>
                <td style="max-width:360px">
                    <div style="font-weight:600;color:#111827">{{ Str::limit($item->title, 70) }}</div>
                </td>
                <td>
                    <span class="badge {{ $item->status === 'published' ? 'badge-green' : 'badge-yellow' }}">
                        {{ $item->status === 'published' ? 'Publish' : 'Draft' }}
                    </span>
                </td>
                <td style="white-space:nowrap;color:#6b7280">{{ $item->published_at?->format('d M Y') ?? '-' }}</td>
                <td style="white-space:nowrap">
                    <a href="{{ route('extracurricular.show', $item->slug) }}" target="_blank" class="action-btn action-view" title="Lihat"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.extracurriculars.edit', $item) }}" class="action-btn action-edit" title="Edit"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{ route('admin.extracurriculars.destroy', $item) }}" class="inline" onsubmit="return confirm('Hapus dokumentasi ekstrakurikuler ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="action-btn action-delete" title="Hapus"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align:center;color:#9ca3af;padding:3rem"><i class="fas fa-shapes" style="font-size:2rem;display:block;margin-bottom:.75rem;opacity:.3"></i>Belum ada dokumentasi ekstrakurikuler</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div style="margin-top:1rem">{{ $extracurriculars->links() }}</div>
@endsection
