<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/berita');
        }

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul) . '-' . time(),
            'konten' => $request->konten,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $beritum)
    {
        // 'beritum' adalah nama variabel default dari resource controller. Kita pass sbg 'berita'.
        return view('admin.berita.edit', ['berita' => $beritum]);
    }

    public function update(Request $request, Berita $beritum)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $beritum->gambar;
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($path) {
                Storage::delete($path);
            }
            $path = $request->file('gambar')->store('public/berita');
        }

        $beritum->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul) . '-' . $beritum->id, // update slug
            'konten' => $request->konten,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $beritum)
    {
        // Hapus gambar dari storage
        if ($beritum->gambar) {
            Storage::delete($beritum->gambar);
        }
        
        $beritum->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}