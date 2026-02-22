@extends('layouts.admin')

@section('title', 'Manajemen Pengumuman')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div></div>
    <a href="{{ route('admin.announcements.create') }}" class="btn-primary">Buat Pengumuman Baru</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Judul</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Prioritas</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Status</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($announcements as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $item->title }}</td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $item->priority === 'urgent' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ ucfirst($item->priority) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $item->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm space-x-2">
                        <a href="{{ route('admin.announcements.edit', $item) }}" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{ route('admin.announcements.destroy', $item) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin?')" class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">Belum ada pengumuman</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $announcements->links() }}
@endsection
