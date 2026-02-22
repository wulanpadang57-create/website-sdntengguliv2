@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-semibold">Total Berita</p>
                <p class="text-3xl font-bold text-gray-900">{{ $total_news }}</p>
            </div>
            <i class="fas fa-newspaper text-red-600 text-4xl opacity-20"></i>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-semibold">Pengumuman</p>
                <p class="text-3xl font-bold text-gray-900">{{ $total_announcements }}</p>
            </div>
            <i class="fas fa-bullhorn text-blue-600 text-4xl opacity-20"></i>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-semibold">Prestasi</p>
                <p class="text-3xl font-bold text-gray-900">{{ $total_achievements }}</p>
            </div>
            <i class="fas fa-trophy text-yellow-600 text-4xl opacity-20"></i>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-semibold">Pengunjung</p>
                <p class="text-3xl font-bold text-gray-900">{{ $total_visitors }}</p>
            </div>
            <i class="fas fa-users text-purple-600 text-4xl opacity-20"></i>
        </div>
    </div>
</div>

<!-- Quick Stats -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Statistik Hari Ini</h3>
        <div class="space-y-3">
            <div class="flex justify-between">
                <span class="text-gray-600">Pengunjung Hari Ini</span>
                <span class="font-bold">{{ $visitors_today }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Berita Bulan Ini</span>
                <span class="font-bold">{{ $news_this_month }}</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Akses Cepat</h3>
        <div class="space-y-2">
            <a href="{{ route('admin.news.create') }}" class="block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-center">Tambah Berita</a>
            <a href="{{ route('admin.announcements.create') }}" class="block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-center">Buat Pengumuman</a>
        </div>
    </div>
</div>

<!-- Recent News -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-bold text-gray-900">Berita Terbaru</h3>
        </div>
        <div class="divide-y">
            @forelse($recent_news as $news)
                <div class="p-6 hover:bg-gray-50">
                    <p class="font-semibold text-gray-900">{{ $news->title }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $news->published_at?->format('d M Y') ?? 'Draft' }}</p>
                </div>
            @empty
                <p class="p-6 text-gray-500 text-center">Belum ada berita</p>
            @endforelse
        </div>
    </div>

    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-bold text-gray-900">Pengumuman Terbaru</h3>
        </div>
        <div class="divide-y">
            @forelse($recent_announcements as $announcement)
                <div class="p-6 hover:bg-gray-50">
                    <p class="font-semibold text-gray-900">{{ $announcement->title }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $announcement->created_at->format('d M Y') }}</p>
                </div>
            @empty
                <p class="p-6 text-gray-500 text-center">Belum ada pengumuman</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
