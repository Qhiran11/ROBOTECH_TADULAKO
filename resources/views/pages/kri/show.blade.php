@extends('layouts.main')
@section('title', $divisi->nama_divisi)

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-center">{{ $divisi->nama_divisi }} ({{ $divisi->singkatan }})</h1>
        <p class="text-center text-gray-600 mt-2">{{ $divisi->deskripsi }}</p>
    </div>

    <div class="mb-8 flex justify-center items-center space-x-4">
        <span class="font-semibold">Pilih Tahun:</span>
        <form action="{{ route('kri.show', $divisi->slug) }}" method="GET">
            <select name="tahun" onchange="this.form.submit()" class="border-gray-300 rounded-md shadow-sm">
                @forelse($daftar_tahun as $tahun)
                    <option value="{{ $tahun }}" {{ $tahun == $tahun_terpilih ? 'selected' : '' }}>{{ $tahun }}</option>
                @empty
                    <option>Belum ada data</option>
                @endforelse
            </select>
        </form>
    </div>
    
    @if($partisipasi)
        <div class="grid md:grid-cols-3 gap-8">
            <div class="md:col-span-1">
                <img src="{{ $partisipasi->foto_robot ? Storage::url($partisipasi->foto_robot) : 'https://placehold.co/600x400' }}" alt="Foto Robot {{ $partisipasi->tahun }}" class="rounded-lg shadow-lg w-full">
            </div>
            <div class="md:col-span-2">
                <h2 class="text-2xl font-bold mb-4">Tim {{ $partisipasi->nama_tim }} ({{ $partisipasi->tahun }})</h2>
                <ul class="space-y-3 text-gray-700">
                    <li><strong>Tema:</strong> {{ $partisipasi->tema_lomba }}</li>
                    <li><strong>Pembimbing:</strong> {{ $partisipasi->pembimbing }}</li>
                    <li><strong>Lokasi:</strong> {{ $partisipasi->lokasi_pertandingan }}</li>
                </ul>

                @if($partisipasi->file_rulebook)
                    <a href="{{ Storage::url($partisipasi->file_rulebook) }}" target="_blank" class="inline-block mt-6 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                        Download Rulebook {{ $partisipasi->tahun }}
                    </a>
                @endif
            </div>
        </div>

        <div class="mt-12">
            <h3 class="text-xl font-bold mb-4 text-center">Anggota Tim</h3>
            <div class="flex justify-center space-x-8">
                <div>
                    <h4 class="font-semibold mb-2">Tim Inti</h4>
                    <ul class="list-disc pl-5">
                        @foreach($partisipasi->tim->where('jenis_tim', 'Inti') as $anggota)
                            <li>{{ $anggota->nama_mahasiswa }}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-2">Tim Support</h4>
                    <ul class="list-disc pl-5">
                         @foreach($partisipasi->tim->where('jenis_tim', 'Support') as $anggota)
                            <li>{{ $anggota->nama_mahasiswa }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @else
        <p class="text-center text-gray-500 py-12">Data partisipasi untuk tahun {{ $tahun_terpilih }} tidak ditemukan.</p>
    @endif
</div>
@endsection