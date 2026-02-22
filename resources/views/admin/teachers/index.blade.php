@extends('layouts.admin')

@section('title', 'Manajemen Guru & Staff')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div></div>
    <a href="{{ route('admin.teachers.create') }}" class="btn-primary">Tambah Guru</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Nama</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Posisi</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Email</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teachers as $teacher)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $teacher->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $teacher->position }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $teacher->email ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm space-x-2">
                        <a href="{{ route('admin.teachers.edit', $teacher) }}" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{ route('admin.teachers.destroy', $teacher) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin?')" class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">Belum ada guru</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $teachers->links() }}
@endsection
