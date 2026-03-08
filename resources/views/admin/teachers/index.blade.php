@extends('layouts.admin')
@section('title','Guru & Staff')
@section('breadcrumb')Guru & Staff@endsection

@section('content')
<div class="page-header">
    <div class="page-header-info"><h1>Guru & Staff</h1><p>Kelola data guru dan tenaga kependidikan</p></div>
    <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Guru</a>
</div>
<div class="card card-table">
    <table>
        <thead><tr><th>Foto</th><th>Nama</th><th>Jabatan</th><th>Email</th><th>Aksi</th></tr></thead>
        <tbody>
            @forelse($teachers as $teacher)
            <tr>
                <td>
                    @if($teacher->photo)
                        <img src="{{ asset('storage/'.$teacher->photo) }}" style="width:40px;height:40px;border-radius:50%;object-fit:cover">
                    @else
                        <div style="width:40px;height:40px;border-radius:50%;background:#edfaf7;display:flex;align-items:center;justify-content:center;color:#2aad8c;font-weight:700">{{ strtoupper(substr($teacher->name,0,1)) }}</div>
                    @endif
                </td>
                <td style="font-weight:600;color:#111827">{{ $teacher->name }}</td>
                <td style="color:#6b7280">{{ $teacher->position }}</td>
                <td style="color:#6b7280">{{ $teacher->email ?? '-' }}</td>
                <td style="white-space:nowrap">
                    <a href="{{ route('admin.teachers.edit', $teacher) }}" class="action-btn action-edit"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{ route('admin.teachers.destroy', $teacher) }}" class="inline" onsubmit="return confirm('Hapus data guru ini?')">@csrf @method('DELETE')
                        <button type="submit" class="action-btn action-delete"><i class="fas fa-trash"></i></button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:#9ca3af;padding:3rem">Belum ada data guru</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div style="margin-top:1rem">{{ $teachers->links() }}</div>
@endsection
