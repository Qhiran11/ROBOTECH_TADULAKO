@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p>Anda telah berhasil masuk ke panel admin Robotech Tadulako. Dari sini Anda dapat mengelola konten website.</p>
    </div>
@endsection
