@extends('layouts.app')

@section('title', 'Prestasi - SD Negeri 1 Tengguli')

@section('content')
<!-- Hero -->
<div class="bg-gradient-to-r from-red-600 to-red-700 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Prestasi Siswa</h1>
        <p class="text-xl">Pencapaian gemilang siswa-siswi SD Negeri 1 Tengguli</p>
    </div>
</div>

<!-- Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <!-- Filter -->
    <div class="mb-12 flex flex-wrap gap-3 justify-center">
        <a href="{{ route('achievement.index') }}" class="px-6 py-2 rounded-full {{ !request('category') ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-700' }} font-semibold">Semua</a>
        @foreach($achievements_by_category as $cat => $items)
            <a href="{{ route('achievement.filter', $cat) }}" class="px-6 py-2 rounded-full {{ request('category') === $cat ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-700' }} font-semibold capitalize">{{ $cat }}</a>
        @endforeach
    </div>

    <!-- Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($achievements as $achievement)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($achievement->achievement_image)
                    <img src="{{ asset('storage/' . $achievement->achievement_image) }}" alt="{{ $achievement->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gradient-to-r from-yellow-300 to-yellow-500 flex items-center justify-center">
                        <i class="fas fa-trophy text-yellow-600 text-4xl"></i>
                    </div>
                @endif
                <div class="p-6">
                    <span class="inline-block bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-semibold mb-3 capitalize">
                        {{ $achievement->category }}
                    </span>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $achievement->title }}</h3>
                    <p class="text-gray-600 text-sm mb-2">📌 {{ $achievement->student_name ?? 'Siswa SD 1 Tengguli' }}</p>
                    @if($achievement->description)
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($achievement->description, 100) }}</p>
                    @endif
                    <p class="text-gray-500 text-xs">🗓️ {{ $achievement->achievement_date->format('d M Y') }}</p>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-600 col-span-full py-12">Belum ada prestasi</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-12">
        {{ $achievements->links() }}
    </div>
</div>
@endsection
