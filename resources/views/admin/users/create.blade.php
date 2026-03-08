@extends('layouts.admin')
@section('title','Tambah User Baru')
@section('breadcrumb')<a href="{{ route('admin.users.index') }}">Pengguna</a> / Tambah Baru@endsection

@section('content')
<div style="max-width:600px">
<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <div style="display:flex;flex-direction:column;gap:1.25rem">
        <div class="card">
            <div class="card-header"><h3><i class="fas fa-user-plus" style="color:#2aad8c;margin-right:.5rem"></i>Data Akun Pengguna</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap <span style="color:#ef4444">*</span></label>
                    <input type="text" name="name" class="form-input" value="{{ old('name') }}" placeholder="Nama pengguna..." required>
                </div>
                <div class="form-group">
                    <label class="form-label">Email <span style="color:#ef4444">*</span></label>
                    <input type="email" name="email" class="form-input" value="{{ old('email') }}" placeholder="email@contoh.com" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Password <span style="color:#ef4444">*</span></label>
                    <input type="password" name="password" class="form-input" placeholder="Minimal 8 karakter" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Konfirmasi Password <span style="color:#ef4444">*</span></label>
                    <input type="password" name="password_confirmation" class="form-input" placeholder="Ulangi password" required>
                </div>
                @if(isset($roles) && count($roles))
                <div class="form-group">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select">
                        @foreach($roles as $role)
                        <option value="{{ $role }}" {{ old('role')===$role?'selected':'' }}>{{ ucfirst($role) }}</option>
                        @endforeach
                    </select>
                </div>
                @endif
            </div>
        </div>
        <div style="display:flex;gap:.75rem">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Buat Akun</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</form>
</div>
@endsection
