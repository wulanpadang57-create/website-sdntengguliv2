@extends('layouts.app')

@section('title', 'Home - SD Negeri 1 Tengguli')

@section('content')
<!-- Hero Slider dengan Animasi -->
<div x-data="{ activeSlide: 0, slides: {{ $sliders->count() }} }" class="relative bg-gradient-to-b from-red-600 to-red-700 h-screen overflow-hidden">
    @forelse($sliders as $index => $slider)
        <div x-show="activeSlide === {{ $index }}" 
             x-transition:enter="transition ease-in-out duration-1000"
             x-transition:leave="transition ease-in-out duration-1000"
             class="absolute inset-0">
            <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-r from-red-600/80 to-red-700/80"></div>
            
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center text-white px-4 max-w-4xl mx-auto animate-fade-in">
                    <h1 class="text-5xl md:text-7xl font-bold mb-4 leading-tight">
                        @if($slider->title)
                            {{ $slider->title }}
                        @else
                            SD Negeri 1 Tengguli
                        @endif
                    </h1>
                    @if($slider->caption)
                        <p class="text-xl md:text-2xl mb-8 text-gray-100">{{ $slider->caption }}</p>
                    @else
                        <p class="text-xl md:text-2xl mb-8 text-gray-100">Raih Masa Depan Gemilang Bersama Kami</p>
                    @endif
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        @if($slider->button_text && $slider->button_url)
                            <a href="{{ $slider->button_url }}" class="btn-primary px-8 py-3 text-lg">{{ $slider->button_text }}</a>
                        @else
                            <a href="{{ route('news.index') }}" class="bg-white text-red-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-bold transition transform hover:scale-105">Pelajari Lebih Lanjut</a>
                        @endif
                        <a href="{{ route('teacher.index') }}" class="border-2 border-white hover:bg-white hover:text-red-600 px-8 py-3 rounded-lg font-bold transition transform hover:scale-105">Bertemu Guru Kami</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white px-4 max-w-4xl mx-auto">
                <h1 class="text-6xl md:text-7xl font-bold mb-4">SD Negeri 1 Tengguli</h1>
                <p class="text-2xl md:text-3xl mb-8 text-gray-100">Raih Masa Depan Gemilang Bersama Kami</p>
                <a href="{{ route('news.index') }}" class="bg-white text-red-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-bold text-lg transition inline-block">Jelajahi Sekarang</a>
            </div>
        </div>
    @endforelse

    <!-- Navigation Dots dengan Improved Design -->
    @if($sliders->count() > 1)
        <div class="absolute bottom-12 left-0 right-0 flex justify-center space-x-3 z-10">
            @for($i = 0; $i < $sliders->count(); $i++)
                <button @click="activeSlide = {{ $i }}" 
                        :class="activeSlide === {{ $i }} ? 'w-8 bg-white' : 'w-3 bg-white bg-opacity-50 hover:bg-opacity-75'"
                        class="h-3 rounded-full transition duration-300">
                </button>
            @endfor
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                setInterval(() => {
                    let el = document.querySelector('[x-data*="activeSlide"]');
                    if (el && el.__x) {
                        let data = el.__x.$data;
                        data.activeSlide = (data.activeSlide + 1) % data.slides;
                    }
                }, 5000);
            });
        </script>
    @endif
</div>

<!-- Pengumuman dengan Better Design -->
@if($announcements->count() > 0)
<section class="bg-gradient-to-r from-red-600 to-red-700 text-white py-6 sticky top-16 z-40 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center space-x-4 animate-pulse">
            <i class="fas fa-bell text-2xl flex-shrink-0"></i>
            <div class="flex-1">
                <p class="font-bold text-sm">PENGUMUMAN PENTING</p>
                <p class="text-sm">{{ $announcements->first()->title }}</p>
            </div>
            <i class="fas fa-arrow-right hidden sm:block"></i>
        </div>
    </div>
</section>
@endif

