@extends('layouts.admin')
@section('title','Manajemen Pengumuman')
@section('breadcrumb')Pengumuman@endsection

@section('content')
<div class="page-header">
    <div class="page-header-info">
        <h1>Pengumuman</h1>
        <p>Kelola pengumuman yang tampil di website</p>
    </div>
    <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Pengumuman</a>
</div>

<div class="card card-table">
    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Prioritas</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($announcements as $item)
            <tr>
                <td style="font-weight:600;color:#111827">{{ Str::limit($item->title,60) }}</td>
                <td><span class="badge {{ $item->priority === 'urgent' ? 'badge-red' : 'badge-blue' }}">{{ ucfirst($item->priority) }}</span></td>
                <td><span class="badge {{ $item->is_active ? 'badge-green' : 'badge-gray' }}">{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                <td style="white-space:nowrap;color:#6b7280">{{ $item->created_at->format('d M Y') }}</td>
                <td style="white-space:nowrap">
                    <a href="{{ route('admin.announcements.edit', $item) }}" class="action-btn action-edit"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{ route('admin.announcements.destroy', $item) }}" class="inline" onsubmit="return confirm('Hapus pengumuman ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="action-btn action-delete"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:#9ca3af;padding:3rem">Belum ada pengumuman</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div style="margin-top:1rem">{{ $announcements->links() }}</div>
@endsection
