@extends('layouts.admin')

@section('title', 'Tambah User Baru')

@section('content')
<form action="{{ route('admin.users.store') }}" method="POST" class="max-w-3xl">
    @csrf
    
    <div class="bg-white rounded-lg shadow p-6 space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Nama</label>
            <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Email</label>
            <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Role</label>
            <select name="role" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                <option value="viewer">Viewer</option>
                <option value="editor">Editor</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div class="pt-4 space-x-3">
            <button type="submit" class="btn-primary">Simpan User</button>
            <a href="{{ route('admin.users.index') }}" class="btn-secondary inline-block">Batal</a>
        </div>
    </div>
</form>
@endsection
