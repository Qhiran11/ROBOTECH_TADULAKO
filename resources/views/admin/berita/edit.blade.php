@extends('layouts.admin')
@section('title', 'Edit Berita')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Berita</h2>
        <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul Berita:</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="konten" class="block text-gray-700 text-sm font-bold mb-2">Isi Berita:</label>
                <textarea id="konten" name="konten" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('konten', $berita->konten) }}</textarea>
            </div>
            <div class="mb-6">
                <label for="gambar" class="block text-gray-700 text-sm font-bold mb-2">Ganti Gambar (Opsional):</label>
                @if($berita->gambar)
                    <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-32 h-32 object-cover rounded mb-2">
                @endif
                <input type="file" id="gambar" name="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-end space-x-4">
                <a href="{{ route('admin.berita.index') }}" class="text-gray-600">Batal</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection