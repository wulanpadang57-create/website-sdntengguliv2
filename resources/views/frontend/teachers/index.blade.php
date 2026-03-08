@extends('layouts.app')
@section('title', 'Guru & Staff - SD Negeri 1 Tengguli')

@section('content')

<div class="page-hero">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="breadcrumb mb-5">
            <a href="{{ route('home') }}">Beranda</a>
            <span>/</span>
            <span class="text-white">Guru &amp; Staff</span>
        </nav>
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-2">Guru &amp; Staff</h1>
        <p class="text-white/60 text-lg">Pendidik profesional yang berdedikasi untuk kemajuan siswa</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-20">

    {{-- Kepala Sekolah --}}
    @if($kepala_sekolah)
    <div>
        <div class="section-eyebrow mb-2">Pimpinan Sekolah</div>
        <h2 class="section-title mb-10">Kepala <span class="gradient-text">Sekolah</span></h2>
        <div class="max-w-xs mx-auto" data-reveal="up">
            <div class="teacher-card">
                <div class="teacher-img-wrap" style="height:300px">
                    @if($kepala_sekolah->photo)
                    <img src="{{ asset('storage/'.$kepala_sekolah->photo) }}" alt="{{ $kepala_sekolah->name }}">
                    @else
                    <div class="w-full h-full flex items-center justify-center"
                         style="background:linear-gradient(135deg,#a8e5d6,#2aad8c)">
                        <i class="fas fa-user-tie text-white text-7xl opacity-30"></i>
                    </div>
                    @endif
                    <div class="teacher-overlay">
                        <div>
                            <p class="text-white font-bold">{{ $kepala_sekolah->name }}</p>
                            @if($kepala_sekolah->nip)
                            <p class="text-white/70 text-xs">NIP: {{ $kepala_sekolah->nip }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="p-6 text-center">
                    <span class="badge badge-red mb-2">Kepala Sekolah</span>
                    <h3 class="font-extrabold text-gray-900 text-xl mt-1">{{ $kepala_sekolah->name }}</h3>
                    <p class="text-red-600 font-semibold text-sm mt-1">{{ $kepala_sekolah->position }}</p>
                    @if($kepala_sekolah->bio)
                    <p class="text-gray-500 text-sm mt-3 leading-relaxed line-clamp-3">{{ $kepala_sekolah->bio }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Wakil Kepala --}}
    @if($wakil_kepala->count())
    <div>
        <div class="section-eyebrow mb-2">Pimpinan</div>
        <h2 class="section-title mb-10">Wakil Kepala <span class="gradient-text">Sekolah</span></h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" data-reveal-group>
            @foreach($wakil_kepala as $t)
            <div class="teacher-card">
                <div class="teacher-img-wrap" style="height:260px">
                    @if($t->photo)
                    <img src="{{ asset('storage/'.$t->photo) }}" alt="{{ $t->name }}">
                    @else
                    <div class="w-full h-full flex items-center justify-center"
                         style="background:linear-gradient(135deg,#d4f2eb,#3dc0a0)">
                        <i class="fas fa-user-tie text-white text-6xl opacity-30"></i>
                    </div>
                    @endif
                    <div class="teacher-overlay">
                        <div>
                            <p class="text-white font-bold">{{ $t->name }}</p>
                            @if($t->subjects)<p class="text-white/70 text-xs">{{ $t->subjects }}</p>@endif
                        </div>
                    </div>
                </div>
                <div class="p-5 text-center">
                    <h3 class="font-bold text-gray-900">{{ $t->name }}</h3>
                    <p class="text-red-600 font-semibold text-sm mt-1">{{ $t->position }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Guru --}}
    @if($guru->count())
    <div>
        <div class="section-eyebrow mb-2">Tim Pengajar</div>
        <h2 class="section-title mb-10">Daftar <span class="gradient-text">Guru</span></h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-7" data-reveal-group>
            @foreach($guru as $t)
            <div class="teacher-card">
                <div class="teacher-img-wrap" style="height:220px">
                    @if($t->photo)
                    <img src="{{ asset('storage/'.$t->photo) }}" alt="{{ $t->name }}">
                    @else
                    <div class="w-full h-full flex items-center justify-center"
                         style="background:linear-gradient(135deg,#a8e5d6,#2aad8c)">
                        <i class="fas fa-user text-white text-5xl opacity-30"></i>
                    </div>
                    @endif
                    <div class="teacher-overlay">
                        <div>
                            <p class="text-white font-bold text-sm">{{ $t->name }}</p>
                            @if($t->subjects)<p class="text-white/70 text-xs">{{ $t->subjects }}</p>@endif
                        </div>
                    </div>
                </div>
                <div class="p-4 text-center">
                    <h3 class="font-bold text-gray-900 text-sm">{{ $t->name }}</h3>
                    @if($t->subjects)<p class="text-gray-500 text-xs mt-1">{{ $t->subjects }}</p>@endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection
