@extends('layouts.main')
@section('title', $berita->judul)

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md max-w-4xl mx-auto">
        
        @if($berita->gambar)
            <img class="w-full h-80 object-cover rounded-lg mb-6" src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}">
        @endif

        <h1 class="text-4xl font-bold mb-2">{{ $berita->judul }}</h1>
        <p class="text-gray-500 text-sm mb-6">Dipublikasikan pada {{ $berita->created_at->format('d F Y') }}</p>

        <div class="prose max-w-none">
            {!! nl2br(e($berita->konten)) !!}
        </div>
        
        <div class="mt-8">
            <a href="{{ route('berita.index') }}" class="text-blue-600 hover:underline">&larr; Kembali ke Daftar Berita</a>
        </div>
    </div>
@endsection