<!-- Tentang Sekolah - Enhanced -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="order-2 lg:order-1">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1427504494785-cdff41400914?w=600&h=500&fit=crop" alt="Sekolah" class="rounded-2xl shadow-2xl hover:shadow-3xl transition transform hover:scale-105">
                    <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-red-600 rounded-2xl opacity-10"></div>
                </div>
            </div>
            <div class="order-1 lg:order-2" data-aos="fade-left" data-aos-duration="800">
                <div class="space-y-2 mb-6">
                    <p class="text-red-600 font-bold uppercase tracking-wider bounce-in-up">Tentang Kami</p>
                    <h2 class="text-5xl font-bold text-gray-900 bounce-in-down">SD Negeri 1 Tengguli</h2>
                </div>
                <p class="text-gray-600 text-lg leading-relaxed mb-8 fade-blur">
                    Sekolah Dasar Negeri 1 Tengguli adalah lembaga pendidikan yang berkomitmen untuk memberikan pendidikan berkualitas tinggi kepada setiap siswa. Dengan kurikulum modern dan pendekatan pembelajaran yang student-centered, kami mempersiapkan generasi muda untuk menghadapi tantangan masa depan.
                </p>
                
                <div class="space-y-4 mb-8">
                    <div class="flex items-start space-x-4 group bounce-in-left" data-aos="fade-up" data-aos-delay="100">
                        <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-full flex items-center justify-center group-hover:bg-red-600 transition group-hover:scale-110 group-hover:rotate-12">
                            <i class="fas fa-star text-red-600 group-hover:text-white transition group-hover:scale-125"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg group-hover:text-red-600 transition">Visi & Misi</h3>
                            <p class="text-gray-600 text-sm">Membangun karakter unggul dan berakhlak mulia</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4 group bounce-in-left" data-aos="fade-up" data-aos-delay="200">
                        <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-full flex items-center justify-center group-hover:bg-red-600 transition group-hover:scale-110 group-hover:rotate-12">
                            <i class="fas fa-building text-red-600 group-hover:text-white transition group-hover:scale-125"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg group-hover:text-red-600 transition">Fasilitas Lengkap</h3>
                            <p class="text-gray-600 text-sm">Nyaman dan mendukung pembelajaran modern</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4 group bounce-in-left" data-aos="fade-up" data-aos-delay="300">
                        <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-full flex items-center justify-center group-hover:bg-red-600 transition group-hover:scale-110 group-hover:rotate-12">
                            <i class="fas fa-users text-red-600 group-hover:text-white transition group-hover:scale-125"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg group-hover:text-red-600 transition">Guru Profesional</h3>
                            <p class="text-gray-600 text-sm">Berpengalaman dan dedikasi tinggi</p>
                        </div>
            </div>
                </div>
                
                <a href="{{ route('page.show', 'tentang') }}" class="btn-primary inline-block px-8 py-3 text-lg hover:shadow-lg transition transform hover:-translate-y-1">
                    <i class="fas fa-arrow-right mr-2"></i>Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Statistik - Animated Counters -->
<section class="py-16 bg-gradient-to-r from-red-600 via-red-700 to-red-800 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 -left-4 w-72 h-72 bg-red-400 rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute -bottom-8 right-0 w-72 h-72 bg-red-300 rounded-full mix-blend-multiply filter blur-3xl"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <h2 class="text-4xl font-bold text-center mb-16">Statistik Sekolah</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center group cursor-pointer flip-in-x" x-data="{ count: 0 }" x-intersect="count = 500">
                <div class="mb-4 group-hover:scale-110 transition duration-300 transform group-hover:rotate-12 animate-pulse">
                    <i class="fas fa-users text-6xl"></i>
                </div>
                <p class="text-5xl font-bold mb-2 text-shimmer" x-text="count + '+'"></p>
                <p class="text-lg opacity-90">Siswa Aktif</p>
                <p class="text-sm opacity-75 mt-2">Dari berbagai tingkat kelas</p>
            </div>
            
            <div class="text-center group cursor-pointer flip-in-x" x-data="{ count: 0 }" x-intersect="count = 35" style="animation-delay: 0.1s;">
                <div class="mb-4 group-hover:scale-110 transition duration-300 transform group-hover:rotate-12 animate-pulse" style="animation-delay: 0.2s;">
                    <i class="fas fa-chalkboard-user text-6xl"></i>
                </div>
                <p class="text-5xl font-bold mb-2 text-shimmer" x-text="count + '+'"></p>
                <p class="text-lg opacity-90">Tenaga Profesional</p>
                <p class="text-sm opacity-75 mt-2">Guru bersertifikat & terlatih</p>
            </div>
            
            <div class="text-center group cursor-pointer flip-in-x" x-data="{ count: 0 }" x-intersect="count = 25" style="animation-delay: 0.2s;">
                <div class="mb-4 group-hover:scale-110 transition duration-300 transform group-hover:rotate-12 animate-pulse" style="animation-delay: 0.3s;">
                    <i class="fas fa-door-open text-6xl"></i>
                </div>
                <p class="text-5xl font-bold mb-2 text-shimmer" x-text="count + '+'"></p>
                <p class="text-lg opacity-90">Ruangan Modern</p>
                <p class="text-sm opacity-75 mt-2">Dilengkapi teknologi terkini</p>
            </div>
            
            <div class="text-center group cursor-pointer flip-in-x" x-data="{ count: 0 }" x-intersect="count = 150" style="animation-delay: 0.3s;">
                <div class="mb-4 group-hover:scale-110 transition duration-300 transform group-hover:rotate-12 animate-pulse" style="animation-delay: 0.4s;">
                    <i class="fas fa-trophy text-6xl"></i>
                </div>
                <p class="text-5xl font-bold mb-2 text-shimmer" x-text="count + '+'"></p>
                <p class="text-lg opacity-90">Prestasi & Penghargaan</p>
                <p class="text-sm opacity-75 mt-2">Tingkat lokal hingga nasional</p>
            </div>
        </div>
    </div>
</section>

<!-- Berita Terbaru - Enhanced Cards -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-red-600 font-bold uppercase tracking-wider mb-2">Informasi Terkini</p>
            <h2 class="text-5xl font-bold text-gray-900">
                Berita <span class="text-red-600">Terbaru</span>
            </h2>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Tetap update dengan berita dan informasi terbaru dari SD Negeri 1 Tengguli</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($recentNews as $index => $news)
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 overflow-hidden cursor-pointer transform hover:-translate-y-2 zoom-in" style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="relative overflow-hidden h-48">
                        @if($news->featured_image)
                            <img src="{{ asset('storage/' . $news->featured_image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center group-hover:scale-110 transition duration-500">
                                <i class="fas fa-newspaper text-white text-5xl opacity-50"></i>
                            </div>
                        @endif
                        <div class="absolute top-4 right-4 bg-red-600 text-white px-4 py-2 rounded-full text-xs font-bold pop" style="animation-delay: {{ $index * 0.1 + 0.2 }}s;">{{ $news->category?->name ?? 'Umum' }}</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition line-clamp-2">{{ $news->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ strip_tags(Str::limit($news->content, 100)) }}</p>
                        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                            <p class="text-gray-500 text-xs">{{ $news->published_at->format('d M Y') }}</p>
                            <a href="{{ route('news.show', $news->slug) }}" class="text-red-600 hover:text-red-700 font-bold text-sm group-hover:translate-x-2 transition inline-block">Selengkapnya →</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600 col-span-full py-12">Belum ada berita</p>
            @endforelse
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('news.index') }}" class="btn-primary px-8 py-3 text-lg inline-block hover:shadow-lg transition transform hover:-translate-y-1">
                <i class="fas fa-newspaper mr-2"></i>Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- Prestasi - Better Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-red-600 font-bold uppercase tracking-wider mb-2">Kebanggaan Kami</p>
            <h2 class="text-5xl font-bold text-gray-900">
                Prestasi <span class="text-red-600">Siswa</span>
            </h2>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Berbagai penghargaan dan prestasi telah diraih oleh siswa-siswi kami</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($achievements as $index => $achievement)
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition duration-300 border-l-4 border-transparent hover:border-red-600 transform hover:-translate-y-2 bounce-in-up" style="animation-delay: {{ $index * 0.15 }}s;">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-300 to-yellow-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition transform group-hover:rotate-12 heartbeat">
                            <i class="fas fa-star text-yellow-700 text-2xl group-hover:scale-150 transition"></i>
                        </div>
                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-bold pop">{{ $achievement->category }}</span>
                    </div>
                    
                    @if($achievement->achievement_image)
                        <img src="{{ asset('storage/' . $achievement->achievement_image) }}" alt="{{ $achievement->title }}" class="w-full h-32 object-cover rounded-lg mb-4 transform group-hover:scale-105 transition duration-300">
                    @endif
                    
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-red-600 transition">{{ $achievement->title }}</h3>
                    <p class="text-gray-600 text-sm mb-1"><i class="fas fa-user-graduate mr-2 text-red-600 group-hover:scale-125 transition"></i>{{ $achievement->student_name ?? 'Siswa SD 1 Tengguli' }}</p>
                    <p class="text-gray-500 text-xs"><i class="fas fa-calendar mr-2 text-red-600 group-hover:scale-125 transition"></i>{{ $achievement->achievement_date->format('d M Y') }}</p>
                </div>
            @empty
                <p class="text-center text-gray-600 col-span-full py-12">Belum ada prestasi</p>
            @endforelse
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('achievement.index') }}" class="btn-primary px-8 py-3 text-lg inline-block hover:shadow-lg transition transform hover:-translate-y-1">
                <i class="fas fa-trophy mr-2"></i>Lihat Semua Prestasi
            </a>
        </div>
    </div>
</section>

<!-- Guru Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-red-600 font-bold uppercase tracking-wider mb-2">Tim Pendidik</p>
            <h2 class="text-5xl font-bold text-gray-900">
                Guru <span class="text-red-600">Profesional</span>
            </h2>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Tenaga pengajar berpengalaman dan berdedikasi tinggi</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            @forelse($teachers->take(3) as $index => $teacher)
                <div class="group bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-2 text-center flip-in-y" style="animation-delay: {{ $index * 0.15 }}s;">
                    @if($teacher->photo)
                        <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}" class="w-24 h-24 rounded-full object-cover mx-auto mb-4 border-4 border-red-600 group-hover:scale-110 transition transform group-hover:rotate-12">
                    @else
                        <div class="w-24 h-24 rounded-full mx-auto mb-4 border-4 border-red-600 flex items-center justify-center bg-gradient-to-br from-red-400 to-red-600 group-hover:scale-110 transition transform group-hover:rotate-12">
                            <i class="fas fa-user text-white text-3xl"></i>
                        </div>
                    @endif
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-red-600 transition">{{ $teacher->name }}</h3>
                    <p class="text-red-600 font-semibold mb-2 group-hover:scale-110 transition inline-block">{{ $teacher->position }}</p>
                    <p class="text-gray-600 text-sm line-clamp-2">{{ $teacher->subjects ?? 'Guru Berkualitas' }}</p>
                </div>
            @empty
            @endforelse
        </div>

        <div class="text-center">
            <a href="{{ route('teacher.index') }}" class="btn-primary px-8 py-3 text-lg inline-block hover:shadow-lg transition transform hover:-translate-y-1">
                <i class="fas fa-users mr-2"></i>Lihat Semua Guru
            </a>
        </div>
    </div>
</section>

