@extends('layouts.app')

@section('title', $news->title . ' - SD Negeri 1 Tengguli')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-100 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="text-red-600 hover:text-red-700">Home</a> / 
        <a href="{{ route('news.index') }}" class="text-red-600 hover:text-red-700">Berita</a> / 
        <span class="text-gray-600">{{ $news->title }}</span>
    </div>
</div>

<!-- Content -->
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <article>
        <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $news->title }}</h1>
        
        <div class="flex items-center space-x-6 text-gray-600 text-sm mb-8 pb-8 border-b border-gray-200">
            <span><i class="fas fa-calendar"></i> {{ $news->published_at->format('d M Y') }}</span>
            <span><i class="fas fa-eye"></i> {{ $news->views }} views</span>
            @if($news->category)
                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-semibold">{{ $news->category->name }}</span>
            @endif
        </div>

        @if($news->featured_image)
            <img src="{{ asset('storage/' . $news->featured_image) }}" alt="{{ $news->title }}" class="w-full h-96 object-cover rounded-lg mb-8">
        @endif

        <div class="prose prose-lg max-w-none">
            {!! nl2br(e($news->content)) !!}
        </div>
    </article>

    <!-- Related News -->
    @if($related->count() > 0)
        <div class="mt-16 pt-16 border-t border-gray-200">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Berita Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($related as $item)
                    <div class="bg-white rounded-lg shadow hover:shadow-xl transition">
                        @if($item->featured_image)
                            <img src="{{ asset('storage/' . $item->featured_image) }}" alt="{{ $item->title }}" class="w-full h-40 object-cover">
                        @else
                            <div class="w-full h-40 bg-gradient-to-r from-red-300 to-red-500"></div>
                        @endif
                        <div class="p-6">
                            <h3 class="font-bold text-gray-900 mb-2">{{ $item->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($item->content, 80) }}</p>
                            <a href="{{ route('news.show', $item->slug) }}" class="text-red-600 hover:text-red-700 font-semibold text-sm">Baca →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
