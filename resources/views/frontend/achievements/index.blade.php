@extends('layouts.app')
@section('title', 'Prestasi - SD Negeri 1 Tengguli')

@section('content')

<div class="page-hero">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="breadcrumb mb-5">
            <a href="{{ route('home') }}">Beranda</a>
            <span>/</span>
            <span class="text-white">Prestasi</span>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-2">Prestasi Siswa</h1>
        <p class="text-white/60 text-lg">Pencapaian gemilang kebanggaan SD Negeri 1 Tengguli</p>
    </div>
</div>

{{-- Category filter tabs --}}
<div class="bg-white border-b border-gray-100 sticky top-16 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex gap-2 overflow-x-auto py-4 scrollbar-none">
            <a href="{{ route('achievement.index') }}"
               class="flex-shrink-0 px-4 py-2 rounded-xl text-sm font-bold transition-colors
                      {{ !request()->segment(2) ? 'bg-red-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-red-50 hover:text-red-600' }}">
                Semua
            </a>
            @foreach($achievements_by_category as $cat => $items)
            <a href="{{ route('achievement.filter', $cat) }}"
               class="flex-shrink-0 px-4 py-2 rounded-xl text-sm font-bold capitalize transition-colors
                      {{ request()->segment(2) === $cat ? 'bg-red-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-red-50 hover:text-red-600' }}">
                {{ $cat }}
                <span class="ml-1 opacity-60 text-xs">({{ count($items) }})</span>
            </a>
            @endforeach
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7" data-reveal-group>
        @forelse($achievements as $ach)
        <div class="achievement-card">
            <div class="flex items-start gap-4">
                <div class="trophy-icon flex-shrink-0">
                    <i class="fas fa-medal text-yellow-600 text-xl"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <span class="badge badge-red mb-2 capitalize">{{ $ach->category }}</span>
                    <h3 class="font-bold text-gray-900 text-sm line-clamp-2">{{ $ach->title }}</h3>
                </div>
            </div>

            @if($ach->achievement_image)
            <div class="mt-4 rounded-xl overflow-hidden" style="height:140px">
                <img src="{{ asset('storage/'.$ach->achievement_image) }}" alt="{{ $ach->title }}"
                     class="w-full h-full object-cover">
            </div>
            @endif

            @if($ach->description)
            <p class="text-gray-500 text-xs mt-3 line-clamp-2 leading-relaxed">
                {{ Str::limit($ach->description, 100) }}
            </p>
            @endif

            <div class="flex items-center gap-3 mt-4 pt-3 border-t border-gray-100 text-xs text-gray-400">
                @if($ach->student_name)
                <span class="flex items-center gap-1">
                    <i class="fas fa-user text-red-400"></i>{{ $ach->student_name }}
                </span>
                @endif
                <span class="flex items-center gap-1 ml-auto">
                    <i class="fas fa-calendar text-red-400"></i>
                    {{ $ach->achievement_date->format('d M Y') }}
                </span>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-20 text-gray-400">
            <i class="fas fa-trophy text-6xl mb-4 opacity-20"></i>
            <p class="text-lg">Belum ada prestasi</p>
        </div>
        @endforelse
    </div>

    <div class="mt-12 flex justify-center">{{ $achievements->links() }}</div>
</div>
@endsection