<!-- Testimonials - Interactive -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-red-600 font-bold uppercase tracking-wider mb-2">Apa Kata Mereka</p>
            <h2 class="text-5xl font-bold text-gray-900">
                Testimoni <span class="text-red-600">Orang Tua & Siswa</span>
            </h2>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Kepuasan orang tua dan prestasi siswa adalah prioritas utama kami</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-2 bounce-in-down" data-aos="fade-up" style="animation-delay: 0;">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400 animate-pulse">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">Sekolah yang luar biasa dengan guru-guru yang berdedikasi. Anak saya berkembang pesat baik akademik maupun kepribadiannya.</p>
                <div class="flex items-center space-x-4 border-t pt-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-400 to-red-600 rounded-full flex items-center justify-center text-white transform group-hover:scale-125 transition">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-900">Ibu Siti</p>
                        <p class="text-sm text-gray-600">Orang Tua Siswa</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-2 bounce-in-down" data-aos="fade-up" data-aos-delay="100" style="animation-delay: 0.1s;">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400 animate-pulse" style="animation-delay: 0.1s;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">Fasilitas yang lengkap dan lingkungan belajar yang sangat mendukung. Anak saya senang belajar di sekolah ini.</p>
                <div class="flex items-center space-x-4 border-t pt-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-400 to-red-600 rounded-full flex items-center justify-center text-white transform group-hover:scale-125 transition">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-900">Pak Ahmad</p>
                        <p class="text-sm text-gray-600">Orang Tua Siswa</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-2 bounce-in-down" data-aos="fade-up" data-aos-delay="200" style="animation-delay: 0.2s;">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400 animate-pulse" style="animation-delay: 0.2s;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">SD Negeri 1 Tengguli adalah pilihan terbaik untuk pendidikan anak. Sangat merekomendasikan kepada semua orang tua.</p>
                <div class="flex items-center space-x-4 border-t pt-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-400 to-red-600 rounded-full flex items-center justify-center text-white transform group-hover:scale-125 transition">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-900">Ibu Nita</p>
                        <p class="text-sm text-gray-600">Orang Tua Siswa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section - Interactive -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-red-600 font-bold uppercase tracking-wider mb-2">Pertanyaan Umum</p>
            <h2 class="text-5xl font-bold text-gray-900">
                <span class="text-red-600">FAQ</span> - Sering Ditanyakan
            </h2>
        </div>
        
        <div class="space-y-4">
            <!-- FAQ Item 1 -->
            <div class="bg-gray-50 rounded-lg overflow-hidden hover:shadow-lg transition duration-300 bounce-in-up" style="animation-delay: 0;">
                <button class="w-full px-6 py-5 flex justify-between items-center font-bold text-gray-900 text-left hover:bg-red-50 transition" data-accordion-toggle="faq-1">
                    <span class="flex items-center space-x-3">
                        <i class="fas fa-graduation-cap text-red-600 group-hover:rotate-12 transition"></i>
                        <span>Apa saja syarat pendaftaran?</span>
                    </span>
                    <i class="fas fa-chevron-down transition duration-300 transform group-hover:rotate-180"></i>
                </button>
                <div id="faq-1" class="hidden px-6 py-4 text-gray-600 bg-white fade-blur">
                    <p>Siswa dapat mendaftar dengan membawa fotokopi akta kelahiran, kartu keluarga, foto 2x3 sebanyak 4 lembar, dan sudah menyelesaikan pendidikan TK atau sederajat.</p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="bg-gray-50 rounded-lg overflow-hidden hover:shadow-lg transition duration-300 bounce-in-up" style="animation-delay: 0.1s;">
                <button class="w-full px-6 py-5 flex justify-between items-center font-bold text-gray-900 text-left hover:bg-red-50 transition" data-accordion-toggle="faq-2">
                    <span class="flex items-center space-x-3">
                        <i class="fas fa-calendar text-red-600 group-hover:rotate-12 transition"></i>
                        <span>Kapan pendaftaran dibuka?</span>
                    </span>
                    <i class="fas fa-chevron-down transition duration-300 transform group-hover:rotate-180"></i>
                </button>
                <div id="faq-2" class="hidden px-6 py-4 text-gray-600 bg-white fade-blur">
                    <p>Pendaftaran dibuka setiap tahun pada bulan Januari hingga Maret. Untuk informasi lebih detail, silakan hubungi kantor sekolah kami.</p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="bg-gray-50 rounded-lg overflow-hidden hover:shadow-lg transition duration-300 bounce-in-up" style="animation-delay: 0.2s;">
                <button class="w-full px-6 py-5 flex justify-between items-center font-bold text-gray-900 text-left hover:bg-red-50 transition" data-accordion-toggle="faq-3">
                    <span class="flex items-center space-x-3">
                        <i class="fas fa-dollar-sign text-red-600 group-hover:rotate-12 transition"></i>
                        <span>Berapa biaya pendidikan?</span>
                    </span>
                    <i class="fas fa-chevron-down transition duration-300 transform group-hover:rotate-180"></i>
                </button>
                <div id="faq-3" class="hidden px-6 py-4 text-gray-600 bg-white fade-blur">
                    <p>SD Negeri 1 Tengguli adalah sekolah negeri, sehingga biaya pendidikan sangat terjangkau. Untuk detail rincian biaya, silakan datang langsung ke sekolah.</p>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="bg-gray-50 rounded-lg overflow-hidden hover:shadow-lg transition duration-300 bounce-in-up" style="animation-delay: 0.3s;">
                <button class="w-full px-6 py-5 flex justify-between items-center font-bold text-gray-900 text-left hover:bg-red-50 transition" data-accordion-toggle="faq-4">
                    <span class="flex items-center space-x-3">
                        <i class="fas fa-book text-red-600 group-hover:rotate-12 transition"></i>
                        <span>Kurikulum apa yang digunakan?</span>
                    </span>
                    <i class="fas fa-chevron-down transition duration-300 transform group-hover:rotate-180"></i>
                </button>
                <div id="faq-4" class="hidden px-6 py-4 text-gray-600 bg-white fade-blur">
                    <p>Kami menggunakan Kurikulum 2013 yang telah disesuaikan dengan kebutuhan pendidikan nasional dan pengembangan karakter siswa.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA - Enhanced -->
