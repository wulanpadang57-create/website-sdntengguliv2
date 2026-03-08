@extends('layouts.admin')
@section('title','Manajemen Prestasi')
@section('breadcrumb')Prestasi@endsection

@section('content')
<div class="page-header">
    <div class="page-header-info"><h1>Prestasi</h1><p>Kelola data prestasi siswa sekolah</p></div>
    <a href="{{ route('admin.achievements.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Prestasi</a>
</div>
<div class="card card-table">
    <table>
        <thead><tr><th>Judul</th><th>Kategori</th><th>Siswa</th><th>Tahun</th><th>Aksi</th></tr></thead>
        <tbody>
            @forelse($achievements as $item)
            <tr>
                <td style="font-weight:600;color:#111827">{{ Str::limit($item->title,55) }}</td>
                <td><span class="badge badge-yellow">{{ ucfirst($item->category) }}</span></td>
                <td style="color:#6b7280">{{ $item->student_name ?? '-' }}</td>
                <td style="color:#6b7280">{{ $item->year ?? '-' }}</td>
                <td style="white-space:nowrap">
                    <a href="{{ route('admin.achievements.edit', $item) }}" class="action-btn action-edit"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{ route('admin.achievements.destroy', $item) }}" class="inline" onsubmit="return confirm('Hapus prestasi ini?')">@csrf @method('DELETE')
                        <button type="submit" class="action-btn action-delete"><i class="fas fa-trash"></i></button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:#9ca3af;padding:3rem">Belum ada prestasi</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div style="margin-top:1rem">{{ $achievements->links() }}</div>
@endsection
