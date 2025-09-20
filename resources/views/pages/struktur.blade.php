@extends('layouts.main')

@section('title', 'Struktur Organisasi - Robotech Tadulako')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center">Struktur Kepengurusan Robotech Tadulako 2025</h1>
        
        <div class="max-w-2xl mx-auto">
            <ul class="space-y-4">
                @foreach($pengurus as $jabatan => $nama)
                <li class="border border-gray-200 rounded-lg p-4 flex justify-between items-center hover:bg-gray-50 transition-colors">
                    <span class="font-semibold text-gray-700">{{ $jabatan }}</span>
                    <span class="text-blue-600 font-medium">{{ $nama }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
