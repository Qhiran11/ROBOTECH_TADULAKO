@extends('layouts.admin')

@section('title', 'Edit Pengurus')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Data Pengurus</h2>

        <form action="{{ route('admin.pengurus.update', $pengurus) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="jabatan" class="block text-gray-700 text-sm font-bold mb-2">Jabatan:</label>
                <input type="text" id="jabatan" name="jabatan" value="{{ $pengurus->jabatan }}" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200" 
                       readonly>
            </div>

            <div class="mb-6">
                <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $pengurus->nama) }}" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error('nama') border-red-500 @enderror" 
                       required>
                @error('nama')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.pengurus.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection