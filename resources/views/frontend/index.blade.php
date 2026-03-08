@extends('layouts.app')
@section('title', 'Beranda - SD Negeri 1 Tengguli')

@section('content')

{{-- ================================================================
     HERO
================================================================ --}}
<section class="hero"
         x-data="{
             current: 0,
             total: {{ max($sliders->count(), 1) }},
             autoplay() {
                 setInterval(() => { this.current = (this.current + 1) % this.total; }, 5000);
             }
         }"
         x-init="autoplay()">

    {{-- Slides --}}
    @if($sliders->count())
    @foreach($sliders as $i => $slide)
    <div class="absolute inset-0 transition-opacity duration-700"
         :class="{{ $i }} === current ? 'opacity-100' : 'opacity-0'">
        @if($slide->image)
        <img src="{{ asset('storage/'.$slide->image) }}" alt="{{ $slide->title }}"
             class="w-full h-full object-cover">
        @endif
        <div class="absolute inset-0" style="background:linear-gradient(135deg,rgba(10,74,60,.8) 0%,rgba(200,178,126,.3) 100%)"></div>
    </div>
    @endforeach
    @else
    <div class="absolute inset-0" style="background:linear-gradient(135deg,#0a4a3c 0%,#2aad8c 50%,#C8B27E 100%)"></div>
    @endif

    {{-- Decorative shapes --}}
    <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
        <div class="absolute top-20 right-0 w-96 h-96 rounded-full opacity-10"
             style="background:radial-gradient(circle,#2aad8c,transparent 70%)"></div>
        <div class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full opacity-10"
             style="background:radial-gradient(circle,#C8B27E,transparent 70%)"></div>
    </div>

    {{-- Content --}}
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="max-w-2xl">
            <div class="mb-5">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-bold text-white/80 border border-white/20"
                      style="background:rgba(255,255,255,.08);backdrop-filter:blur(8px)">
                    <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                    Sekolah Dasar Negeri Terbaik
                </span>
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-5">
                Selamat Datang di<br>
                <span style="color:#5DCFB3">SD Negeri 1</span><br>
                Tengguli
            </h1>
            <p class="text-white/70 text-lg leading-relaxed mb-3">
                Membentuk generasi cerdas, berkarakter, dan berwawasan luas demi masa depan bangsa yang gemilang.
            </p>
            @if($sliders->count())
            <p class="text-white/80 text-base font-medium mb-8"
               x-text="{{ json_encode($sliders->pluck('title')->toArray()) }}[current]"></p>
            @else
            <div class="mb-8"></div>
            @endif

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('news.index') }}" class="btn btn-primary">
                    <i class="fas fa-newspaper text-sm"></i>Berita Terbaru
                </a>
                <a href="{{ route('achievement.index') }}" class="btn btn-outline">
                    <i class="fas fa-trophy text-sm"></i>Prestasi Kami
                </a>
            </div>
        </div>
    </div>

    {{-- Slide dots --}}
    @if($sliders->count() > 1)
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-2 z-10">
        @foreach($sliders as $i => $slide)
        <button @click="current = {{ $i }}"
                :class="{{ $i }} === current ? 'hero-dot active' : 'hero-dot'"
                aria-label="Slide {{ $i+1 }}"></button>
        @endforeach
    </div>
    @endif
</section>

{{-- ================================================================
     ANNOUNCEMENT TICKER
================================================================ --}}
@if($announcements->count())
<div class="ticker-wrap">
    <div class="ticker-track">
        @for($t = 0; $t < 3; $t++)
        @foreach($announcements as $ann)
        <span class="inline-flex items-center gap-3 mr-12 text-sm font-semibold">
            <i class="fas fa-bullhorn text-white/70 text-xs"></i>
            {{ $ann->title }}
        </span>
        @endforeach
        @endfor
    </div>
</div>
@endif

