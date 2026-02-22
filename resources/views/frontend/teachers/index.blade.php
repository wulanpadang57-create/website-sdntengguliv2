@extends('layouts.app')

@section('title', 'Guru & Staff - SD Negeri 1 Tengguli')

@section('content')
<!-- Hero -->
<div class="bg-gradient-to-r from-red-600 to-red-700 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Guru & Staff</h1>
        <p class="text-xl">Pendidik profesional yang berdedikasi</p>
    </div>
</div>

<!-- Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <!-- Kepala Sekolah -->
    @if($kepala_sekolah)
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Kepala Sekolah</h2>
            <div class="max-w-sm mx-auto bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition text-center">
                @if($kepala_sekolah->photo)
                    <img src="{{ asset('storage/' . $kepala_sekolah->photo) }}" alt="{{ $kepala_sekolah->name }}" class="w-full h-64 object-cover">
                @else
                    <div class="w-full h-64 bg-gradient-to-b from-gray-300 to-gray-400 flex items-center justify-center">
                        <i class="fas fa-user-circle text-gray-500 text-6xl"></i>
                    </div>
                @endif
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900">{{ $kepala_sekolah->name }}</h3>
                    <p class="text-red-600 font-semibold mb-4">{{ $kepala_sekolah->position }}</p>
                    @if($kepala_sekolah->nip)
                        <p class="text-gray-600 text-sm mb-2">📍 NIP: {{ $kepala_sekolah->nip }}</p>
                    @endif
                    @if($kepala_sekolah->email)
                        <p class="text-gray-600 text-sm mb-2">📧 {{ $kepala_sekolah->email }}</p>
                    @endif
                    @if($kepala_sekolah->bio)
                        <p class="text-gray-600 text-sm mt-4">{{ $kepala_sekolah->bio }}</p>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <!-- Wakil Kepala -->
    @if($wakil_kepala->count() > 0)
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Wakil Kepala</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($wakil_kepala as $teacher)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition text-center">
                        @if($teacher->photo)
                            <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}" class="w-full h-56 object-cover">
                        @else
                            <div class="w-full h-56 bg-gradient-to-b from-gray-300 to-gray-400 flex items-center justify-center">
                                <i class="fas fa-user-circle text-gray-500 text-5xl"></i>
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900">{{ $teacher->name }}</h3>
                            <p class="text-red-600 font-semibold mb-2 text-sm">{{ $teacher->position }}</p>
                            @if($teacher->subjects)
                                <p class="text-gray-600 text-xs">{{ implode(', ', $teacher->getSubjectsArray()) }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Guru -->
    @if($guru->count() > 0)
        <div>
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Guru</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($guru as $teacher)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition text-center">
                        @if($teacher->photo)
                            <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}" class="w-full h-56 object-cover">
                        @else
                            <div class="w-full h-56 bg-gradient-to-b from-gray-300 to-gray-400 flex items-center justify-center">
                                <i class="fas fa-user-circle text-gray-500 text-5xl"></i>
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900">{{ $teacher->name }}</h3>
                            @if($teacher->subjects)
                                <p class="text-gray-600 text-xs mb-2">{{ implode(', ', $teacher->getSubjectsArray()) }}</p>
                            @endif
                            @if($teacher->email)
                                <p class="text-gray-600 text-xs">{{ $teacher->email }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
