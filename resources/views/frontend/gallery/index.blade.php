@extends('layouts.app')
@section('title', 'Galeri - SD Negeri 1 Tengguli')

@section('content')

<div class="page-hero">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="breadcrumb mb-5">
            <a href="{{ route('home') }}">Beranda</a>
            <span>/</span>
            <span class="text-white">Galeri</span>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-2">Galeri Foto</h1>
        <p class="text-white/60 text-lg">Dokumentasi kegiatan dan momen berkesan sekolah kami</p>
    </div>
</div>

<div class="gallery-index-page max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="gallery-index-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7" data-reveal-group>
        @forelse($galleries as $gallery)
        <a href="{{ route('gallery.show', $gallery->slug) }}" class="group block">
            <div class="gallery-card shadow-sm">
                @if($gallery->cover_image)
                <img src="{{ asset('storage/'.$gallery->cover_image) }}" alt="{{ $gallery->name }}">
                @else
                <div class="w-full h-full flex items-center justify-center"
                     style="background:linear-gradient(135deg,#a8e5d6,#2aad8c)">
                    <i class="fas fa-images text-white text-5xl opacity-40"></i>
                </div>
                @endif
                <div class="gallery-overlay">
                    <div class="w-full">
                        <h3 class="text-white font-bold mb-1 line-clamp-2">{{ $gallery->name }}</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-white/70 text-sm">{{ $gallery->photos()->count() }} foto</span>
                            <span class="text-white bg-white/20 px-3 py-1 rounded-full text-xs font-semibold backdrop-blur-sm">
                                <i class="fas fa-eye mr-1"></i>Lihat
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 px-1">
                <h3 class="font-bold text-gray-900 text-sm transition-colors" style="" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color=''">
                    {{ $gallery->name }}
                </h3>
                <div class="flex items-center gap-1.5 text-xs text-gray-400 mt-1">
                    <i class="fas fa-images" style="color:var(--primary)"></i>
                    {{ $gallery->photos()->count() }} foto
                </div>
            </div>
        </a>
        @empty
        <div class="col-span-3 text-center py-20 text-gray-400">
            <i class="fas fa-images text-6xl mb-4 opacity-20"></i>
            <p class="text-lg">Belum ada galeri</p>
        </div>
        @endforelse
    </div>

    <div class="mt-12 flex justify-center">{{ $galleries->links() }}</div>
</div>
@endsection