<section class="py-20 bg-gradient-to-r from-red-600 to-red-700 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <svg class="absolute w-full h-full" preserveAspectRatio="none" viewBox="0 0 1200 120">
            <path d="M0,50 Q300,100 600,50 T1200,50 L1200,0 L0,0 Z" fill="currentColor"></path>
        </svg>
    </div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-5xl font-bold mb-6 bounce-in-down">Bergabunglah dengan Kami</h2>
        <p class="text-xl opacity-90 mb-4 leading-relaxed fade-blur">Raih kesempatan emas untuk mendapatkan pendidikan berkualitas tinggi dan membangun masa depan gemilang di SD Negeri 1 Tengguli</p>
        <p class="text-lg opacity-80 mb-8 fade-blur" style="animation-delay: 0.1s;">Daftarkan putra/putri Anda sekarang dan jadilah bagian dari keluarga besar sekolah kami</p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center pt-6">
            <a href="#" class="bg-white text-red-600 hover:bg-gray-100 px-8 py-4 rounded-lg font-bold text-lg transition transform hover:scale-105 shadow-lg slide-in-left heartbeat" style="animation-delay: 0.2s;">
                <i class="fas fa-pencil-alt mr-2"></i>Daftar Sekarang
            </a>
            <a href="{{ route('news.index') }}" class="border-2 border-white hover:bg-white hover:text-red-600 px-8 py-4 rounded-lg font-bold text-lg transition transform hover:scale-105 slide-in-right" style="animation-delay: 0.3s;">
                <i class="fas fa-info-circle mr-2"></i>Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
</section>

@endsection
