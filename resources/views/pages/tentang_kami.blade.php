@extends('layouts.main')
@section('title', 'Tentang Robotech Tadulako')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Tentang Kami</h1>
            <p class="text-gray-600 mt-2">Mengenal lebih dekat Unit Kegiatan Mahasiswa Robotech Tadulako.</p>
        </div>

        <div class="mb-12">
            <h2 class="text-3xl font-semibold mb-4 border-b-2 pb-2 border-blue-500">Sejarah</h2>
            <div class="prose max-w-none text-gray-700 leading-relaxed">
                <p>
                    Robotech Tadulako adalah unit kegiatan mahasiswa (UKM) tingkat universitas yang diresmikan pada [Tahun Berdiri]. Didirikan oleh sekelompok mahasiswa yang memiliki minat besar dalam bidang teknologi dan robotika, UKM ini bertujuan untuk menjadi wadah bagi seluruh mahasiswa Universitas Tadulako untuk belajar, berinovasi, dan berkompetisi. Sejak awal, fokus utama kami adalah pada pengembangan teknologi serta mengikuti berbagai perlombaan robotika bergengsi di tingkat regional maupun nasional.
                </p>
            </div>
        </div>

        <div>
            <h2 class="text-3xl font-semibold mb-4 border-b-2 pb-2 border-blue-500">Visi & Misi</h2>
            <div class="prose max-w-none text-gray-700 leading-relaxed">
                <h3 class="font-semibold text-xl">Visi</h3>
                <p>
                    Menjadi unit kegiatan mahasiswa yang unggul dan inovatif di bidang teknologi dan robotika, serta mampu bersaing dan berprestasi di tingkat nasional maupun internasional.
                </p>

                <h3 class="font-semibold text-xl mt-6">Misi</h3>
                <ul class="list-disc pl-5">
                    <li>Mengembangkan sumber daya mahasiswa yang kompeten di bidang teknologi dan robotika.</li>
                    <li>Menyelenggarakan kegiatan riset dan inovasi untuk menciptakan produk teknologi yang bermanfaat.</li>
                    <li>Aktif berpartisipasi dalam kompetisi robotika untuk mengharumkan nama Universitas Tadulako.</li>
                    <li>Menjalin kemitraan dengan berbagai pihak untuk mendukung pengembangan teknologi.</li>
                </ul>
            </div>
        </div>
    </div>
@endsection