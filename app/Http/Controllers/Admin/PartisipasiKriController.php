<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\PartisipasiKri;
use App\Models\TimKri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartisipasiKriController extends Controller
{
    // Menampilkan daftar divisi untuk dikelola
    public function index()
    {
        $divisis = Divisi::with('partisipasi')->get();
        return view('admin.kri.index', compact('divisis'));
    }
    
    public function create($divisi_id)
    {
        $divisi = Divisi::findOrFail($divisi_id);
        return view('admin.kri.create', compact('divisi'));
    }

    public function store(Request $request, $divisi_id)
    {
        $data = $request->validate([
            'tahun' => 'required|integer|digits:4|min:2000',
            'nama_tim' => 'required|string|max:255',
            'tema_lomba' => 'required|string',
            'pembimbing' => 'required|string',
            'lokasi_pertandingan' => 'required|string',
            'foto_robot' => 'nullable|image|max:2048',
            'file_rulebook' => 'nullable|file|mimes:pdf|max:2048',
            'tim_inti.*' => 'nullable|string',
            'tim_support.*' => 'nullable|string',
        ]);

        $partisipasi = PartisipasiKri::create([
            'divisi_id' => $divisi_id,
            'tahun' => $data['tahun'],
            'nama_tim' => $data['nama_tim'],
            'tema_lomba' => $data['tema_lomba'],
            'pembimbing' => $data['pembimbing'],
            'lokasi_pertandingan' => $data['lokasi_pertandingan'],
            'foto_robot' => $request->hasFile('foto_robot') ? $request->file('foto_robot')->store('public/kri/foto') : null,
            'file_rulebook' => $request->hasFile('file_rulebook') ? $request->file('file_rulebook')->store('public/kri/rulebook') : null,
        ]);

        if (!empty($data['tim_inti'])) {
            foreach (array_filter($data['tim_inti']) as $nama) {
                $partisipasi->tim()->create(['nama_mahasiswa' => $nama, 'jenis_tim' => 'Inti']);
            }
        }
        if (!empty($data['tim_support'])) {
            foreach (array_filter($data['tim_support']) as $nama) {
                $partisipasi->tim()->create(['nama_mahasiswa' => $nama, 'jenis_tim' => 'Support']);
            }
        }
        
        return redirect()->route('admin.kri.index')->with('success', 'Data partisipasi berhasil ditambahkan.');
    }

    public function edit($divisi_id, PartisipasiKri $partisipasi)
    {
        $divisi = Divisi::findOrFail($divisi_id);
        return view('admin.kri.edit', compact('divisi', 'partisipasi'));
    }

    public function update(Request $request, $divisi_id, PartisipasiKri $partisipasi)
    {
        // Logika update (mirip dengan store)
        // ... (Ini bisa ditambahkan nanti jika diperlukan)
        return redirect()->route('admin.kri.index')->with('success', 'Data partisipasi berhasil diperbarui.');
    }

    public function destroy($divisi_id, PartisipasiKri $partisipasi)
    {
        if ($partisipasi->foto_robot) Storage::delete($partisipasi->foto_robot);
        if ($partisipasi->file_rulebook) Storage::delete($partisipasi->file_rulebook);
        $partisipasi->delete();
        
        return back()->with('success', 'Data partisipasi berhasil dihapus.');
    }
}