<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SD Negeri 1 Tengguli')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Leaflet Maps -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    
    <!-- AOS - Animate On Scroll -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
    <!-- SweetAlert2 - Notifications -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="font-sans text-gray-900 bg-gray-50">
    <!-- Progress Bar -->
    <div id="progress-bar" class="fixed top-0 left-0 h-1 bg-gradient-to-r from-red-500 to-red-600 z-50 w-0 transition-all duration-300"></div>

    <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            <!-- Main Navbar -->
            <div class="flex justify-between items-center h-16 md:h-20">
                <!-- Logo - Responsive (Left) -->
                <div class="flex items-center space-x-2 sm:space-x-3 flex-shrink-0">
                    <i class="fas fa-school text-red-600 text-xl sm:text-2xl"></i>
                    <div class="hidden sm:block">
                        <p class="font-bold text-red-600 text-sm sm:text-lg leading-tight">SD 1 Tengguli</p>
                        <p class="text-xs text-gray-600">Jawa Tengah</p>
                    </div>
                </div>

                <!-- Desktop Menu (Right) -->
                <div class="hidden md:flex items-center space-x-1 lg:space-x-6">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-red-600 hover:bg-red-50 px-3 py-2 rounded-md text-sm lg:text-base font-medium transition">Beranda</a>
                    <a href="{{ route('news.index') }}" class="text-gray-700 hover:text-red-600 hover:bg-red-50 px-3 py-2 rounded-md text-sm lg:text-base font-medium transition">Berita</a>
                    <a href="{{ route('achievement.index') }}" class="text-gray-700 hover:text-red-600 hover:bg-red-50 px-3 py-2 rounded-md text-sm lg:text-base font-medium transition">Prestasi</a>
                    <a href="{{ route('gallery.index') }}" class="text-gray-700 hover:text-red-600 hover:bg-red-50 px-3 py-2 rounded-md text-sm lg:text-base font-medium transition">Galeri</a>
                    <a href="{{ route('teacher.index') }}" class="text-gray-700 hover:text-red-600 hover:bg-red-50 px-3 py-2 rounded-md text-sm lg:text-base font-medium transition">Guru</a>

                    <!-- Desktop User Menu (Right Side) -->
                    @auth
                        <div class="border-l border-gray-300 pl-6 ml-2">
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-red-600 hover:bg-red-50 px-2 sm:px-3 py-1.5 rounded-md text-xs sm:text-sm font-medium transition">
                                <i class="fas fa-user-circle"></i>
                                <span class="hidden sm:inline ml-1">{{ Auth::user()->name }}</span>
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-gray-700 hover:text-red-600 hover:bg-red-50 px-2 sm:px-3 py-1.5 rounded-md text-xs sm:text-sm transition">Logout</button>
                            </form>
                        </div>
                    @endauth
                </div>

                <!-- Mobile Menu Button (Right) -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-red-600 hover:bg-red-50 focus:outline-none transition">
                    <i :class="mobileMenuOpen ? 'fas fa-times' : 'fas fa-bars'" class="text-xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:leave="transition ease-in duration-150"
                 class="md:hidden border-t border-gray-200">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-red-600 hover:bg-red-50 block px-3 py-2 rounded-md text-base font-medium transition">
                        <i class="fas fa-home mr-2 text-red-600"></i>Beranda
                    </a>
                    <a href="{{ route('news.index') }}" class="text-gray-700 hover:text-red-600 hover:bg-red-50 block px-3 py-2 rounded-md text-base font-medium transition">
                        <i class="fas fa-newspaper mr-2 text-red-600"></i>Berita
                    </a>
                    <a href="{{ route('achievement.index') }}" class="text-gray-700 hover:text-red-600 hover:bg-red-50 block px-3 py-2 rounded-md text-base font-medium transition">
                        <i class="fas fa-trophy mr-2 text-red-600"></i>Prestasi
                    </a>
                    <a href="{{ route('gallery.index') }}" class="text-gray-700 hover:text-red-600 hover:bg-red-50 block px-3 py-2 rounded-md text-base font-medium transition">
                        <i class="fas fa-images mr-2 text-red-600"></i>Galeri
                    </a>
                    <a href="{{ route('teacher.index') }}" class="text-gray-700 hover:text-red-600 hover:bg-red-50 block px-3 py-2 rounded-md text-base font-medium transition">
                        <i class="fas fa-chalkboard-user mr-2 text-red-600"></i>Guru
                    </a>

                    <!-- Mobile User Menu -->
                    <div class="border-t border-gray-200 pt-2 mt-2 space-y-1">
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-red-600 hover:bg-red-50 block px-3 py-2 rounded-md text-base font-medium transition">
                                <i class="fas fa-user-circle mr-2 text-red-600"></i>{{ Auth::user()->name }}
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left text-gray-700 hover:text-red-600 hover:bg-red-50 px-3 py-2 rounded-md text-base font-medium transition">
                                    <i class="fas fa-sign-out-alt mr-2 text-red-600"></i>Logout
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-16">
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Grid Footer Content -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                    <!-- About -->
                    <div class="flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-red-500 mb-3 flex items-center">
                                <i class="fas fa-school mr-2"></i> SD Negeri 1 Tengguli
                            </h3>
                            <p class="text-gray-400 text-sm leading-relaxed">
                                Sekolah Dasar Negeri 1 Tengguli adalah lembaga pendidikan yang berkomitmen untuk mengembangkan potensi siswa secara optimal.
                            </p>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h3 class="text-lg font-bold text-red-500 mb-3 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i> Kontak
                        </h3>
                        <div class="space-y-3 text-sm text-gray-400">
                            <div class="flex items-start space-x-3 hover:text-red-400 transition">
                                <i class="fas fa-map-marker-alt text-red-500 mt-1 flex-shrink-0"></i>
                                <p>Tengguli, Jawa Tengah, Indonesia</p>
                            </div>
                            <div class="flex items-start space-x-3 hover:text-red-400 transition">
                                <i class="fas fa-phone text-red-500 mt-1 flex-shrink-0"></i>
                                <p>(0274) 123456</p>
                            </div>
                            <div class="flex items-start space-x-3 hover:text-red-400 transition">
                                <i class="fas fa-envelope text-red-500 mt-1 flex-shrink-0"></i>
                                <p>info@sd1tengguli.sch.id</p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media & Links -->
                    <div>
                        <h3 class="text-lg font-bold text-red-500 mb-3 flex items-center">
                            <i class="fas fa-share-alt mr-2"></i> Ikuti Kami
                        </h3>
                        <div class="flex flex-wrap gap-3 mb-6">
                            <a href="#" target="_blank" class="w-10 h-10 bg-gray-800 hover:bg-red-600 rounded-lg flex items-center justify-center transition transform hover:scale-110" title="Facebook">
                                <i class="fab fa-facebook-f text-white"></i>
                            </a>
                            <a href="#" target="_blank" class="w-10 h-10 bg-gray-800 hover:bg-red-600 rounded-lg flex items-center justify-center transition transform hover:scale-110" title="Instagram">
                                <i class="fab fa-instagram text-white"></i>
                            </a>
                            <a href="#" target="_blank" class="w-10 h-10 bg-gray-800 hover:bg-red-600 rounded-lg flex items-center justify-center transition transform hover:scale-110" title="Twitter">
                                <i class="fab fa-twitter text-white"></i>
                            </a>
                            <a href="#" target="_blank" class="w-10 h-10 bg-gray-800 hover:bg-red-600 rounded-lg flex items-center justify-center transition transform hover:scale-110" title="YouTube">
                                <i class="fab fa-youtube text-white"></i>
                            </a>
                        </div>
                        <div class="bg-gray-800 rounded-lg p-3 text-center text-xs text-gray-400 hover:bg-gray-700 transition">
                            <p>Hubungi kami untuk informasi lebih lanjut</p>
                        </div>
                    </div>

                    <!-- Mini Map -->
                    <div>
                        <h3 class="text-lg font-bold text-red-500 mb-3 flex items-center">
                            <i class="fas fa-map mr-2"></i> Lokasi
                        </h3>
                        <div id="footer-map" class="w-full h-56 rounded-lg shadow-lg border-2 border-red-600"></div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-700 pt-6 mt-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-center sm:text-left text-sm text-gray-400">
                        <p>&copy; 2026 SD Negeri 1 Tengguli. All rights reserved.</p>
                        <div class="flex justify-center sm:justify-end space-x-4">
                            <a href="#" class="hover:text-red-500 transition">Privacy Policy</a>
                            <a href="#" class="hover:text-red-500 transition">Terms of Service</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Website SD Negeri 1 Tengguli loaded');
            
            // Initialize Footer Map
            if (document.getElementById('footer-map')) {
                // Koordinat SD Negeri 1 Tengguli (Tengguli, Jawa Tengah)
                const schoolLat = -7.8056;
                const schoolLng = 110.4158;
                
                // Create map with minimal controls
                const footerMap = L.map('footer-map', {
                    zoomControl: true,
                    scrollWheelZoom: false
                }).setView([schoolLat, schoolLng], 13);
                
                // Add OpenStreetMap tiles
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap',
                    maxZoom: 19
                }).addTo(footerMap);
                
                // Add marker for school
                const marker = L.marker([schoolLat, schoolLng], {
                    icon: L.icon({
                        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-icon.png',
                        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-shadow.png',
                        iconSize: [25, 41],
                        shadowSize: [41, 41],
                        iconAnchor: [12, 41],
                        shadowAnchor: [12, 41],
                        popupAnchor: [1, -34]
                    })
                }).addTo(footerMap);
                
                marker.bindPopup(
                    '<div class="text-sm">' +
                    '<div class="font-bold text-red-600">SD Negeri 1 Tengguli</div>' +
                    '<p class="text-gray-700">Tengguli, Jawa Tengah</p>' +
                    '</div>', 
                    {maxWidth: 250, className: 'custom-popup'}
                ).openPopup();
                
                // Handle responsive map resize
                window.addEventListener('resize', function() {
                    footerMap.invalidateSize();
                });
            }
        });
    </script>
    
    <style>
        #footer-map {
            background-color: #f0f0f0;
        }
        
        .custom-popup .leaflet-popup-content-wrapper {
            background-color: white;
            border-radius: 8px;
        }
        
        .custom-popup .leaflet-popup-tip {
            background-color: white;
        }
        
        /* Responsive map styling */
        @media (max-width: 640px) {
            #footer-map {
                height: 200px !important;
            }
        }
        
        @media (min-width: 1024px) {
            #footer-map {
                height: 224px !important;
            }
        }
    </style>
</body>
</html>