{{-- ================================================================
     STATS
================================================================ --}}
<section style="background:linear-gradient(135deg,#0a4a3c,#1f8a6f,#2aad8c)" class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach([
                ['fa-users','500+','500','Siswa Aktif',''],
                ['fa-chalkboard-user','25+','25','Guru Profesional',''],
                ['fa-trophy','200+','200','Prestasi',''],
                ['fa-calendar-check','25+','25','Tahun Berdiri',''],
            ] as [$icon,$display,$num,$label,$suffix])
            <div class="stat-card text-center">
                <div class="w-12 h-12 rounded-xl bg-red-600/20 border border-red-500/30 flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $icon }} text-red-400 text-xl"></i>
                </div>
                <div class="text-3xl font-extrabold text-white mb-1">
                    <span data-counter data-target="{{ $num }}" data-suffix="+">{{ $display }}</span>
                </div>
                <div class="text-white/60 text-sm font-medium">{{ $label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================================================================
     ABOUT
================================================================ --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <div data-reveal="left">
                <div class="section-eyebrow mb-4">Tentang Kami</div>
                <h2 class="section-title mb-4">Sekolah Unggulan di<br><span class="gradient-text">Jawa Tengah</span></h2>
                <div class="section-divider"></div>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    SD Negeri 1 Tengguli adalah lembaga pendidikan dasar yang berkomitmen menghadirkan pendidikan berkualitas dengan didukung tenaga pengajar profesional dan fasilitas modern.
                </p>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Kami percaya setiap anak memiliki potensi luar biasa. Misi kami adalah memfasilitasi tumbuh-kembang siswa secara optimal — akademis, karakter, dan bakat — sehingga siap menghadapi tantangan global.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('teacher.index') }}" class="btn btn-primary">
                        <i class="fas fa-chalkboard-user text-sm"></i>Kenali Guru Kami
                    </a>
                    <a href="{{ route('gallery.index') }}" class="btn btn-outline-red">
                        <i class="fas fa-images text-sm"></i>Galeri Sekolah
                    </a>
                </div>
            </div>

            <div data-reveal="right">
                <div class="grid grid-cols-2 gap-4">
                    @foreach([
                        ['fa-book-open','Kurikulum Modern','Pembelajaran berbasis Merdeka Belajar'],
                        ['fa-users','Guru Berpengalaman','Tenaga pendidik bersertifikat & berkompetensi'],
                        ['fa-medal','Berprestasi','Ratusan penghargaan di berbagai bidang'],
                        ['fa-heart','Karakter Mulia','Menanamkan nilai moral & agama sejak dini'],
                    ] as [$icon,$title,$desc])
                    <div class="p-5 rounded-2xl border border-gray-100 hover:border-red-200 hover:shadow-md transition-all duration-300" style="background:#fffdf7">
                        <div class="w-10 h-10 rounded-lg bg-red-50 flex items-center justify-center mb-3">
                            <i class="fas {{ $icon }} text-red-600"></i>
                        </div>
                        <h3 class="font-bold text-gray-900 text-sm mb-1">{{ $title }}</h3>
                        <p class="text-gray-500 text-xs leading-relaxed">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================================================================
     NEWS
================================================================ --}}
@if($recentNews->count())
<section class="py-20" style="background:#f6f3ec">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10" data-reveal="up">
            <div>
                <div class="section-eyebrow mb-3">Informasi Terkini</div>
                <h2 class="section-title">Berita &amp; <span class="gradient-text">Artikel</span></h2>
            </div>
            <a href="{{ route('news.index') }}" class="btn btn-outline-red flex-shrink-0">
                Semua Berita <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7" data-reveal-group>
            @foreach($recentNews->take(6) as $item)
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
                    <h3 class="font-bold text-gray-900 text-sm mb-2 line-clamp-2 hover:text-red-600 transition-colors">
                        {{ $item->title }}
                    </h3>
                    <p class="text-gray-500 text-xs flex-1 line-clamp-2 mb-4 leading-relaxed">
                        {{ Str::limit(strip_tags($item->content), 100) }}
                    </p>
                    <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                        <span class="flex items-center gap-1.5 text-xs text-gray-400">
                            <i class="fas fa-calendar text-red-400"></i>
                            {{ $item->published_at->format('d M Y') }}
                        </span>
                        <a href="{{ route('news.show', $item->slug) }}"
                           class="text-red-600 text-xs font-bold flex items-center gap-1 hover:gap-2 transition-all">
                            Baca <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ================================================================
     ACHIEVEMENTS
