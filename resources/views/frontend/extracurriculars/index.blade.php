@extends('layouts.app')
@section('title', 'Ekstrakurikuler - SD Negeri 1 Tengguli')

@section('content')
<div class="page-hero">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="breadcrumb mb-5">
            <a href="{{ route('home') }}">Beranda</a>
            <span>/</span>
            <span class="text-white">Ekstrakurikuler</span>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-2">Ekstrakurikuler</h1>
        <p class="text-white/60 text-lg">Dokumentasi kegiatan ekstrakurikuler siswa SD Negeri 1 Tengguli</p>
    </div>
</div>

<div class="extracurricular-index-page max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="extracurricular-index-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7" data-reveal-group>
        @forelse($extracurriculars as $item)
        <article class="news-card">
            <div class="news-card-img" style="height:190px">
                @if($item->featured_image)
                <img src="{{ asset('storage/'.$item->featured_image) }}" alt="{{ $item->title }}">
                @else
                <div class="w-full h-full flex items-center justify-center"
                     style="background:linear-gradient(135deg,#a8e5d6,#2aad8c)">
                    <i class="fas fa-shapes text-white text-4xl opacity-30"></i>
                </div>
                @endif
                <div class="ribbon">Ekstrakurikuler</div>
            </div>
            <div class="p-5 flex flex-col flex-1">
                <h3 class="font-bold text-gray-900 text-sm mb-2 line-clamp-2 transition-colors" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color=''">
                    {{ $item->title }}
                </h3>
                <p class="text-gray-500 text-xs flex-1 line-clamp-2 mb-4 leading-relaxed">
                    {{ Str::limit(strip_tags($item->content), 100) }}
                </p>
                <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                    <span class="flex items-center gap-1.5 text-xs text-gray-400">
                        <i class="fas fa-calendar" style="color:var(--primary)"></i>
                        {{ $item->published_at->format('d M Y') }}
                    </span>
                    <a href="{{ route('extracurricular.show', $item->slug) }}"
                       class="text-xs font-bold flex items-center gap-1 hover:gap-2 transition-all" style="color:var(--primary)">
                        Baca <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
        </article>
        @empty
        <div class="col-span-3 text-center py-20 text-gray-400">
            <i class="fas fa-shapes text-5xl mb-4 opacity-20"></i>
            <p>Belum ada dokumentasi ekstrakurikuler</p>
        </div>
        @endforelse
    </div>

    <div class="mt-12 flex justify-center">{{ $extracurriculars->links() }}</div>
</div>
@endsection
