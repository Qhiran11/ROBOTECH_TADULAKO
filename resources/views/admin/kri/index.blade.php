@extends('layouts.admin')
@section('title', 'Manajemen KRI')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Manajemen Partisipasi KRI</h2>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="space-y-6">
        @foreach($divisis as $divisi)
            <div class="border rounded-lg p-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-bold">{{ $divisi->nama_divisi }} ({{ $divisi->singkatan }})</h3>
                        <p class="text-sm text-gray-500">{{ $divisi->partisipasi->count() }} data partisipasi tercatat.</p>
                    </div>
                    <a href="{{ route('admin.partisipasi.create', $divisi->id) }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                        + Tambah Data {{ $divisi->singkatan }}
                    </a>
                </div>
                @if($divisi->partisipasi->isNotEmpty())
                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full bg-white text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-3 text-left">Tahun</th>
                                <th class="py-2 px-3 text-left">Nama Tim</th>
                                <th class="py-2 px-3 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($divisi->partisipasi->sortByDesc('tahun') as $partisipasi)
                            <tr class="border-b">
                                <td class="py-2 px-3">{{ $partisipasi->tahun }}</td>
                                <td class="py-2 px-3">{{ $partisipasi->nama_tim }}</td>
                                <td class="py-2 px-3 flex space-x-2">
                                    <a href="{{ route('admin.partisipasi.edit', [$divisi->id, $partisipasi->id]) }}" class="text-yellow-500 hover:underline">Edit</a>
                                    <form action="{{ route('admin.partisipasi.destroy', [$divisi->id, $partisipasi->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data tahun {{ $partisipasi->tahun }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
