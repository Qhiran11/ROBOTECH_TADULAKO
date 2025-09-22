@extends('layouts.admin')
@section('title', 'Tambah Data Partisipasi ' . $divisi->singkatan)

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Tambah Data Partisipasi {{ $divisi->nama_divisi }}</h2>
    
    <form action="{{ route('admin.partisipasi.store', $divisi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Kolom Kiri -->
            <div>
                <div class="mb-4">
                    <label for="tahun" class="block text-gray-700 font-bold mb-2">Tahun Partisipasi:</label>
                    <input type="number" name="tahun" id="tahun" class="w-full border rounded px-3 py-2" value="{{ date('Y') }}" required>
                </div>
                <div class="mb-4">
                    <label for="nama_tim" class="block text-gray-700 font-bold mb-2">Nama Tim:</label>
                    <input type="text" name="nama_tim" id="nama_tim" class="w-full border rounded px-3 py-2" required>
                </div>
                 <div class="mb-4">
                    <label for="pembimbing" class="block text-gray-700 font-bold mb-2">Pembimbing:</label>
                    <input type="text" name="pembimbing" id="pembimbing" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="lokasi_pertandingan" class="block text-gray-700 font-bold mb-2">Lokasi Pertandingan:</label>
                    <input type="text" name="lokasi_pertandingan" id="lokasi_pertandingan" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="tema_lomba" class="block text-gray-700 font-bold mb-2">Tema Lomba:</label>
                    <textarea name="tema_lomba" id="tema_lomba" rows="3" class="w-full border rounded px-3 py-2" required></textarea>
                </div>
                 <div class="mb-4">
                    <label for="foto_robot" class="block text-gray-700 font-bold mb-2">Foto Robot:</label>
                    <input type="file" name="foto_robot" id="foto_robot" class="w-full border rounded px-3 py-2">
                </div>
                <div class="mb-4">
                    <label for="file_rulebook" class="block text-gray-700 font-bold mb-2">File Rulebook (PDF):</label>
                    <input type="file" name="file_rulebook" id="file_rulebook" class="w-full border rounded px-3 py-2" accept=".pdf">
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div>
                 <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Tim Inti:</label>
                    <div id="tim-inti-container">
                        <input type="text" name="tim_inti[]" class="w-full border rounded px-3 py-2 mb-2" placeholder="Nama Anggota Tim Inti">
                    </div>
                    <button type="button" id="add-tim-inti" class="text-sm text-blue-500 hover:underline">+ Tambah Anggota</button>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Tim Support:</label>
                    <div id="tim-support-container">
                        <input type="text" name="tim_support[]" class="w-full border rounded px-3 py-2 mb-2" placeholder="Nama Anggota Tim Support">
                    </div>
                    <button type="button" id="add-tim-support" class="text-sm text-blue-500 hover:underline">+ Tambah Anggota</button>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.kri.index') }}" class="text-gray-600 mr-4">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Simpan Data
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('add-tim-inti').addEventListener('click', function() {
        let container = document.getElementById('tim-inti-container');
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'tim_inti[]';
        input.className = 'w-full border rounded px-3 py-2 mb-2';
        input.placeholder = 'Nama Anggota Tim Inti';
        container.appendChild(input);
    });

    document.getElementById('add-tim-support').addEventListener('click', function() {
        let container = document.getElementById('tim-support-container');
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'tim_support[]';
        input.className = 'w-full border rounded px-3 py-2 mb-2';
        input.placeholder = 'Nama Anggota Tim Support';
        container.appendChild(input);
    });
</script>
@endsection