================================================================ --}}
@if($achievements->count())
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10" data-reveal="up">
            <div>
                <div class="section-eyebrow mb-3">Kebanggaan Sekolah</div>
                <h2 class="section-title">Prestasi <span class="gradient-text">Gemilang</span></h2>
            </div>
            <a href="{{ route('achievement.index') }}" class="btn btn-outline-red flex-shrink-0">
                Semua Prestasi <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7" data-reveal-group>
            @foreach($achievements->take(6) as $ach)
            <div class="achievement-card">
                <div class="flex items-start gap-4">
                    <div class="trophy-icon">
                        <i class="fas fa-medal text-yellow-600 text-xl"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="badge badge-red mb-2 capitalize">{{ $ach->category }}</span>
                        <h3 class="font-bold text-gray-900 text-sm line-clamp-2">{{ $ach->title }}</h3>
                    </div>
                </div>
                @if($ach->description)
                <p class="text-gray-500 text-xs mt-3 line-clamp-2 leading-relaxed">{{ Str::limit($ach->description, 100) }}</p>
                @endif
                <div class="flex items-center gap-3 mt-4 pt-3 border-t border-gray-100 text-xs text-gray-400">
                    @if($ach->student_name)
                    <span class="flex items-center gap-1"><i class="fas fa-user text-red-400"></i>{{ $ach->student_name }}</span>
                    @endif
                    <span class="flex items-center gap-1 ml-auto"><i class="fas fa-calendar text-red-400"></i>{{ $ach->achievement_date->format('Y') }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ================================================================
     TEACHERS
================================================================ --}}
@if($teachers->count())
<section class="py-20" style="background:#f6f3ec">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10" data-reveal="up">
            <div>
                <div class="section-eyebrow mb-3">Tim Pengajar</div>
                <h2 class="section-title">Guru <span class="gradient-text">Profesional</span></h2>
            </div>
            <a href="{{ route('teacher.index') }}" class="btn btn-outline-red flex-shrink-0">
                Lihat Semua <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7" data-reveal-group>
            @foreach($teachers as $teacher)
            <div class="teacher-card">
                <div class="teacher-img-wrap" style="height:260px">
                    @if($teacher->photo)
                    <img src="{{ asset('storage/'.$teacher->photo) }}" alt="{{ $teacher->name }}">
                    @else
                    <div class="w-full h-full flex items-center justify-center"
                         style="background:linear-gradient(135deg,#a8e5d6,#2aad8c)">
                        <i class="fas fa-user-tie text-white text-6xl opacity-30"></i>
                    </div>
                    @endif
                    <div class="teacher-overlay">
                        <div>
                            <p class="text-white font-bold">{{ $teacher->name }}</p>
                            @if($teacher->subjects)
                            <p class="text-white/70 text-sm">{{ $teacher->subjects }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="p-5 text-center">
                    <h3 class="font-bold text-gray-900">{{ $teacher->name }}</h3>
                    <p class="text-red-600 font-semibold text-sm mt-1">{{ $teacher->position }}</p>
                    @if($teacher->subjects)
                    <p class="text-gray-500 text-xs mt-1">{{ $teacher->subjects }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ================================================================
     CTA
================================================================ --}}
<section class="py-20" style="background:linear-gradient(135deg,#0a4a3c,#2aad8c,#C8B27E)">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-reveal="up">
        <div class="section-eyebrow mb-5 mx-auto"
             style="background:rgba(255,255,255,.15);color:rgba(255,255,255,.9)">
            Bergabung Bersama Kami
        </div>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-5">
            Daftarkan Putra-Putri Anda<br>
            <span style="color:#5DCFB3">di SD Negeri 1 Tengguli</span>
        </h2>
        <p class="text-white/60 text-base mb-10 leading-relaxed max-w-xl mx-auto">
            Bersama kami, anak Anda akan tumbuh dalam lingkungan belajar yang kondusif, kreatif, dan penuh kasih sayang. Mari wujudkan cita-cita mereka bersama.
        </p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="tel:+62274123456" class="btn btn-primary">
                <i class="fas fa-phone text-sm"></i>Hubungi Sekolah
            </a>
            <a href="{{ route('gallery.index') }}" class="btn btn-outline">
                <i class="fas fa-images text-sm"></i>Lihat Galeri
            </a>
        </div>
    </div>
</section>

@endsection
