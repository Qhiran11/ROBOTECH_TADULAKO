<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Robotech Tadulako')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header & Navigasi -->
    <header class="bg-white shadow-md">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div>
                <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800">
                    ROBOTECH<span class="text-blue-600">UNTAD</span>
                </a>
            </div>
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600">Beranda</a>
                <a href="#!" class="text-gray-600 hover:text-blue-600">Tentang Kami</a>
                <a href="{{ route('struktur') }}" class="text-gray-600 hover:text-blue-600">Struktur Organisasi</a>
                <a href="#!" class="text-gray-600 hover:text-blue-600">KRI</a>
                <a href="#!" class="text-gray-600 hover:text-blue-600">Berita</a>
                <a href="#!" class="text-gray-600 hover:text-blue-600">Anggota</a>
                <a href="#!" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Kontak</a>
            </div>
             <!-- Tombol Menu Mobile -->
            <div class="md:hidden">
                <button id="menu-btn" class="text-gray-600 hover:text-blue-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </nav>
         <!-- Menu Mobile -->
        <div id="mobile-menu" class="md:hidden hidden px-6 pb-4 space-y-2">
            <a href="{{ route('home') }}" class="block text-gray-600 hover:text-blue-600">Beranda</a>
            <a href="#!" class="block text-gray-600 hover:text-blue-600">Tentang Kami</a>
            <a href="{{ route('struktur') }}" class="block text-gray-600 hover:text-blue-600">Struktur Organisasi</a>
            <a href="#!" class="block text-gray-600 hover:text-blue-600">KRI</a>
            <a href="#!" class="block text-gray-600 hover:text-blue-600">Berita</a>
            <a href="#!" class="block text-gray-600 hover:text-blue-600">Anggota</a>
            <a href="#!" class="block bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 text-center">Kontak</a>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="container mx-auto px-6 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2025 Robotech Tadulako. All Rights Reserved.</p>
            <p class="text-sm text-gray-400 mt-2">
                Dikembangkan dengan ❤️ oleh Divisi IRIS
            </p>
        </div>
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2025 Robotech Tadulako. All Rights Reserved.</p>
            <p class="text-sm text-gray-400 mt-2">
                Dikembangkan dengan ❤️ oleh Divisi IRIS
            </p>
            <div class="mt-4">
                <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white">Login Admin</a>
            </div>
            </div>
    </footer>

    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
