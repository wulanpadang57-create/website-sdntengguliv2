@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<form action="{{ route('admin.users.update', $user) }}" method="POST" class="max-w-3xl">
    @csrf @method('PUT')
    
    <div class="bg-white rounded-lg shadow p-6 space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Nama</label>
            <input type="text" name="name" value="{{ $user->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Password Baru (Opsional)</label>
                <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Kosongkan jika tidak ingin mengubah">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-900 mb-2">Role</label>
            <select name="role" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                <option value="viewer" {{ $user->role === 'viewer' ? 'selected' : '' }}>Viewer</option>
                <option value="editor" {{ $user->role === 'editor' ? 'selected' : '' }}>Editor</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div class="pt-4 space-x-3">
            <button type="submit" class="btn-primary">Update User</button>
            <a href="{{ route('admin.users.index') }}" class="btn-secondary inline-block">Batal</a>
        </div>
    </div>
</form>
@endsection
