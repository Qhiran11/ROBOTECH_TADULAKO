@extends('layouts.admin')
@section('title', 'Edit Data Anggota')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Edit Data Anggota</h2>
    <form action="{{ route('admin.anggota.update', $anggota) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nama_lengkap" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $anggota->nama_lengkap) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>
        <div class="mb-4">
            <label for="jurusan" class="block text-gray-700 text-sm font-bold mb-2">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan', $anggota->jurusan) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>
        <div class="mb-4">
            <label for="angkatan_robotech" class="block text-gray-700 text-sm font-bold mb-2">Angkatan Robotech:</label>
            <input type="text" id="angkatan_robotech" name="angkatan_robotech" value="{{ old('angkatan_robotech', $anggota->angkatan_robotech) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>
        <div class="mb-4">
            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
            <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                <option value="Aktif" {{ old('status', $anggota->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Pasif" {{ old('status', $anggota->status) == 'Pasif' ? 'selected' : '' }}>Pasif</option>
                <option value="Alumni" {{ old('status', $anggota->status) == 'Alumni' ? 'selected' : '' }}>Alumni</option>
            </select>
        </div>
        <div class="mb-6">
            <label for="foto" class="block text-gray-700 text-sm font-bold mb-2">Ganti Foto (Opsional):</label>
            @if($anggota->foto)
                <img src="{{ Storage::url($anggota->foto) }}" alt="{{ $anggota->nama_lengkap }}" class="w-24 h-24 object-cover rounded-full mb-2">
            @endif
            <input type="file" id="foto" name="foto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>
        <div class="flex items-center justify-end space-x-4">
            <a href="{{ route('admin.anggota.index') }}" class="text-gray-600">Batal</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
