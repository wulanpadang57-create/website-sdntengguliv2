@extends('layouts.app')

@section('title', 'Berita - SD Negeri 1 Tengguli')

@section('content')
<!-- Hero -->
<div class="bg-gradient-to-r from-red-600 to-red-700 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Berita & Artikel</h1>
        <p class="text-xl">Ikuti perkembangan terbaru dari SD Negeri 1 Tengguli</p>
    </div>
</div>

<!-- Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Search -->
            <form method="GET" class="mb-8">
                <input type="text" name="search" placeholder="Cari berita..." value="{{ request('search') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </form>

            <!-- Categories -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Kategori</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('news.index') }}" class="text-gray-600 hover:text-red-600">Semua</a></li>
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('news.index', ['category' => $category->slug]) }}" 
                               class="text-gray-600 hover:text-red-600 {{ request('category') === $category->slug ? 'text-red-600 font-bold' : '' }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:col-span-3">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($news as $item)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                        @if($item->featured_image)
                            <img src="{{ asset('storage/' . $item->featured_image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gradient-to-r from-red-300 to-red-500"></div>
                        @endif
                        <div class="p-6">
                            <p class="text-red-600 text-sm font-semibold">{{ $item->category?->name ?? 'Umum' }}</p>
                            <h3 class="text-xl font-bold text-gray-900 mb-2 mt-2">{{ $item->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($item->content, 80) }}</p>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-500 text-xs">{{ $item->published_at->format('d M Y') }}</p>
                                <a href="{{ route('news.show', $item->slug) }}" class="text-red-600 hover:text-red-700 font-semibold text-sm">Baca →</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-600 col-span-full py-12">Belum ada berita</p>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $news->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
