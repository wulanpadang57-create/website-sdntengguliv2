<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - SD Negeri 1 Tengguli</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 text-white fixed h-screen overflow-y-auto">
            <div class="p-6 border-b border-gray-700">
                <h1 class="text-2xl font-bold">SD 1 Tengguli</h1>
                <p class="text-sm text-gray-400 mt-1">Admin Panel</p>
            </div>

            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 hover:bg-gray-800 transition {{ request()->routeIs('admin.dashboard') ? 'bg-red-600' : '' }}">
                    <i class="fas fa-chart-line mr-3"></i> Dashboard
                </a>
                
                <x-section-menu-admin label="Konten" :items="[
                    ['Berita', 'admin.news.index', 'fas fa-newspaper'],
                    ['Pengumuman', 'admin.announcements.index', 'fas fa-bullhorn'],
                    ['Prestasi', 'admin.achievements.index', 'fas fa-trophy'],
                    ['Galeri', 'admin.galleries.index', 'fas fa-images'],
                    ['Video', 'admin.videos.index', 'fas fa-video'],
                ]" />

                <x-section-menu-admin label="Data" :items="[
                    ['Guru & Staff', 'admin.teachers.index', 'fas fa-chalkboard-user'],
                    ['Slider/Banner', 'admin.sliders.index', 'fas fa-images'],
                ]" />

                <x-section-menu-admin label="Sistem" :items="[
                    ['User Management', 'admin.users.index', 'fas fa-users'],
                    ['Pengaturan', 'admin.settings.index', 'fas fa-cog'],
                ]" />
            </nav>

            <div class="absolute bottom-0 w-64 border-t border-gray-700 p-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full block text-left px-6 py-3 hover:bg-gray-800 transition">
                        <i class="fas fa-sign-out-alt mr-3"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-64 flex-1">
            <!-- Top Bar -->
            <div class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-900">@yield('title')</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">{{ auth()->user()->name }}</span>
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt="Avatar" class="w-10 h-10 rounded-full">
                </div>
            </div>

            <!-- Content -->
            <div class="p-8">
                @if($errors->any())
                    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
