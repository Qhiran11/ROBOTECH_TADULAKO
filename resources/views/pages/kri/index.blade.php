@extends('layouts.main')
@section('title', 'Kontes Robot Indonesia (KRI)')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800">Kontes Robot Indonesia (KRI)</h1>
        <p class="text-gray-600 mt-2">Partisipasi Robotech Tadulako dalam ajang robotika paling bergengsi di Indonesia.</p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($divisis as $divisi)
        <a href="{{ route('kri.show', $divisi->slug) }}" class="block border p-6 rounded-lg shadow hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <h3 class="text-2xl font-bold mb-2 text-blue-600">{{ $divisi->singkatan }}</h3>
            <p class="font-semibold text-gray-700 mb-3">{{ $divisi->nama_divisi }}</p>
            <p class="text-gray-600 text-sm">{{ $divisi->deskripsi }}</p>
        </a>
        @endforeach
    </div>
</div>
@endsection