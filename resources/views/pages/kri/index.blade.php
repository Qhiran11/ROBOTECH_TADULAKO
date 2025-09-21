@extends('layouts.main')
@section('title', 'Kontes Robot Indonesia (KRI)')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Kontes Robot Indonesia (KRI)</h1>
            <p class="text-gray-600 mt-2">Partisipasi Robotech Tadulako dalam ajang robotika paling bergengsi di Indonesia.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="border p-6 rounded-lg shadow hover:shadow-xl transition-shadow">
                <h3 class="text-2xl font-bold mb-2">KRAI</h3>
                <p class="font-semibold text-gray-700 mb-3">Kontes Robot ABU Indonesia</p>
                <p class="text-gray-600">Divisi ini mengadaptasi tema dari kompetisi robot internasional ABU Robocon, menantang mahasiswa untuk merancang robot yang dapat menyelesaikan tugas-tugas kompleks.</p>
            </div>

            <div class="border p-6 rounded-lg shadow hover:shadow-xl transition-shadow">
                <h3 class="text-2xl font-bold mb-2">KRSBI</h3>
                <p class="font-semibold text-gray-700 mb-3">Kontes Robot Sepak Bola Beroda Indonesia</p>
                <p class="text-gray-600">Sebuah kompetisi di mana tim robot otonom beroda saling berhadapan dalam pertandingan sepak bola, menguji kemampuan navigasi, kerjasama tim, dan strategi.</p>
            </div>

            <div class="border p-6 rounded-lg shadow hover:shadow-xl transition-shadow">
                <h3 class="text-2xl font-bold mb-2">KRSTI</h3>
                <p class="font-semibold text-gray-700 mb-3">Kontes Robot Seni Tari Indonesia</p>
                <p class="text-gray-600">Divisi unik yang memadukan teknologi dengan budaya, di mana robot dirancang untuk menarikan tarian tradisional Indonesia dengan gerakan yang artistik dan akurat.</p>
            </div>

            <div class="border p-6 rounded-lg shadow hover:shadow-xl transition-shadow">
                <h3 class="text-2xl font-bold mb-2">KRSRI</h3>
                <p class="font-semibold text-gray-700 mb-3">Kontes Robot SAR Indonesia</p>
                <p class="text-gray-600">Robot dirancang untuk misi pencarian dan penyelamatan (Search and Rescue). Robot harus mampu menavigasi medan berbahaya untuk menemukan dan mengevakuasi korban.</p>
            </div>

            <div class="border p-6 rounded-lg shadow hover:shadow-xl transition-shadow">
                <h3 class="text-2xl font-bold mb-2">KRTMI</h3>
                <p class="font-semibold text-gray-700 mb-3">Kontes Robot Tematik Indonesia</p>
                <p class="text-gray-600">Divisi dengan tema yang berubah setiap tahunnya, menantang kreativitas mahasiswa untuk menyelesaikan masalah-masalah aktual dengan solusi robotika inovatif.</p>
            </div>
        </div>
    </div>
@endsection