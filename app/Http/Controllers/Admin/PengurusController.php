<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    /**
     * Menampilkan daftar semua pengurus.
     */
    public function index()
    {
        $pengurus = Pengurus::orderBy('urutan', 'asc')->get();
        return view('admin.pengurus.index', compact('pengurus'));
    }

    /**
     * Menampilkan form untuk mengedit pengurus.
     */
    public function edit(Pengurus $pengurus)
    {
        return view('admin.pengurus.edit', compact('pengurus'));
    }

    /**
     * Memperbarui data pengurus di database.
     */
    public function update(Request $request, Pengurus $pengurus)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $pengurus->update($request->only('nama'));

        return redirect()->route('admin.pengurus.index')->with('success', 'Data pengurus berhasil diperbarui.');
    }
}