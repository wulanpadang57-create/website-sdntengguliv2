<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'SD 1 Tengguli') }} - Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 bg-gray-100 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <!-- Logo -->
        <div class="mb-6">
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                <i class="fas fa-school text-red-600 text-3xl"></i>
                <div>
                    <p class="font-bold text-red-600 text-xl">SD 1 Tengguli</p>
                    <p class="text-xs text-gray-600">Portal Admin</p>
                </div>
            </a>
        </div>

        <!-- Card -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>

        <!-- Footer Link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                <a href="{{ route('home') }}" class="text-red-600 hover:text-red-700 font-semibold">Kembali ke Beranda</a>
            </p>
        </div>
    </div>
</body>
</html>
