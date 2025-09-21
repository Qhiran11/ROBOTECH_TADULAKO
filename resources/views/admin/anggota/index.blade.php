@extends('layouts.admin')
@section('title', 'Manajemen Anggota')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Daftar Anggota</h2>
            <a href="{{ route('admin.anggota.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Tambah Anggota</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Nama</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Jurusan</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Angkatan</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Status</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($anggotas as $anggota)
                        <tr class="border-b">
                            <td class="py-3 px-4">{{ $anggota->nama_lengkap }}</td>
                            <td class="py-3 px-4">{{ $anggota->jurusan }}</td>
                            <td class="py-3 px-4">{{ $anggota->angkatan_robotech }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $anggota->status == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $anggota->status }}
                                </span>
                            </td>
                            <td class="py-3 px-4 flex space-x-2">
                                <a href="{{ route('admin.anggota.edit', $anggota) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 text-xs">Edit</a>
                                <form action="{{ route('admin.anggota.destroy', $anggota) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus anggota ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 text-xs">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Belum ada data anggota.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $anggotas->links() }}
        </div>
    </div>
@endsection
