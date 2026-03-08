<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SD Negeri 1 Tengguli - Sekolah Dasar terbaik di Jawa Tengah">
    <title>@yield('title', 'SD Negeri 1 Tengguli')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css">
    @stack('styles')
</head>
<body>

    {{-- Scroll progress --}}
    <div id="progress-bar"></div>

    {{-- ======================== NAVBAR ======================== --}}
    <nav id="navbar" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-lg bg-red-600 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-school text-white text-sm"></i>
                    </div>
                    <div class="leading-tight">
                        <div class="font-bold text-sm" id="nav-title">SD Negeri 1 Tengguli</div>
                        <div class="text-xs opacity-70" id="nav-sub">Jawa Tengah</div>
                    </div>
                </a>

                {{-- Desktop links --}}
                <div class="hidden md:flex items-center gap-1">
                    @foreach([
                        ['home','Beranda'],
                        ['news.index','Berita'],
                        ['achievement.index','Prestasi'],
                        ['gallery.index','Galeri'],
                        ['teacher.index','Guru & Staff'],
                    ] as [$route, $label])
                    <a href="{{ route($route) }}" class="nav-link {{ request()->routeIs($route) ? 'active' : '' }}">
                        {{ $label }}
                    </a>
                    @endforeach

                </div>

                {{-- Mobile hamburger --}}
                <button @click="open = !open"
                        class="md:hidden w-10 h-10 rounded-lg flex items-center justify-center transition-colors"
                        id="nav-hamburger"
                        aria-label="Menu">
                    <i :class="open ? 'fa-xmark' : 'fa-bars'" class="fas text-xl"></i>
                </button>
            </div>

            {{-- Mobile menu --}}
            <div x-show="open"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-2"
                 @click.outside="open = false"
                 class="md:hidden absolute left-4 right-4 top-[68px] bg-white rounded-2xl shadow-xl border border-gray-100 p-3 z-50">
                @foreach([
                    ['home','Beranda','fa-house'],
                    ['news.index','Berita','fa-newspaper'],
                    ['achievement.index','Prestasi','fa-trophy'],
                    ['gallery.index','Galeri','fa-images'],
                    ['teacher.index','Guru & Staff','fa-chalkboard-user'],
                ] as [$route, $label, $icon])
                <a href="{{ route($route) }}" @click="open = false"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                    <i class="fas {{ $icon }} w-4 text-red-500 text-sm"></i>{{ $label }}
                </a>
                @endforeach
            </div>
        </div>
    </nav>

    {{-- ======================== MAIN ======================== --}}
    <main>@yield('content')</main>

    {{-- ======================== FOOTER ======================== --}}
    <footer class="footer">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-white/10">

                {{-- Brand --}}
                <div>
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0" style="background:#2aad8c">
                            <i class="fas fa-school text-white text-lg"></i>
                        </div>
                        <div>
                            <div class="font-bold text-white text-sm">SD Negeri 1 Tengguli</div>
                            <div class="text-xs text-white/50">Jawa Tengah, Indonesia</div>
                        </div>
                    </div>
                    <p class="text-white/60 text-sm leading-relaxed mb-5">
                        Lembaga pendidikan yang berkomitmen mengembangkan potensi siswa dengan pendidikan berkarakter dan berwawasan luas.
                    </p>
                    <div class="flex gap-2">
                        <a href="#" class="social-btn"><i class="fab fa-facebook-f text-sm"></i></a>
                        <a href="#" class="social-btn"><i class="fab fa-instagram text-sm"></i></a>
                        <a href="#" class="social-btn"><i class="fab fa-youtube text-sm"></i></a>
                        <a href="#" class="social-btn"><i class="fab fa-whatsapp text-sm"></i></a>
                    </div>
                </div>

                {{-- Navigasi --}}
                <div>
                    <div class="footer-title">Navigasi</div>
                    <div class="space-y-2.5">
                        @foreach([
                            ['home','Beranda'],
                            ['news.index','Berita & Informasi'],
                            ['achievement.index','Prestasi Siswa'],
                            ['gallery.index','Galeri Foto'],
                            ['teacher.index','Guru & Staff'],
                        ] as [$r,$l])
                        <a href="{{ route($r) }}" class="footer-link block">
                            <i class="fas fa-chevron-right text-xs text-red-500"></i>{{ $l }}
                        </a>
                        @endforeach
                    </div>
                </div>

                {{-- Kontak --}}
                <div>
                    <div class="footer-title">Kontak Kami</div>
                    <div class="space-y-4">
                        @foreach([
                            ['fa-map-marker-alt','Tengguli, Jawa Tengah, Indonesia'],
                            ['fa-phone','(0274) 123-456'],
                            ['fa-envelope','info@sd1tengguli.sch.id'],
                            ['fa-clock','Sen–Jum: 07.00–14.00 WIB'],
                        ] as [$icon,$text])
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0"
                                 style="background:rgba(42,173,140,.15)">
                                <i class="fas {{ $icon }} text-red-400 text-xs"></i>
                            </div>
                            <p class="text-white/60 text-sm leading-relaxed pt-1">{{ $text }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Map --}}
                <div>
                    <div class="footer-title">Lokasi Kami</div>
                    <div id="footer-map" class="w-full rounded-xl overflow-hidden" style="height:180px;background:#0d5c4a"></div>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-white/40 text-sm">&copy; {{ date('Y') }} SD Negeri 1 Tengguli. Hak cipta dilindungi.</p>
                <div class="flex items-center gap-5">
                    <a href="#" class="text-white/40 hover:text-white text-sm transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="text-white/40 hover:text-white text-sm transition-colors">Syarat Layanan</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Scripts --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', () => {

        // ---------- Scroll Progress ----------
        const bar = document.getElementById('progress-bar');
        if (bar) {
            window.addEventListener('scroll', () => {
                const pct = window.scrollY / (document.documentElement.scrollHeight - window.innerHeight) * 100;
                bar.style.width = pct + '%';
            });
        }

        // ---------- Navbar scroll state ----------
        const nav = document.getElementById('navbar');
        const navTitle = document.getElementById('nav-title');
        const navSub   = document.getElementById('nav-sub');
        const navBurger= document.getElementById('nav-hamburger');

        const applyNav = () => {
            const scrolled = window.scrollY > 60;
            if (scrolled) {
                nav.classList.add('scrolled');
                if (navTitle) { navTitle.style.color = '#111827'; }
                if (navSub)   { navSub.style.color = '#6b7280'; }
                if (navBurger){ navBurger.style.color = '#111827'; }
            } else {
                nav.classList.remove('scrolled');
                if (navTitle) { navTitle.style.color = '#fff'; }
                if (navSub)   { navSub.style.color = 'rgba(255,255,255,.7)'; }
                if (navBurger){ navBurger.style.color = '#fff'; }
            }
        };
        applyNav();
        window.addEventListener('scroll', applyNav);

        // ---------- Scroll Reveal ----------
        const ro = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) { e.target.classList.add('revealed'); ro.unobserve(e.target); }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });

        document.querySelectorAll('[data-reveal]').forEach(el => ro.observe(el));

        const rg = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const children = entry.target.children;
                Array.from(children).forEach((child, i) => {
                    setTimeout(() => child.classList.add('revealed'), i * 100);
                });
                rg.unobserve(entry.target);
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('[data-reveal-group]').forEach(el => rg.observe(el));

        // ---------- Animated Counters ----------
        const co = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (!e.isIntersecting) return;
                const el = e.target;
                const target = +el.dataset.target || 0;
                const suffix = el.dataset.suffix || '';
                const duration = 1600;
                const step = target / (duration / 16);
                let cur = 0;
                const timer = setInterval(() => {
                    cur = Math.min(cur + step, target);
                    el.textContent = Math.floor(cur).toLocaleString('id') + suffix;
                    if (cur >= target) clearInterval(timer);
                }, 16);
                co.unobserve(el);
            });
        }, { threshold: 0.5 });
        document.querySelectorAll('[data-counter]').forEach(el => co.observe(el));

        // ---------- Typed text ----------
        document.querySelectorAll('[data-typed]').forEach(el => {
            const words = JSON.parse(el.dataset.typed || '[]');
            if (!words.length) return;
            let i = 0, w = 0, del = false;
            const run = () => {
                const word = words[w % words.length];
                el.textContent = del ? word.substring(0, i--) : word.substring(0, i++);
                let delay = del ? 50 : 110;
                if (!del && i > word.length)  { delay = 2000; del = true; }
                if (del  && i < 0)             { del = false; w++; delay = 400; i = 0; }
                setTimeout(run, delay);
            };
            run();
        });

        // ---------- Footer Map ----------
        const mapEl = document.getElementById('footer-map');
        if (mapEl && window.L) {
            const lat = -7.8056, lng = 110.4158;
            const map = L.map('footer-map', { zoomControl: true, scrollWheelZoom: false }).setView([lat, lng], 14);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap', maxZoom: 19
            }).addTo(map);
            const icon = L.divIcon({
                html: `<div style="width:32px;height:32px;background:#2aad8c;border-radius:50% 50% 50% 0;transform:rotate(-45deg);display:flex;align-items:center;justify-content:center;border:3px solid #fff;box-shadow:0 4px 12px rgba(42,173,140,.5)"><i class="fas fa-school" style="color:#fff;transform:rotate(45deg);font-size:11px"></i></div>`,
                className: '', iconSize: [32,32], iconAnchor: [16,32], popupAnchor: [0,-36]
            });
            L.marker([lat, lng], { icon }).addTo(map)
             .bindPopup('<strong style="color:#dc2626">SD Negeri 1 Tengguli</strong><br><small>Tengguli, Jawa Tengah</small>')
             .openPopup();
        }

    });
    </script>

    @stack('scripts')
</body>
</html>
