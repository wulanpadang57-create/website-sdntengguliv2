@extends('layouts.admin')
@section('title','Manajemen User')
@section('breadcrumb')Manajemen User@endsection

@section('content')
<div class="page-header">
    <div class="page-header-info"><h1>Manajemen User</h1><p>Kelola akun pengguna admin CMS</p></div>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah User</a>
</div>
<div class="card card-table">
    <table>
        <thead><tr><th>Avatar</th><th>Nama</th><th>Email</th><th>Role</th><th>Terdaftar</th><th>Aksi</th></tr></thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td><div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#2aad8c,#1f8a6f);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:.8rem">{{ strtoupper(substr($user->name,0,1)) }}</div></td>
                <td style="font-weight:600;color:#111827">{{ $user->name }}</td>
                <td style="color:#6b7280">{{ $user->email }}</td>
                <td><span class="badge {{ $user->role === 'admin' ? 'badge-teal' : ($user->role === 'editor' ? 'badge-blue' : 'badge-gray') }}">{{ ucfirst($user->role) }}</span></td>
                <td style="color:#6b7280">{{ $user->created_at->format('d M Y') }}</td>
                <td style="white-space:nowrap">
                    <a href="{{ route('admin.users.edit', $user) }}" class="action-btn action-edit"><i class="fas fa-edit"></i></a>
                    @if(auth()->id() !== $user->id)
                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline" onsubmit="return confirm('Hapus user ini?')">@csrf @method('DELETE')
                        <button type="submit" class="action-btn action-delete"><i class="fas fa-trash"></i></button></form>
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;color:#9ca3af;padding:3rem">Belum ada user</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div style="margin-top:1rem">{{ $users->links() }}</div>
@endsection
