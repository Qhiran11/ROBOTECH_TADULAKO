@extends('layouts.admin')

@section('title', 'Manajemen Struktur Organisasi')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Daftar Pengurus</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Jabatan</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Nama</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($pengurus as $p)
                        <tr class="border-b">
                            <td class="py-3 px-4">{{ $p->jabatan }}</td>
                            <td class="py-3 px-4">{{ $p->nama }}</td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.pengurus.edit', $p) }}" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600 text-xs">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection