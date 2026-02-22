@extends('layouts.admin')

@section('title', 'Manajemen Galeri')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div></div>
    <a href="{{ route('admin.galleries.create') }}" class="btn-primary">Buat Album Baru</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Nama Album</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Jumlah Foto</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($galleries as $gallery)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $gallery->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $gallery->photos_count }}</td>
                    <td class="px-6 py-4 text-sm space-x-2">
                        <a href="{{ route('admin.galleries.edit', $gallery) }}" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i> Edit</a>
                        <form method="POST" action="{{ route('admin.galleries.destroy', $gallery) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin?')" class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-6 py-8 text-center text-gray-500">Belum ada galeri</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $galleries->links() }}
@endsection
