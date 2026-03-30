@extends('layouts.app')
@section('title', 'Berita - SD Negeri 1 Tengguli')

@section('content')

<div class="page-hero">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="breadcrumb mb-5">
            <a href="{{ route('home') }}">Beranda</a>
            <span>/</span>
            <span class="text-white">Berita</span>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-2">Berita &amp; Artikel</h1>
        <p class="text-white/60 text-lg">Informasi terbaru dari SD Negeri 1 Tengguli</p>
    </div>
</div>

<div class="news-index-page max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="news-index-layout grid grid-cols-1 lg:grid-cols-4 gap-10">

        {{-- SIDEBAR --}}
        <aside class="news-index-sidebar lg:col-span-1 space-y-6">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h3 class="font-bold text-gray-900 mb-3 flex items-center gap-2 text-sm">
                    <i class="fas fa-search" style="color:var(--primary)"></i>Cari Berita
                </h3>
                <form method="GET">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Kata kunci..."
                               class="input-field pr-9 text-sm">
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 transition-colors" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color=''">
                            <i class="fas fa-search text-xs"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2 text-sm">
                    <i class="fas fa-tags" style="color:var(--primary)"></i>Kategori
                </h3>
                <div class="space-y-1">
                    <a href="{{ route('news.index') }}"
                       class="flex items-center justify-between px-3 py-2 rounded-xl text-sm font-semibold transition-colors"
                       style="{{ !request('category') ? 'background:var(--primary);color:#fff' : 'color:#4b5563' }}"
                       @if(!request('category')) @else
                       onmouseover="this.style.background='var(--primary-50)';this.style.color='var(--primary)'"
                       onmouseout="this.style.background='';this.style.color='#4b5563'" @endif>
                        <span>Semua</span>
                    </a>
                    @foreach($categories as $cat)
                    <a href="{{ route('news.index', ['category' => $cat->slug]) }}"
                       class="flex items-center justify-between px-3 py-2 rounded-xl text-sm font-semibold transition-colors"
                       style="{{ request('category') === $cat->slug ? 'background:var(--primary);color:#fff' : 'color:#4b5563' }}"
                       @if(request('category') !== $cat->slug)
                       onmouseover="this.style.background='var(--primary-50)';this.style.color='var(--primary)'"
                       onmouseout="this.style.background='';this.style.color='#4b5563'" @endif>
                        <span>{{ $cat->name }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
        </aside>

        {{-- MAIN --}}
        <main class="news-index-main lg:col-span-3">
            @if(request('search'))
            <p class="text-gray-500 text-sm mb-6">
                Hasil untuk: <strong class="text-gray-900">"{{ request('search') }}"</strong>
            </p>
            @endif

            <div class="news-index-grid grid grid-cols-1 sm:grid-cols-2 gap-7" data-reveal-group>
                @forelse($news as $item)
                <article class="news-card">
                    <div class="news-card-img" style="height:190px">
                        @if($item->featured_image)
                        <img src="{{ asset('storage/'.$item->featured_image) }}" alt="{{ $item->title }}">
                        @else
                        <div class="w-full h-full flex items-center justify-center"
                             style="background:linear-gradient(135deg,#a8e5d6,#2aad8c)">
                            <i class="fas fa-newspaper text-white text-4xl opacity-30"></i>
                        </div>
                        @endif
                        <div class="ribbon">{{ $item->category?->name ?? 'Umum' }}</div>
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
                            <a href="{{ route('news.show', $item->slug) }}"
                               class="text-xs font-bold flex items-center gap-1 hover:gap-2 transition-all" style="color:var(--primary)">
                                Baca <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @empty
                <div class="col-span-2 text-center py-20 text-gray-400">
                    <i class="fas fa-newspaper text-5xl mb-4 opacity-20"></i>
                    <p>Belum ada berita tersedia</p>
                </div>
                @endforelse
            </div>

            <div class="mt-12 flex justify-center">{{ $news->links() }}</div>
        </main>
    </div>
</div>
@endsection
