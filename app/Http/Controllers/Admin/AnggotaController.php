<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::orderBy('nama_lengkap', 'asc')->paginate(10);
        return view('admin.anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('admin.anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'angkatan_robotech' => 'required|string|max:255',
            'status' => 'required|in:Aktif,Pasif,Alumni',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/anggota');
        }

        Anggota::create([
            'nama_lengkap' => $request->nama_lengkap,
            'jurusan' => $request->jurusan,
            'angkatan_robotech' => $request->angkatan_robotech,
            'status' => $request->status,
            'foto' => $path,
        ]);

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(Anggota $anggotum)
    {
        return view('admin.anggota.edit', ['anggota' => $anggotum]);
    }

    public function update(Request $request, Anggota $anggotum)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'angkatan_robotech' => 'required|string|max:255',
            'status' => 'required|in:Aktif,Pasif,Alumni',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $anggotum->foto;
        if ($request->hasFile('foto')) {
            if ($path) {
                Storage::delete($path);
            }
            $path = $request->file('foto')->store('public/anggota');
        }

        $anggotum->update([
            'nama_lengkap' => $request->nama_lengkap,
            'jurusan' => $request->jurusan,
            'angkatan_robotech' => $request->angkatan_robotech,
            'status' => $request->status,
            'foto' => $path,
        ]);

        return redirect()->route('admin.anggota.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggotum)
    {
        if ($anggotum->foto) {
            Storage::delete($anggotum->foto);
        }
        $anggotum->delete();

        return redirect()->route('admin.anggota.index')->with('success', 'Data anggota berhasil dihapus.');
    }
}
