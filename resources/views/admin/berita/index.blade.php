@extends('layouts.admin')
@section('title', 'Manajemen Berita')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Daftar Berita</h2>
            <a href="{{ route('admin.berita.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Tambah Berita Baru</a>
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
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Judul</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Tanggal Publikasi</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($berita as $item)
                        <tr class="border-b">
                            <td class="py-3 px-4">{{ $item->judul }}</td>
                            <td class="py-3 px-4">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="py-3 px-4 flex space-x-2">
                                <a href="{{ route('admin.berita.edit', $item) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 text-xs">Edit</a>
                                <form action="{{ route('admin.berita.destroy', $item) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 text-xs">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">Belum ada berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
         <div class="mt-4">
            {{ $berita->links() }}
        </div>
    </div>
@endsection