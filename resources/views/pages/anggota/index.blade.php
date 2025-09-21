@extends('layouts.main')
@section('title', 'Anggota Robotech Tadulako')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-8 text-center">Anggota Aktif Robotech Tadulako</h1>
        
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse($anggotas as $anggota)
                <div class="text-center">
                    <img class="w-32 h-32 mx-auto rounded-full object-cover shadow-lg" 
                         src="{{ $anggota->foto ? Storage::url($anggota->foto) : 'https://via.placeholder.com/150' }}" 
                         alt="Foto {{ $anggota->nama_lengkap }}">
                    <div class="mt-4">
                        <h4 class="text-lg font-semibold">{{ $anggota->nama_lengkap }}</h4>
                        <p class="text-gray-600">{{ $anggota->jurusan }}</p>
                        <p class="text-gray-500 text-sm">Angkatan {{ $anggota->angkatan_robotech }}</p>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">Data anggota aktif belum tersedia.</p>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $anggotas->links() }}
        </div>
    </div>
@endsection
