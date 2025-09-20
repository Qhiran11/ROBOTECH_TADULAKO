@extends('layouts.main')

@section('title', 'Beranda - Robotech Tadulako')

@section('content')
    <!-- Hero Section -->
    <div class="bg-white p-8 rounded-lg shadow-md text-center">
        <h1 class="text-4xl font-bold mb-4">Selamat Datang di Website Resmi Robotech Tadulako</h1>
        <p class="text-lg text-gray-600">
            Unit Kegiatan Mahasiswa (UKM) yang bergerak di bidang Teknologi dan Robotika Universitas Tadulako.
            Fokus utama kami adalah pada pengembangan, riset, inovasi, dan kompetisi di tingkat regional maupun nasional.
        </p>
        <div class="mt-8">
            <a href="{{ route('struktur') }}" class="bg-blue-600 text-white py-3 px-6 rounded-md hover:bg-blue-700 text-lg">
                Lihat Kepengurusan
            </a>
        </div>
    </div>

    <!-- Deskripsi Singkat Section -->
    <div class="mt-12 bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold mb-4 text-center">Apa itu Robotech Tadulako?</h2>
        <p class="text-gray-700 leading-relaxed text-justify">
            Robotech Tadulako adalah Unit Kegiatan Mahasiswa (UKM) tingkat universitas yang menjadi wadah bagi seluruh mahasiswa Universitas Tadulako dari berbagai jurusan dan fakultas untuk menyalurkan minat dan bakat di bidang teknologi dan robotika. Fokus utama kami adalah pengembangan teknologi, riset, serta mengikuti berbagai perlombaan robotika tingkat regional dan nasional, seperti Kontes Robot Indonesia (KRI) dan Lomba Teknologi Tepat Guna. Kami berkomitmen untuk terus berinovasi dan mengharumkan nama universitas di kancah nasional.
        </p>
    </div>

    <!-- Divisi KRI Section -->
    <div class="mt-12">
        <h2 class="text-3xl font-bold mb-6 text-center">Partisipasi Kami di Kontes Robot Indonesia (KRI)</h2>
        <div class="grid md:grid-cols-3 lg:grid-cols-5 gap-6">
            <!-- KRSBI -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h3 class="font-bold text-xl mb-2">KRSBI</h3>
                <p class="text-gray-600">Kontes Robot Sepak Bola Beroda Indonesia</p>
            </div>
            <!-- KRSTI -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h3 class="font-bold text-xl mb-2">KRSTI</h3>
                <p class="text-gray-600">Kontes Robot Seni Tari Indonesia</p>
            </div>
            <!-- KRAI -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h3 class="font-bold text-xl mb-2">KRAI</h3>
                <p class="text-gray-600">Kontes Robot ABU Indonesia</p>
            </div>
            <!-- KRSRI -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h3 class="font-bold text-xl mb-2">KRSRI</h3>
                <p class="text-gray-600">Kontes Robot SAR Indonesia</p>
            </div>
            <!-- KRTMI -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h3 class="font-bold text-xl mb-2">KRTMI</h3>
                <p class="text-gray-600">Kontes Robot Tematik Indonesia</p>
            </div>
        </div>
    </div>
@endsection
