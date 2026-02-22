@extends('layouts.app')

@section('title', $gallery->name . ' - SD Negeri 1 Tengguli')

@section('content')
<!-- Hero -->
<div class="bg-gradient-to-r from-red-600 to-red-700 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('gallery.index') }}" class="text-white hover:text-gray-200 mb-4 inline-block">← Kembali ke Galeri</a>
        <h1 class="text-4xl md:text-5xl font-bold">{{ $gallery->name }}</h1>
    </div>
</div>

<!-- Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    @if($gallery->description)
        <p class="text-gray-600 text-lg mb-12">{{ $gallery->description }}</p>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($photos as $photo)
            <a href="{{ asset('storage/' . $photo->photo) }}" data-lightbox="gallery" data-title="{{ $photo->caption }}">
                <img src="{{ asset('storage/' . $photo->photo) }}" alt="{{ $photo->caption }}" class="w-full h-48 object-cover rounded-lg hover:opacity-90 transition">
            </a>
        @empty
            <p class="text-center text-gray-600 col-span-full py-12">Belum ada foto</p>
        @endforelse
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/lightbox.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/lightbox.min.css" rel="stylesheet">
@endpush
@endsection
