@extends('layouts.admin')
@section('title', 'Edit Partisipasi ' . $partisipasi->nama_tim)

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Edit Data Partisipasi {{ $divisi->singkatan }} Tahun {{ $partisipasi->tahun }}</h2>
    
    <form action="{{ route('admin.partisipasi.update', [$divisi->id, $partisipasi->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <div class="mb-4">
                    <label for="tahun" class="block text-gray-700 font-bold mb-2">Tahun Partisipasi:</label>
                    <input type="number" name="tahun" id="tahun" class="w-full border rounded px-3 py-2 bg-gray-200" value="{{ old('tahun', $partisipasi->tahun) }}" readonly>
                </div>
                <div class="mb-4">
                    <label for="nama_tim" class="block text-gray-700 font-bold mb-2">Nama Tim:</label>
                    <input type="text" name="nama_tim" id="nama_tim" class="w-full border rounded px-3 py-2" value="{{ old('nama_tim', $partisipasi->nama_tim) }}" required>
                </div>
                 <div class="mb-4">
                    <label for="pembimbing" class="block text-gray-700 font-bold mb-2">Pembimbing:</label>
                    <input type="text" name="pembimbing" id="pembimbing" class="w-full border rounded px-3 py-2" value="{{ old('pembimbing', $partisipasi->pembimbing) }}" required>
                </div>
                <div class="mb-4">
                    <label for="lokasi_pertandingan" class="block text-gray-700 font-bold mb-2">Lokasi Pertandingan:</label>
                    <input type="text" name="lokasi_pertandingan" id="lokasi_pertandingan" class="w-full border rounded px-3 py-2" value="{{ old('lokasi_pertandingan', $partisipasi->lokasi_pertandingan) }}" required>
                </div>
                <div class="mb-4">
                    <label for="tema_lomba" class="block text-gray-700 font-bold mb-2">Tema Lomba:</label>
                    <textarea name="tema_lomba" id="tema_lomba" rows="3" class="w-full border rounded px-3 py-2" required>{{ old('tema_lomba', $partisipasi->tema_lomba) }}</textarea>
                </div>
                 <div class="mb-4">
                    <label for="foto_robot" class="block text-gray-700 font-bold mb-2">Ganti Foto Robot (Opsional):</label>
                    @if($partisipasi->foto_robot)
                        <img src="{{ Storage::url($partisipasi->foto_robot) }}" class="w-32 mb-2 rounded">
                    @endif
                    <input type="file" name="foto_robot" id="foto_robot" class="w-full border rounded px-3 py-2">
                </div>
                <div class="mb-4">
                    <label for="file_rulebook" class="block text-gray-700 font-bold mb-2">Ganti Rulebook (PDF, Opsional):</label>
                    @if($partisipasi->file_rulebook)
                        <a href="{{ Storage::url($partisipasi->file_rulebook) }}" target="_blank" class="text-blue-500 hover:underline mb-2 block">Lihat Rulebook Saat Ini</a>
                    @endif
                    <input type="file" name="file_rulebook" id="file_rulebook" class="w-full border rounded px-3 py-2" accept=".pdf">
                </div>
            </div>

            <div>
                 <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Tim Inti:</label>
                    <div id="tim-inti-container">
                        @foreach($partisipasi->tim->where('jenis_tim', 'Inti') as $tim)
                        <input type="text" name="tim_inti[]" class="w-full border rounded px-3 py-2 mb-2" placeholder="Nama Anggota Tim Inti" value="{{ $tim->nama_mahasiswa }}">
                        @endforeach
                        <input type="text" name="tim_inti[]" class="w-full border rounded px-3 py-2 mb-2" placeholder="Nama Anggota Tim Inti">
                    </div>
                    <button type="button" id="add-tim-inti" class="text-sm text-blue-500 hover:underline">+ Tambah Anggota</button>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Tim Support:</label>
                    <div id="tim-support-container">
                         @foreach($partisipasi->tim->where('jenis_tim', 'Support') as $tim)
                        <input type="text" name="tim_support[]" class="w-full border rounded px-3 py-2 mb-2" placeholder="Nama Anggota Tim Support" value="{{ $tim->nama_mahasiswa }}">
                        @endforeach
                        <input type="text" name="tim_support[]" class="w-full border rounded px-3 py-2 mb-2" placeholder="Nama Anggota Tim Support">
                    </div>
                    <button type="button" id="add-tim-support" class="text-sm text-blue-500 hover:underline">+ Tambah Anggota</button>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.kri.index') }}" class="text-gray-600 mr-4">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    // Script ini sama seperti di halaman create
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