@extends('layouts.main')
@section('title', 'Berita & Kegiatan')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center">Berita & Kegiatan Robotech Tadulako</h1>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($berita as $item)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <a href="{{ route('berita.show', $item->slug) }}">
                        <img class="w-full h-48 object-cover" src="{{ $item->gambar ? Storage::url($item->gambar) : 'https://via.placeholder.com/400x250' }}" alt="Gambar Berita">
                    </a>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">
                            <a href="{{ route('berita.show', $item->slug) }}" class="hover:text-blue-600">{{ $item->judul }}</a>
                        </h3>
                        <p class="text-gray-700 text-base mb-4">
                            {{ Str::limit(strip_tags($item->konten), 100) }}
                        </p>
                        <span class="text-gray-500 text-sm">{{ $item->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500">Saat ini belum ada berita yang dipublikasikan.</p>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $berita->links() }}
        </div>
    </div>
@endsection