@extends('layouts.app')

@section('title', $news->title . ' - SD Negeri 1 Tengguli')

@section('content')

{{-- Page Hero --}}
<div class="page-hero">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="breadcrumb mb-5">
            <a href="{{ route('home') }}">Beranda</a>
            <span>/</span>
            <a href="{{ route('news.index') }}">Berita</a>
            <span>/</span>
            <span class="text-white line-clamp-1">{{ Str::limit($news->title, 40) }}</span>
        </nav>
        <div class="flex flex-wrap items-center gap-3 mb-3">
            @if($news->category)
            <span class="badge badge-primary capitalize">{{ $news->category->name }}</span>
            @endif
            <span class="text-white/50 text-sm flex items-center gap-1.5">
                <i class="fas fa-calendar text-xs"></i>{{ $news->published_at->format('d M Y') }}
            </span>
            <span class="text-white/50 text-sm flex items-center gap-1.5">
                <i class="fas fa-eye text-xs"></i>{{ $news->views }} views
            </span>
        </div>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight max-w-3xl">{{ $news->title }}</h1>
    </div>
</div>

{{-- Article --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

        {{-- Main Content --}}
        <article class="lg:col-span-2">
            @if($news->featured_image)
            <div class="rounded-2xl overflow-hidden mb-8 shadow-sm" style="height:400px">
                <img src="{{ asset('storage/' . $news->featured_image) }}" alt="{{ $news->title }}"
                     class="w-full h-full object-cover">
            </div>
            @endif

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-7 sm:p-10">
                <div class="prose prose-gray max-w-none text-gray-700 leading-relaxed" style="font-size:1rem">
                    {!! nl2br(e($news->content)) !!}
                </div>

                {{-- Share --}}
                <div class="mt-10 pt-8 border-t border-gray-100 flex flex-wrap items-center gap-3">
                    <span class="text-sm font-semibold text-gray-600">Bagikan:</span>
                    <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . url()->current()) }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold bg-green-50 text-green-700 hover:bg-green-100 transition-colors">
                        <i class="fab fa-whatsapp"></i>WhatsApp
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors">
                        <i class="fab fa-facebook-f"></i>Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($news->title) }}&url={{ urlencode(url()->current()) }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold bg-sky-50 text-sky-700 hover:bg-sky-100 transition-colors">
                        <i class="fab fa-twitter"></i>Twitter
                    </a>
                </div>
            </div>
        </article>

        {{-- Sidebar --}}
        <aside class="space-y-6">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="font-bold text-gray-900 mb-4 text-sm pb-3 border-b border-gray-100">Berita Lainnya</div>
                <div class="space-y-4">
                    @forelse($related as $item)
                    <a href="{{ route('news.show', $item->slug) }}" class="flex gap-3 group">
                        <div class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0">
                            @if($item->featured_image)
                            <img src="{{ asset('storage/'.$item->featured_image) }}" alt="{{ $item->title }}"
                                 class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full flex items-center justify-center"
                                 style="background:linear-gradient(135deg,#a8e5d6,#2aad8c)">
                                <i class="fas fa-newspaper text-white text-lg opacity-50"></i>
                            </div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-900 line-clamp-2 leading-snug transition-colors"
                               onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color=''">
                                {{ $item->title }}
                            </p>
                            <p class="text-xs text-gray-400 mt-1">{{ $item->published_at->format('d M Y') }}</p>
                        </div>
                    </a>
                    @empty
                    <p class="text-sm text-gray-400 text-center py-4">Tidak ada berita lain</p>
                    @endforelse
                </div>
            </div>

            <a href="{{ route('news.index') }}"
               class="block w-full text-center btn btn-outline-primary py-3 rounded-2xl text-sm font-semibold">
                <i class="fas fa-arrow-left mr-2"></i>Semua Berita
            </a>
        </aside>
    </div>
</div>
@endsection
