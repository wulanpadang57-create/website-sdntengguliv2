@extends('layouts.app')

@section('title', 'Galeri - SD Negeri 1 Tengguli')

@section('content')
<!-- Hero -->
<div class="bg-gradient-to-r from-red-600 to-red-700 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Galeri Foto & Video</h1>
        <p class="text-xl">Dokumentasi kegiatan dan momen berharga</p>
    </div>
</div>

<!-- Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($galleries as $gallery)
            <a href="{{ route('gallery.show', $gallery->slug) }}" class="group">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                    @if($gallery->cover_image)
                        <img src="{{ asset('storage/' . $gallery->cover_image) }}" alt="{{ $gallery->name }}" class="w-full h-48 object-cover group-hover:scale-110 transition duration-300">
                    @else
                        <div class="w-full h-48 bg-gradient-to-r from-gray-300 to-gray-400 flex items-center justify-center">
                            <i class="fas fa-images text-gray-500 text-4xl"></i>
                        </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $gallery->name }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($gallery->description, 80) }}</p>
                        <span class="text-red-600 font-semibold text-sm">{{ $gallery->photos()->count() }} foto <i class="fas fa-arrow-right"></i></span>
                    </div>
                </div>
            </a>
        @empty
            <p class="text-center text-gray-600 col-span-full py-12">Belum ada galeri</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-12">
        {{ $galleries->links() }}
    </div>
</div>
@endsection
